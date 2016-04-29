<?php
/**
 * @package     BlueAcorn\Incubator
 * @version
 * @author      Blue Acorn, Inc. <code@blueacorn.com>
 * @copyright   Copyright © ${YEAR} Blue Acorn, Inc.
 */

$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$installer->startSetup();

// --- ATTRIBUTE GROUP BEGIN ---
$entityTypeId   = $installer->getEntityTypeId('catalog_product');
$defaultSetId   = $installer->getDefaultAttributeSetId( $entityTypeId );
$defaultGroupId = $installer->getDefaultAttributeGroupId( $entityTypeId, $defaultSetId );
// --- ATTRIBUTE GROUP END ---

// --- ATTRIBUTE BEGIN ---

$attributeData = array(
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
$attributeModel->addData($attributeData);
$attributeModel->setEntityTypeId($entityTypeId);

// --- ATTRIBUTE END ---

$installer->addAttribute(
    $entityTypeId,
    $attributeData['attribute_code'],
    $attributeData
);

$installer->addAttributeToGroup(
    $entityTypeId,
    $defaultSetId,
    $defaultGroupId,
    $attributeData['attribute_code']
);