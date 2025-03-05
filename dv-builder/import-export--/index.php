<?php
function custom_export_data() {
    $export_data = array();

    // Export Posts
    $posts = get_posts(array('post_type' => 'post', 'posts_per_page' => -1));
    foreach ($posts as $post) {
        $export_data['posts'][] = array(
            'title'   => $post->post_title,
            'content' => $post->post_content,
            // Include custom fields if needed
            'custom_fields' => get_post_custom($post->ID),
        );
    }

    // Export Pages
    $pages = get_posts(array('post_type' => 'page', 'posts_per_page' => -1));
    foreach ($pages as $page) {
        $export_data['pages'][] = array(
            'title'   => $page->post_title,
            'content' => $page->post_content,
            // Include custom fields if needed
            'custom_fields' => get_post_custom($page->ID),
        );
    }

    // Export Menus
    $menus = wp_get_nav_menus();
    foreach ($menus as $menu) {
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $export_data['menus'][$menu->name] = $menu_items;
    }

    // Export Media
    $media_query = new WP_Query(array('post_type' => 'attachment', 'posts_per_page' => -1));
    $media = $media_query->posts;
    foreach ($media as $media_item) {
        $export_data['media'][] = array(
            'title' => $media_item->post_title,
            'url' => wp_get_attachment_url($media_item->ID),
            // Include more fields if needed
        );
    }

    $export_file = 'exported_data.json';
    file_put_contents($export_file, json_encode($export_data));

    header('Content-Description: File Transfer');
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename=' . $export_file);
    readfile($export_file);
    unlink($export_file);

    exit;
}

// Import functionality
function custom_import_data() {
    if (isset($_FILES['import_file']) && $_FILES['import_file']['error'] == 0) {
        $imported_data = json_decode(file_get_contents($_FILES['import_file']['tmp_name']), true);

        // Import Posts
        if (isset($imported_data['posts'])) {
            foreach ($imported_data['posts'] as $data) {
                $post_args = array(
                    'post_title'   => $data['title'],
                    'post_content' => $data['content'],
                    'post_status'  => 'publish',
                    'post_type'    => 'post',
                );

                $post_id = wp_insert_post($post_args);

                // Import custom fields if available
                if (isset($data['custom_fields'])) {
                    foreach ($data['custom_fields'] as $key => $value) {
                        update_post_meta($post_id, $key, $value[0]);
                    }
                }
            }
        }

        // Import Pages
        if (isset($imported_data['pages'])) {
            foreach ($imported_data['pages'] as $data) {
                $page_args = array(
                    'post_title'   => $data['title'],
                    'post_content' => $data['content'],
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                );

                $page_id = wp_insert_post($page_args);

                // Import custom fields if available
                if (isset($data['custom_fields'])) {
                    foreach ($data['custom_fields'] as $key => $value) {
                        update_post_meta($page_id, $key, $value[0]);
                    }
                }
            }
        }

        // Import Menus
        if (isset($imported_data['menus'])) {
            foreach ($imported_data['menus'] as $menu_name => $menu_items) {
                // Create a new menu
                $menu_id = wp_create_nav_menu($menu_name);

                // Add menu items
                foreach ($menu_items as $item) {
                    $item_data = array(
                        'menu-item-title' => $item['title'],
                        'menu-item-url' => $item['url'],
                        // Add more fields as needed
                    );
                    wp_update_nav_menu_item($menu_id, 0, $item_data);
                }
            }
        }

        // Import Media
        if (isset($imported_data['media'])) {
            foreach ($imported_data['media'] as $media_item) {
                $attachment = array(
                    'guid'           => $media_item['url'],
                    'post_title'     => $media_item['title'],
                    'post_content'   => '',
                    'post_status'    => 'inherit',
                    'post_mime_type' => 'image/jpeg', // Adjust MIME type as needed
                );

                $attachment_id = wp_insert_attachment($attachment, $media_item['url']);
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata($attachment_id, $media_item['url']);
                wp_update_attachment_metadata($attachment_id, $attachment_data);
            }
        }

        echo 'Import completed successfully.';
    } else {
        echo 'Error uploading file.';
    }

    exit;
}

// Add export and import actions
add_action('admin_menu', function () {
    add_menu_page('Custom Import/Export', 'Import/Export', 'manage_options', 'custom-import-export', 'custom_import_export_page');
});

// Display the main plugin page
function custom_import_export_page() {
    ?>
    <div class="wrap">
        <h2>Custom Import/Export</h2>
        <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="action" value="custom_export">
            <?php submit_button('Export Data'); ?>
        </form>

        <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="action" value="custom_import">
            <input type="file" name="import_file" accept=".json">
            <?php submit_button('Import Data'); ?>
        </form>
    </div>
    <?php
}

// Add custom actions for export and import
add_action('admin_post_custom_export', 'custom_export_data');
add_action('admin_post_custom_import', 'custom_import_data');