/*
    File        : DomReady.js
    
    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02

    Date        : Julio 2013
    Status      : Prototype
    Iteration   : 1.0 ( prototype )
*/
var domReady = function (callback) 
{
    /* Internet Explorer */
    /*@cc_on
    @if (@_win32 || @_win64)
        document.write('<script id="ieScriptLoad" defer src="//:"><\/script>');
        document.getElementById('ieScriptLoad').onreadystatechange = function() {
            if (this.readyState == 'complete') {
                callback();
            }
        };
    @end @*/
    /* Mozilla, Chrome, Opera */
    if (document.addEventListener)
    {
      document.addEventListener('DOMContentLoaded', callback, false);
    }
    /* Safari, iCab, Konqueror */
    if (/KHTML|WebKit|iCab/i.test(navigator.userAgent))
    {
      var DOMLoadTimer = setInterval
      (
    	function ()
    	{
    	    if (/loaded|complete/i.test(document.readyState))
    	    {
    	      callback();
    	      clearInterval(DOMLoadTimer);
    	    }
    	}, 10
      );
    }
    /* Other web browsers */
    window.onload = callback;
};