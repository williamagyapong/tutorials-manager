

<?php
  session_start();
  if(isset($_GET['question']))
  {
    $question = preg_replace('/[^0-9]/', "", $_GET['question']);
    $next = $question + 1;
    $prev = $question - 1;

    if(!isset($_SESSION['qid_array']) && $question != 1)
    {
      $msg = "Sorry! No cheating";
      header("Location: index.php?msg=$msg");
      exit();
    }

    if(isset($_SESSION['qid_array']) && in_array($question, $_SESSION['qid_array']))
    {
      $msg = "Sorry, cheating is not allowed. You will have to start over. Haha!";
      unset($_SESSION['qid_array']);
      unset($_SESSION['answer_array']);
      session_destroy();
      header("Location: index.php?msg=$msg"); 
      exit();
    }

   /*if(isset($_SESSION['last_question']) || $_SESSION['last_question'] !=$prev)
   {
     $msg = "Sorry, cheating is not allowed. You will have to start over. Haha!";
      unset($_SESSION['qid_array']);
      unset($_SESSION['answer_array']);
     header("location: index.php?msg=$msg");
     session_destroy();
     exit();
   }*/

  }
    
    
?>

<!DOCTYPE html>
<html lang = "en">
   <head>
     <meta charset= "UTF-8">
     <title>quiz page</title>
     <script type="text/javascript">
      function countDown(secs,elem)
      {
        var element = document.getElementById(elem);
        element.innerHTML = "You have"+secs+"seconds remaining";
        if(secs<1)
        {
          var Xhr = new XMLHttpRequest();
          var url = "useranswers.php";
          var vars = "radio=0"+"&qid=<?php echo $question;?>";
          Xhr.open("POST", url, true);
          Xhr.setResponseHeader("Content-type", "application/x-www-form-urlencoded");
          Xhr.onreadystatechange = function()
          {
            if(Xhr.readyState==4 && Xhr.status==200)
            {
              alert("You did not answer the question in the alloted time.It will be marked as incorect!");
              clearTimeout(timer);
            }
          }
          Xhr.send(vars);
          document.getElementById('counter_status').innerHTML="";
          document.getElementById('btnSpan').innerHTML = '<h2>Time\'s up!</h2>';
          document.getElementById('btnSpan').innerHTML += '<a href="quiz.php?question=<?php echo $next; ?>">Click here now<a>';

        }
        secs--;
        var timer = setTimeout('countDown('+secs+',"'+elem+'")', 1000);

      }


       function getQuestion()
       {
         var hr =  XMLHttpRequest();
         hr.onreadystatechange = function()
         {
          if(hr.readyState == 4 && hr.status ==200)
          {
            var response = responseText.split('|');
                 if(response[0]) == 'finished')
                  {
                    document.getElementById('status').innerHTML = response[1]; 

                  }
            var nums = hr.responseText.split(',');
            document.getElementById('question').innerHTML = nums[0];
            document.getElementById('answers').innerHTML = nums[1];
            document.getElementById('answers').innerHTML += nums[2];           


          }
         }
           hr.open("GET", "questions.php?question=<?php echo $question;?>", true);
          hr.send();

       }  

     </script>
   </head>
   <body onload = "getQuestion()">
      <div id = "status"></div>
      <div id = "counter_status"></div>
      <div id ="question"></div>
      <div id = "answers"></div>

    <script type="text/javascript"> countDown(20,"counter_status");</script>
     
   </body>
</html>