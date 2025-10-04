<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Employee extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = env('API_BASE_URL');
    }

    public function index()
    {
        $response = Http::get("{$this->api}/employee");
        $employees = $response->json()['data'] ?? [];
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $departments = Http::get("{$this->api}/departement")->json()['data'] ?? [];
    
        $year = date('Y');
        $response = Http::get("{$this->api}/employee");
        $employees = $response->json()['data'] ?? [];
        $lastNumber = 0;
    
        if (!empty($employees)) {
            $lastEmpId = end($employees)['employee_id'];
            $lastNumber = (int)substr($lastEmpId, -3);
        }
    
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $employeeId = "EMP{$year}{$newNumber}";
    
        return view('employee.create', compact('departments', 'employeeId'));
    }

    public function store(Request $request)
    {
        Http::post("{$this->api}/employee", $request->only(['employee_id', 'departement_id', 'name', 'address']));
        return redirect()->route('employee.index')->with('success', 'Employee added successfully');
    }

    public function edit($id)
    {
        $employee = Http::get("{$this->api}/employee/{$id}")->json()['data'] ?? [];
        $departments = Http::get("{$this->api}/departement")->json()['data'] ?? [];
        return view('employee.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, $id)
    {
        Http::put("{$this->api}/employee/{$id}", $request->only(['employee_id', 'departement_id', 'name', 'address']));
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        Http::delete("{$this->api}/employee/{$id}");
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
    }
}
