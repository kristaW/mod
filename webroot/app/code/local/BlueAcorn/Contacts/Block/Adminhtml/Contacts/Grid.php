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
class BlueAcorn_Contacts_Block_Adminhtml_Contacts_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    protected function _construct() {
        parent::_construct();
        $this->setId('contactGrid');
        $this->setDefaultSort('contact_id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
        $this->setVarNameFilter('contact_filter');
    }

    /**
     * Instantiate and prepare collection
     *
     * @return Enterprise_Banner_Block_Adminhtml_Banner_Grid
     */
    protected function _prepareCollection() {
        $collection = Mage::getResourceModel('blueacorn_contacts/contacts_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Define grid columns
     */
    protected function _prepareColumns() {

        $this->addColumn('contact_id',
            array(
                'header'=> Mage::helper('blueacorn_contacts')->__('ID'),
                'width' => 1,
                'type'  => 'number',
                'index' => 'contact_id',
            ));
        $this->addColumn('date', array(
            'header' => Mage::helper('blueacorn_contacts')->__('Date'),
            'type'   => 'datetime',
            'index'  => 'added_at',
            'width'   => 300,
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('blueacorn_contacts')->__('Contact Name'),
            'type'   => 'text',
            'index'  => 'name',
            'escape' => true,
            'width'   => 250,
        ));

        $this->addColumn('phone', array(
            'header'  => Mage::helper('blueacorn_contacts')->__('Phone'),
            'type'    => 'text',
            'index'   => 'phone',
            'width'   => 250,
//            'filter'  => false, // TODO implement
        ));

        $this->addColumn('message', array(
            'header' => Mage::helper('blueacorn_contacts')->__('Message'),
            'type'   => 'text',
            'index'  => 'message',
            'escape' => true
        ));

        return parent::_prepareColumns();
    }

    /**
     * Grid row URL getter
     */
    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getContactId()));
    }

    /**
     * Define row click callback
     */
    public function getGridUrl() {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}