<?php
    session_start();  

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "namioty";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        echo 'cos nie talk';
    }

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $termin = $_POST['termin'];

    $sql = "SELECT * FROM rezerwacje WHERE termin = '$termin'";

    $result = $conn->query($sql);

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $_SESSION['zajety'] = true;
        header("Location: rezerwacja.php");

    } else {
        $_SESSION['zajety'] = false;
        header("Location: rezerwacja.php");
    }
    
?>