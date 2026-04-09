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

    // Menopause page schema
    if (is_page('reflexology-for-menopause')) {
        $service = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Reflexology for Menopause',
            'description' => 'Specialist menopause reflexology in Berkhamsted, Hertfordshire. Advanced techniques targeting the endocrine system to support women through perimenopause and menopause.',
            'provider' => array(
                '@type' => 'HealthAndBeautyBusiness',
                'name' => 'Berkhamsted Reflexology',
                'url' => 'https://berkhamstedreflexology.com',
            ),
            'areaServed' => array(
                '@type' => 'City',
                'name' => 'Berkhamsted',
            ),
            'serviceType' => 'Menopause Reflexology',
        );

        echo '<script type="application/ld+json">' . json_encode($service, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";

        $meno_faq = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array(
                array(
                    '@type' => 'Question',
                    'name' => 'Can reflexology help with hot flushes?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Many women experience a reduction in both the frequency and intensity of hot flushes after regular reflexology. The treatment works by supporting the endocrine system to rebalance hormone levels naturally.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'How many reflexology sessions do I need for menopause symptoms?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'An initial course of 4-6 weekly sessions is typically recommended, followed by maintenance every 2-4 weeks. However, many women notice benefits after just one or two treatments.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'Is reflexology safe alongside HRT?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Yes. Reflexology is non-invasive and has no known side effects. It works alongside any HRT or medication you may be taking. It is a complementary therapy, not a replacement for medical treatment.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'Do I need a GP referral for reflexology?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'No referral is needed. You can book directly with Jenny at Berkhamsted Reflexology. She is happy to work alongside your GP or other healthcare providers.',
                    ),
                ),
            ),
        );

        echo '<script type="application/ld+json">' . json_encode($meno_faq, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }

    // Pregnancy page schema
    if (is_page('reflexology-for-pregnancy')) {
        $service = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Reflexology for Pregnancy',
            'description' => 'Gentle, specialist pregnancy reflexology in Berkhamsted, Hertfordshire. Safe, nurturing treatments to support you through every trimester and beyond.',
            'provider' => array(
                '@type' => 'HealthAndBeautyBusiness',
                'name' => 'Berkhamsted Reflexology',
                'url' => 'https://berkhamstedreflexology.com',
            ),
            'areaServed' => array(
                '@type' => 'City',
                'name' => 'Berkhamsted',
            ),
            'serviceType' => 'Pregnancy Reflexology',
        );

        echo '<script type="application/ld+json">' . json_encode($service, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";

        $pregnancy_faq = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array(
                array(
                    '@type' => 'Question',
                    'name' => 'Is reflexology safe during pregnancy?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Yes. Reflexology is a gentle, non-invasive therapy that is safe throughout pregnancy when performed by a qualified practitioner. Jenny is trained in maternity reflexology and adapts treatments for each trimester.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'When can I start having reflexology during pregnancy?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'You can have reflexology at any stage of pregnancy. Many women find it particularly beneficial from the second trimester onwards for managing symptoms like swollen ankles, back pain and sleep difficulties.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'Can reflexology help with pregnancy symptoms like morning sickness?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Many women experience relief from common pregnancy symptoms including nausea, fatigue, back pain, swollen ankles and sleep disruption through regular reflexology treatments.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'Can reflexology help prepare for labour?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Yes. Priming reflexology in the final weeks of pregnancy can help prepare your body for labour. Many women find it helps them feel calmer and more ready for birth.',
                    ),
                ),
            ),
        );

        echo '<script type="application/ld+json">' . json_encode($pregnancy_faq, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }

    // Anxiety page schema
    if (is_page('reflexology-for-anxiety')) {
        $service = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Reflexology for Anxiety & Stress',
            'description' => 'Calming reflexology treatments in Berkhamsted, Hertfordshire, to ease anxiety, quiet an overactive mind and restore a sense of balance.',
            'provider' => array(
                '@type' => 'HealthAndBeautyBusiness',
                'name' => 'Berkhamsted Reflexology',
                'url' => 'https://berkhamstedreflexology.com',
            ),
            'areaServed' => array(
                '@type' => 'City',
                'name' => 'Berkhamsted',
            ),
            'serviceType' => 'Anxiety & Stress Reflexology',
        );

        echo '<script type="application/ld+json">' . json_encode($service, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";

        $anxiety_faq = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array(
                array(
                    '@type' => 'Question',
                    'name' => 'Can reflexology help with anxiety?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Yes. Reflexology activates the parasympathetic nervous system, helping to calm the body\'s stress response. Many people experience reduced anxiety, better sleep and an improved sense of wellbeing after treatment.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'How does reflexology reduce stress?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Reflexology works on specific reflex points linked to the nervous system, adrenal glands and areas holding tension. This helps lower cortisol levels, slow heart rate and bring the body back into balance.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'How many reflexology sessions do I need for anxiety?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Many people feel calmer after just one session. For ongoing anxiety, a course of 4-6 weekly sessions is often recommended, followed by regular maintenance treatments.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'Is reflexology a replacement for therapy or medication?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'No. Reflexology is a complementary therapy that works alongside medical treatment, not instead of it. Jenny is happy to work with your GP or mental health professional.',
                    ),
                ),
            ),
        );

        echo '<script type="application/ld+json">' . json_encode($anxiety_faq, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}
add_action('wp_head', 'berkhamsted_reflexology_schema');

/**
 * Add Services dropdown to navigation menu
 * Injects a Services parent item with submenu linking to service pages
 */
function berkhamsted_add_services_dropdown($items, $args) {
    // Only modify the primary menu
    if ($args->theme_location !== 'primary' && $args->theme_location !== 'menu-1') {
        // Try to match by menu container or common theme locations
        if (strpos($args->menu_class, 'primary') === false && 
            strpos($args->menu_class, 'main') === false &&
            strpos($args->container_class, 'primary') === false) {
            return $items;
        }
    }

    // Build the Services dropdown HTML
    $services_menu = '
    <li class="menu-item menu-item-has-children berkhamsted-services-dropdown">
        <a href="#">Services</a>
        <ul class="sub-menu">
            <li class="menu-item"><a href="/reflexology-for-menopause/">Menopause</a></li>
            <li class="menu-item"><a href="/reflexology-for-pregnancy/">Pregnancy</a></li>
            <li class="menu-item"><a href="/reflexology-for-anxiety/">Anxiety & Stress</a></li>
        </ul>
    </li>';

    // Find where to insert (after HOME)
    // Look for the first </li> and insert after it
    $first_item_end = strpos($items, '</li>');
    if ($first_item_end !== false) {
        $items = substr($items, 0, $first_item_end + 5) . $services_menu . substr($items, $first_item_end + 5);
    } else {
        // Fallback: prepend
        $items = $services_menu . $items;
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'berkhamsted_add_services_dropdown', 10, 2);

/**
 * Add custom functions below this line
 * ========================================
 */

/**
 * Scroll-triggered fade-in animations
 * Uses IntersectionObserver for smooth section reveals
 */
function berkhamsted_scroll_animations() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // Also make child widgets visible
                    var widgets = entry.target.querySelectorAll('.elementor-widget');
                    widgets.forEach(function(widget) {
                        widget.classList.add('is-visible');
                    });
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe all sections
        document.querySelectorAll('.elementor-section').forEach(function(section) {
            observer.observe(section);
        });

        // Make above-fold content visible immediately
        var firstSections = document.querySelectorAll('.elementor-section');
        for (var i = 0; i < Math.min(2, firstSections.length); i++) {
            firstSections[i].classList.add('is-visible');
            firstSections[i].querySelectorAll('.elementor-widget').forEach(function(w) {
                w.classList.add('is-visible');
            });
        }
    });
    </script>
    <?php
}
add_action('wp_footer', 'berkhamsted_scroll_animations');
