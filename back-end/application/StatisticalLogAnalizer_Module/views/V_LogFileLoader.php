<?php
/*
    File        : V_LogFileLoader.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class V_LogFileLoader implements IView
{
    public function display()
    {
        $session = SessionFactory::create();
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(STATISTICAL_LOG_ANALIZER_HTML)
                ->whereIdIs('login-user')
                    ->insertNode($session->get('session-user-name'))
                ->whereIdIs('log-file-loader-form')
                	->removeAttribute('style="display: none;"'); 
        $dom->display();       
    }
}
?>