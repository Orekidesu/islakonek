<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'region_id', 'population', 'area_sq_km'];
    public function people()
    {
        return $this->hasMany(Contact::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
