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
class IndexController extends Zend_Controller_Action
{
    /**
     * TODO: short description.
     * 
     * @return TODO
     */
    public function indexAction()
    {
        $form = $this->getTestForm();

        $this->view->messages = $this->_helper->FlashMessenger->getMessages();
    }

    /**
     * TODO: short description.
     * 
     * @return TODO
     */
    public function testAjaxAction()
    {
        $form = $this->getTestForm();

        $request = $this->getRequest();

        $result = array();

        // verify form values
        if ($form->isValid($request->getPost())) {
            $result['success'] = true;
            $result['values'] = $form->getValues();
        } else {
            $result['success'] = false;
        }

        //only allow xhr request
        if ($request->isXmlHttpRequest()) {
            $this->_helper->json($result);
        } else {
            $this->_helper->FlashMessenger->addMessage(Zend_Json::encode($result));
            // redirect to index
            $this->_helper->redirector('index');
        }
    }

    /**
     * TODO: short description.
     * 
     * @return TODO
     */
    public function getTestForm()
    {
        //TODO: use form helper
        if (!isset($this->view->form)) {
            // bad practice, use getForm helper
            require_once APPLICATION_PATH . '/forms/Test.php';
            $this->view->form = new Form_Test(array(
                'id' => 'ajax-form',
                'action' => $this->view->url(array(
                    'action' => 'test-ajax',
                    )),
                'method' => 'post',
                ));
        }

        return $this->view->form;
    }
}
