<?php
/**
 * @package     BlueAcorn\Incubator
 * @version
 * @author      Blue Acorn, Inc. <code@blueacorn.com>
 * @copyright   Copyright © ${YEAR} Blue Acorn, Inc.
 */

$mage = Mage::getModel('cms/page')->load('reward-points');
$mage->delete();

