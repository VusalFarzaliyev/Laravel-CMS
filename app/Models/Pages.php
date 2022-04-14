<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    protected $table = 'pages';
    protected $fillable = ['title','link','desc','seo_title','seo_keyword','seo_desc'];
    use HasFactory,SoftDeletes;
}
