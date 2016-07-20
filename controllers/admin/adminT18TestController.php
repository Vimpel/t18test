<?php
class AdminT18TestController extends ModuleAdminController {
    public function __construct() {
        $this->bootstrap = true;
        $this->meta_title = $this->l('T18 test module');
        parent::__construct();
        if (! $this->module->active) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminHome'));
        }
    }
}