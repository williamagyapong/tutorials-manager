<?php
   $msg = "";
  if(isset($_GET['msg'] ))
  {
    $msg = $_GET['msg'];
    $msg = strip_tags($msg);
    $msg = addslashes($msg);
  }
?>
<!DOCTYPE html>
<html>
   <head>
     <meta charset= "UTF-8">
     <TITLE>QUIZ</TITLE>

      <script type="text/javascript">
        
        function startQuiz(url)
        {
        	 window.location = url;

        }
     </script>
   </head>
   <body>
   <?php echo $msg ;?>
   	<h2>Click below when you are ready to start quiz</h2>
   	<button onclick= "startQuiz('quiz2.php?question=1');">Click here to begin</button>
     
   </body>
</html> 