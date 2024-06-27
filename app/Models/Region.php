<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'region_no', 'description'];
    public function islets()
    {
        return $this->hasMany(Island::class);
    }
}
