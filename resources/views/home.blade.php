@extends('layouts.app')

@section('content')
<main class="max-w-6xl mx-auto px-6 mt-12">
  <h1 class="text-2xl font-bold mb-4">This is Homepage</h1>
  <ul class="flex flex-col space-y-4 bg-white p-6 shadow">
    <li><a href="/clinics" class="block text-lg px-6 py-3 border rounded bg-gray-200 hover:bg-blue-200">Browse Clinics</a></li>
    <li><a href="/equipments" class="block text-lg px-6 py-3 border rounded bg-gray-200 hover:bg-blue-200">Browse Equipments</a></li>
  </ul>
</main>
@endsection
