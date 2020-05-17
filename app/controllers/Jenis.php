<?php

namespace App\Controllers;
use Core\View;
use App\Models\donatur;
class Jenis extends \Core\Controller
{
    public function index()
    {
        $result = donatur::getName();
        $data = donatur::getDonasi();
        View::renderTemplate("jenis/index.html", [
            'judul' => 'List Donasi COVID-19',
            'barang' => $result,
            'data' => $data,
            'nav' => FALSE,
            'name'=> 'all'
        ]);

    }
    public function filter()
    {
        if(!isset($_GET['submit'])) return;
        $result = donatur::getName();
        $data = donatur::getFilterDonasi($_GET['submit']);
        View::renderTemplate("jenis/index.html", [
            'judul' => 'List Donasi ' . $_GET['submit'] . ' COVID-19',
            'barang' => $result,
            'data' => $data,
            'nav' => FALSE,
            'name' => $_GET['submit']
        ]);

    }
}
