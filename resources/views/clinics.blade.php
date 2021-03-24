@extends('layouts.app')

@section('content')
<main class="container mx-auto px-6 mt-6">
  <div class="shadow p-6 bg-white">
    <clinics inline-template>
      <div>
        <h1 class="font-bold text-xl mb-3">Clinic Search</h1>
        <input type="text" v-model="search" class="w-full px-4 py-2 border-2 rounded mb-3" placeholder="Seach..." @input="fetch">
        <div class="flex items-center mb-3">
          <p class="font-bold mr-2">Sort by:</p>
          <ul class="flex text-blue-600 text-sm">
            <li><a href="#" class="block p-1 hover:text-blue-900" :class="sort === 'relevance' ? 'underline text-blue-900' : ''" @click.prevent="sort = 'relevance'">Relevance</a></li>
            <li><a href="#" class="block p-1 hover:text-blue-900" :class="sort === 'alphabetical' ? 'underline text-blue-900' : ''" @click.prevent="sort = 'alphabetical'">Alphabetical</a></li>
            <li><a href="#" class="block p-1 hover:text-blue-900" :class="sort === 'count' ? 'underline text-blue-900' : ''" @click.prevent="sort = 'count'">Equipment Count</a></li>
          </ul>
        </div>
        <ul class="flex flex-col bg-gray-100 space-y-4 bg-white p-6 shadow mb-6">
        <div v-for="(item, index) in items" :key="item.id">
          <clinic :item="item" @deleted="remove(index)" inline-template>
            <div>
              <div v-if="editing" class="flex">
                <form @submit.prevent="update" class="flex space-x-2">
                    <input type="text" class="px-4 py-2 border rounded shadow" v-model="name">
                    <button type="submit" class="px-4 py-2 bg-blue-700 rounded shadow text-white">Update</button>
                    <button class="px-4 py-2 rounded shadow border" @click="cancel" type="button">Cancel</button>
                    <button class="px-4 py-2 rounded shadow bg-red-700 text-white" @click="destroy" type="button">Delete</button>
                </form>
              </div>
              <div v-else class="flex space-x-2">
                <button class="bg-green-600 text-white border shadow px-4 py-2 rounded" @click="editing = true">Edit</button>
                <a :href="'/clinic/' + item.id" target="_blank" class="flex-1 text-lg px-4 py-2 border shadow rounded bg-gray-200 hover:bg-blue-200"><strong class="pr-4">#@{{id}}</strong> @{{name}}</a>
              </div>
            </div>
          </clinic>
        </div>
        <new-clinic @created="add" inline-template>
          <form class="flex space-x-2" @submit.prevent="add">
            <input type="text" class="px-4 py-2 border rounded shadow" v-model="name">
            <button type="submit" class="px-4 py-2 bg-gray-700 rounded shadow text-white">Add</button>
          </form>
        </new-clinic>
        <paginator :data-set="dataSet" :total-pages="totalPages" @changed="fetch"></paginator>
      </div>
    </clinics>
  </div>
</main>
@endsection
