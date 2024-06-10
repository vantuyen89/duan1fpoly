<section class="login-name">
        <section class="login-image">
            <img src="img/imagelogin.png" alt="">
        </section>
        <section class="login-username">
            <form action="index.php?act=quenmatkhau" method="POST" onsubmit="return checkforgetemail();">
                <label for=""><strong>Quên mật khẩu</strong></label>                
                <input type="text" placeholder="Email" name="email" id="email">
                <span id="emailerror" style="color:red;"></span>
                <button name="guiemail" type="submit">Gửi</button>
                <?php if(isset($sendMailMess) && $sendMailMess != ''){
                  echo $sendMailMess;
          } ?>
            </form>
            <section class="items-login">
                <a href="index.php?act=login"><b>Đăng nhập</b></a>
                <a href="index.php?act=dangky"><b>Đăng ký tài khoản</b></a>
            </section>            
        </section>
    </section>
<script>
    function checkforgetemail(){
        var email=document.querySelector("#email");
        var emailerror=document.querySelector("#emailerror");
        emailerror.textContent="";
        var checkTrue=true;
        if (email.value=='') {
            checkTrue=false;
            emailerror.textContent="*Bạn chưa nhập email";
            return false;
        }
        if (checkTrue==true) {
            return true;
        }
    }
</script>