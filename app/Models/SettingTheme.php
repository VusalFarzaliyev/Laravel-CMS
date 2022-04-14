<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTheme extends Model
{
    protected $table = 'setting_themes';
    protected $fillable =['key','value'];
    use HasFactory;
}
