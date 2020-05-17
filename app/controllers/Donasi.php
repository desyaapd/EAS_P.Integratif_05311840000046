<?php

namespace App\Controllers;

use Core\View;
use app\models\donatur;
class Donasi extends \Core\Controller
{
    public function index()
    {
        $result = donatur::getName();
        View::renderTemplate("donasi/index.html", [
            'judul' => 'Donasi untuk COVID-19',
            'jenis' => $result
        ]);
    }

    public function inputdata()
    {   
        $note = "";
        $barang = $_POST['jenis_donasi'];
        $jumlah = $_POST['jumlah'];
        if(!isset($_POST['submit'])) return;
        
        foreach($jumlah as $jm){
            if($jm == "" || $jm == 0 ) $note = "Tolong isi Jumlah Donasi anda";
        }
        foreach($barang as $brg){
            if($brg == "") $note = "Tolong isi Jenis Donasi anda";
        }
        if($_POST['name'] == "") $note = "Tolong isi nama anda";
        if($note != ""){
            $result = donatur::getName();
            View::renderTemplate("donasi/index.html", [
            'judul' => 'Donasi untuk COVID-19',
            'jenis' => $result,
            'alert' => $note
        ]);
        return;
        }

        if(!isset($_POST['submit'])) return;

        $p_id = donatur::setUser( $_POST['name'], $_POST['gender'] );

        
        $iter = 0;

        foreach($barang as $brg){
            $j_id = donatur::isThere($brg);

            if( $j_id >= 1){
                $done = donatur::setDonasi($p_id,$j_id,$jumlah[$iter]);
            }
            else{
                $j_id = donatur::setJS($brg);
                $done = donatur::setDonasi($p_id, $j_id[0], $jumlah[$iter]);
            }
            $iter++;
        }
        $result = donatur::getName();
        View::renderTemplate("donasi/index.html", [
            'judul' => 'Donasi untuk COVID-19',
            'jenis' => $result,
            'note' => 'Terima kasih, Donasi anda telah berhasil dimasukkan',
        ]);

    }
}
