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

  /* if(isset($_SESSION['last_question']) && ($question==$_SESSION['last_question']))
   {
     $msg = "Sorry, cheating is not allowed. You will have to start over.";
      unset($_SESSION['qid_array']);
      unset($_SESSION['answer_array']);
     header("location: index.php?msg=$msg");
     session_destroy();
     exit();
   }*/

  }
    
    
?>

<!DOCTYPE html>
<html>

 <head>
    <script type="text/javascript" src = "../js/jquery-1.12.0.js"></script>

     <script type="text/javascript">
      function countDown(secs,elem)
      {
        var element = document.getElementById(elem);
        var nextQuestion = "<?php echo $next;?>";
        
        element.innerHTML = "You have "+secs+" seconds remaining";
        if(secs<1)
        {
          var Xhr = new XMLHttpRequest();
          var url = "userAnswers2.php";
          var vars = "radio=0"+"&qid=<?php echo $question;?>";
          Xhr.open("POST", url, true);
          Xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
          Xhr.onreadystatechange = function()
          {
            if(Xhr.readyState==4 && Xhr.status==200)
            {
              alert(" You did not answer the question in the alloted time. It will be marked as incorect!");
              clearTimeout(timer);
            }
          }
          Xhr.send(vars);
          document.getElementById('counter_status').innerHTML="";
          document.getElementById('btnSpan').innerHTML = '<h2>Time\'s up!</h2>';
          document.getElementById('btnSpan').innerHTML += '<a href="quiz2.php?question=<?php echo $next; ?>">Click here now<a>';

        }
        secs--;
        var timer = setTimeout('countDown('+secs+',"'+elem+'")', 1000);
        if(nextQuestion > 5)
        {
          document.getElementById('counter_status').innerHTML="";
           clearTimeout(timer);
        }

      }

     /*function getQuestion()
       {
         var hr =  XMLHttpRequest();
         hr.open("GET", "questions.php?question=<?php echo $question;?>", true);
         hr.onreadystatechange = function()
         {
          if(hr.readyState ==4 && hr.status ==200)
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
           
          hr.send();

       }  */
                function getQuestion()
                { 
                  var question = "<?php echo $question; ?>";
                  //$('#status').html('<h2>Final quiz: 2016</h2>');

                  $('#question').text("Loading........")
                  $.post("question2.php",{question:question}, function(output){
                  	 $('#question').html(output);
                  })
                }


      function x()
      {
        var rads = document.getElementsByName('rads');
        for(var i =0; i< rads.length; i++)
        {
          if(rads[i].checked)
          {
            var val = rads[i].value;
            return val;
          }
        }

      }

      function post_answer()
      {
        var hr = new XMLHttpRequest();
        var id = document.getElementById('qid').value;
        var vars = "qid="+id+"&radio="+x();
        var url = "userAnswers2.php";
        hr.open("post", url, true);
        hr.setRequestHeader("content-type", "application/x-www-form-urlencoded")
        hr.onreadystatechange = function()
        {
          if(hr.readyState ==4 && hr.status ==200)
          { 
            document.getElementById('status').innerHTML ='',
            alert(id+"Thanks, your answer was submitted"+hr.responseText);
            var url = 'quiz2.php?question=<?php echo $next; ?>';
            window.location = url; 
          }
        }
        hr.send(vars);
        document.getElementById('status').innerHTML = "Processing.....";
      }
  </script>
  <script>
      window.oncontextmenu = function()
      {
        return false;
      }
          </script>

 </head>

 <body onload="getQuestion()">
      <div id = "status"></div>
      <div id = "counter_status"></div>
      <div id ="question"></div>
      <div id = "answers"></div>

         
       
	

         
	    
       <script type="text/javascript"> countDown(5,"counter_status");</script>

     
 </body>
</html>