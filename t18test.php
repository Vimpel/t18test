<?php   
if (!defined('_PS_VERSION_'))
  exit;
class T18Test extends Module {
	public function __construct() {
	    $this->name = 't18test';
	    $this->tab = 'administration';
	    $this->version = '0.0.1';
	    $this->author = 'Vimpel';
	    $this->need_instance = 0;
	    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_); 
	    $this->bootstrap = true;
	 
	    parent::__construct();
	 
	    $this->displayName = $this->l('T18 test module');
	    $this->description = $this->l('T18 first test module.');
	 
	    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
	 
	    // if (!Configuration::get('t18test'))      
	    //   $this->warning = $this->l('No name provided');
  	}
}