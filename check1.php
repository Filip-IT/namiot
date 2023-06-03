<?php
    session_start();  

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "namioty";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        echo 'cos nie tak';
    }

    $termin = $_POST['termin'];

    $sql = "Insert into rezerwacje (termin) VALUES ('$termin')";

    $result = mysqli_query($conn,$sql);

    header("Location: mama.php");
?>