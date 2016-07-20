<?php
if (!defined('_PS_VERSION_'))
  exit;
 
class T18Test extends Module {
    
    public function __construct()
    {
        $this->name = 't18test';
        $this->tab = 'administration';
        $this->version = '0.0.1';
        $this->author = 'Vimpel';
        $this->need_instance = 1; // 0 for disable warnings
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.6'); 
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('The T18 test module');
        $this->description = $this->l('This module is startup for other modules');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('t18test'))      
          $this->warning = $this->l('No name provided');
        
    }
  
    public function install() {
        $this->initAdminMenuItem ('add', 'AdminT18TestController', $this->displayName);
        if (!parent::install())
          return false;
        return true;
    }
    
    public function unistall() {
        $this->initAdminMenuItem('delete','AdminT18TestController');
        if (!parent::uninstall())
        return false;
        return true;
    }
    protected function initAdminMenuItem($action, $controllerName, $name) {
        if (empty($controllerName)) 
            return false;
        if (empty($name))
            $name = $this->displayName;
        switch ($action) {
            case 'add':
            default:
                $tab_admin_order_id = Tab::getIdFromClassName('AdminTools');
                $tab = new Tab();
                $tab->class_name = $controllerName;
                $tab->id_parent = $tab_admin_order_id;
                $tab->module = $this->name;
                $tab->name = $name;
                $tab->save();
                break;
            case 'delete':
                $tab_controller_main_id = TabCore::getIdFromClassName($controllerName);
		$tab_controller_main = new Tab($tab_controller_main_id);
		$tab_controller_main->delete();
                break;
        }
    }
}