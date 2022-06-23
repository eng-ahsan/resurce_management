<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link_provider extends Model
{
    use HasFactory;
    protected $table = 'link_provider';
    protected $primaryKey = 'id';
    protected $fillable = ['title',
        'url',
        'new_tab',
        // 'file_name'
        // 'html_snippet'
    ];
    protected $guarded = [];
}
