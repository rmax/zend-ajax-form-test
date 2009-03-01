<?php

/**
 * TODO: short description.
 * 
 * @author    Rolando Espinoza La fuente (rho@prosoftpeople.com)
 * @copyright Copyright (c) 2008-2009 Pro Soft Resources Inc. (http://www.prosoftpeople.com)
 * @package   
 * @category  
 * @license   $License$
 */
class Form_Test extends Zend_Form
{
    /**
     * TODO: short description.
     * 
     * @return TODO
     */
    public function init()
    {
        $var = $this->addElement('text', 'var', array(
            'required' => true,
            'label' => 'Value',
            'description' => 'any value allowed',
            ));

        $submit = $this->addElement('submit', 'submit', array(
            'ignore' => true,
            'label' => 'Send',
            ));
    }
}
