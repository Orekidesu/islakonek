<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'location'];
     public function people()
    {
        return $this->hasMany(Contact::class);
    }
    
}