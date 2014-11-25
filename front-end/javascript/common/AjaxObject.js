/*
    File        : AjaxObject.js
    
    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02

    Date        : Julio 2013
    Status      : Prototype
    Iteration   : 1.0 ( prototype )
*/
(function()//forma básica de encapsular
{

//crear objeto XMLHttpRequest
function createAjaxObject() 
{ 
  var obj; //variable que recogerá el objeto
  
  if (window.XMLHttpRequest) 
  { //código para mayoría de navegadores
    obj=new XMLHttpRequest();
  }
  else 
  { //para IE 5 y IE 6
    obj=new ActiveXObject(Microsoft.XMLHTTP);
  }
  
  return obj; //devolvemos objeto
}

//función constructora del objeto:			 
window.AjaxObject = function() 
{
  var newAjax = createAjaxObject();
  this.object = newAjax;
  this.getText = getAjaxText;
  this.loadXML = loadAjaxXML;
  this.loadText = loadAjaxText;
}			

//función para el método objeto.pedirTexto(url,id) 		
function getAjaxText(url,id) 
{
  var newAjax = this.object;
  var ajaxId = id;
  newAjax.open("GET",url,true);
  newAjax.onreadystatechange = function() 
  {  
    if (newAjax.readyState == 4 && newAjax.status == 200)
    {
      var ajaxText = newAjax.responseText;
      document.getElementById(ajaxId).innerHTML = ajaxText;
    }
  }
  newAjax.send(); 
}

/*función del método cargaXML: devuelve el DOM del XML	
como parámetro de la función que le pasamos*/
function loadAjaxXML(url,Function)
{
  var newAjax = this.object; 
  var xmlFunction = Function; 
  newAjax.open("GET",url,true);
  newAjax.onreadystatechange = function()
  { 
    if (newAjax.readyState == 4 && newAjax.status == 200)
    {
      var property = newAjax.responseXML; 
      funcionXML(property);
    }
  }	
  newAjax.send();
}	

//función del método cargaTexto: 
//devuelve el texto del archivo en el parámetro.
function loadAjaxText(url,Function) 
{
  var newAjax = this.object; 
  var textFunction = Function; 
  newAjax.open("GET",url,true);
  newAjax.onreadystatechange = function()
  { 
    if (newAjax.readyState == 4 && newAjax.status == 200)
    {
      var newText = newAjax.responseText; 
      textFunction(newText);
    }
  }	
  newAjax.send();
}
AjaxObject.prototype.loadText = loadAjaxText; 	
		 
//Método pedirPost: envia datos por POST y devolver en un id: 
function getByPost(url,id,data) 
{
  var newAjax = this.object; 
  var ajaxId = id; 
  var ajaxData = data;
  newAjax.open("POST",url,true);
  newAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  newAjax.setRequestHeader("Content-length", ajaxData.length);
  newAjax.setRequestHeader("Connection", "close");
  newAjax.onreadystatechange = function()
  {  
    if (newAjax.readyState == 4 && newAjax.status == 200)
    { 
      var ajaxText = newAjax.responseText; 
      document.getElementById(ajaxId).innerHTML = ajaxText;
    }
  }
  newAjax.send(ajaxData); 
} 	
AjaxObject.prototype.getPost = getByPost;	 

//Método cargaPost: envia datos por post y recoge el resultado en el parámetro de una función:
function loadFromPost(url,Function,data) 
{
  var newAjax = this.object; 
  var textFunction = Function; 
  var ajaxData = data;
  newAjax.open("POST",url,true);
  newAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  newAjax.setRequestHeader("Content-length", ajaxData.length);
  newAjax.setRequestHeader("Connection", "close");
  newAjax.onreadystatechange = function()
  { 
    if (newAjax.readyState == 4 && newAjax.status == 200)
    {
      var newText=newAjax.responseText; 
      textFunction(newText);
    }
  }	
  newAjax.send(ajaxData);
}
AjaxObject.prototype.loadPost = loadFromPost;

  
})()