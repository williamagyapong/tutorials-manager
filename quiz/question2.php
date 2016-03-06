<?php
session_start();
 require_once '../config.php';

 $question  ="";
 $answers  = "";

 if(isset($_POST['question']))
 {
 	$question = $_POST['question'];
 	/*$query = mysql_query("SELECT * FROM questions WHERE id ='$question'");
 	while($row = mysql_fetch_array($query))
 	{
 		$question =  $row['question'];
 		$question = "<h3>".$question."</h3>";
 		echo $question;
 	}

 	
 }else{
 	echo "no results found";*/

 	 $output = "";
     $answer = "";
     $q = "";

     $sql  = mysql_query("SELECT id FROM questions");
     $numQuestions = mysql_num_rows($sql); 
        if(isset($_SESSION['answer_array']))
        {
        	$arrayCount = count($_SESSION['answer_array']);


		    if($arrayCount>$numQuestions)
		     {
		     	unset($_SESSION['answer_array']);
		     	header("Location: index.php");
		     	exit;
		     } 
		     if($arrayCount >= $numQuestions)
		     {
		     	echo 'finished|<p>There are no questions. Please enter your first and last name and click next</p>
		     	               <form action = "userAnswers2.php" method="post">
		     	                <input type = "text" name= "username">
		     	                <input type = "hidden" name = "complete" value = "true">
		     	                <input type = "submit" value ="next">';

		          exit();
		     }
     

        }
     	 

		     $singleSql = mysql_query("SELECT * FROM questions WHERE id = '$question' LIMIT 1");
		     while ($row = mysql_fetch_array($singleSql)) 
		     {
		      	   
		      	   $id = $row['id'];
		      	   $theQuestion = $row['question'];
		      	   $type = $row['type'];
		      	   //$questionId = $row['question_id'];
		      	   $q =  '<h3>'.$theQuestion.'</h3>';

		      	   $query = mysql_query("SELECT * FROM answers WHERE question_id  = '$question' ORDER BY RAND() ");
		      	   while($row2 = mysql_fetch_array($query))
		      	   {
		               $answer = $row2['answer'];
		               $correct = $row2['correct'];
		               $answers .= '<label style = "cursor:pointer"><input type = "radio" name= "rads" value= "'.$correct.'"">'.$answer.
		               '</label> <input type ="hidden" id = "qid" value = "'.$id.'" name = "qid"><br /><br />';
		    
		      	   }
		            //$output = ''.$q.','.$answers.'';
		      	   $output = ''.$q.','.$answers.',<span id ="btnSpan"><button onclick="post_answer()">submit</button></span>';
		           echo $output;
		      } 

          

 }

?>