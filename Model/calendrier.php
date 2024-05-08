<?php

class Calendrier extends DateTime
{
   protected $year;
   protected $monthNumber;
   protected $weekDaysv=[

 'Monday','Tuesday','Wednesday','Thirsday','Friday','Saturday','Sunday'
   ];
   protected $weeks =[];
   



   /**
    * Get the value of year
    */ 
   public function getYear()
   {
      return $this->year;
   }

   /**
    * Set the value of year
    *
    * @return  self
    */ 
   public function setYear($year)
   {
      $this->year = $year;

      return $this;
   }

   /**
    * Get the value of monthNumber
    */ 
   public function getMonthNumber()
   {
      return $this->monthNumber;
   }

   /**
    * Set the value of monthNumber
    *
    * @return  self
    */ 
   public function setMonthNumber($monthNumber)
   {
      $this->monthNumber = $monthNumber;

      return $this;
   }

   /**
    * Get the value of weeks
    */ 
   public function getWeeks()
   {
      return $this->weeks;
   }

   /**
    * Set the value of weeks
    *
    * @return  self
    */ 
   public function setWeeks($weeks)
   {
      $this->weeks = $weeks;

      return $this;
   }
   public function create()
   {
$date= $this->setDate($this->getYear(),$this->getMonthNumber(),1);
$daysInMonth=$date->format('t');
var_dump($daysInMonth);
die;
   }
}
?>