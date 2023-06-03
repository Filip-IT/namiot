<?php
    session_start();  

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "namioty";

    $_SESSION['server'] = $servername ;
    $_SESSION['username'] = $username;
    $_SESSION['password'] =  $password ;
    $_SESSION['dbaname'] = $dbname;


    $conn = mysqli_connect($servername,$username,$password,$dbname);


    $login = $_POST["login"];
    $haslo = $_POST["haslo"];

    $sql = "Select * from user where login='$login' AND haslo = '$haslo';";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['zalogowany'] = true;
        header("Location: mama.php");
    }
    else{
        $_SESSION["zalogowany"] = false;
        header("Location: mama_log.php");
    }

?>