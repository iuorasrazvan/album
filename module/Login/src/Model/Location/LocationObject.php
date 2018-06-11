<?php 

namespace Login\Model\Location;  

class LocationObject {
	
	
	public $CityField=[
		'city'=>'Cluj Napoca',
	
	];  
	
	public $CountryFieldset=[
		'country'=>'Romania',
		'continent'=>'Europe', 
	
	]; 
	
	
	public function getArrayCopy ()  {
		
		return array ($this->CityField['city'], $this->CountryFieldset['country'], $this->CountryFieldset['continent']);  
	}
	
	public function exchangeArray ($data)  {
		
		$this->CityField['city']=isset($data['CityField']['city'])? $data['CityField']['city'] : null;  
		$this->CountryFieldset['country'] =isset($data['CountryFieldset']['country'])? $data['CountryFieldset']['country'] : null;  
		$this->CountryFieldset['continent']=isset($data['CountryFieldset']['continent'])? $data['CountryFieldset']['continent'] : null;  
	}
	
	
}