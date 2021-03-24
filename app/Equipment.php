<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Equipment extends Model
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

    protected $casts = [
     'info' => 'array'
    ];

    public function withCounts(array $withCount)
    {
        $this->withCount = $withCount;

        return $this;
    }

    public function clinics()
    {
      return $this->belongsToMany('App\Clinic', 'clinics_equipments');
    }

}
