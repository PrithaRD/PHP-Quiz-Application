<!DOCTYPE HTML>
<?php include 'database.php' ?>
<?php 
	if(isset($_POST['submit']))
	{
		//Get question number
		$number = $_POST['question_number'];
		//echo $number;die();
		
		//Get question text
		$question_text = $_POST['question_text'];
		
		//Get correct choice
		$correct_choice = $_POST['correct_choice'];
		
		//Get choices in array
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		$choices[5] = $_POST['choice5'];
		
		
		//Question query
		$query = "insert into `questions` (question_number, text) values ('$number','$question_text')";
		
		//Run query
		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		//Validate insert
		if($insert_row)
		{
			foreach($choices as $choice => $value)
			{
				if($value != '')
				{
					if($correct_choice == $choice)
					{
						$is_correct = 1;
					} else
					{
						$is_correct = 0;
					}
					
					//Choice query
					$query = "insert into `choices` (question_number, is_correct, text) values ('$number','$is_correct','$value')";
					
					//Run query
					$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
					
					//Validate insert
					if($insert_row)
					{
						continue;
					}else
					{
						die("Error: (".$mysqli->errono.") ".$mysqli->error);
					}
					
					
				}
			}
			
			$msg = "Question is added";
		}
	}
	
	//Get total number of questions and figure out the next question number 
	//so that the question number field in the form is automatically filled 
	//with the correct question number and the database entry is error free
	
	$query = "select * from `questions`";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total_num_of_rows = $result->num_rows;
	
	//Set next question number
	$next = $total_num_of_rows+1;
?>

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
            <h2>Add A Question</h2>
			<?php if(isset($msg)) { ?>
			<div class="success-msg">
			<p><?php echo $msg; ?></p>
			</div>
			<?php } ?>
            <form method="post" action="add.php">
                 <p>
                    <label>Question Number:</label>
                    <input type="number" value="<?php echo $next; ?>" name="question_number" />
                </p>
                 <p>
                    <label>Question Text:</label>
                    <input type="text" name="question_text" />
                 </p>
                 <p>
                    <label>Choice #1: </label>
                    <input type="text" name="choice1" />
                 </p>
                 <p>
                    <label>Choice #2: </label>
                    <input type="text" name="choice2" /> 
                 </p>
                 <p>
                    <label>Choice #3: </label>
                    <input type="text" name="choice3" />
                 </p>
                 <p>
                    <label>Choice #4: </label> 
                    <input type="text" name="choice4" />
                 </p>
                 <p>
                    <label>Choice #5:</label>
                    <input type="text" name="choice5" />
                 </p>
                 <p>
                    <label>Correct Choice Number:</label>
                    <input type="number" name="correct_choice" />
                 </p>
                 <p>
                    
                    <input type="submit" name="submit"  value="Submit"/>
                 </p>
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