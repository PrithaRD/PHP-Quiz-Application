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
                     Question 1 of 5
                 </div>
                 <p class="question">
                    What does PHP stand for?
                 </p>
                 <form method="post" action="process.php">
                 <ul>
                    <li><input name="choice" type="radio" value="1" />PHP: Hypertext Preprocessor</li>
                    <li><input name="choice" type="radio" value="2" />PHP: Private Home Page</li>
                    <li><input name="choice" type="radio" value="3" />PHP: Personal Home Page</li>
                    <li><input name="choice" type="radio" value="4" />PHP: Personal Hypertext Preprocessor</li>
                 </ul>
                 <input type="submit" value="Submit" /> 
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