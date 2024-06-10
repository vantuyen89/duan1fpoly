<style>
    .order h1{
        font-size:25px;
        margin-bottom:30px;
    }
    .pay_order .py {
        width: 400px;
        margin-bottom:10px;
    }
    .hinhthuc{
        display:flex;
        flex-direction:column;
    }
    .op{
        display:flex;
        
    }
</style>

<form action="index.php?act=addorder&iduser=<?=$_SESSION['user']['iduser']?>" method="POST" >
<hr>
        <section class="order">
            
            <section class="pro-oder">
                <H1>Thanh Toán Giỏ hàng</H1>
                <section class="pro-oder-info">
                    <p>Ảnh</p>
                    <p>Tên</p>
                    <p>Size</p>
                    <p>Số lượng</p>
                    <p>Giá</p>
                    <p>Tổng tiền</p>
                </section>
                <?php
                    $total_money=0;

                    foreach($listcart as $cart){                        
                        extract($cart);
                        $ship=10000;
                        $total_price = $soluong * $price;
                        $total_money += $total_price;
                        $thanhtien=$total_money+$ship;
                        ?>
                    <section class="pro-oder-chitiet">
                    <?php
                    $img=$img_path.$img;
                    echo '<img src="'.$img.'" alt="">'
                    ?>
                    <div class="namepro">
                        <h2><?php echo $name_pro?></h2>
                    </div>
                    
                    <span><?php echo $size?></span>
                    <p><?php echo $soluong?></p>
                    <p><?php echo $price?>đ</p>
                    <p><?php echo $total_price?>đ</p>
                    <input type="hidden" name="price" value="<?=$price?>">
                    <input type="hidden" name="total_money" value="<?=$thanhtien?>">
                    <input type="hidden" name="total_price" value="<?=$total_price?>">
                    <input type="hidden" name="size" value="<?=$size?>">
                    <input type="hidden" name="idpro" value="<?=$idpro?>">
                    
                </section>
                <hr>
                <?php
                    }
                    echo '<section class="pro-priceoder">
                    <div class="thanhtien">
                    <h2>Tổng tiền : '.$thanhtien.'đ</h2>
                    </div>
                </section>';
                ?>
                
            </section>
            <div class="pay_order">
                <?php
                    if (is_array($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    }?>
                <h1>Thông tin người nhận</h1>
                
                    <label for=""><strong>Tên</strong></label>
                    <input type="text" name="name_user" placeholder="Tên"  value="<?=$_SESSION['user']['name_user']?>" id="user" >
                    <span id="usererror" style="color:red;"></span>
                    <label for=""><strong>Email</strong></label>
                    <input type="text" name="email" placeholder="Email"  value="<?=$_SESSION['user']['email']?>" id="email" >
                    <span id="emailerror" style="color:red;"></span>
                    <label for=""><strong>Số điện thoại</strong></label>
                    <input type="text" name="phone" placeholder="Số điện thoại"  value="<?=$_SESSION['user']['phone']?>" id="phone" >
                    <span id="phoneerror" style="color:red;"></span>
                    <label for=""><strong>Địa chỉ</strong></label>
                    <input type="text" name="address" placeholder="Địa chỉ"  value="<?=$_SESSION['user']['address']?>" id="address" >
                    <span id="addresserror" style="color:red;"></span>
                    <!-- add -->
                    <div class="py">
                        <label for=""><strong>Hình thức thanh toán</strong></label>
                    </div>
                    
                <div class="hinhthuc">
                    
                    <?php
                        foreach($listtt as $tt){

                            extract($tt);?>
                            <div class="op">
                            <input type="radio" name="idpayod" value="<?=$idpayod?>" required="Lựa chọn phương thức thanh toán">
                            <p><?php echo $name_pay?></p>
                        </div>
                       <?php }
                    ?>
                    
                    
                    
                </div>
                <input type="submit" value="Mua hàng" name="muahang" onclick="return checkorder();">
            </div>
            
        </section>
        <hr>
        </form>
<script>
function checkorder(){
        var user = document.querySelector("#user");
        var email=document.querySelector("#email");
        var address=document.querySelector("#address");
        var phone=document.querySelector("#phone");
        var usererror=document.querySelector("#usererror");
        var emailerror=document.querySelector("#emailerror");
        var addresserror=document.querySelector("#addresserror");
        var phoneerror=document.querySelector("#phoneerror");
        usererror.textContent = '';
        phoneerror.textContent = '';
        emailerror.textContent = '';
        addresserror.textContent = '';
        var checkTrue=true;
        console.log(user.value);
        if (user.value == '') {
        checkTrue = false;
        usererror.textContent = '*Mời bạn nhập tên';
        // return false;
    }
    if (email.value == '') {
        checkTrue = false;
        emailerror.textContent = '*Mời bạn nhập email';
        // return false;
    }
    if (address.value == '') {
        checkTrue = false;
        addresserror.textContent = '*Mời bạn nhập địa chỉ';
        // return false;
    }
    if (phone.value == '') {
        checkTrue = false;
        phoneerror.textContent = '*Mời bạn nhập số diện thoại';
        return false;
    }
    if (phone.value.length != 10) {
        checkTrue=false;
        phoneerror.textContent='*Số điện thoại không tồn tại';
        return false;

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
            emailerror.textContent = '*Email sai định dạng';
            return false;
        }
    }
    if (email.value.indexOf('@')==-1 || email.value.indexOf('.')==-1) {
        checkTrue=false;
        emailerror.textContent='*Email sai định dạng';
        return false;
    }
    if (checkTrue==true) {
        return true;
    }

    }
</script>