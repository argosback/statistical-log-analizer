<?php
/*
    File        : StatisticalCalculator.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class StatisticalCalculator
{	
  //the sample is a array
  private $sample;

  /*FOR PROPERTIES*/
  public function __get($name)
  {
      if (method_exists($this, ($method = 'get'.ucfirst($name))))
      {
        return $this->$method();
      }
      else return;
  }
  
  public function __set($name, $value)
  {
      if (method_exists($this, ($method = 'set'.ucfirst($name))))
      {
        $this->$method($value);
      }
  }
  /*FOR PROPERTIES*/
  
  public function getData()
  {
      return $this->sample;
  }
  
  public function setData($sample)
  {
      $this->sample = $sample;
      return $this;
  }

  public function sortSample()
  {
      sort($sample);
      return implode(", ", $sample);
  }

	public function calculateMean()
	{
      return array_sum($this->sample)/count($this->sample);
	}

  public function calculateMedian()
  {
      sort($this->sample);   
      $amount = count($this->sample);
      $medianPosition = ($amount + 1) / 2;
      $median = $amount % 2 != 0 ? 
                  $this->sample[$medianPosition - 1] : 
                    ($this->sample[$medianPosition - 1] + 
                      $this->sample[$medianPosition]) / 2;
      return $median;
  }

  public function calculateMode()
  {
      $count = array_count_values($this->sample);
      arsort($count);
      return key($count);
  }

}

?>