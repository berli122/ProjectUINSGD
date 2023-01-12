<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
