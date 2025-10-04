<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AttendanceHistory extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = env('API_BASE_URL');
    }

    public function index(Request $request)
    {
        $query = [];
        if ($request->filled('departement_id')) {
            $query['departement_id'] = $request->departement_id;
        }
        if ($request->filled('date')) {
            $query['date'] = $request->date;
        }
    
        $response = Http::get("{$this->api}/attendance-history", $query);
        $employees = $response->json()['employees'] ?? [];
    
        $departements = Http::get("{$this->api}/departement")->json()['data'] ?? [];
    
        return view('attendance-history.index', compact('employees', 'departements'));
    }    

    public function show($employeeId)
    {
        $query = request()->only('date');
        $response = Http::get("{$this->api}/attendance-history/{$employeeId}", $query);
    
        $logs = $response->json()['attendance_history'] ?? [];
    
        if (empty($logs)) {
            return redirect()->route('attendance-history.index')
                ->with('error', 'Attendance not found');
        }
    
        return view('attendance-history.show', compact('logs'));
    }    
}
