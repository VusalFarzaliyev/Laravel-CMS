<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name','parent_id'];
    public function blogs()
    {
        return $this->belongsTo(Blog::class,'category_id','id');
    }
    public function children()
    {
        return $this->hasMany(\App\Models\Category::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_id');
    }
    use HasFactory,SoftDeletes;
}
