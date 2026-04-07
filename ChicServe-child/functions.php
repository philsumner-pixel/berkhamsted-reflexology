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
            'telephone' => '+447926987024',
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => '39 Hazel Road',
                'addressLocality' => 'Berkhamsted',
                'postalCode' => 'HP4 2JN',
                'addressRegion' => 'Hertfordshire',
                'addressCountry' => 'GB',
            ),
            'geo' => array(
                '@type' => 'GeoCoordinates',
                'latitude' => '51.7594',
                'longitude' => '-0.5617',
            ),
            'priceRange' => '££',
            'image' => 'https://berkhamstedreflexology.com/wp-content/uploads/2021/04/3PC2080A-scaled.jpeg',
            'founder' => array(
                '@type' => 'Person',
                'name' => 'Jenny Sumner',
                'jobTitle' => 'Reflexologist MAR',
            ),
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
                            'name' => 'Individual Reflexology Treatment',
                            'description' => 'Restorative reflexology session to boost energy, enhance sleep and support overall wellbeing.',
                        ),
                    ),
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => 'Bespoke Treatment Plan',
                            'description' => 'A cumulative reflexology programme tailored to support ongoing conditions or preventative health.',
                        ),
                    ),
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => 'Reflexology for Women\'s Health',
                            'description' => 'Specialist reflexology supporting women through menopause, hormonal changes and all life stages.',
                        ),
                    ),
                ),
            ),
        );

        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";

        // FAQ Schema - helps with AI Overviews and featured snippets
        $faq = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array(
                array(
                    '@type' => 'Question',
                    'name' => 'What is reflexology?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Reflexology is a complementary therapy that gently accesses all the systems of the body through the feet. Each foot has over 7,000 nerve endings linked to organs, nerves and glands. By working these reflex points, reflexology helps restore circulation, relieve tension and encourage the body\'s natural healing processes.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'Where is Berkhamsted Reflexology located?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Berkhamsted Reflexology is a private clinic at 39 Hazel Road, Berkhamsted, Hertfordshire, HP4 2JN. The clinic is run by Jenny Sumner, a qualified reflexologist and member of the Association of Reflexologists.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'Can reflexology help with menopause symptoms?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Yes. Jenny has completed advanced training in both Women\'s Health and Menopause reflexology under Hagar Basis and Sally Earlam. These specialist techniques are designed to support women through hormonal changes, hot flushes, sleep disruption and other menopause-related symptoms.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'How do I book a reflexology appointment in Berkhamsted?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'You can book online via the Berkhamsted Reflexology website or by calling Jenny directly on 07926 987024. You can also email jenny@berkhamstedreflexology.com.',
                    ),
                ),
            ),
        );

        echo '<script type="application/ld+json">' . json_encode($faq, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}
add_action('wp_head', 'berkhamsted_reflexology_schema');

/**
 * Add custom functions below this line
 * ========================================
 */
