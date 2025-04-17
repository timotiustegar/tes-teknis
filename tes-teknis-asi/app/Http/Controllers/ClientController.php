<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Redis;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('index', compact('clients'));
    }

    public function create(){
        return view('create_client');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:250', 
            'slug' => 'required|string|max:100|unique:clients', 
            'address' => 'nullable|string', 
            'phone_number' => 'nullable|string',
            'city' => 'nullable|string',
        ]);

        $client = Client::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'client_prefix' => 1
        ]);

        Redis::set($client->slug, json_encode($client));
        return redirect()->route('index')->with('success', 'Client berhasil disimpan!');
    }

    public function checkRedis(Request $request){
        $slug = $request->slug;
        $clientData = Redis::get($slug);

        if ($clientData) {
            $clientData = json_decode($clientData, true);
            return view('check_redis', compact('clientData'));
        } else {
            return view('check_redis', ['error' => 'No data found for this slug in Redis']);
        }
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:250',
            'slug' => 'required|string|max:100|unique:my_clients,slug,' . $id, 
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'city' => 'nullable|string',
        ]);
        $client = Client::findOrFail($id);

        $client->name = $request->name;
        $client->slug = $request->slug;
        $client->address = $request->address;
        $client->phone_number = $request->phone_number;
        $client->city = $request->city;
        $client->save();

        Redis::del($client->slug);
        Redis::set($client->slug, json_encode($client));
        return redirect()->route('index')->with('success', 'Client berhasil diperbarui!');
    }
    public function destroy($id){
        $client = Client::findOrFail($id);
        $client->deleted_at = Carbon::now();
        $client->save();

        Redis::del($client->slug);
        return redirect()->route('index')->with('success', 'Client berhasil dihapus!');
    }
}
