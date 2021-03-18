<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'company_id',
        'user_id'
    ];

    public function company() {
        return $this->belongsTo('company');
    }

}
