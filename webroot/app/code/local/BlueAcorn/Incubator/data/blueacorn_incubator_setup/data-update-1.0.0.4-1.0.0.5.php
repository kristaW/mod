<?php

$mage = Mage::getModel('cms/page')->load('home');
$data = $mage->getData();

$str = "<h1>My FM Made Me Do This!</h1>";

$data['content'] .= "\r\n".$str;

$mage->setData($data['content'])->save();