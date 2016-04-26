<?php
// Update the Footer Static Block to remove the About Us link.

$mage    = Mage::getModel('cms/block')->load('footer_links_company');
$content = str_replace(
    '<li><a href="{{store url=""}}about-magento-demo-store/">About Us</a></li>',
    '',
    $mage->getContent()
);

$mage->setContent( $content )->save();