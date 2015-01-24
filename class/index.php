<?php
header("Content-Type: text/html; charset=utf-8");
include_once 'town.php';
include_once 'street.php';
include_once 'house.php';
include_once 'flat.php';

//Информация о квартире
$rooms=rand(1,5);
$squere=rand(30,100);
$floor=rand(1,16);
$people=rand(1,5);
$heating=rand(1,3);
$balcony=rand(0,3);  
  
  
$myobj = new Flat(100, 5, 6, 3, 1, 2);
$myobj = new Flat($squere, $rooms, $floor, $people,  $heating, $balcony);
$myobj->infoFlat();
$myobj->bill();
$myobj->billMonth();
$myobj->peopleDel(2);
$myobj->infoFlat(); 
$myobj->billMonth(); 
  
//Информация о доме  
  
$number	= 1;
$access	= 2;
$floorCom	= 3;
$flatCom	= 4;
$areaTerr	= 5;
$house1 = new House($number, $access,  $floorCom, $flatCom, $areaTerr);
$house1->getTotalBill();
$house1->getHouseInfo();
//$house1-> showFlats();

//Информация об улице
  
$nameStreet = "Иванова";
$lengthStreet = 3;
$coordsOfBegin = array ('x' => 255.77, 'y' => 50.78);
$coordsOfEnd = array ('x' => 355.77, 'y' => 51.78);
$houseCount = rand(5,20);
$myStr = new Street($nameStreet, $lengthStreet, $coordsOfBegin, $coordsOfEnd, $houseCount);
$myStr->getStreetInfo();
//$myStr->showHouses();

//Информация о городе
$nameTown = "Хацапетовка";
$creationYear = 1807;
$geoCoord =  array ('x' => rand(100,10000)*0.01, 'y' => rand(100,10000)*0.01);
$streetCount = 5;
$streetsnames = array("Петрова", "Иванова", "Гагарина", "Пушкинская", "Сумская", "Солнечная");
$myTown = new Town($nameTown, $creationYear, $geoCoord, $streetCount, $streetsnames);
$myTown	->getTownInfo();
	  
?>  