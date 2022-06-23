<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tet extends Model
{
    use HasFactory;
    protected $table = 'tets';
    protected $primaryKey = 'id';
    protected $fillable = ['name',
        'tel'
    ];
    protected $guarded = [];
}
