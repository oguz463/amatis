@extends('layouts.app')

@section('content')
<main class="container mx-auto px-6 mt-6">
  <div class="shadow rounded border p-8 bg-white">
    <h1 class="text-2xl font-bold">Clinic: {{$clinic->name}}</h1>
    <div class="p-8 shadow border rounded my-3">
      <h1 class="text-xl font-bold">Avaible Equipments</h1>
      <ul class="flex flex-col space-y-1 border mt-6">
        @foreach ($clinic->equipments as $equipment)
            <li><a class="block px-4 py-2 text-blue-600 border-b border-t" href="/equipment/{{$equipment->id}}">{{$equipment->name}}</a>
              <ul class="flex flex-col space-y-1 p-6">
                <li><strong>Date of supply:</strong> {{$equipment->date}}</li>
                <li><strong>Informations:</strong>
                  <ul class="ml-6 flex flex-col space-y-1 py-1 list-disc">
                    @foreach ($equipment->info as $value)
                      <li>{{$value}}</li>
                    @endforeach
                  </ul>
                </li>
                <li><strong>Unit Price:</strong> {{$equipment->price / 100}}€</li>
                <li><strong>Usage Rate:</strong> %{{$equipment->rate}}</li>
              </ul>
            </li>
        @endforeach
      </ul>
    </div>
  </div>
</main>
@endsection
