<?php
/**
 * @package     BlueAcorn\Incubator
 * @version
 * @author      Blue Acorn, Inc. <code@blueacorn.com>
 * @copyright   Copyright © ${YEAR} Blue Acorn, Inc.
 */

$homePage = Mage::getModel('cms/page')->load('home');
$content = $homePage->getContent();

$str = "<h1>My FM Made Me Do This!</h1>";

$content  .= "\r\n".$str;

$homePage->setContent($content)->save();