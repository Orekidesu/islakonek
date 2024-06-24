<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    protected $fillable = ['name','phone', 'email','island_id'];
     public function island()
    {
        return $this->belongsTo(Island::class);
    }
}