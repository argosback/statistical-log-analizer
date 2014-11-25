<?php
/*
    File        : V_Logout.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_Logout implements IView
{
    public function display()
    {
        $session = SessionFactory::create();
        $session -> start();
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(LOGIN_HTML);
        $rand = md5(rand(1,100000));
        $session->set('randLogin', $rand);
        $dom->whereIdIs('public_key')->insertAttribute('value="'.$rand.'"');
        $dom->display();
    }
}