<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingThemeLink extends Model
{
    protected $table = 'setting_link_themes';
    protected $fillable = ['page','slug','type'];
    use HasFactory;
}
