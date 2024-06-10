<style>
    h2{
        margin-left:130px;
        padding-top: 40px;
        color:red;
    }
</style>
    <section class="login-name">
        <section class="login-image">
            <img src="img/imagelogin.png" alt="">
        </section>
        <section class="login-username">
        <form action="index.php?act=dangky" method="post" onsubmit="return check1();">
                <label for=""><strong>Đăng ký</strong></label>
                <input type="text" name="user" placeholder="Tên đăng nhập" id="user">
                <span id="usererror" style="color:red"></span>
                <input type="email" name="email" placeholder="Email" id="email">
                <span id="emailerror" style="color:red"></span>
                <input type="text" name="address" placeholder="Địa chỉ" id="address">
                <span id="addresserror" style="color:red"></span>
                <input type="text" name="phone" placeholder="Số điện thoại" id="phone">
                <span id="phoneerror" style="color:red"></span>
                <input type="password" name="pass" placeholder="Mật khẩu" id="pass">
                <span id="passerror" style="color:red"></span>
                <!-- <input type="submit" value="Đăng ký" name="dangky"> -->
             <button value="Đăng kí" name="dangky" type="submit">Đăng ký</button>
            </form>
            <p id="phonee"></p>
            <section class="items-login">
                <a href="index.php?act=quenmatkhau"><b>Quên mật khẩu?</b></a>
                <a href="index.php?act=login"><b>Đăng nhập</b></a>
            </section>
            <h2>
           <?php 
           if(isset($thongbao)&&($thongbao!="")){
             echo $thongbao;
                 }
           ?>
           </h2>
        </section>
    </section>
    <script>
    function check1(){
    var user = document.querySelector('#user');
    var email = document.querySelector('#email');
    var address = document.querySelector('#address');
    var phone = document.querySelector('#phone');
    var pass = document.querySelector('#pass');
    var usererror = document.querySelector('#usererror');
    var passerror = document.querySelector('#passerror');
    var emailerror = document.querySelector('#emailerror');
    var addresserror = document.querySelector('#addresserror');
    var phoneerror = document.querySelector('#phoneerror');
    
    usererror.textContent = '';
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
    if (pass.value == '') {
        checkTrue = false;
        passerror.textContent = '*Mật khẩu không được bỏ trống';
        // return false;
    }
    if (email.value == '') {
        checkTrue = false;
        emailerror.textContent = '*Email không được bỏ trống';
        // return false;
    }
    if (address.value == '') {
        checkTrue = false;
        addresserror.textContent = '*Địa chỉ không được bỏ trống';
        // return false;
    }
    if (phone.value == '') {
        checkTrue = false;
        phoneerror.textContent = '*Số điện thoại không được bỏ trống';
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
</script>
