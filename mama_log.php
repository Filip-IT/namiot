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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600;800&family=Zilla+Slab:wght@300;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="container" style="text-align:center; margin-top: 300px">
        <form action="mama_logowanie.php" method="POST">
            <p style="color:white; font-size:30px">Login :</p>
            <input type="text" name="login"></input>
            <p style="color:white; font-size:30px">Haslo :</p>
            <input type="text" name="haslo"></input> <br> <br>
            <input type="submit" style="text-align:center" value="Zaloguj sie ">
        </form>
    </section>


    <?php 
        session_start(); 
            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == false){
                echo '<h2 style="color : white; text-align:center;">Podane dane są nieprawidłowe !</h2>';
            }

        session_destroy();
    ?>
</body>
</html>