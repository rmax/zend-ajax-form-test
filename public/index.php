<?php
/**
 * TODO: Description
 *
 * @category    
 * @package     
 * @author      Rolando Espinoza La fuente (rho@prosoftpeople.com)
 * @copyright   Copyright (c) 2008-2009 Pro Soft Resources USA Inc. (http://www.prosoftpeople.com)
 * @license     $License$
 * @version     $Id$
 */

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

set_include_path(implode(PATH_SEPARATOR, array(
    APPLICATION_PATH . '/../library',
    get_include_path(),
    )));

require_once 'Zend/Loader.php';

Zend_Loader::registerAutoload();

$front = Zend_Controller_Front::getInstance();

Zend_Layout::startMvc();

$front->throwExceptions(true);

$front->run(APPLICATION_PATH . '/controllers');
