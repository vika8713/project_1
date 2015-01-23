<?php
	//header("Content-Type: text/html; charset=utf-8");
	include_once 'street.php';
	include_once 'house.php';
	include_once 'flat.php';
	
	class Town {
		public $nameTown;
		public $creationYear;
		public $geoCoord  = array ('x' => 0, 'y' => 0);
		public $arrSreet;
		public $streetCount;
		
		public function __construct($nameTown, $creationYear, $geoCoord, $streetCount, $streetsnames){
			$this->nameTown = $nameTown;
			$this->creationYear = $creationYear;
			$this->geoCoord = $geoCoord;
			$this->streetCount = $streetCount;
			for ($i = 0; $i < $this->streetCount; $i++){
				$this->arrSreet[$i] = new Street($streetsnames[$i], rand(1,5), array ('x' => rand(100,10000)*0.01, 'y' => rand(500,10000)*0.01), array ('x' => rand(100,10000)*0.01, 'y' => rand(500,10000)*0.01), rand(5,20));
			}
		}
		
		public function getBudget(){
			$budget=0;
			for ($i = 0; $i < $this->streetCount; $i++){
			   for ($j = 0; $j < $this->arrSreet[$i]->houseCount; $j++){
			   		 $budget += $this->arrSreet[$i]->houses[$j]->getTaxBill();
			   }
			}
			return $budget;
		}
		
		public function getPopulation(){
			$population=0;
			for ($i = 0; $i < $this->streetCount; $i++){
			   for ($j = 0; $j < $this->arrSreet[$i]->houseCount; $j++){
			   		for ($k = 0; $k < $this->arrSreet[$i]->houses[$j]->getTotalFlats(); $k++)
			   			$population += $this->arrSreet[$i]->houses[$j]->arrFlat[$k]->people;
			   }
			}
			return $population;
		}
		
		public function getTownInfo(){
			echo "<br>Информация о городе<br><br>" ;
          	echo "Название города - " .$this->nameTown."<br>";
          	echo "Год основания - ".$this->creationYear."<br>";
          	echo "Географические координаты - ".$this->geoCoord['x']."&nbsp;&nbsp;&nbsp;".$this->geoCoord['y']."<br>";
          	echo "Бюджет - ". $this->getBudget()."<br>";
		  	echo "Население - ". $this->getPopulation()."<br>";
		}
	}
	
?>