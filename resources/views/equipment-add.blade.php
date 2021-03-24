@extends('layouts.app')

@section('content')
<main class="container mx-auto px-6 mt-3 mb-32">
  <div class="flex">
      <div class="w-full">
          <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg mb-32">

              <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                  Add New Equipment
              </header>

              <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 mb-6" method="POST"
                  action="{{ route('equipment.store') }}">
                  @csrf
                  <div class="flex flex-wrap">
                      <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                          Name:
                      </label>

                      <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                          name="name" value="{{ old('name') }}">

                      @error('name')
                      <p class="text-red-500 text-xs italic mt-4">
                          {{ $message }}
                      </p>
                      @enderror
                  </div>

                  <div class="flex flex-wrap">
                    <div class="p-6 shadow rounded border flex-1">
                      <label for="info" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        Informations:
                      </label>
                      <div id="informations">
                        <input type="text"
                        class="form-input w-full mb-2" name="info[]"
                        >
                      </div>
                      <button onclick="add()" type="button" class="px-6 py-3 bg-blue-600 font-bold rounded border text-white">Add</button>
                      @error('info')
                        <p class="text-red-500 text-xs italic mt-4">
                          {{ $message }}
                        </p>
                      @enderror
                    </div>
                  </div>

                  <div class="flex flex-wrap space-x-2 items-center">
                      <div>
                        <label for="date" class="text-gray-700 text-sm font-bold">
                            Date:
                        </label>

                        <input id="date" type="date"
                            class="form-input @error('date') border-red-500 @enderror" name="date"
                            value="{{ old('date') }}">
                        @error('date')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                      </div>

                      <div>
                        <label for="price" class="text-gray-700 text-sm font-bold">
                            Price<span class="text-sm font-normal">(in cents)</span>:
                        </label>
                        <input id="price" type="text"
                            class="form-input @error('price') border-red-500 @enderror" name="price"
                            value="{{ old('price') }}">
                        @error('price')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                      </div>

                      <div>
                        <label for="rate" class="text-gray-700 text-sm font-bold">
                            Rate:
                        </label>
                        <input id="rate" type="text"
                            class="form-input @error('rate') border-red-500 @enderror" name="rate"
                            value="{{ old('rate') }}">

                        @error('rate')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                      </div>
                  </div>

                  <div class="flex flex-wrap">
                      <button type="submit"
                      class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                          Add
                      </button>
                  </div>


              </form>

          </section>
      </div>
  </div>
</main>
<script>
  function add() {
    var informations = document.getElementById("informations");
    var node = document.createElement("input");
    node.setAttribute("type", "text")
    node.setAttribute("class", "form-input w-full mb-2")
    node.setAttribute("name", "info[]")
    informations.appendChild(node);
  }
</script>
@endsection
