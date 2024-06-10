<?php
// loadall danh mục (admin)
function loadall_danhmuc(){
    $sql="select * from danhmuc where deleted =0 order by iddm asc ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
// khi danh mục khi xóa mềm
function loadkho_danhmuc(){
    $sql="select * from danhmuc where deleted =1 order by iddm asc ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
// load danh mục ngoài giao diện view
function load_all_danhmuc(){
    $sql="select * from danhmuc order by iddm asc ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
// Thêm danh mục
function insert_danhmuc($tenloai){
    $sql="insert into danhmuc(name) values('$tenloai')";
    $listdanhmuc=pdo_execute($sql);
}
// xóa cứng danh mục
function delete_danhmuc($iddm){
    $sql="delete from danhmuc where iddm=".$iddm;
    $listdanhmuc=pdo_execute($sql);
}
// load 1 danh mục
function loadone_danhmuc($iddm){
    $sql="select * from danhmuc where iddm=".$iddm;
    $dm=pdo_query_one($sql);
    return $dm;
}
// update lại danh mục
function update_danhmuc($tenloai,$iddm){
    $sql="update danhmuc set name='$tenloai' where iddm=".$iddm;
    $listdanhmuc=pdo_execute($sql);
}
// Danh mục home
function loadall_danhmuc_home(){
    $sql="select * from danhmuc order by iddm asc limit 0,3";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
// Danh mục trên header
function loadall_danhmuc_header(){
    $sql="select * from danhmuc order by iddm asc limit 0,4";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
//Xóa mềm 
function delete_mem($iddm){
    $sql="UPDATE `danhmuc` SET `deleted`=1 WHERE iddm =".$iddm;
    pdo_execute($sql);
}
//Bỏ xóa mềm
function khodm($iddm){
    $sql="UPDATE `danhmuc` SET `deleted`=0 WHERE iddm =".$iddm;
    pdo_execute($sql);
}
?>