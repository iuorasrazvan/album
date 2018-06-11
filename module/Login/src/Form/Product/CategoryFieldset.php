<?php  

namespace Login\Form\Product;

use Login\Model\Product\Category;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class CategoryFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('category');

        $this->setHydrator(new ClassMethodsHydrator(false));
        $this->setObject(new Category());

        $this->setLabel('Category');

        $this->add([
            'name' => 'name',
            'options' => [
                'label' => 'Name of the category',
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