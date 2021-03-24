@extends('layouts.app')

@section('content')
<main class="container mx-auto px-6 mt-3 mb-32">
  <div class="shadow px-6 py-6 bg-white">
    <a href="/equipments/create" target="_blank" class="block p-4 rounded border bg-gray-600 text-white mb-3">Create New</a>
    <equipments inline-template>
      <div>
        <h1 class="font-bold text-xl mb-3">Equipment Search</h1>
        <input type="text" v-model="search" class="w-full px-4 py-2 border-2 rounded mb-3" placeholder="Seach..." @input="fetch">
        <div class="flex items-center mb-3">
          <p class="font-bold mr-2">Sort by:</p>
          <ul class="flex text-blue-600 text-sm">
            <li><a href="#" class="block p-1 hover:text-blue-900" :class="sort === 'relevance' ? 'underline text-blue-900' : ''" @click.prevent="sort = 'relevance'">Relevance</a></li>
            <li><a href="#" class="block p-1 hover:text-blue-900" :class="sort === 'alphabetical' ? 'underline text-blue-900' : ''" @click.prevent="sort = 'alphabetical'">Alphabetical</a></li>
            <li><a href="#" class="block p-1 hover:text-blue-900" :class="sort === 'count' ? 'underline text-blue-900' : ''" @click.prevent="sort = 'count'">Equipment Count</a></li>
          </ul>
        </div>
        <ul class="flex flex-col bg-gray-100 bg-white px-6 pt-6 shadow mb-3 text-sm">
          <li v-for="item in items">
            <div class="flex space-x-1">
              <a :href="'/equipment/' + item.id" target="_blank" class="flex-1 text-lg px-4 py-2 border shadow rounded bg-gray-200 hover:bg-blue-200"><strong class="pr-4">#@{{item.id}}</strong> @{{item.name}} <span class="text-xs text-blue-600">(Click to show clinics with this equipment)</span></a>
              <a :href="'/equipments/edit/' + item.id" target="_blank" class="text-lg px-4 py-2 border shadow rounded bg-green-600 text-white hover:bg-green-900">Edit</a>
            </div>
            <ul class="flex flex-col space-y-1 p-6">
              <li><strong>Date of supply:</strong> @{{item.date}}</li>
              <li><strong>Informations:</strong>
                <ul class="ml-6 flex flex-col space-y-1 py-1 list-disc">
                  <li v-for="info in item.info">@{{info}}</li>
                </ul>
              </li>
              <li><strong>Unit Price:</strong> @{{item.price / 100}}€</li>
              <li><strong>Usage Rate:</strong> %@{{item.rate}}</li>
            </ul>
          </li>
        </ul>
        <paginator :data-set="dataSet" :total-pages="totalPages" @changed="fetch"></paginator>
      </div>
    </equipments>
  </div>
</main>
@endsection
