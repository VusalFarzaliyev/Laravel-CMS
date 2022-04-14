<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogImage extends Model
{
    protected $table = "blog_images";
    protected $fillable = ['name','blog_id','id'];
    public function blogs()
    {
        return $this->belongsTo(Blog::class,'blog_id','id');
    }
    use HasFactory,SoftDeletes;
}
