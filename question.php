<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php 
//Get total number of questions
$query = "select * from `questions`";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$total = $result->num_rows;

//Set question number
$number = (int) $_GET['n'];

//Get questions
$query = "select * from `questions` where question_number = $number";

//Get result 
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();


//Get choices
$query = "select * from `choices` where question_number = $number";

//Get result 
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
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
                 <div class="current">
                     Question <?php echo $number ?> of <?php echo $total ?>
                 </div>
                 <p class="question">
                    <?php echo $question['text']; ?>
                 </p>
                 <form method="post" action="process.php">
                 <ul>
				 <?php while($row = $choices->fetch_assoc()): ?>
					<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
				 <?php endwhile; ?>
                 </ul>
                 <input type="submit" value="Submit" /> 
				 <input type="hidden" name="number" value="<?php echo $number; ?>" />
                 </form>
            </div>
        </main>
        <footer>
            <div class="container">
            Copyright &copy; 2019, PHP Quizzer  
            </div>
        </footer>
    </body>
</html>