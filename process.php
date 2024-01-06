<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>process</title>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script src=""></script>
</head>
<body>
    
</body>
</html>
<?php
    $conn =  mysqli_connect("localhost", "root", "", "suming");

    if (isset($_POST['btn'])) {
        $product = $_POST['product'];
        $amount = $_POST['amount'];
    
    $sql = "INSERT INTO sched(`product`, `amount`)VALUES(?,?)";
    // $res = $conn->query($sql);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $product, $amount);
    $res = $stmt->execute();
    if ($res === true) {
        echo'<script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "New product Added successfully",
            showConfirmButton: false,
            timer: 3000
          });    
        </script>';
    }else{
        echo"<h3>Fail to add product</h3>".$conn->error;
    }
    
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

$sql = "DELETE FROM `sched` WHERE id=$id";
$res = $conn->query($sql);
if($res == true){
    echo '<script>
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "deleted successfully ",
        showConfirmButton: false,
        timer: 1000
      });    
    </script>';
}else{
    echo "Someting goes wrong".$conn->error;
}
}
?>