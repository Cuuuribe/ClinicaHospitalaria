<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Mostrar lista de pacientes
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }


    // Mostrar formulario para crear un nuevo paciente
   
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients',
            'phone' => 'nullable|string|max:15',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'phone' => 'nullable|string|max:15',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado con éxito.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Paciente eliminado con éxito.');
    }
}
