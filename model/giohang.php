<?php
// khi đăng kí(Tự add giỏ hàng)
function addcart($iduser,$total_money){
    $sql="insert into giohang(iduser,total_money) values($iduser,$total_money)";
    pdo_execute($sql);
}
// Giỏ hàng(view)
function listcart($iduser){
    $sql ="select sanpham.idpro,chitietgiohang.idchitietgh,size,name_pro,chitietgiohang.price,img,soluong as soluong,total_price,giohang.idgiohang from sanpham join chitietgiohang on sanpham.idpro = chitietgiohang.idpro join giohang on chitietgiohang.idgiohang =giohang.idgiohang join size on chitietgiohang.idsize = size.idsize where giohang.iduser=$iduser";
    $listcart=pdo_query($sql);

    return $listcart;
}
// Thêm vào giỏ hàng 
function add_cartchitiet($cart_id,$id_pro,$id_size,$price,$soluong,$total_price){
    $sql = "insert into chitietgiohang(idgiohang,idpro,idsize,price,soluong,total_price) values($cart_id,$id_pro,$id_size,$price,$soluong,$total_price)";
    pdo_execute($sql);
}
// Giỏ hàng theo tài khoản
function loadone_cart($iduser){
    $sql="select *from giohang where iduser=".$iduser;
    $listcart=pdo_query_one($sql);
    return $listcart;
}
// Xóa khỏi giỏ hàng
function delete_cart($idchitietgh){
    $sql="DELETE FROM `chitietgiohang` WHERE idchitietgh = $idchitietgh";
    pdo_execute($sql);
}
// khi mua hàng xóa bỏ giỏ hàng
function delete_all_cart($idgiohang){
    $sql="DELETE FROM `chitietgiohang` WHERE idgiohang = $idgiohang";
    pdo_execute($sql);
}
//check đã có sản phẩm đó trong giỏ hàng chưa
function checkProCart($idgiohang,$idpro,$idSize) {
    $sql = "SELECT * FROM `chitietgiohang` WHERE idgiohang = $idgiohang and idpro = $idpro and idsize = $idSize";
    $result =pdo_query($sql);
    return $result;
}
// Update số lượng của sản phẩm trùng trong giỏ hàng
function updateQuantilyProCart($idPro,$soluong) {
    $sql = "UPDATE `chitietgiohang` SET `soluong`=soluong + $soluong , total_price=price * soluong WHERE idchitietgh = $idPro";
    pdo_execute($sql);

}
function updategh($soluong,$idgiohang){
    $sql="UPDATE `chitietgiohang` set `soluong`= $soluong where idgiohang =$idgiohang ";
    pdo_execute($sql);
}
?>