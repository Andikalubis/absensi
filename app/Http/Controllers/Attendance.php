<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Attendance extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = env('API_BASE_URL');
    }

    public function index()
    {
        return view('attendance.index');
    }

    public function checkin(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string',
            'note' => 'nullable|string'
        ]);
    
        $response = Http::post("{$this->api}/attendance/checkin", [
            'employee_id' => $request->employee_id,
            'note' => $request->note,
            'clock_in' => now()->format('Y-m-d H:i:s')
        ]);
    
        if ($response->successful()) {
            return redirect()->route('attendance-history.index')->with('success', 'Check-in berhasil');
        } else {
            $data = $response->json();
            return redirect()->back()->with('error', $data['messages']['error'] ?? 'Check-in gagal');
        }
    }
    
    public function checkout(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string',
            'note' => 'nullable|string'
        ]);
    
        $response = Http::put("{$this->api}/attendance/checkout", [
            'employee_id' => $request->employee_id,
            'note' => $request->note,
            'clock_out' => now()->format('Y-m-d H:i:s')
        ]);
    
        if ($response->successful()) {
            // Redirect ke Attendance History
            return redirect()->route('attendance-history.index')->with('success', 'Check-out berhasil');
        } else {
            $data = $response->json();
            return redirect()->back()->with('error', $data['messages']['error'] ?? 'Check-out gagal');
        }
    }
    
}
