
function custom_ajax_search() {
    $search_query = sanitize_text_field($_GET['search_query']);

    // Initialize an empty array to store matching post and page titles
    $results = array();

    // Search in posts and custom post types
    $post_query = new WP_Query(array(
        'post_type' => array('post', 'case_study_post', 'news_post', 'in_memoriam_post', 'resource_post'),
        's' => $search_query,
    ));

    if ($post_query->have_posts()) {
        while ($post_query->have_posts()) {
            $post_query->the_post();
            // Add post titles to results array
            $results[] = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
            );
        }
    }

    // Search in pages
    $page_query = new WP_Query(array(
        'post_type' => 'page',
        's' => $search_query,
    ));

    if ($page_query->have_posts()) {
        while ($page_query->have_posts()) {
            $page_query->the_post();
            // Add page titles to results array
            $results[] = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
            );
        }
    }

    // Reset post data
    wp_reset_postdata();
    

     // Search for the query in all content (posts and pages)
     $content_query = new WP_Query(array(
        's' => $search_query,
    ));

    if ($content_query->have_posts()) {
        while ($content_query->have_posts()) {
            $content_query->the_post();
            // Add post/page titles and URLs to results array
            $results[] = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
            );
        }
    }

    // Reset post data for the content query
    wp_reset_postdata();

    if (!empty($results)) {
        // Display results as list items
        echo '<ul>';
        foreach ($results as $result) {
            echo '<li><a href="' . esc_url($result['permalink']) . '">' . esc_html($result['title']) . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No results found.</p>';
    }

    wp_die();
}

add_action('wp_ajax_custom_ajax_search', 'custom_ajax_search');
add_action('wp_ajax_nopriv_custom_ajax_search', 'custom_ajax_search');

function enqueue_custom_scripts() {
    wp_enqueue_script('custom-ajax-search', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-ajax-search', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
