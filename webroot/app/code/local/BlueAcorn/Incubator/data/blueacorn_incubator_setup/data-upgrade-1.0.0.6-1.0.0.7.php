<?php
$data = array(
    'name'          => 'Free Shipping to South Carolina',
    'identifier'    => 'shipping-to-south-carolina',
    'content'       => '<p>Free Shipping to South Carolina</p>',
    'is_enabled'     => 1,
    'is_ga_enabled' => 0,
    'store_contents' => array('<p>Free Shipping to South Carolina</p>')
);

$banner = Mage::getModel('enterprise_banner/banner')->setData($data)->save();
$id = $banner->getId();

$parameters = array(
    'display_mode' => 'fixed'
    ,'banner_ids' => $id
);

$_widget_data = array(
    'type' => 'enterprise_banner/widget_banner'
    ,'title' => 'Free Shipping to South Carolina'
    ,'package_theme' => 'rwd/enterprise'
    ,'store_ids' => "1,2,3"
    ,'page_groups' => array(
        array(
            'page_group' => 'all_pages'
            ,'all_pages' => array (
                'page_id'       => null
                ,'group'         => 'all_pages'
                ,'for'           => 'all'
                ,'layout_handle' => 'default'
                ,'block'         => 'footer.before'
                ,'template'      => 'banner/widget/block.phtml'
            )
        )
    )
    ,'widget_parameters' => serialize($parameters)
);

$instance = Mage::getModel('widget/widget_instance')->setData($_widget_data)->save();