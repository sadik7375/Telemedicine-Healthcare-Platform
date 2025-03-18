<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate doctor data
        $request->validate([
            'name' => 'required|string',
            'qualification' => 'required|string',
            'treatment_category' => 'required|string',
            'specialist' => 'required|string',
            'about' => 'nullable|string',
            'chambers' => 'required|array',
            'chambers.*.hospital_name' => 'required|string',
            'chambers.*.address' => 'required|string',
            'chambers.*.available_time' => 'required|string',
            'chambers.*.appointment_contact' => 'required|string',
        ]);

        // Create doctor
        $doctor = Doctor::create([
            'name' => $request->name,
            'qualification' => $request->qualification,
            'treatment_category' => $request->treatment_category,
            'specialist' => $request->specialist,
            'about' => $request->about,
        ]);

        // Create chambers
        foreach ($request->chambers as $chamberData) {
            Chamber::create([
                'doctor_id' => $doctor->id,
                'hospital_name' => $chamberData['hospital_name'],
                'address' => $chamberData['address'],
                'available_time' => $chamberData['available_time'],
                'appointment_contact' => $chamberData['appointment_contact'],
            ]);
        }

        return response()->json([
            'message' => 'Doctor and chambers added successfully',
            'doctor' => $doctor,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
