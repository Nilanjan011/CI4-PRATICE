<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>this is Upload page</h1>
<?php
if (isset($validation)) {
    echo $validation->listErrors();
}

?>
<form action="<?php echo base_url('upload')?>" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= csrf_hash() ?>" name="csrf_test_name">
    <input type="file" name="img"><br><br>
    <input type="submit" value="Submit">
</form>
<center>
    <img src="<?= base_url('writable/uploads/1616484583_2bcd800e247d4eb1b8d9.jpg')?>"alt="photo" width='50px'><!--it's not work -->
    <img src="./uploads/1616496854_9b1b1bf96d2500742cb4.jpg" alt="photo" width='50px'><!--it's work-->
    <img src="./uploads/1616497214_548b457417788495b512.jpg" alt="photo" width='50px'><!--it's work-->
</center>

</body>
</html>
