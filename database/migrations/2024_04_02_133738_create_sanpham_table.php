<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->string('maSP');
            $table->string('tenSP');
            $table->string('giaBan');
            $table->string('giaGiam');
            $table->string('anhDaiDien');
            $table->string('anhChiTiet');
            $table->string('mauSP');
            $table->longText('moTa');
            $table->string('idDanhMuc');
            $table->string('maNhaSX');
            $table->string('MaTrangThai');
            $table->longText('thongSoKyThuat');
            $table->string('soLuongTrongKho');
            $table->foreign('idDanhMuc')->references('idDanhMuc')->on('danhmuc')->onDelete('cascade');
            $table->foreign('maNhaSX')->references('maNhaSX')->on('nhasanxuat')->onDelete('cascade');
            $table->foreign('MaTrangThai')->references('MaTrangThai')->on('trangthaisp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
};