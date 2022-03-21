<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


$basic_options_container = Container::make( 'theme_options', __( 'Basic Options' ) )
    ->add_fields( array(
        Field::make( 'text', 'crb_facebook_url' ),
        Field::make( 'textarea', 'crb_footer_text' ),
    ) );

// Add second options page under 'Basic Options'
$basic_options_container_support = Container::make( 'theme_options', __( 'Support' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_tab( __( 'Frequently asked questions' ), array(
        Field::make( 'checkbox', 'crb_show_content-1', __( 'Hidden All' ) )
            ->set_option_value( 'yes' ),
        Field::make('text', 'crb_show_content-title-1', __( 'Title' ) ),
        Field::make( 'complex', 'crb_places', 'Список' )
            ->add_fields(array(
                Field::make( 'text', 'support__text-faq', __( 'Question' ) ),
                Field::make( 'complex', 'support__text-faq_sub', 'Answers' )
                    ->add_fields( array(
                        Field::make( 'text', 'support__fragment-text', 'Item' ),
                    ) )
                ))
    ) )
    ->add_tab( __( 'Smart Teddy ' ), array(
        Field::make( 'checkbox', 'crb_show_content-2', __( 'Hidden All' ) )
            ->set_option_value( 'yes' ),
        Field::make('text', 'crb_show_content-title-2', __( 'Title' ) ),
        Field::make( 'complex', 'crb_places-2', 'Список' )
            ->add_fields( array(
                Field::make( 'text', 'support__text-faq', __( 'Question' ) ),
                Field::make( 'complex', 'support__text-faq_sub', 'Answers' )
                    ->add_fields( array(
                        Field::make( 'text', 'support__fragment-text', 'Item' ),
                    ) )
            ))
    ))
    ->add_tab( __( 'Payment and delivery' ), array(
        Field::make( 'checkbox', 'crb_show_content-3', __( 'Hidden All' ) )
            ->set_option_value( 'yes' ),
        Field::make('text', 'crb_show_content-title-3', __( 'Title' ) ),
        Field::make( 'complex', 'crb_places-3', 'Список' )
            ->add_fields( array(
                Field::make( 'text', 'support__text-faq', __( 'Question' ) ),
                Field::make( 'complex', 'support__text-faq_sub', 'Answers' )
                    ->add_fields( array(
                        Field::make( 'text', 'support__fragment-text', 'Item' ),
                    ) )
            ))
    ))
    ->add_tab( __( 'Technical questions' ), array(
        Field::make( 'checkbox', 'crb_show_content-4', __( 'Hidden All' ) )
            ->set_option_value( 'yes' ),
        Field::make('text', 'crb_show_content-title-4', __( 'Title' ) ),
        Field::make( 'complex', 'crb_places-4', 'Список' )
            ->add_fields( array(
                Field::make( 'text', 'support__text-faq', __( 'Question' ) ),
                Field::make( 'complex', 'support__text-faq_sub', 'Answers' )
                    ->add_fields( array(
                        Field::make( 'text', 'support__fragment-text', 'Item' ),
                    ) )
            ))
    ))
    ->add_tab( __( 'Contacts' ), array(
        Field::make('text', 'support__contacts-tel', __( 'Telephone' ) ),
        Field::make('text', 'support__contacts-tel-field', __( 'Telephone Field' ) )
            ->help_text('Enter the phone number in format: +79999999999'),
        Field::make('text', 'support__contacts-time', __( 'Working hours ' ) ),
        Field::make('text', 'support__contacts-email', __( 'E-mail' ) ),
    ));

