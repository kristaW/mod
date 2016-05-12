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
class BlueAcorn_Contacts_Block_Adminhtml_Contacts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Initialize banner edit page. Set management buttons
     *
     */
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_contacts';
        $this->_blockGroup = 'blueacorn_contacts';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('blueacorn_contacts')->__('Save Contact'));
        $this->_updateButton('delete', 'label', Mage::helper('blueacorn_contacts')->__('Delete Contact'));

        $this->_addButton('save_and_edit_button', array(
            'label'   => Mage::helper('blueacorn_contacts')->__('Save and Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class'   => 'save'
        ), 100
        );
        $this->_formScripts[] = 'function saveAndContinueEdit() {
            editForm.submit($(\'edit_form\').action + \'back/edit/\');}';
    }

    /**
     * Get current loaded banner ID
     *
     */
    public function getContactsId()
    {
        return Mage::registry('current_contacts')->getId();
    }

    /**
     * Get header text for banenr edit page
     *
     */
    public function getHeaderText()
    {
        if (Mage::registry('current_contacts')->getId()) {
            return $this->escapeHtml(Mage::registry('current_contacts')->getName());
        } else {
            return Mage::helper('blueacorn_contacts')->__('New Contact');
        }
    }

    /**
     * Get form action URL
     *
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('*/*/save');
    }
}
