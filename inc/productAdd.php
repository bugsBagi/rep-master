<?php
session_start();
require_once 'connect.php';
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
$name = $_POST['name'];
$nameKz = $_POST['nameKz'];
$harackter = $_POST['harackter'];
$harackterKz = $_POST['harackterKz'];
$category = $_POST['nameCategory'];
$path = 'admin/upload/' . time() . $_FILES['file']['name'];
if ($_FILES["file"]["name"]) {
    if (!move_uploaded_file($_FILES['file']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке фото';
        header('Location: ../pages/manufacturesMain.php');
    }
    mysqli_query($connect, "INSERT INTO `products` (`name`, `pathImage`, `price`, `harackter`, `type`, `idStock`, `nameKz`, `harakterKz`) VALUES ('$name', '$path', '0', '$harackter', '$category', '1', '$nameKz', '$harackterKz')");
} else {
    $_SESSION['message'] = 'Загрузите фото';
}
//ini_set('date.timezone', 'Asia/Almaty');
header('Location: ../pages/productMain.php');
