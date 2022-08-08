<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhan_vien';
    protected $fillable = [
        'user_id',
        'ma_nv',
        'ten',
        'anh',
        'gioi_tinh',
        'ngay_sinh',
        'dia_chi',
        'sdt',
        'cccd',
        'trang_thai',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function ngay_cong() {
        return $this->hasMany(NgayCong::class, 'nhan_vien_id');
    }

}
