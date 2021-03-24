<?php

namespace App\Http\Controllers;

use App\Clinic;

class ClinicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('clinics');
    }

    public function store()
    {
        request()->validate(['name' => 'required|string|min:6']);
        return Clinic::create(['name' => request('name')]);
    }

    public function show(Clinic $clinic)
    {
        return view('clinic', compact('clinic'));
    }

    public function update(Clinic $clinic)
    {
        $clinic->update(request()->validate(['name' => 'required|string|min:6']));
        return response("Updated!");
    }

    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return response("Deleted!");
    }
}
