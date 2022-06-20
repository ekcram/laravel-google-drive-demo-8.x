<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'file_path',
        'user_id'
    ];

     /*************** RELACIONES ************************/
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
