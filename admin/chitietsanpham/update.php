
<style>
       .main-container form select {
  width: 315px;
  height: 40px;
  outline:#ccc;
  border:1px solid #ccc;
  margin-top:20px;
}
form input{
  border:1px solid #ccc;
  outline:#ccc;
}
textarea{
  border:1px solid #ccc;
}
</style>

<?php
  if (is_array($ct)) {
    extract($ct);
}
?>
<main class="main-container">
        <p class="font-weight-bold">Update sản phẩm chi tiết</p>
      <form action="index.php?act=updatect" id="formdata" method="post" enctype="multipart/form-data">
                
               <label>Size</label>
            <input type="text" name="size" value="<?=$idsize?>">
            
               <label>Số lượng</label>
            <input type="text" name="soluong" placeholder="Số lượng ..."value="<?=$soluong?>">
            <input type="hidden" name="idpro" placeholder="Số lượng ..."value="<?=$idpro?>">



            <div class="sm">
                    <input type="submit" name ="capnhat" value="Cập nhật">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listspct"><input type="button" value="DANH SÁCH"></a>
                </div>
            <?php
                if (isset($thongbao) && ($thongbao!="")) 
                    echo $thongbao;   
            ?>
      </form>
      <?php 
      if (isset($_POST['capnhat'])) {
        $idsize=$_POST['size'];
        $soluong=$_POST['soluong'];
        $idpro=$_POST['idpro'];
        var_dump($idsize);
        echo $idsize;
        echo $soluong;
        
        update_ctspadmin($soluong,$idpro,$idsize);
        echo "<script>window.location='/DA1/admin/index.php?act=listspct&idpro=$idpro'</script>";
        header("Location:/DA1/admin/index.php?act=listspct&idpro=".$idpro);
      }

    ?>
</main>
<!-- <script>
  const formData = document.querySelector("#formdata");

  console.log(formData);
  formData.addEventListener(
            "submit",
            (event) => {
              event.preventDefault();
              const form = new FormData(formData);
              fetch("/",{
                method:"post",
                body:form
              })
            },
            false
          );
  console.log("hehe");
</script> -->
      <!-- End Main -->

    

    

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/scripts.js"></script>

    