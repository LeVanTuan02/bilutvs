<?php

class MaintenanceController extends BaseController {
    
    public function close() {
        $this->loadView('frontend.maintenance.index');
    }

    public function error() {
        $this->loadView('frontend.maintenance.error');
    }
}

?>