<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="css.js"></script>
	<link rel="stylesheet" type="text/css" href="quiz.styles.css">
	
	<style type="text/css">
       .option{
      cursor: pointer;
      }
      .option:hover{
        color: blue;
        font-family: bold;
    </style>

    <script>
       var pos = 0, test, test_status, question, choice, choices, chA, chB, chC, chD, correct = 0;
       

       function _(x)
       {
       	return document.getElementById(x)
       }

       function renderQuestion()
       {
       	 var numQuestions= questions.length;
       	 test = _("test");
       	 if(pos>= numQuestions)
       	 {
            test.innerHTML = "<h2>You got "+correct+ " out of "+numQuestions+" questions correct<h2>";
            _("test_status").innerHTML = "Test completed";
            pos = 0;
            correct = 0;
            return false;
       	 }
       	 _("test_status").innerHTML = "Question "+ (pos+1) + " of "+questions.length;

       	 question = questions[pos][0];
       	 chA  = questions[pos][1]
       	 chB   = questions[pos][2];
       	 chC   = questions[pos][3];
       	 chD   = questions[pos][4];

       	test.innerHTML = "<h3>"+question+"</h3>";
       	 test.innerHTML += "<label class='option'><input type='radio' name='choices' value='A'> "+chA+"</label><br>";
       	 test.innerHTML += "<label class='option'><input type='radio' name='choices' value='B'> "+chB+"</label><br>";
       	 test.innerHTML += "<label class='option'><input type='radio' name='choices' value='C'> "+chC+"</><br>";
       	 test.innerHTML += "<label class='option'><input type='radio' name='choices' value='D'> "+chD+"</label><br><br>";
         //test.innerHTML +="<button>Previous</button> &nbsp; &nbsp; &nbsp &nbsp; &nbsp"; 
       	 test.innerHTML += "<button onclick='checkAnswer()'>&nbsp; &nbspNext&nbsp; &nbsp</button>";
       }

       function checkAnswer()
       {
         choices = document.getElementsByName("choices");

       	 for(var i = 0; i<choices.length; i++)
       	 {
             if(choices[i].checked)
             {
             	choice  = choices[i].value;

            }
             
       	 }
       	 
       	 if(choice == questions[pos][5])
                { 
            	     correct++;
                  
                }
    
         pos++;
         renderQuestion();
         
       }

       function back(i)
       {
          i
       }

       function indicateAnswers()
       {

         choices = document.getElementsByName("choices");

         for(var i = 0; i<choices.length; i++)
         {
             if(choices[i].checked)
             {
               
                
            }
             
         }
         //alert(questions[pos][4]);
         if(choice == questions[pos][5])
                {
                   correct++;

                }
    
         pos++;
         renderQuestion();
       }

       window.addEventListener("load", renderQuestion, false);
	</script>
</head>
<body>
   <h1>Remaining questions will be included soon</h1>
   <h2 id="test_status"> </h2>
  <div id="test"></div>
</body>
</html>