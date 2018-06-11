<?php 

namespace Login\Form\Upload;  
use Zend\Form\Form;  
use Zend\Form\Element;  

use Zend\InputFilter\InputFilter; 
use Zend\InputFilter\FileInput;  
use Zend\InputFilter\Input;

class UploadForm  extends Form   {
	
	
	public function __construct ()   {
		
		parent::__construct ('upload');  
		
		
		$this->addElements ();
		
		$this->addInputFilter ();  
		
	}
	
	
	public function addElements ()  {
		
		$file = new Element\File('image_file');
        $file->setOptions ([
			'label'=>'Avatar Image Upload'
		]);
        $file->setAttribute('id', 'image-file');

        $this->add($file);
		
		$textEl=new Element\Text('text_el');  
		$textEl->setOptions([
			'label'=>'textEl'
		
		]);  
		
		
		$this->add($textEl); 
		
		$submit= new Element\Submit('upload');
		$submit->setAttributes ([
			'value'=>'upload', 
		]);

		
		$this->add($submit);  
		
	
		
		
		
	}
	
	
	public function addInputFilter()
    {

        // File Input
        $fileInput = new FileInput('image_file');
        $fileInput->setRequired(true);
        $fileInput->getFilterChain()->attachByName(
            'filerenameupload',
            [
                'target'    => './data/tmpuploads/avatar.jpg',
                'randomize' => true,
            ]
        );
		
		$textInput=new Input ('text_el');
		$textInput->setRequired (true);
		
		
	
		
		$inputFilter = new InputFilter();

        $inputFilter->add($fileInput);
		
		$inputFilter->add($textInput);  

        $this->setInputFilter($inputFilter);
    }
	
	
}