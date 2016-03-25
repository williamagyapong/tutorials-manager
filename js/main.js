
function formatTime(i)
      {
            if(i<10)
            {
                  i = "0"+i;
            }
            return i;
      }
function timer()
{
	var date = new Date();
	var h = date.getHours();
	var m = date.getMinutes();
	var s = date.getSeconds();
	var sTime = date.getTime();
	var cTime, uTime;

	setInterval(function(){
         cTime = date.getTime();
         uTime = cTime - sTime;
         document.getElementById("timer").innerHTML = formatTime(uTime);
         //setTimeout('timer()', 1000);
         //alert(uTime);

	}, 1)
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
         $('#hide').hide();
         
       }


function dispAnswer()
{
   $('#answers').css({"display":"block"});
   $('#disp').hide();
   $('#hide').show();
}

function hideAnswer()
{
   $('#answers').css({"display":"none"});
   $('#hide').hide();
   $('#disp').show();
}


function back()
       {
         
         if(pos<=0)
         { 
            pos = numQuestions-1;
            //alert("Please use the next button");
         }
         else{
              pos--;
         }
           

           renderQuestion();
       }

function startOver()
       {
         pos = 0;
         renderQuestion();
         correct = 0;
         _('answers').style.display = "none";
       }

/*$(document).ready(function(){
   $("button").click(function(){
      
      $('#fade').fadeIn(4000);
   })

   $("button").dblclick(function(){
      
      $('#fade').fadeOut(4000);
   })
     
    $('#span1').animate({marginTop: 300},"8000");

    })*/

    choices = document.getElementsByName("choices");

          for(var i = 0; i<choices.length; i++)
          {
            choices[i].disabled = true;
             
          }