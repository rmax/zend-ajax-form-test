<?php

/**
 * View_Helper_BaseUrl 
 * 
 * @category 
 * @package 
 * @subpackage 
 * @version $Id$
 * @copyright Copyright (c) 2008 Pro Soft Resources Inc., USA (http://www.prosoftpeople.com)
 * @author Rolando Espinoza La fuente <rho@prosoftpeople.com> 
 * @license All Rights Reserved
 */
class Zend_View_Helper_BaseUrl extends Zend_View_Helper_Abstract
{
    protected $_baseUrl = null;

    public function __construct()
    {
        if (null === $this->_baseUrl) {
            if (isset($this->view->baseUrl)) {
                $baseUrl = $this->view->baseUrl;
            } else {
                $baseUrl = Zend_Controller_Front::getInstance()->getBaseUrl();
            }

            $this->_baseUrl = rtrim($baseUrl, '/\\');
        }
    }

    public function baseUrl($path = null)
    {
        if (null === $path) {
            return $this->_baseUrl;
        } else {
            // remove trailing slashes
            $path = ltrim($path, '/\\');

            return "{$this->_baseUrl}/{$path}";
        }
    }
}
