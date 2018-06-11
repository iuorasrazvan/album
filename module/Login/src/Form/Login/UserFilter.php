<?php
	
	namespace Login\Form\Login;
	
	use Zend\InputFilter\InputFilter;  
	
	

	
	class UserFilter extends InputFilter   {
		
		protected $inputFilter;

		/**
		 * Retrieve input filter
		 *
		 * @return InputFilter
		 */
		public function getInputFilter()
		{
			if (! $this->inputFilter) {
				// Create a new input filter
				$this->inputFilter = new InputFilter();

				// Merge our inputFilter in for the email property
				$this->inputFilter->merge(new UsernameFilter());

				// Merge our inputFilter in for the name property
				$this->inputFilter->merge(new PasswordFilter());
				
			
			}

			return $this->inputFilter;
		}

		/**
		 * Set input filter
		 *
		 * @param  InputFilterInterface $inputFilter
		 * @return SimplePerson
		 */
		public function setInputFilter(InputFilterInterface $inputFilter)
		{
			$this->inputFilter = $inputFilter;

			return $this;
		}
	
		
	}