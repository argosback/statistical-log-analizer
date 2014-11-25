/*
    File        : Validator.js
    
    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02

    Date        : Julio 2013
    Status      : Prototype
    Iteration   : 1.0 ( prototype )
*/

//THIS IS A EXAMPLE, NOT FOR USE
//every function
function goBack()
{
	history.back();
}

domReady
(
  function() 
  {
    var inputSend = document.getElementById("content");
    var RegExPattern = //;
    if( isset(inputSend) )
    {
      inputSend.onclick = goBack;
    }
  }
);