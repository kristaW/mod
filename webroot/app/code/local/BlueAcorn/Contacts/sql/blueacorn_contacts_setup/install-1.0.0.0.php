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

$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('blueacorn_contacts/contacts'))
    ->addColumn('contact_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Contact ID')
    ->addColumn('reply_to', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
    ), 'Reply To')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
    ), 'Name')
    ->addColumn('phone', Varien_Db_Ddl_Table::TYPE_VARCHAR, 13, array(
        'nullable'  => true,
    ), 'Phone number')
    ->addColumn('message', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        'nullable'  => false,
    ), 'Message')
    ->addColumn('added_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ), 'Datetime');

$installer->getConnection()->createTable($table);

$installer->endSetup();