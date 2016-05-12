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
class BlueAcorn_Contacts_Block_Adminhtml_Contacts extends Mage_Adminhtml_Block_Widget_Grid_Container {

    /**
     * Initialize banners manage page
     *
     * @return void
     */
    public function __construct()
    {
        $this->_controller = 'adminhtml_contacts';
        $this->_blockGroup = 'blueacorn_contacts';
        $this->_headerText = Mage::helper('blueacorn_contacts')->__('Manage Contacts Requests');
        
        parent::__construct();
    }
}
