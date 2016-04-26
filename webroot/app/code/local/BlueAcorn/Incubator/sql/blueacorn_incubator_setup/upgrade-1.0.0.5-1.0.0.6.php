
<?php

$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$installer->startSetup();

// --- ATTRIBUTE GROUP BEGIN ---
$entityTypeId   = $installer->getEntityTypeId('catalog_product');
$defaultSetId   = $installer->getDefaultAttributeSetId( $entityTypeId );
$defaultGroupId = $installer->getDefaultAttributeGroupId( $entityTypeId, $defaultSetId );
// --- ATTRIBUTE GROUP END ---

// --- ATTRIBUTE BEGIN ---

$_attribute_data = array(
    'user_defined' => true
    ,'attribute_code' => 'product_warranty_11'
    ,'label' => 'Has Product Warranty'
    ,'input' => 'boolean'
    ,'type' => 'int'
    ,'source' => 'eav/entity_attribute_source_boolean'
    ,'used_in_product_listing' => true
    ,'required' => false
    ,'global' => true
    ,'visible_on_front' => true
    ,'position' => 0
    ,'searchable' => true
    ,'comparable' => 0
);

$attributeModel = Mage::getModel('catalog/resource_eav_attribute');
$attributeModel->addData($_attribute_data);
$attributeModel->setEntityTypeId(Mage::getModel('eav/entity')->setType('catalog_product')->getTypeId());

// --- ATTRIBUTE END ---

$installer->addAttribute(
    $entityTypeId,
    $_attribute_data['attribute_code'],
    $_attribute_data
);

$installer->addAttributeToGroup(
    $entityTypeId,
    $defaultSetId,
    $defaultGroupId,
    $_attribute_data['attribute_code']
);