<?php
 
namespace App\Models;
 
use Core\Model;
use PDO;
use PDOException;
 
class Donatur extends Model
{
 
    public static function getName()
    {

        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT `barang` FROM `jenis_donasi` ORDER BY `barang`');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function setUser($name, $gender)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO `nama_pendonasi`(`name`, `gender`) VALUES ('". $name ."', ". $gender .")");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $db->lastinsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function isThere($barang)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT `id` FROM `jenis_donasi` WHERE `barang`='". $barang ."' LIMIT 1");
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if($results < 1) return FALSE;
            return $results["id"];

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function setJS($barang)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO `jenis_donasi`(`barang`) VALUES ('".$barang."')");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $db->lastinsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function setDonasi($p_id,$j_id,$jumlah)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO `donasi`(`p_id`, `j_id`, `jumlah`) VALUES ('".$p_id."' ,'".$j_id."','".$jumlah."')");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getDonasi()
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT (@cnt := @cnt + 1) AS nomer, b.name, c.barang j_id, a.jumlah, b.gender 
            FROM `donasi` a
            CROSS JOIN (SELECT @cnt := 0) AS dummy
            INNER JOIN nama_pendonasi b ON b.id = a.p_id
            INNER JOIN jenis_donasi c ON c.id=a.j_id
            WHERE 1");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getFilterDonasi($name)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT (@cnt := @cnt + 1) AS nomer, b.name, c.barang j_id, a.jumlah, b.gender
            FROM `donasi` a
            CROSS JOIN (SELECT @cnt := 0) AS dummy
            INNER JOIN nama_pendonasi b ON b.id = a.p_id
            INNER JOIN jenis_donasi c ON c.id=a.j_id
            WHERE c.name= '".$name."'");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
