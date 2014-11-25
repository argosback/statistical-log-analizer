/*
    File        : Isset.js
    
    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira 
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02

    Date        : Julio 2013
    Status      : Prototype
    Iteration   : 1.0 ( prototype )
*/

function isset(variable_name) 
{
    try 
    {
         if (typeof(eval(variable_name)) != 'undefined')
         if (eval(variable_name) != null)
         return true;
    } 
    catch(e) { }
    return false;
}