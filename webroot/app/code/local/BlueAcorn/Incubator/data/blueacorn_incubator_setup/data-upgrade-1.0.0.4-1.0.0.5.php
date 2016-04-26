<?php

$mage = Mage::getModel('cms/page')->load('home');
$data = $mage->getContent();

$str = "<h1>My FM Made Me Do This!</h1>";

$data .= "\r\n".$str;

$mage->setContent($data)->save();