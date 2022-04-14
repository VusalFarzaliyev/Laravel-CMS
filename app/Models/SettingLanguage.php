<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLanguage extends Model
{
    protected $table = 'setting_languages';
    protected $fillable = [
        'name','code','status'
    ];
    use HasFactory;
}
