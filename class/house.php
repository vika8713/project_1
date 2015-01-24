<?php

//header("Content-Type: text/html; charset=utf-8");
include_once 'flat.php';
 
class House {
      public $number;
      public $floorCom;
      public $sections;
      public $flatCom;
      public $areaTerr;
      public $arrFlat;
      const TAX_METER = 10;
	  const TAX_VATT = 30.2;
      
      
      public function __construct($number, $sections,  $floorCom, $flatCom, $areaTerr){
          $this->number = $number;
          $this->sections = $sections;
          $this->floorCom = $floorCom;
          $this->flatCom = $flatCom;
          $this->areaTerr = $areaTerr;
          for ($i = 1; $i <= $this->sections * $this->flatCom; $i++){
              for ($j = 1; $j <= $this->floorCom; $j++)
                 $this->arrFlat[] = new Flat(rand(30,100), rand(1,5), $j, rand(1,5), rand(1,3),rand(0,3)); 
      
           } 
      }
	 public function getTotalFlats() {
	  	return $this->floorCom * $this->sections * $this->flatCom;
	  } 
      
      public function getTotalBill() {
          $sumTotal = 0;
        for ($i = 1; $i <= $this->getTotalFlats(); $i++){
           $sumTotal += $this->arrFlat[$i-1]->billMonth();
        }
       return  $sumTotal; 
      }  
      
      public function getElectricBill(){
         return $electrBill = $this->floorCom * $this->sections * $this::TAX_VATT;
      }
      
       public function getTaxBill(){
          return $tax = $this->areaTerr * $this::TAX_METER;
      }
      
      public function getHouseInfo(){
          echo "<br>Информация о доме<br><br>" ;
          echo "Номер дома -" .$this->number."<br>";
          echo "Количество подъездов - ".$this->sections."<br>";
          echo "Количество этажей - ".$this->floorCom."<br>";
          echo "Количество квартир - ". $this->getTotalFlats()."<br>";
          echo "Площадь прилегающей территории - ".$this->areaTerr."<br>";
          echo "Счет по дому - ".$this->getTotalBill()."<br>";
          echo "Счет по электричеству - ".$this-> getElectricBill()."<br>";
          echo "Налог - ".$this-> getTaxBill()."<br>";
      }
	  
		public function showFlats(){
			echo"<pre>"; 
			print_r($this->arrFlat);
			echo"</pre>";  
		}
}
  
?>
