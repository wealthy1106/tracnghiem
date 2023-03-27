<?php
    include_once "connection.php";
    session_start();
    $query = "select * from diem where mssv = '".$_SESSION['taikhoan']."'
                                 and   mamon = '".$_POST['mamon']."' ";
      try {
        $sth = $pdo->query($query);
        if ($row = $sth->fetch()){
          // echo 'a';
            header('Location: chonmon.php?dalam=true');
        }   else {
            
        }
      } catch (PDOException $e){
      }
    if(isset($_POST['mamon'])){
      $query = "select * from cauhoi where mamon = '".$_POST['mamon']."'";
      try {
          $sth = $pdo->query($query);
          while ($row = $sth->fetch()){
            $query1 = 'INSERT INTO tracnghiem.sinhvienchon (MSSV, IDCauHoi, MaMon, Luachon)
              VALUES (?,?,?,?);';
            try{
              $sth1 = $pdo->prepare($query1);
              $sth1->execute([
                $_SESSION['taikhoan'],
                $row['IDCauHoi'],
                $_POST['mamon'],
                $_POST["exampleRadios" . $row['IDCauHoi']]
              ]);
            }catch (PDOException $e){
              $pdo_error = $e->getMessage();
              echo "<script>console.log($pdo_error);</script>";
              
            }
          }   
        } catch (PDOException $e){
          echo "<script>console.log($e->getMessage());</script>";
        }
      }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
</head>
<body class="container">
    <div style="text-align: center;">
        <h2>Trắc Nghiệm Môn Học</h2>
        <h3>Kết Quả</h3>
    </div>
    <div><button type="submit" class="btn btn-light" style="text-align: left;"><a href="dangxuat.php">Đăng xuất</a></button></div>
    <hr>
    <div style="container-md">
      <?php 
        $query =  ' select Tinh_Diem ("'.$_SESSION['taikhoan'].'","'.$_POST['mamon'].'")';
          $sth = $pdo->prepare($query);
            $sth->execute();
            $query_diem =  ' select * from Diem where mssv="'.$_SESSION['taikhoan'].'";';
            $sth_diem = $pdo->prepare($query_diem);
            $sth_diem->execute();
            $row_diem = $sth_diem->fetch();
              echo '  
              <div style="text-align: center;">
              <h4>MSSV: '.$_SESSION['taikhoan'].'</h4>
              <h4>Điểm: '.$row_diem['Diem'].'</h4>
              </div>
              
              ';
      ?> 
    </div>
</body>
</html>