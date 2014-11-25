<?php
/*
    File        : ISession.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

interface ISession
{	
  public function start();
  public function set($key, $value);
  public function get($key);
  public function delete($key);
  public function encode();
  public function decode($data);
  public function destroy();
}


?>