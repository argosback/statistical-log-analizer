<?php
/*
    File        : V_SquidAnalizer.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_SquidAnalizer implements IView, IDataset
{
    private $data;

    public function setInData($data)
    {
        $this->data = $data;
    }

    public function display()
    {
        // $dom = DOMHandlerFactory::create();
        // $dom->setDocumentFromFile('front-end/html/hello/hello.html');

        //$dom->whereIdIs("message")->insertNode(date('r', $this->data[0][0]));


        // $dom->whereIdIs("message")->insertNode(date('Y-m-d H:m', $this->data[0][0]));
        // $dom->display();

        foreach ($this->data as $key => $datum) 
        {
            echo "dato---------------------------------------------<br>";
            //timedate
            echo "Fecha y Hora: ".date('Y-m-d H:m', $datum[0])."<br><br>";
            //duration-(ms):
            echo "duración de la transacción en caché (ms): ".$datum[1]."<br><br>";
            //client address:
            echo "dirección ip del cliente: ".$datum[2]."<br><br>";
            //result codes:
            echo "código de resultado de squid: ".$datum[3]."<br><br>";
            //bytes
            echo "cantidad de datos entregados al cliente: ".$datum[4]."<br><br>";
            //request method
            echo "método de solicitud: ".$datum[5]."<br><br>";
            //URL
            echo "url: ".$datum[6]."<br><br>";
            //rfc931
            echo "búsquedas ident para el cliente solicitante(rfc931): ".$datum[7]."<br><br>";            
            //hierarchy code
            echo "información de jerarquía: ".$datum[8]."<br><br>";
            //type
            echo "tipo de contenido del objeto: ".$datum[9]."<br><br>";
            echo "<br><br>";
        }
    }
}