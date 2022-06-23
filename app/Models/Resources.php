<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;
    protected $table = 'resources';
    protected $primaryKey = 'id';
    protected $fillable = ['title',
        'file_name'
        // 'html_snippet'
    ];
    protected $guarded = [];
}
