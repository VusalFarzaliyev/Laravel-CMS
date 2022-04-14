<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingFacebook extends Model
{
    protected $table = 'setting_facebooks';
    protected $fillable = [
        'chat_id','chat_status','client_id','client_secret','pixel_id','pixel_status'
    ];
    use HasFactory;
}
