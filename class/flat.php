<?php
namespace TownProject;
  class Flat{
      public $squere;
      public $balcony;
      public $rooms;
      public $floor; 
      public $people;
      public $heating;
      
      public $coldWater;
      public $hotWater;
      public $garbage;
      public $heatBill;
      public $gasBill;
      public $rent;
      public $sumMonth;
      
      public function __construct($squere, $rooms, $floor, $people,  $heating, $balcony){
          $this -> squere =$squere;
          $this -> rooms = $rooms; 
          $this -> floor = $floor;
          $this -> people = $people;  
          $this -> balcony = $balcony;
          $this -> heating = $heating;
      }
      
      public function infoFlat(){
           //echo "Информация о квартире";
           //echo "</br>";
           //echo "</br>";
           echo "Площадь квартиры = ".$this->squere;
           echo "&nbsp;&nbsp;&nbsp;";
           echo "Количество комнат = ".$this->rooms;
           echo  "&nbsp;&nbsp;";
           echo "Этаж квартиры = ".$this->floor;
           echo  "&nbsp;&nbsp;";
           echo "Количество жильцов = ".$this->people;
           echo  "&nbsp;&nbsp;";
           echo "Тип отопления = ".$this->heating;
           echo  "&nbsp;&nbsp;";
           echo "Количество балконов= ".$this->balcony;
           echo "</br>";
      }
      
      public function bill(){
         $this -> coldWater =  $this -> people * 41.89;
         $this -> hotWater =  $this -> people * 72.69;
         
         switch($this -> heating){
             case 1:
                 $this -> heatBill =  $this -> squere * 9.58;
                 break;
             case 2:
                 $this -> heatBill =  $this -> squere * 5.2;
                 break;
             case 3:
                 $this -> heatBill =  $this -> squere * 19.5;
                 break;
             default:
                $this -> heatBill =  $this -> squere * 9.58;        
         }
         
         $this -> gasBill =  $this -> people * 12.73;
         $this -> rent =  $this -> squere * 2.52; 
         $this -> garbage =  $this -> people * 9.50;
      }
      
      // метод рассчитывает сумму месячного платежа за все коммунальные услуги за месяц;   
      public function billMonth(){ 
        //обращаемся к методу  bill
        $this->bill();
        return $this->sumMonth  = $this -> heatBill + $this -> rent + $this -> hotWater + $this -> coldWater + $this->gasBill + $this -> garbage;
       
      }
	  
	  public function showBill(){
	  		echo "Холодная вода = " .$this -> coldWater."<br>";
			echo "Горячая вода = " .$this -> hotWater."<br>";
			echo "Отопление = " .$this -> heatBill."<br>";
			echo "Газ = " .$this -> gasBill."<br>";
			echo "Кварплата = " .$this -> rent."<br>";
			echo "Вывоз мусора = " .$this -> garbage."<br>";
			echo "<br>Cумма месячного платежа за все коммунальные услуги за месяц = ". $this->sumMonth;
            echo "</br>";
	  }
	  
      
      public function peopleDel($del){
         if ($this -> people - $del < 0){  
            echo "</br>Количество людей $del нельзя удалить($del превышает количество жильцов)</br></br>" ;
         }else  {
             $this -> people = $this -> people - $del;
             echo "</br>Количество удаленных жильцов $del </br></br> ";
         }
      } 
      
       public function peoplePlus($plus){
             $this -> people = $this -> people + $plus;
             echo "</br>Количество добавленных жильцов $plus </br></br> ";
      }   
  }
  
?>
