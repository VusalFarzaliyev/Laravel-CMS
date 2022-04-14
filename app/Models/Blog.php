<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'category_id',
        'content',
        'status',
        'subdesc',
        'publisher',
        'image',
        'seo_title',
        'seo_keyword',
        'seo_description'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'publisher','id');
    }
    public function blogImage()
    {
        return $this->hasMany(BlogImage::class,'blog_id','id');
    }
    public function tags()
    {
        return $this->hasMany(Tag::class,'blog_id');
    }
}
