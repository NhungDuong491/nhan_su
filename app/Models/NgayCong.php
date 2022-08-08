<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgayCong extends Model
{
    use HasFactory;
    
    protected $table = 'ngay_cong';
    protected $fillable = [
        'nhan_vien_id',
        'ngay_cham_cong',
    ];

    public function nhan_vien() {
        return $this->belongsTo(NhanVien::class, 'nhan_vien_id');
    }
}