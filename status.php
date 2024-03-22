<?php
require_once("db.php");

class Nhanvien{
    public $MaNV;
    public $TenNV;
    public $Phai;
    public $Noisinh;
    public $TenPhong;
    public $Luong;


    public static function list_NV(){
        $db = new Db();
        $query = " SELECT * FROM nhanvien";
        return $db->select_to_array($query);

    }

}


?>