<?php
//	header("Content-Type: text/html; charset=utf-8");
	include_once 'house.php';
	
	class Street {
		public $nameStreet;
		public $lengthStreet;
		public $coordsOfBegin = array ('x' => 0, 'y' => 0);
		public $coordsOfEnd  =  array ('x' => 0, 'y' => 0);
		public $houses;
		public $houseCount;
		const NORMA = 800;
		
		public function __construct($nameStreet, $lengthStreet, $coordsOfBegin, $coordsOfEnd, $houseCount){
			$this->nameStreet = $nameStreet;
			$this->lengthStreet = $lengthStreet;
			$this->coordsOfBegin = $coordsOfBegin;
			$this->coordsOfEnd = $coordsOfEnd;
			$this->houseCount = $houseCount;
			for ($i=0; $i < $this->houseCount; $i++){
				$this->houses[$i] = new House($i+1, rand(1,5), rand(1,9), rand(2,5), rand(50,1000));
			}
		}
		
		public function getTotalAreaTerr(){
			$sum=0;
			for ($i=0; $i < $this->houseCount; $i++){
				$sum += $this->houses[$i] ->areaTerr;
			}
			return $sum;
		}
		
		public function getCleaner(){
			return round($this->getTotalAreaTerr() /$this::NORMA); 
		}
		
		public function getTotalStreetBill(){
			$sumTotal=0;
			for ($i=0; $i < $this->houseCount; $i++){
				$sumTotal += $this->houses[$i] ->getTotalBill();
				}
			return $sumTotal;	
		}
		
		public function getTotalStreetTax(){
			$sumTotal=0;
			for ($i=0; $i < $this->houseCount; $i++){
				$sumTotal += $this->houses[$i] ->getTaxBill();
				}
			return $sumTotal;	
		}
		
		
		public function getStreetInfo() {
			echo "<br><br>Информация о улице<br><br>" ;
			echo "Название улицы - " .$this->nameStreet."<br>";
         	echo "Количество домов - " .$this->houseCount."<br>";
         	echo "Длина улицы - ".$this->lengthStreet." км<br>";
           	echo "Начальные координаты улицы - ".$this->coordsOfBegin['x']."&nbsp;&nbsp;&nbsp;".$this->coordsOfBegin['y']."<br>";
          	echo "Конечные координаты улицы - ". $this->coordsOfEnd['x']."&nbsp;&nbsp;&nbsp;".$this->coordsOfEnd['y']."<br>";
			echo "Общая площадь прилегающей территории - ".$this->getTotalAreaTerr()."<br>";
			echo "Количество дворников - ".$this->getCleaner()."<br>";
			echo "Коммунальные платежи со всех домов - ".$this->getTotalStreetBill()."  грн<br>";
			echo "Общий налог на землю - ".$this->getTotalStreetTax()."  грн<br>";
		} 
	
		 public function showHouses(){
                echo"<pre>"; 
                 print_r($this->houses);
                echo"</pre>";  
          
  
         }
	}
?>
