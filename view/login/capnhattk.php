<?php
        if (is_array($_SESSION['user'])) {
            extract($_SESSION['user']);
        }
        $avatarpath = "../uploads/".$avatar;
                      if(is_file($avatarpath)){
                    $avt="<img src='".$avatarpath."'>";
                    }
    ?>
<hr>
        <section class="infor-user">
            <div class="infor-user-item">
                <a href="index.php?act=myorder&iduser=<?=$_SESSION['user']['iduser']?>">Đơn hàng</a>
                <a href="index.php?act=xacnhan&iduser=<?=$_SESSION['user']['iduser']?>">Đã xác nhận</a>
                <a href="index.php?act=vanchuyen&iduser=<?=$_SESSION['user']['iduser']?>">Đang vận chuyển</a>
                <a href="index.php?act=damua&iduser=<?=$_SESSION['user']['iduser']?>">Đã mua</a>
                <a href="index.php?act=capnhat">Thông tin người dùng</a>
            </div>
            <div class="information">
                <label for=""><h2>Thông tin người dùng</h2></label>
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check1();">
                    <input type="text" name="user" placeholder="Tên đăng nhập" value="<?=$user?>" id="user">
                    <span id="usererror"></span>
                    <input type="text" name="name_user" placeholder="Họ và tên" value="<?=$name_user?>" id="nameuser">
                    <span id="nameusererror" style="color:red;"></span>
                    <input type="text" name="address" placeholder="Địa chỉ" value="<?=$address?>" id="address">
                    <span id="addresserror"></span>
                    <input type="text" name="email" value="<?=$email?>" id="email">
                    <span id="emailerror"></span>
                    <input type="text" name="phone" placeholder="Số điện thoại"value="<?=$phone?>" id="phone">
                    <span id="phoneerror"></span>
                    <input type="text" name="pass"placeholder="Mật khẩu"value="<?=$pass?>" id="pass">
                    <span id="passerror"></span>
                    <input type="file" name="avatar" value="<?=$avt?>">
                    <input type="hidden" name="iduser"value="<?=$iduser?>">
                    <button name="capnhat" type="submit" >Thay đổi</button>
                </form>

            </div>
        </section>
<hr>
<?php
    if (isset($_POST['capnhat']) ) {
        $iduser=$_POST['iduser'];
        $name_user=$_POST['name_user'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $avatar = $_FILES['avatar']['name'];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        if(move_uploaded_file($_FILES["avatar"]["tmp_name"],$target_file)) {
                        //
        }else{
                       //
        }
        update_taikhoan($iduser,$user,$pass,$email,$address,$phone,$avatar,$name_user);
        $sql="SELECT * from taikhoan where iduser=$iduser";
        $account = pdo_query_one($sql);
        $_SESSION['user']=$account;
        $login = check_login($_POST['user'], $_POST['pass']);
        $thongbao="Cập nhật  thành công";
        echo "<script>window.location='http://localhost/DA1/index.php?act=capnhat'</script>";
        
        
    }

?>
<!-- <script>
    function check1(){
    var user = document.querySelector('#user');
    var nameuser=document.querySelector('#nameuser');
    var email = document.querySelector('#email');
    var address = document.querySelector('#address');
    var phone = document.querySelector('#phone');
    var pass = document.querySelector('#pass');
    var usererror = document.querySelector('#usererror');
    var nameusererror = document.querySelector('#nameusererror');
    var passerror = document.querySelector('#passerror');
    var emailerror = document.querySelector('#emailerror');
    var addresserror = document.querySelector('#addresserror');
    var phoneerror = document.querySelector('#phoneerror');
    
    usererror.textContent = '';
    nameusererror.textContent='';
    passerror.textContent = '';
    phoneerror.textContent = '';
    emailerror.textContent = '';
    addresserror.textContent = '';
    var checkTrue = true;
    if (user.value == '') {
        checkTrue = false;
        usererror.textContent = '*Tên đăng nhập không được bỏ trống';
        // return false;
    }
    if (nameuser.value='') {
        checkTrue=false;
        nameusererror.textContent='*Cập nhật lại tên người dùng';
    }
    if (pass.value == '') {
        checkTrue = false;
        passerror.textContent = '*Cập nhật lại mật khẩu';
        // return false;
    }
    if (email.value == '') {
        checkTrue = false;
        emailerror.textContent = '*Cập nhật lại Email ';
        // return false;
    }
    if (address.value == '') {
        checkTrue = false;
        addresserror.textContent = '*Cập nhật lại địa chỉ';
        // return false;
    }
    if (phone.value == '') {
        checkTrue = false;
        phoneerror.textContent = '*Cập nhật lại số điện thoại';
        return false;
    }
    if (phone.value.length != 10) {
        checkTrue=false;
        phoneerror.textContent='*Số điện thoại không tồn tại';
        return false;

    }
    for (let i = 0; i < user.value.length; i++) {
        if (user.value[i] == ' ') {
            checkTrue=false;
            usererror.textContent = '*Tên đăng nhập không được cách';
            return false;
        }
    }
    for (let i = 0; i < pass.value.length; i++) {
        if (pass.value[i] == ' ') {
            checkTrue=false;
            passerror.textContent = '*Mật khẩu không được cách';
            return false;
        }
    }
    for (let i = 0; i < phone.value.length; i++) {
        if (phone.value[i] == ' ') {
            checkTrue=false;
            phoneerror.textContent = '*Số điện thoại sai định dạng';
            return false;
        }
    }
    for (let i = 0; i < email.value.length; i++) {
        if (email.value[i] == ' ') {
            checkTrue=false;
            emailerror.textContent = '*Email không được cách';
            return false;
        }
    }
    if (pass.value.length <6) {
        checkTrue=false;
        passerror.textContent='*Mật khẩu yếu';
        return false;
    }
    if (email.value.indexOf('@')==-1 || email.value.indexOf('.')==-1) {
        checkTrue=false;
        emailerror.textContent='*Email sai định dạng';
        return false;
    }
    if (checkTrue == true) {
        return true;
    }
}
</script> -->