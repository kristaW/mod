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
class BlueAcorn_Contacts_Model_Contacts extends Mage_Core_Model_Abstract {

    protected function _construct() {
         $this->_init('blueacorn_contacts/contacts');
    }

    /**
     * @param Varien_Event_Observer $observer
     * @return $this
     * @throws Exception
     */
    public function post(Varien_Event_Observer $observer) {

        $postObject = new Varien_Object();
        $postObject->setData($_POST);

        //Magento's timestamp function makes a usage of timezone and converts it to timestamp
        $currentTime = Mage::getModel('core/date')->date('Y-d-m H:m:s');

        $this->setName($_POST['name']);
        $this->setMessage($_POST['comment']);
        $this->setPhone($_POST['telephone']);
        $this->setReplyTo($_POST['email']);
        $this->setAddedAt($currentTime);

        $this->save();

        return $this;
    }
}