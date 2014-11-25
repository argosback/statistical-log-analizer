<?php
/*
    File        : HtmlMessenger.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class HtmlMessenger implements IMessenger
{	
	private $view;

	public function __construct(IView $view)
	{
		$this->view = $view; 
	}

  	public function say($message)
  	{
  		//trigger_error($message, E_USER_ERROR);
  		
  // 		echo	'<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		// 		<html>
		// 		<head>
		// 		  <meta charset="utf-8">
		// 		  <meta http-equiv="Expires" content="0" />
  //   			  <meta http-equiv="Pragma" content="no-cache" />
		// 		  <title>Message</title>
		// 		</head>
		// 		<body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
		// 			<div style="text-align: center; background-color: rgb(255, 204, 204);">
		// 				<big><big><big>
		// 					<span style="color: rgb(204, 0, 0);">'.$message.'</span>
		// 				</big></big></big>
		// 				<br>
		// 				<form method="post" action="index.php" name="go_back_form">
		// 					<big><big>
		// 				  		<input 
		// 				  			style="background-color: rgb(255, 102, 102); color: black;" 
		// 				  			onclick="history.back();" 
		// 				  			name="go_back" value="'.GO_BACK.'" 
		// 				  			type="button"
		// 				  		>
		// 				  		<br>
		// 					</big></big>
		// 			</form>
		// 			</div>
		// 		</body>
		// 		</html>';
		// exit();


		//error_reporting(0);
      	//user_error($error, E_USER_ERROR);
  		$this->view->setInData($message);
  		$this->view->display();
  		exit();
  	}
}

?>