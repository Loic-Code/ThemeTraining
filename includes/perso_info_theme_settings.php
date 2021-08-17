<?php

function training_customize_register($wp_customize) 
{
	$wp_customize->add_section("vos_infos", array(
		"title" => __("Vos informations publique"),
		"priority" => 30,
	));
}

add_action("customize_register","training_customize_register");

function training_setting_customize_register($wp_customize) 
{
	$wp_customize->add_setting("Description", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));

    $wp_customize->add_setting("Adresse", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));

    $wp_customize->add_setting("Mail", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));

    $wp_customize->add_setting("Telephone", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));

    $wp_customize->add_setting("Horaire", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));

    $wp_customize->add_setting("Linkedin", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));

    $wp_customize->add_setting("Facebook", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));

    $wp_customize->add_setting("Twitter", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));

    $wp_customize->add_setting("Instagram", array(
		"default" => "À modifier dans la section apparence",
		"transport" => "postMessage",
	));
}

add_action("customize_register","training_setting_customize_register");


function training_controle_customize_register($wp_customize) 
{
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Description",
		array(
			"label" => __("Entrez votre déscription"),
            "section" => "vos_infos",
			"settings" => "Description",
			"type" => "textarea",
		)
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Adresse",
		array(
			"label" => __("Entrez votre adresse"),
            "section" => "vos_infos",
			"settings" => "Adresse",
			"type" => "text",
		)
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Mail",
		array(
			"label" => __("Entrez votre mail"),
            "section" => "vos_infos",
			"settings" => "Mail",
			"type" => "email",
		)
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Telephone",
		array(
			"label" => __("Entrez votre numéro de téléphone"),
            "section" => "vos_infos",
			"settings" => "Telephone",
			"type" => "tel",
		)
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Horaire",
		array(
			"label" => __("Entrez vos horaires d'ouverture"),
            "section" => "vos_infos",
			"settings" => "Horaire",
			"type" => "text",
		)
	));

    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Linkedin",
		array(
			"label" => __("Entrez le lien de votre compte linkedin"),
            "section" => "vos_infos",
			"settings" => "Linkedin",
			"type" => "text",
		)
	));
    
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Twitter",
		array(
			"label" => __("Entrez le lien de votre compte Twitter"),
            "section" => "vos_infos",
			"settings" => "Twitter",
			"type" => "text",
		)
	));

    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Facebook",
		array(
			"label" => __("Entrez le lien de votre compte Facebook"),
            "section" => "vos_infos",
			"settings" => "Facebook",
			"type" => "text",
		)
	));

    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"Instagram",
		array(
			"label" => __("Entrez le lien de votre compte Instagram"),
            "section" => "vos_infos",
			"settings" => "Instagram",
			"type" => "text",
		)
	));
}

add_action("customize_register","training_controle_customize_register");