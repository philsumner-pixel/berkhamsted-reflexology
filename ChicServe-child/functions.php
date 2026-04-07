<?php
/**
 * ChicServe Child Theme - Berkhamsted Reflexology
 *
 * Functions and definitions for the child theme.
 * Add your custom PHP functions below.
 */

// Enqueue parent and child theme styles
function chicserve_child_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style(
        'chicserve-parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Child theme stylesheet (loads after parent)
    wp_enqueue_style(
        'chicserve-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('chicserve-parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'chicserve_child_enqueue_styles');

/**
 * Schema.org structured data for local business (AI search optimization)
 * Outputs JSON-LD in the <head> for better visibility in Google AI Overviews
 */
function berkhamsted_reflexology_schema() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'HealthAndBeautyBusiness',
            'name' => 'Berkhamsted Reflexology',
            'description' => 'Private reflexology clinic in Berkhamsted, Hertfordshire, specialising in women\'s health, menopause support, and holistic wellbeing.',
            'url' => 'https://berkhamstedreflexology.com',
            'telephone' => '', // Add phone number
            'address' => array(
                '@type' => 'PostalAddress',
                'addressLocality' => 'Berkhamsted',
                'addressRegion' => 'Hertfordshire',
                'addressCountry' => 'GB',
            ),
            'geo' => array(
                '@type' => 'GeoCoordinates',
                'latitude' => '', // Add latitude
                'longitude' => '', // Add longitude
            ),
            'openingHoursSpecification' => array(), // Add opening hours
            'priceRange' => '££',
            'image' => '', // Add main image URL
            'sameAs' => array(
                'https://www.instagram.com/berkhamstedreflexology/',
                'https://www.facebook.com/berkhamstedreflexology/',
            ),
            'hasOfferCatalog' => array(
                '@type' => 'OfferCatalog',
                'name' => 'Reflexology Services',
                'itemListElement' => array(
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => 'Reflexology',
                            'description' => 'Bespoke reflexology treatments tailored to individual needs.',
                        ),
                    ),
                ),
            ),
        );

        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}
add_action('wp_head', 'berkhamsted_reflexology_schema');

/**
 * Add custom functions below this line
 * ========================================
 */
