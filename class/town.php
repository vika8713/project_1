<?php
namespace TownProject;
	//header("Content-Type: text/html; charset=utf-8");
	include_once 'street.php';
	include_once 'house.php';
	include_once 'flat.php';
	
	
	class Town {
		public $nameTown;
		public $creationYear;
		public $geoCoord;
		public $arrSreet; 
		public $streetCount;
		
		public function __construct(){
			$this->nameTown = $nameTown= array_rand(array("Хацапетовка", "Харьков", "Мерчик", "Лесное"));
			$this->creationYear = $creationYear= rand(1970, 1999);
			$this->geoCoord = $geoCoord = array ('x' => rand(100,10000)*0.01, 'y' => rand(100,10000)*0.01);
			$this->streetCount = $streetCount = rand(1, 6);
			$streetsnames = array("Петрова", "Иванова", "Гагарина", "Пушкинская", "Сумская", "Солнечная");
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
			echo "Количество улиц - ".$this->streetCount."<br>";
          	echo "Географические координаты - ".$this->geoCoord['x']."&nbsp;&nbsp;&nbsp;".$this->geoCoord['y']."<br>";
          	echo "Бюджет - ". $this->getBudget()."<br>";
		  	echo "Население - ". $this->getPopulation()."<br>";
			foreach ($this->arrSreet as $key=>$value){
				$this->arrSreet[$key]->getStreetInfo();
			}
		}
		
		public function getJSON(){
			$arr = array("nameTown"=>$this->nameTown,"creationYear"=>$this->creationYear, "geoCoord"=>$this->geoCoord,"budget"=>$this->getBudget(),"population"=>$this->getPopulation());
			return json_encode($arr);
		}
	}
	
?>