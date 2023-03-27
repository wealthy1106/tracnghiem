<?php
  include_once "./connection.php";
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
        .containe {
            width: 100%;
            max-width: 800px;
            margin: 10px auto;
            background-color: rgb(246, 243, 238);
            padding: 15px;
            border: 2px dotted black;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">TRẮC NGHIỆM MÔN HỌC</h1>
        <hr>
        <br>
        <div class="row">
            <div class="col-3">
                <div style="padding-top: 90px;">
                    <ul>
                    <li><button ><a href="usergv.php">Kết quả</a></button></li>
                        <li><button><a href="cauhoi.php">Câu hỏi</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <h1 style="text-align: center;">Thêm Câu Hỏi <?php echo $_GET['idmon']; ?></h1>
                <form class="containe" action="cauhoi.php" method="POST">
                    <div class="form-group">
                        <label for="idcauhoi">ID Câu hỏi:</label>
                        <input type="" class="form-control" id="idcauhoi" name="idcauhoi" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="mamon">Mã Môn:</label>
                        <input type="" class="form-control" id="mamon" name="mamon" 
                        placeholder=""
                        >
                    </div>
                    <div class="form-group">
                        <label for="cauhoi">Câu Hỏi:</label>
                        <textarea class="form-control" id="cauhoi" name="cauhoi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Lựa Chọn 1:</label>
                        <textarea class="form-control" id="luachon1" name="luachon1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Lựa Chọn 2:</label>
                        <textarea class="form-control" id="luachon2" name="luachon2" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Lựa Chọn 3:</label>
                        <textarea class="form-control" id="luachon3" name="luachon3" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Đáp Án:</label>
                        <input type="form-control" class="form-control" id="dapan" name="dapan" placeholder="">
                    </div>
                    <div style="text-align: center;">
                    <button type="submit" class="btn btn-light">Thêm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>