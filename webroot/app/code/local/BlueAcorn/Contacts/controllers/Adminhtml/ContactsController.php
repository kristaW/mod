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
class BlueAcorn_Contacts_Adminhtml_ContactsController extends Mage_Adminhtml_Controller_Action {

    /**
     * @param string $idFieldName
     * @return false|Mage_Core_Model_Abstract
     */
    protected function _initContact($idFieldName = 'contact_id') {
        $this->_title($this->__('CMS'))->_title($this->__('Contacts'));

        $id = (int)$this->getRequest()->getParam($idFieldName);
        $model = Mage::getModel('blueacorn_contacts/contacts');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('current_contacts')) {
            Mage::register('current_contacts', $model);
        }
        return $model;
    }

    /**
     *
     */
    public function indexAction() {
        $this->loadLayout();
        $this->_setActiveMenu('customer/blueacorn_contacts');
        $this->renderLayout();
    }

    /**
     *
     */
    public function editAction() {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_initContact('id');

        if (!$model->getId() && $id) {
            Mage::getSingleton('adminhtml/session')->addError(
                Mage::helper('enterprise_banner')->__('This banner no longer exists.')
            );
            $this->_redirect('*/*/');
            return;
        }

        $this->_title($model->getId() ? $model->getName() : $this->__('New Contact'));

        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (!empty($data)) {
            $model->addData($data);
        }

        $this->loadLayout();
        $this->_setActiveMenu('customer/blueacorn_contacts');
        $breadcrumbMessage = $id ? Mage::helper('blueacorn_contacts')->__('Edit Contact')
            : Mage::helper('blueacorn_contacts')->__('New Contact');
        $this->_addBreadcrumb($breadcrumbMessage, $breadcrumbMessage)
            ->renderLayout();
    }

    /**
     * Save action
     */
    public function saveAction() {
        $redirectBack = $this->getRequest()->getParam('back', false);
        if ($data = $this->getRequest()->getPost()) {

            $id = $this->getRequest()->getParam('id');
            $model = $this->_initContact();
            if (!$model->getId() && $id) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('blueacorn_contacts')->__('This contact no longer exists.')
                );
                $this->_redirect('*/*/');
                return;
            }

            //Filter disallowed data
            $currentStores = array_keys(Mage::app()->getStores(true));
            if (isset($data['store_contents_not_use'])) {
                $data['store_contents_not_use'] = array_intersect($data['store_contents_not_use'], $currentStores);
            }
            if (isset($data['store_contents'])) {
                $data['store_contents'] = array_intersect_key($data['store_contents'], array_flip($currentStores));
            }

            if (!isset($data['customer_segment_ids'])) {
                $data['customer_segment_ids'] = array();
            }

            // save model
            try {
                if (!empty($data)) {
                    $model->addData($data);
                    Mage::getSingleton('adminhtml/session')->setFormData($data);
                }
                $model->save();
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('blueacorn_contacts')->__('The contact has been saved.')
                );
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                $redirectBack = true;
            } catch (Exception $e) {
                $this->_getSession()->addError(Mage::helper('blueacorn_contacts')->__('Unable to save the contact.'));
                $redirectBack = true;
                Mage::logException($e);
            }
            if ($redirectBack) {
                $this->_redirect('*/*/edit', array('id' => $model->getId()));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    /**
     * Delete action
     */
    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                // init model and delete
                $model = Mage::getModel('blueacorn_contacts/contacts');
                $model->load($id);
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('blueacorn_contacts')->__('The contact has been deleted.')
                );
                // go to grid
                $this->_redirect('*/*/');
                return;
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addError(
                    Mage::helper('blueacorn_contacts')->__('An error occurred while deleting contact data. Please review log and try again.')
                );
                Mage::logException($e);
                // save data in session
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                // redirect to edit form
                $this->_redirect('*/*/edit', array('id' => $id));
                return;
            }
        }
        // display error message
        Mage::getSingleton('adminhtml/session')->addError(
            Mage::helper('blueacorn_contacts')->__('Unable to find a contact to delete.')
        );
        // go to grid
        $this->_redirect('*/*/');
    }
}