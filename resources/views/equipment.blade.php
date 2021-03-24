@extends('layouts.app')

@section('content')
<main class="container mx-auto px-6 mt-12 mb-32 flex space-x-4">
  <div class="flex-1">
    <h1 class="text-2xl font-bold">{{$equipment->name}}</h1>
    <ul class="flex flex-col flex-shrink-0 space-y-1 p-6 shadow rounded border p-8 mt-3 bg-white">
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
  </div>
  <div class="shadow rounded border p-8 flex-1 bg-white">
    <h1 class="font-bold text-xl">Avaible Clinics</h1>
    <ul class="flex flex-col space-y-1 p-6">
      @foreach ($equipment->clinics as $clinic)
          <li><a class="block px-4 py-2 text-blue-600 border-b" href="/clinic/{{$clinic->id}}">{{$clinic->name}}</a></li>
      @endforeach
    </ul>
  </div>
</main>
@endsection
