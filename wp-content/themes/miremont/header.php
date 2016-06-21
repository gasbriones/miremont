<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Lotteri
 * @since Lotteri 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="keywords" content="">
    <meta name="format-detection" content="telephone=no">
    <!-- Facebook -->
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>"/>
    <meta property="og:url" content="<?php echo get_site_url() ?>"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:region" content="Buenos Aires"/>
    <meta property="og:country-name" content="Argentina"/>
    <!-- Links -->

    <link href="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/gridlex.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/hover-min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/mediaqueries.css" rel="stylesheet" type="text/css">


    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>


    <title><?php bloginfo('name'); ?> </title>
    <?php wp_head(); ?>
</head>

