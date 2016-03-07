<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script type="text/javascript" src="../js/jquery-1.12.0.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
	<script type="text/javascript" src="html.js"></script>
  <link rel="stylesheet" type="text/css" href="quiz.styles.css">
    <style type="text/css">
      .option{
      cursor: pointer;
      }
      .option:hover{
        color: blue;
        font-family: bold;
      }
      table{
        width: 400px;
        margin-left: 200px;
        text-align: center;
      }
      th{
        border-bottom: 2px solid black;
        font-weight: bold;
        font-size: 20px;
      }
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
            test.innerHTML +="<button onclick='dispAnswer()'>Display Answer</button> &nbsp; &nbsp; &nbsp &nbsp; &nbsp"; 

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
         /*test.innerHTML +="<button onclick='dispAnswer()'>Display Answer</button> &nbsp; &nbsp; &nbsp &nbsp; &nbsp"; */
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
  <h2 id="test_status"></h2>
  <div id="test"></div>
  <div id="timer"></div>
  <div id="answers" style="display: none;">
    
    <table >
      <tr>
        <th colspan="6">Answers</th>
       
      </tr>
      <tr>
        <td>1</td>
        <td>B</td>
        <td>11</td>
        <td>A</td>
        <td>21</td>
        <td>A</td>
      </tr>
      <tr>
        <td>2</td>
        <td>D</td>
        <td>12</td>
        <td>B</td>
        <td>22</td>
        <td>B</td>
      </tr>
      <tr>
        <td>3</td>
        <td>D</td>
        <td>13</td>
        <td>A</td>
        <td>23</td>
        <td>B</td>
      </tr>
      <tr>
        <td>4</td>
        <td>C</td>
        <td>14</td>
        <td>D</td>
        <td>24</td>
        <td>A</td>
      </tr>
      <tr>
        <td>5</td>
        <td>A</td>
        <td>15</td>
        <td>D</td>
        <td>25</td>
        <td>B</td>
      </tr>
      <tr>
        <td>6</td>
        <td>D</td>
        <td>16</td>
        <td>D</td>
        <td>26</td>
        <td>B</td>
      </tr>
      <tr>
        <td>7</td>
        <td>C</td>
        <td>17</td>
        <td>B</td>
        <td>27</td>
        <td>A</td>
      </tr>
      <tr>
        <td>8</td>
        <td>B</td>
        <td>18</td>
        <td>D</td>
        <td>28</td>
        <td>D</td>
      </tr>
      <tr>
        <td>9</td>
        <td>B</td>
        <td>19</td>
        <td>A</td>
        <td>29</td>
        <td>C</td>
      </tr>
      <tr>
        <td>10</td>
        <td>C</td>
        <td>20</td>
        <td>C</td>
        <td>30</td>
        <td>A</td>
      </tr>
     

    </table>
  </div>
</body>
</html>