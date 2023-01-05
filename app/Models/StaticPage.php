<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content'
    ];

    public static $pages = [
        'about_us' => 'About us',
        'term_and_services' => 'Term and Services',
        'danh_cho_dai_ly' => 'Dành cho đại lý',
        'huong_dan_mua_hang' => 'Hướng dẫn mua hàng',
        'hinh_thuc_thanh_toan' => 'Hình thức thanh toán',
        'doi_diem_thuong' => 'Đổi điểm thưởng',
        'chinh_sach_bao_mat' => 'Chính sách bảo mật',
        'chinh_sach_bao_hanh' => 'Chính sách bảo hành',
        'chinh_sach_van_chuyen_lap_dat' => 'Chính sách vận chuyển, lắp đặt',
        'chinh_sach_doi_tra_hoan_tien' => 'Chính sách đổi trả, hoàn tiền'
    ];
}
