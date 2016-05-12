<?php
/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * @package     $BlueAcorn\Contacts
 * @author      Blue Acorn, Inc. <code@blueacorn.com>
 * @copyright   Copyright © 2016 Blue Acorn, Inc.
 */
class BlueAcorn_Contacts_Model_Resource_Contacts_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {

    protected function _construct() {
        $this->_init('blueacorn_contacts/contacts');
        $this->_map['fields']['contact_id'] = 'main_table.contact_id';
    }

    protected function _afterLoad() {
        parent::_afterLoad();

        return $this;
    }
}