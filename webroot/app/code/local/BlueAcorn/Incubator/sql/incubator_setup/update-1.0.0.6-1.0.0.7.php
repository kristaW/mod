<?php

$_attribute_data = array(
    'is_user_defined' => 0
    ,'attribute_code' => 'product_warranty'
    ,'frontend_label' => 'Has Product Warranty'
    ,'frontend_input' => 'select'
    ,'backend_style' => 'boolean'
    ,'used_in_product_listing' => 1
    ,'is_required' => 0
    ,'is_global' => 1
    ,'is_visible' => 1
    ,'position' => 0
    ,'is_searchable' => 1
    ,'is_comparable' => 0
);

$model = Mage::getModel('catalog/resource_eav_attribute');

$_attribute_data['backend_type'] = $model->getBackendTypeByInput($_attribute_data['frontend_input']);
$model->getDefaultValueByInput($_attribute_data['frontend_input']);

$model->addData($_attribute_data);

$model->setEntityTypeId(Mage::getModel('eav/entity')->setType('catalog_product')->getTypeId());
$model->setIsUserDefined(1);

try {
    $model->save();
} catch (Exception $e) {
    echo '<p>Sorry, error occurred while trying to save the attribute. Error: '.$e->getMessage().'</p>';
}