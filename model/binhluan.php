<?php
// Load toàn bộ bình luận theo sản phẩm
function loadall_binhluan($idpro){
    $sql = "SELECT binhluan.idcmt, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan,taikhoan.avatar FROM binhluan
        JOIN taikhoan ON binhluan.iduser = taikhoan.iduser
        JOIN sanpham ON binhluan.idpro = sanpham.idpro
        WHERE sanpham.idpro = $idpro";
    $bl =  pdo_query($sql);
    return $bl;
}
//Thêm bình luận
function insert_binhluan($idpro, $noidung,$iduser){        
    $sql = "INSERT INTO `binhluan` ( `noidung`, `iduser`, `idpro`) VALUES ( '$noidung', '$iduser', '$idpro')";
    pdo_execute($sql);
    
}
// loadall bình luận (admin)
function load_binhluan($idpro){
    $sql = "select idcmt,img,name_pro,user,avatar,noidung,ngaybinhluan from sanpham join binhluan on sanpham.idpro = binhluan.idpro join taikhoan on binhluan.iduser=taikhoan.iduser where 1 and binhluan.deleted=0";
    if($idpro>0)
      $sql.=" AND sanpham.idpro='".$idpro."'";
      $sql.=" order by idcmt desc";
        $dsbinhluan=pdo_query($sql);
        return $dsbinhluan;
}
//Xóa bình luận
function delete_binhluan($idcmt){
        $sql = "delete from binhluan where idcmt =".$idcmt;
        pdo_execute($sql);
}
//Xóa mềm bình luận
function delete_membl($idcmt){
    $sql="UPDATE `binhluan` SET `deleted`=1 WHERE idcmt =".$idcmt;
    pdo_execute($sql);
}
//Đếm số lượng bình luận
function soluong_bl(){
    $sql="SELECT COUNT(*) AS idbl
    FROM binhluan";
    $soluong = pdo_query_one($sql);
    return $soluong;
}
//Thống kê số bình luận
function load_thongkebl(){
    $sql="select sanpham.idpro,sanpham.name_pro,sanpham.img, count(*) as sobinhluan from  sanpham join binhluan on sanpham.idpro=binhluan.idpro group by sanpham.idpro,sanpham.name_pro order by sobinhluan desc  ";
    $listtkbl=pdo_query($sql);
    return $listtkbl;
}
?>