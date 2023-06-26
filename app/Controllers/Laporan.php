<?php

namespace App\Controllers;

use App\Models\Penjualan_model;
use Mpdf\Mpdf;

class Laporan extends BaseController
{
    public function monthlySalesReport()
    {
        // Mengambil data penjualan bulanan dari database (misalnya menggunakan model SalesModel)
        $penjualanModel = new Penjualan_model();
        $monthlySalesData = $penjualanModel->getMonthlySales();

        // Menyimpan data laporan dalam array untuk dikirim ke view
        $data['title'] = 'Laporan Penjualan Bulanan';
        $data['salesData'] = $monthlySalesData;

        // Memuat view 'monthly_sales_report' dan mengirimkan data
        return view('monthly_sales_report', $data);
    }

    public function yearlySalesReport()
    {
        // Mengambil data penjualan tahunan dari database (misalnya menggunakan model Penjualan_model)
        $penjualanModel = new Penjualan_model();
        $yearlySalesData = $penjualanModel->getYearlySales();

        // Menyimpan data laporan dalam array untuk dikirim ke view
        $data['title'] = 'Laporan Penjualan Tahunan';
        $data['salesData'] = $yearlySalesData;

        // Memuat view 'yearly_sales_report' dan mengirimkan data
        return view('yearly_sales_report', $data);
    }

    public function weeklySalesReport()
    {
        // Mengambil data penjualan mingguan dari database (misalnya menggunakan model Penjualan_model)
        $penjualanModel = new Penjualan_model();
        $weeklySalesData = $penjualanModel->getWeeklySales();

        // Menyimpan data laporan dalam array untuk dikirim ke view
        $data['title'] = 'Laporan Penjualan Mingguan';
        $data['salesData'] = $weeklySalesData;

        // Memuat view 'weekly_sales_report' dan mengirimkan data
        return view('weekly_sales_report', $data);
    }
}
