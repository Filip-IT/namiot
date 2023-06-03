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
?>
<!DOCTYPE html>
<html lang="en">
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
    <script src="skrypt.js" async></script>

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
                      <a href="index.html" class="link-primary">Strona główna</a>
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

    <div class="container">
        <h3 class="text-primary centerr">
            <?php
                if(isset($_SESSION['zajety']) && $_SESSION['zajety'] == true){
                    echo 'Niestety wybrany przez ciebie termin jest już zajęty !';
                }
                else if(isset($_SESSION['zajety']) && $_SESSION['zajety'] == false){
                    echo 'Twoj termin jest wolny ! Skontaktuj się z nami i dowiedź się więcej szczegółów na '.'<a href="Kontakt.html">Kontakt</a>';
                }
                else if(isset($_SESSION['zajety']) == false){
                    echo 'Wybierz termin który ciebie interesuje i sprawdź czy jest wolny !'; 
                }
            ?>
        </h3>
    </div>

    <br><br>

    <div class="container border p-3" id="kalendarz1">
        <div class="row text-primary">
            <div class="col-4 " ></div>
            <div class="col-1" onclick="siemka()">
                <button class="button czcionka bg-dark text-light rounded mt-sm-2 prawoo "><</button>
            </div>
            <div class="col-2 ">
                <h1 id="data" class="centerr"></h1>
            </div>
            <div class="col-4 " onclick="siemka2()">
                <button class="czcionka bg-dark text-light rounded mt-sm-2 ">></button>
            </div>

        </div>

        <div id="kalendarz" class="row text-primary">

        </div>
    </div>
   
    <br><br><br><br><br><br>

    <footer>
            <section class="container-fluid mt-5">
                <section class="container">
                    
                </section>
                <section class="row bg-dark" style="padding-top: 50px;">
                    <section class="col-10 offset-2 offset-lg-2 col-lg-2 d-none d-lg-block">
                        <img src="logo.png" class="bg-dark" width="150px" height="150px" alt="logo">
                    </section>

                    <section class="col-6 col-lg-2 text-white">
                        <table>
                            <ul>
                                    <a href="index.html" class="link">
                                        <li>Strona Główna</li>
                                    </a>
                                    <a href="Kontakt.html" class="link">
                                        <li>Kontakt</li>
                                    </a>
                                    <a href="cennik.html" class="link">
                                        <li>Cennik</li>
                                    </a>
                                    <a href="rezerwacja.php" class="link">
                                        <li>Rezerwacja</li>
                                    </a>
                            </ul>
                        </table>
                    </section>

                        <section class="col-3 col-lg-2" style="margin-top: 40px;">
                            <a href="https://www.facebook.com/profile.php?id=100063877127944" target="_blank">
                                <i class="bi bi-facebook bg-info text-white p-lg-5 p-3"></i>
                            </a>        
                        </section>
    
                        <section class="col-3 col-lg-2" style="margin-top: 40px;">
                            <a href="https://www.instagram.com/namioty_bytow_insta/" target="_blank">
                                <i class="bi bi-instagram bg-danger text-white p-lg-5 p-3"></i>
                            </a>
                        </section> 

                </section>
           </section> 
        </footer>
   <?php
        session_destroy();
   ?>

</body>
</html>