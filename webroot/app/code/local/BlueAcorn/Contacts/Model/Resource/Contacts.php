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
class BlueAcorn_Contacts_Model_Resource_Contacts extends Mage_Core_Model_Resource_Db_Abstract {

    protected function _construct() {
        $this->_init('blueacorn_contacts/contacts', 'contact_id');
    }
}