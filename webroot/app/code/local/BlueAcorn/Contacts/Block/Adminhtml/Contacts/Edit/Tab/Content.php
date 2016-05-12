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
class BlueAcorn_Contacts_Block_Adminhtml_Contacts_Edit_Tab_Content extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Prepare content for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('blueacorn_contacts')->__('Content');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->getTabLabel();
    }

    /**
     * Returns status flag about this tab can be showen or not
     *
     * @return true
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare Banners Content Tab form, define Editor settings
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $contact = Mage::registry('current_contacts');
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('contact_content_');

        $fieldsetHtmlClass = 'fieldset-wide';

        $model = Mage::registry('current_contacts');

        Mage::dispatchEvent('adminhtml_contacts_edit_tab_content_before_prepare_form',
            array('model' => $model, 'form' => $form)
        );

        // add default content fieldset
        $fieldset = $form->addFieldset('default_fieldset', array(
            'legend'       => Mage::helper('blueacorn_contacts')->__('Default Content'),
            'class'        => $fieldsetHtmlClass,
        ));

        $fieldset->addField('date', 'date', array(
            'name'      => 'added_at',
            'readonly'  => true,
            'label'     => Mage::helper('blueacorn_contacts')->__('Date'),
            'value'     => $contact->getAdded_at(),
            'format'    => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM)
        ));

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('blueacorn_contacts')->__('Name'),
            'required'  => true,
            'value'     => $contact->getName()
        ));

        $fieldset->addField('email', 'text', array(
            'name'      => 'email',
            'label'     => Mage::helper('blueacorn_contacts')->__('Email'),
            'required'  => true,
            'value'     => $contact->getReply_to()
        ));

        $fieldset->addField('phone', 'text', array(
            'name'      => 'phone',
            'label'     => Mage::helper('blueacorn_contacts')->__('Phone'),
            'value'     => $contact->getPhone()
        ));

        $fieldset->addField('message', 'editor', array(
            'name'      => 'message',
            'label'     => Mage::helper('blueacorn_contacts')->__('Message'),
            'required'  => true,
            'value'     => $contact->getMessage()
        ));


        $this->setForm($form);
        return parent::_prepareForm();
    }
}