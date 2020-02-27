<?php include("database.php"); ?>
<?php session_start() ?>

<?php
//Check to see if score is set
if(!isset($_SESSION['score']))
 {
	$_SESSION['score'] = 0;
 }
 
 
 if($_POST)
 {
	 $question_number = $_POST['number'];
	 $selected_choice = $_POST['choice'];
	 
	 
	 
	 /*
	 *  Get correct choice
	 */
	 
	 $query = "select * from `choices` where question_number = $question_number and is_correct = 1";
	 
	 //Get result
	 $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	 
	 //Get row 
	 $row = $result->fetch_assoc();
	 
	 //Set correct choice
	 $correct_choice = $row['id'];
	 
	 //Compare
	 if($correct_choice == $selected_choice)
	 {
		 //Answer is correct so session score variable is increased by 1
		 $_SESSION['score']++;
	 }
	 
	 /*
	 *  Get next question
	 */
	 
	 //Get the total number of questions
	 $query = "select * from questions";
	 
	 //Get result
	 $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	 
	 //Get total number of quetsions
	 $total = $result->num_rows;
	 
	 //echo $question_number;
	 //die();
	 
	 if($question_number == $total)
	 {
		 header("Location: final.php");
		 exit();
	 }else{
		 $next = $question_number+1;
		 header("Location: question.php?n=".$next);
	 }
 }
 
?>