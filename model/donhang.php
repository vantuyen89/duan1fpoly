<?php
//thêm đơn hàng
function addorder($iduser,$total_money,$idpayod){
    $sql="insert into donhang(iduser,total_money,idpayod) values($iduser,$total_money,$idpayod)";
    pdo_execute($sql);
}
// function loadone_order($iduser){
//     $sql="select *from donhang where iddonhang=".$iduser;
//     $listcart=pdo_query_one($sql);
//     return $listcart;
// } 
//thêm chi tiết đơn hàng
function add_torder($iddonhang,$idpro,$price,$soluong,$size,$total_price){
    $sql="INSERT INTO `chitietdonhang`( `iddonhang`, `idpro`, `price`, `soluong`, `total_price`, `size`) VALUES ($iddonhang,$idpro,$price,$soluong,$total_price,$size)";
    pdo_execute($sql);
}
// load pttt
function loadthanhtoan(){
    $sql="select * from pay order by idpayod asc";
    $listtt=pdo_query($sql);
    return $listtt;
}
//Đơn hàng chờ xác nhận(Admin)
function listdonhang(){
    $sql="select iddonhang ,name_user,address,phone,total_money,ngaydat,quatrinh from donhang join taikhoan on donhang.iduser=taikhoan.iduser where quatrinh=0 or quatrinh=1 order by iddonhang desc";
    $listdonhang=pdo_query($sql);
    return $listdonhang;
}
// Chi tiết đơn hàng(admin)
function listctdh($iddonhang){
    $sql="select name_pro,chitietdonhang.price,soluong,total_price,size,img from sanpham join chitietdonhang on sanpham.idpro = chitietdonhang.idpro where iddonhang=$iddonhang";
    $listctdh=pdo_query($sql);
    return $listctdh;
}
// Đã xác nhận
function updatedh1($iddonhang){
    $sql="update donhang set quatrinh=1 where iddonhang=$iddonhang";
    pdo_execute($sql);
}
// Đang Giao hàng
function updatedh2($iddonhang){
    $sql="update donhang set quatrinh=2 where iddonhang=$iddonhang";
    pdo_execute($sql);
}
// Đơn hàng đang giao
function listdonhang1(){
    $sql="select iddonhang ,name_user,address,phone,total_money,ngaydat,quatrinh from donhang join taikhoan on donhang.iduser=taikhoan.iduser where quatrinh=2";
    $listdonhang=pdo_query($sql);
    return $listdonhang;
}
// order qua trình chưa xác nhận(view)
function load_mydh($iduser){
    $sql="SELECT donhang.iddonhang, `iduser`, `total_money`, `ngaydat`, `quatrinh`, `idpayod` FROM `donhang` WHERE iduser=$iduser and quatrinh=0 order by donhang.iddonhang desc";
    $listorder=pdo_query($sql);
    return $listorder;
}
function load_myctdh($iddonhang){
    $sql="SELECT name_pro,img, chitietdonhang.idpro, chitietdonhang.price, soluong, total_price, chitietdonhang.size FROM chitietdonhang join sanpham on chitietdonhang.idpro=sanpham.idpro join donhang on chitietdonhang.iddonhang=donhang.iddonhang  WHERE chitietdonhang.iddonhang=$iddonhang ";
    $listorder=pdo_query($sql);
    return $listorder;
}
// order đã xác nhận(view)
function load_mydh1($iduser){
    $sql="SELECT donhang.iddonhang, `iduser`, `total_money`, `ngaydat`, `quatrinh`, `idpayod` FROM `donhang` WHERE iduser=$iduser and quatrinh=1 order by donhang.iddonhang desc";
    $listorder=pdo_query($sql);
    return $listorder;
}
//order đang giao (view)
function load_mydh2($iduser){
    $sql="SELECT donhang.iddonhang, `iduser`, `total_money`, `ngaydat`, `quatrinh`, `idpayod` FROM `donhang` WHERE iduser=$iduser and quatrinh=2 order by donhang.iddonhang desc";
    $listorder=pdo_query($sql);
    return $listorder;
}
//Đã mua(admin)
function updatedh3($iddonhang){
    $sql="update donhang set quatrinh=3 where iddonhang=$iddonhang";
    pdo_execute($sql);
}
// order đã mua(view)
function load_mydh3($iduser){
    $sql="SELECT donhang.iddonhang, `iduser`, `total_money`, `ngaydat`, `quatrinh`, `idpayod` FROM `donhang` WHERE iduser=$iduser and quatrinh=3 order by donhang.iddonhang desc";
    $listorder=pdo_query($sql);
    return $listorder;
}
// Đơn hàng đã mua(admin)
function listdonhang2(){
    $sql="select iddonhang ,name_user,address,phone,total_money,ngaydat,quatrinh from donhang join taikhoan on donhang.iduser=taikhoan.iduser where quatrinh=3";
    $listdonhang=pdo_query($sql);
    return $listdonhang;
}
//Đếm số đơn hàng
function soluong_dh(){
    $sql="SELECT COUNT(*) AS iddonhang
    FROM donhang";
    $soluong = pdo_query_one($sql);
    return $soluong;
}
//Hủy đơn hàng
function delete_order($iddonhang){
    $sql="delete from donhang where iddonhang=$iddonhang";
    pdo_execute($sql);
}
//
// if (isset($_POST['muahang']) && isset($_SESSION['user'])) {
//     $iduser=$_SESSION['user']['iduser'];
//     $idpay=$_POST['idpayod'];
//     $total_price=$_POST['total_price'];
//     $total_money=$_POST['total_money'];
//     $donhang=addorder($iduser,$total_money,$idpay);
//     $listcart=listcart($iduser);       
//     $idpro=$_POST['idpro'];                    
//     $sql="select * from donhang where iddonhang =(select max(iddonhang) from donhang)";
//     $order=pdo_query_one($sql);
//     foreach($listcart as $cart){

//             addtorder($order['iddonhang'],$cart['idpro'],$cart['price'],$cart['soluong'],$cart['size'],$cart['total_price']);

//     }
//     $sql1="select * from giohang where iduser=".$_SESSION['user']['iduser'];
//     $gh=pdo_query_one($sql1);              
//     delete_all_cart($gh['idgiohang']);
// }
// header("Location:/DA1/index.php?act=myorder&iduser=$iduser");
?>