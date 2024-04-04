<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PageControl extends Controller
{
    public function page($name = 'index'){
        $products  = SanPham::orderBy('maSP')->get();
        $danhmucs = DanhMuc::orderBy('idDanhMuc')->get();
        return view(@$name,['data'=>$products,'datadm'=>$danhmucs]);
    } 
}
