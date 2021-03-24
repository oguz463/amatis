<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class EquipmentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      return view('equipments');
  }

  public function create()
  {
    return view('equipment-add');
  }

  public function store()
  {
      $request = $this->validate(request(), [
        'name' => 'required|string|min:6',
        'date' => 'required|date_format:Y-m-d',
        'info' => 'required|array|min:1',
        'info.*' => 'required',
        'price' => 'required|integer|min:1',
        'rate' => 'required|integer|min:0|max:100'
      ]);

      Equipment::create($request);
      return redirect()->route('home');
  }

  public function show(Equipment $equipment)
  {
      return view('equipment', compact('equipment'));
  }

  public function edit(Equipment $equipment)
  {
    return view('equipment-edit', compact('equipment'));
  }

  public function update(Equipment $equipment)
  {
    $request = request()->validate([
      'name' => 'required|string|min:6',
      'date' => 'required|date_format:Y-m-d',
      'info' => 'required|array|min:1',
      'price' => 'required|integer|min:1',
      'rate' => 'required|integer|min:0|max:100'
    ]);

    $info = array_values(array_filter($request["info"]));

    $equipment->update([
      'name' => $request["name"],
      'date' => $request["date"],
      'info' => $info,
      'price' => $request["price"],
      'rate' => $request["rate"],
    ]);

    return back();
  }

  public function destroy(Equipment $equipment)
  {
      $equipment->delete();
      return redirect()->route('home');
  }
}
