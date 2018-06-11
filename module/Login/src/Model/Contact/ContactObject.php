<?php 

namespace Login\Model\Contact ;


class ContactObject {
	
	public $name;
    public $subject;
	public $message;  
	public $studyEl;
	
	
	public function getArrayCopy ()  {
		
		return array ($this->name, $this->subject, $this->message, $this->studyEl);   
		
	}
	
	
	public function exchangeArray (array $data)  {
		
		$this->name=isset($data['name'])? $data['name']: null;
		$this->subject=isset($data['subject'])? $data['subject']: null;
		$this->message=isset($data['message'])? $data['message']: null;
		$this->studyEl=isset($data['studyEl'])? $data['studyEl']: null;
		
		
	}
	
	
	
}