

<?php
  if(isset($_GET['idpro'])){
    $idProGetUrl = $_GET['idpro'];
  }
?>
<style>
  td:nth-child(6){
    display:flex;
    
  }
  td form button{
    border:none;
    /* height:104px; */
  }
</style>
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Sản phẩm</p>
          <a href="index.php?act=addctsp&idpro=<?=$idProGetUrl?>"><button>Thêm sản phẩm</button></a>
        </div>
        <section class="detail">
            <h4>Danh mục sản phẩm</h4>
            <section class="detail-item">
                <table >
                    <tr>
                      <td>#</td>
                      <td>Tên sản phẩm </td>
                      <td>Ảnh</td>
                      <td>Size</td>
                      <td>Số lượng</td>
                      <td>Chức Năng</td>
                      
                    </tr>
                  <?php
                   $i=0;
                    foreach($listspct as $sanpham){
                     
                      $i+=1;
                      extract($sanpham);
                      $suaspct='index.php?act=suactsp&idct='.$idchitietsp;
                      $xoaspct='index.php?act=xoactsp&idct='.$idchitietsp;
                      $imgpath = "../uploads/".$img;
                      if(is_file($imgpath)){
                    $img="<img src='".$imgpath."' height='80'>";
                    }else{
                    $img = "no photo";
                    }
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>'.$name_pro.'</td>              
                      <td>'.$img.'</td>              
                      <td>'.$size.'</td>              
                      <td>'.$soluong.'</td>                     
                      <td>
                        <a href="'.$suaspct.'"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form method="POST"><button type="submit" name="btn-delete" value="'.$idchitietsp.'" onclick="return confirm(`Bạn muốn xóa chi tiết sản phẩm khỏi sản phẩm?`);"><i class="fa-solid fa-trash"></i></button></form>
                      </td>
                      
                    </tr>';
                    }
                  
                  ?>
                    
                    
                    
                </table>
                
            </section>
        </section>
        <div class="main-cards">

          

        </div>
        <?php
          
        ?>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/scripts.js"></script>
    
    <script>
    function Delete(){
        return confirm("Bạn muốn xóa chi tiết sản phẩm khỏi sản phẩm?");
    }

</script>
<?php
  if (isset($_POST['btn-delete'])) {
    $iddelete=$_POST['btn-delete'];
    $result=delete_ctsp($iddelete);
    // echo "/DA1/admin/index.php?act=listspct&idpro=$idProGetUrl";   
    echo "<script>window.location='/DA1/admin/index.php?act=listspct&idpro=$idProGetUrl'</script>";
    
  }
?>