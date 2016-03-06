
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