<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;

    protected $table = 'luong';
    protected $fillable = [
        'chuc_vu_id',
        'luong_co_ban',
        'luong_thuong',
    ];

    public function chuc_vu() {
        return $this->hasOne(ChucVu::class, 'chuc_vu_id');
    }
}
