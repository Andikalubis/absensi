<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Department extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = env('API_BASE_URL');
    }

    public function index()
    {
        $response = Http::get("{$this->api}/departement");
        $departments = $response->json()['data'] ?? [];
        return view('departement.index', compact('departments'));
    }

    public function create()
    {
        return view('departement.create');
    }

    public function store(Request $request)
    {
        Http::post("{$this->api}/departement", $request->only(['departement_name', 'max_clock_in_time', 'max_clock_out_time']));
        return redirect()->route('departement.index')->with('success', 'Department added successfully');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->api}/departement/{$id}");
        $departments = $response->json()['data'] ?? null;
        return view('departement.edit', compact('departments'));
    }

    public function update(Request $request, $id)
    {
        Http::put("{$this->api}/departement/{$id}", $request->only(['departement_name', 'max_clock_in_time', 'max_clock_out_time']));
        return redirect()->route('departement.index')->with('success', 'Department updated successfully');
    }

    public function destroy($id)
    {
        Http::delete("{$this->api}/departement/{$id}");
        return redirect()->route('departement.index')->with('success', 'Department deleted successfully');
    }
}
