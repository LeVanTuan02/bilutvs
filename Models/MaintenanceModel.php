<?php

class MaintenanceModel extends BaseModel {
    const TABLE_NAME = 'website';
    public function isWebsiteClosed() {
        $query = "SELECT * FROM " . self::TABLE_NAME;
        if ($this->query_one($query)['status']) {
            return false;
        }
        return true;
    }
}

?>