<?php
  include_once "./connection.php";
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giáo viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
    <style>
         header li{
            padding: 15px;
            border: 2px solid rgb(131, 224, 123);
        }
        header li a{
            color: rgb(3, 1, 15);
        }
        ul{
            list-style-type: none;
            padding: auto;
        }
        ul li button{
            width: 100%;
            background-color: rgb(242, 247, 243);
            border: 1px solid rgb(17, 240, 9);
            padding-bottom: 10px;
        }
    </style>
    <title>Trắc nghiệm Môn Học</title>
</head>
<body>
    <div class="container">
        <br>
        <h1 style="text-align: center;">TRẮC NGHIỆM MÔN HỌC</h1>
        <hr>
        <div><button type="submit" class="btn btn-light"><a href="dangxuat.php">Đăng xuất</a></button></div>
        <div class="row">
            <div class="col-3">
                <div style="padding-top: 90px;">
                    <ul>
                        <li><button style="background-color: aquamarine;"><a href="usergv.php">Kết quả</a></button></li>
                        <li><button><a href="cauhoi.php">Câu hỏi</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div>
                    <?php 
                         $query = "select * from sinhvien natural join giaovien
                                                            natural join diem
                                                 where magv = '".$_SESSION['taikhoan']."'";
                            try {
                            $sth = $pdo->query($query);
                            if ($row = $sth->fetch()){
                            // echo $row['MaMon'];
                            echo '  
                                <h3>Môn: '.$row['MaMon'].'</h3>
                            ';
                            }   
                            } catch (PDOException $e){

                            }
                     ?>
                    
                </div>
                <h1 style="text-align: center;">Kết Quả</h1>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">MSSV</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Điểm</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = "select * from sinhvien natural join giaovien
                                                         natural join diem
                                                         where magv = '".$_SESSION['taikhoan']."'";
                        
                            $sth = $pdo->query($query);
                            $idmon='';
                            while ($row = $sth->fetch()){
                                $idmon= $row['MaMon'];
                                echo '  
                                    <tr>
                                        <td>'.$row['MSSV'].'</td>
                                        <td>'.$row['Ten'].'</td>
                                        <td>'.$row['Diem'].'</td>
                                    </tr>
                                    
                                ';
                            } ;  
                        
                        ?>
                        <?php 
                         $query_max = 'call Diem_LN("'.$_SESSION['taikhoan'].'","'.$idmon.'");';
                             
                            $sth_max = $pdo->query($query_max); 
                           
                            $row_max = $sth_max->fetch();
                               echo ' <tr>
                                  <td colspan="3">Điểm Max : '.$row_max['diem'].' </td>
                                  </tr>
                                  ';
                                  $sth_max->closeCursor();
                               
                        ?>
                                   
                        <?php
                            $query_min = 'call Diem_NN("'.$_SESSION['taikhoan'].'","'.$idmon.'");';
                            $sth_min = $pdo->query($query_min); 
                            $row_min = $sth_min->fetch();
                                   echo ' <tr>
                                      <td colspan="3">Điểm Min : '.$row_min['diem'].' </td>
                                      </tr>
                                      ';
                                      $sth_min->closeCursor();
                        ?> 
                        <?php
                            $query_TB = 'call Diem_TB("'.$_SESSION['taikhoan'].'","'.$idmon.'");';
                            $sth_TB = $pdo->query($query_TB); 
                            $row_TB = $sth_TB->fetch();
                                   echo ' <tr>
                                      <td colspan="3">Điểm TB : '.$row_TB['DiemTB'].' </td>
                                      </tr>
                                      ';
                                      $sth_TB->closeCursor();
                        ?>      
                           
                           <?php
                            $query_trenTB = 'select tk_tren7("'.$idmon.'");';
                            $sth_trenTB = $pdo->query($query_trenTB); 
                            $row_trenTB = $sth_trenTB->fetch();
                            
                                   echo ' <tr>
                                      <td colspan="3">Số lương trên TB : '.$row_trenTB['tk_tren7("'.$idmon.'")'].' </td>
                                      </tr>
                                      ';
                                      $sth_trenTB->closeCursor();
                        ?>      
                                <?php
                            $query_duoiTB = 'select tk_duoi7("'.$idmon.'");';
                            $sth_duoiTB = $pdo->query($query_duoiTB); 
                            $row_duoiTB = $sth_duoiTB->fetch();
                            
                                   echo ' <tr>
                                      <td colspan="3">Số lương dưới TB : '.$row_duoiTB['tk_duoi7("'.$idmon.'")'].' </td>
                                      </tr>
                                      ';
                                      $sth_duoiTB->closeCursor();
                        ?>       
                            
                               
                           
                     
                    
                    </tbody>
            </div>
        </div>
    </div>
</body>
</html>