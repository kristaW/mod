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
class BlueAcorn_Contacts_Block_Adminhtml_Contacts_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Initialize banner edit page tabs
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('contact_info_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('blueacorn_contacts')->__('Contact Information'));
    }
}