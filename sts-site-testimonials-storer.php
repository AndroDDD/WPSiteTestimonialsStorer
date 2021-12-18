<?php

/**
 * Plugin Name: Site Reviews Storer
 * Description: Handle storing reviews for site
 * Version: 1.0.0
 * Author: Andre Durham
 * Author URI: https://imaginative-accumulation.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: srs-site-reviews-storer
 * Domain Path: /languages
 */

// Define Site Url Rewriter Plugin Class if not defined
if (!class_exists('SRS_Site_Reviews_Storer_Plugin')) {

    /**
     * SUR_Site_URL_Rewriter_Plugin class.
     *
     * @since 1.0.0
     */
    class SRS_Site_Reviews_Storer_Plugin
    {
        // Define constructor for site url rewriter class
        public function __construct()
        {
            // Activate the plugin.
            register_activation_hook(__FILE__, array(self::class, 'srs_site_reviews_storer_activate'));

            // Deactivation hook.
            register_deactivation_hook(__FILE__, array(self::class, 'srs_site_reviews_storer_deactivate'));

            // Register plugin callback function for init action hook
            add_action('init', array(self::class, 'srs_init_hook_cb'));
        }

        /**
         * Define activation function for site reviews storer plugin
         *
         * @since 1.0.0
         *
         * @see SRS_Site_Reviews_Storer_Plugin
         */
        public static function srs_site_reviews_storer_activate()
        {
        }

        /**
         * Define deactivation function for site reviews storer plugin
         *
         * @since 1.0.0
         *
         * @see SRS_Site_Reviews_Storer_Plugin
         */
        public static function srs_site_reviews_storer_deactivate()
        {
        }

        /**
         * Define function to setup site reviews storer plugin for init hook
         *
         * @since 1.0.0
         *
         * @see SRS_Site_Reviews_Storer_Plugin
         */
        public static function srs_init_hook_cb()
        {
            $srs_site_review_labels = array(
                'name' => __('Reviews', 'srs-site-reviews-storer'),
                'singular_name' => __('Review', 'srs-site-reviews-storer'),
            );

            $srs_site_reviews_url_rewrite_settings = array(
                'slug' => 'reviews'
            );

            register_post_type(
                'srs_site_review',
                array(
                    'labels' => $srs_site_review_labels,
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => $srs_site_reviews_url_rewrite_settings,
                )
            );
        }
    };

    $SRS_Site_Reviews_Storer_Object = new SRS_Site_Reviews_Storer_Plugin();
}
