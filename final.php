<?php session_start() ?>

<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8" />
    <title> PHP QUIZZER </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script.js"></script>   -->
    </head>
    <body>
        <header>
            <div class="container">
                <h1>PHP QUIZZER</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>You're Done! </h2>
                <p>Congrats! You have completed the test</p>
                <p>Final Score: <?php echo $_SESSION['score']; ?> </p>
				<?php unset($_SESSION['score']); ?>
                <a href="question.php?n=1" class="start">Take Again</a>
            </div>
        </main>
        <footer>
            <div class="container">
            Copyright &copy; 2019, PHP Quizzer  
            </div>
        </footer>
    </body>
</html>