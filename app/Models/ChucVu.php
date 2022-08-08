<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

    protected $table = 'chuc_vu';
    protected $fillable = [
        'ma_chuc_vu',
        'ten',
    ];

    public function user() {
        return $this->hasMany(User::class, 'chuc_vu_id');
    }
    public function luong() {
        return $this->hasOne(Luong::class, 'chuc_vu_id');
    }
}
