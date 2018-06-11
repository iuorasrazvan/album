<?php 

namespace Login\Form\Product;

use Login\Model\Product\Brand;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class BrandFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('brand');

        $this->setHydrator(new ClassMethodsHydrator(false));
        $this->setObject(new Brand());

        $this->add([
            'name' => 'name',
            'options' => [
                'label' => 'Name of the brand',
            ],
            'attributes' => [
                'required' => 'required',
            ],
        ]);

        $this->add([
            'name' => 'url',
            'type' => Element\Url::class,
            'options' => [
                'label' => 'Website of the brand',
            ],
            'attributes' => [
                'required' => 'required',
            ],
        ]);
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'name' => [
                'required' => true,
            ],
        ];
    }
}