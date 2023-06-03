<?php
    session_start();  
    
    if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] == false){
        header("Location: rezerwacja.php");
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "namioty";

    $_SESSION['server'] = $servername ;
    $_SESSION['username'] = $username;
    $_SESSION['password'] =  $password ;
    $_SESSION['dbaname'] = $dbname;


    $conn = mysqli_connect($servername,$username,$password,$dbname);

    $sql = 'Select termin from rezerwacje';

    $result = mysqli_query($conn,$sql);

    $tablica = [];
    $i =0;
    while($row = mysqli_fetch_assoc($result)){
        //echo $row["termin"]."<br>";
        $tablica[$i] = $row["termin"];
        $_SESSION["terminy"][$i] = $tablica[$i];
        $i++;
    }

    //echo $_SESSION["terminy"][1];

    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="model.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezerwacja</title>

    <link rel="stylesheet" href="model.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--

    <script src="skrypt.js" async></script>
-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600;800&family=Zilla+Slab:wght@300;600;700&display=swap" rel="stylesheet">
</head>
<body>


<header class="container">
        <nav class="navbar navbar-expand-lg  py-0 my-0">
            <div class="container">
                <a href="index.html" class="navbar-brand col-7">
                      <img src="logo3.png" width="130px">
                      </span>
                </a>
                <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
        
                <div class="collapse navbar-collapse text-white col-5 fs-5" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item py-1">
                      <a href="index.html" class="link-primary">Strona glowna</a>
                    </li>
                    <li class="nav-item py-1">
                      <a href="Kontakt.html" class="link-primary">Kontakt</a>
                    </li>
                    <li class="nav-item py-1">
                      <a href="cennik.html" class="link-primary">Cennik</a>
                    </li>
                    <li class="nav-item py-1">
                      <a href="rezerwacja.php" class="link-primary">Rezerwacja</a>
                    </li>        
                    
                  </ul>
                </div>
            </div>
    </header>

    <section class="calendar">
        <tr>
        <?php 
            $liczba = 0;
            wyswietl($liczba);
            //sprawdz();

            function wyswietl($liczba){
                $miesiace = ["Styczeń","Luteń","Marzeń","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Pazdziernik","Listopad","Grudzien"];
                $dni_tygodnia = ["Mon","Tue","Wed","Thu","Fri","Sut","Sun"];
                
                for($i=0; $i<12; $i++){
                    $ilosc_dni = date('t', mktime(0, 0, 0, $i + 1, 1, date('Y')));
                    echo '<table class="obok">';
                    echo '<th>'.$miesiace[$i].'<br>';
                    echo '<tr>';

                    for($h=0;$h<7;$h++){
                        echo '<th>'.$dni_tygodnia[$h].'</th>';
                    }
                echo '</tr>';

                echo '<tr>';
                $miesiac = 0;
                if($i < 10){
                    $miesiac = "0".($i + 1);
                }
                else{
                    $miesiac = $i;
                }
                //echo $miesiac;

                for($j=1; $j<=$ilosc_dni; $j++){
                    $dzien = 0;
                    if($j < 10){
                        $dzien = "0".$j;
                    }
                    else{
                        $dzien = $j;
                    }
                    //echo $dzien;
                    $terminek = '2023'.'-'.$miesiac.'-'.($dzien); 
                    foreach($_SESSION["terminy"] as $liczba){
                        $ilosc = 0;
                        $liczek = 0;
                        if($terminek == $liczba){
                            //echo 'udalo sie !@';
                            //echo $terminek;
                            echo "<td class='$terminek' style='background-color : blue; color : white ;'>$j</td>";
                        }
                        else{
                            $liczek++;
                        }
                        $ilosc++;
                    }
                    if($liczek == $ilosc){
                        echo '<td class="'.'2023'.'-'.$miesiac.'-'.$dzien.'">'.$j.'</td>';
                    }

                    if($j%7==0){
                        echo '</tr>';
                        echo '<tr>';
                    }
                    else if($j == $ilosc_dni){
                        echo '</table>';
                    }
                    }
                }
            }
    

            function sprawdz(){
                foreach($_SESSION["terminy"] as $liczba){
                        $miesiace = ["Styczeń","Luteń","Marzeń","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Pazdziernik","Listopad","Grudzien"];
                    $dni_tygodnia = ["Mon","Tue","Wed","Thu","Fri","Sut","Sun"];
                    for($i=0; $i<12; $i++){
                        $ilosc_dni = date('t', mktime(0, 0, 0, $i + 1, 1, date('Y')));
                        //echo '<table class="obok">';
                        //echo '<th>'.$miesiace[$i].'<br>';
                        //echo '<tr>';

                        for($h=0;$h<7;$h++){
                            //echo '<th>'.$dni_tygodnia[$h].'</th>';
                        }
                //echo '</tr>';

                    //echo '<tr>';
                    $miesiac = 0;
                    if($i < 10){
                        $miesiac = "0".($i + 1);
                    }
                    else{
                        $miesiac = $i;
                    }
                    //echo $miesiac;

                    for($j=1; $j<=$ilosc_dni; $j++){
                        $dzien = 0;
                        if($j < 10){
                            $dzien = "0".$j;
                        }
                        else{
                            $dzien = $j;
                        }
                        //echo $dzien;
                        //echo '<td class="'.'2023'.'-'.$miesiac.'-'.$dzien.'">'.$j.'</td>';
                        $terminek = '2023'.'-'.$miesiac.'-'.($dzien); 
                        if($terminek == $liczba){
                            echo 'udalo sie !@';
                            echo $terminek;
                            echo "<td class='$terminek' style='background-color: blue; color: white;'></td>";
                        }
                        if($j%7==0){
                            //echo '</tr>';
                            //echo '<tr>';
                        }
                        else if($j == $ilosc_dni){
                            //echo '</table>';
                        }
                        }
                    }
                }
            }
    ?>
    </section>

    <section style="clear:both; margin-top: 300px; margin-left: 350px">
        <form action="check1.php" method="POST">
            <p style="color:white; font-size:30px">Dodaj date:</p>
            <input type="date" name="termin"></input>
            <input type="submit" value="Dodaj">
        </form>
    </section>

   <?php
        session_destroy();
   ?>

</body>
</html>