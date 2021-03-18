<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'role'
    ];

    // ... Skal fjernes
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id');
    }

}
