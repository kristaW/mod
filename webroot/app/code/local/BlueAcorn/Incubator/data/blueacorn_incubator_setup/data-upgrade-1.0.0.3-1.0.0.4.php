<?php
/**
 * @package     BlueAcorn\Incubator
 * @version
 * @author      Blue Acorn, Inc. <code@blueacorn.com>
 * @copyright   Copyright © ${YEAR} Blue Acorn, Inc.
 */

// Update the Footer Static Block to remove the About Us link.
$footerBlock    = Mage::getModel('cms/block')->load('footer_links_company');
$content = str_replace(
    '<li><a href="{{store url=""}}about-magento-demo-store/">About Us</a></li>',
    '',
    $footerBlock->getContent()
);

$footerBlock->setContent( $content )->save();