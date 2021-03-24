<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Equipment;

class SearchController extends Controller
{
    protected $filters;

    public function __construct()
    {
      $this->middleware('auth');
      $this->filters = collect([
       'relevance', // First item will be the default value for filter variable in clinic function $collection->get(null) returns first item of the collection.
       'alphabetical',
       'count'
     ]);
    }

    public function clinic()
    {

      $filter = $this->filters->get($this->filters->search(request('sort')));

      if(request('q')){
        if($filter === 'alphabetical') return Clinic::search(request('q'))->orderBy('name')->paginate(2);

        if($filter === 'count'){
          return Clinic::search(request('q'))->withCount(['equipments'])->orderBy('equipments_count', 'desc')->paginate(2);
        }

        return Clinic::search(request('q'))->paginate(2);
      }

      if($filter === 'alphabetical') return Clinic::orderBy('name')->paginate(5);
      if($filter === 'count') return Clinic::withCount('equipments')->orderBy('equipments_count', 'desc')->paginate(5);

      return Clinic::paginate(5);

    }

    public function equipment()
    {

      $filter = $this->filters->get($this->filters->search(request('sort')));

      if(request('q')){
        if($filter === 'alphabetical') return Equipment::search(request('q'))->orderBy('name')->paginate(2);

        if($filter === 'count'){
          return Equipment::search(request('q'))->withCount(['clinics'])->orderBy('clinics_count', 'desc')->paginate(2);
        }

        return Equipment::search(request('q'))->paginate(2);
      }

      if($filter === 'alphabetical') return Equipment::orderBy('name')->paginate(5);
      if($filter === 'count') return Equipment::withCount('clinics')->orderBy('clinics_count', 'desc')->paginate(5);

      return Equipment::paginate(5);

    }
}
