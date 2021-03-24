<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Clinic extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray()
    {
      return [
        'id' => $this->id,
        'name' => $this->name
      ];
    }

    protected $guarded = [];

    public function withCounts(array $withCount)
    {
        $this->withCount = $withCount;

        return $this;
    }

    public function equipments()
    {
      return $this->belongsToMany('App\Equipment', 'clinics_equipments');
    }

}
