<?php
  include_once "./connection.php";

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
    <style>
        .button button{
            margin-bottom: 10px;
            width: 40px;
            text-align: center;
        }
        .trloi{
            padding-left: 200px;
        }
        .form-check{
            padding-left: 200px;
        }
        input{
            width: 20px; height: 20px;
        }
        h5{
            padding-left: 50px ;
        }
    </style>
</head>
<body class="container-md" >
    <header>
        <div class="text-center mt-3">
            <h2>TRẮC NGHIỆM MÔN HỌC</h2>
        </div>
    </header>
    <br>
    <br>
    <main >
       <div style="text-align: center; font-size: 30px;">
            <h2>MỜI CHỌN MÔN</h2>
            <?php
                if(isset($_GET['dalam'])) {
                    echo '<h3 style="color: red">Môn Vừa Thi Đã Làm</h3>';
                }
            ?>
            <hr>
            <?php 
                $query = 'select * from monhoc';
                $stt = 1;
                try {
                    $sth = $pdo->query($query);
                    while ($row = $sth->fetch()){
                        echo '  
                        <a href="test.php?mamon='.$row['MaMon'].'">'.$row['TenMon'].'</a>
                        <br>
                        ';
                    }   
                } catch (PDOException $e){
                    
                }
            ?>
       </div>
    </main>
</body>
</html>