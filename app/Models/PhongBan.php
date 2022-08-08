<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;

    protected $table = 'phong_ban';
    protected $fillable = [
        'ma_phong_ban',
        'ten',
    ];

    public function user() {
        return $this->hasMany(User::class, 'phong_ban_id');
    }
}
