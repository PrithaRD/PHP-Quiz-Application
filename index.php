<?php include 'database.php'; ?>
<?php 
$query = "select * from `questions`";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$total = $result->num_rows;

?>
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
                <h2>Test Your PHP Knowledge</h2>
                <p>This is a multiple choice quiz to test your knowledge of PHP </p>
                <ul>
                    <li><strong> No. of Questions:</strong> <?php echo $total ?></li>
                    <li><strong> Type: </strong> Multiple Choice</li>
                    <li><strong> Estimated Time:</strong> <?php echo $total * .5 ?> Minutes </li>
                </ul>
                <a href="question.php?n=1" class="start">Start Quiz</a>
            </div>
        </main>
        <footer>
            <div class="container">
            Copyright &copy; 2019, PHP Quizzer  
            </div>
        </footer>
    </body>
</html>