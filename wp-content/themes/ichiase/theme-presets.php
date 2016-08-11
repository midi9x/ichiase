<?php
// make sure to not include translations
$args['presets']['default'] = array(
    'title' => 'Default',
    'demo' => 'http://demo.mythemeshop.com/socialme/',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/default/thumb.jpg',
    'menus' => array( 'primary-menu' => 'Menu', 'footer-menu' => 'Menu' ),
    'options' => array( 'show_on_front' => 'posts' ),
);

$args['presets']['bloggingtips'] = array(
    'title' => 'BloggingTips',
    'demo' => 'http://demo.mythemeshop.com/socialme-bloggingtips/',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/bloggingtips/thumb.jpg',
    'menus' => array( 'primary-menu' => 'Menu', 'footer-menu' => 'Menu' ),
    'options' => array( 'show_on_front' => 'posts' ),
);

$args['presets']['food'] = array(
    'title' => 'Food',
    'demo' => 'http://demo.mythemeshop.com/socialme-food/',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/food/thumb.jpg',
    'menus' => array( 'primary-menu' => 'Menu' ),
    'options' => array( 'show_on_front' => 'posts' ),
);

$args['presets']['dating'] = array(
    'title' => 'Dating',
    'demo' => 'http://demo.mythemeshop.com/socialme-dating/',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/dating/thumb.jpg',
    'menus' => array( 'primary-menu' => 'Menu' ),
    'options' => array( 'show_on_front' => 'posts' ),
);

global $mts_presets;
$mts_presets = $args['presets'];