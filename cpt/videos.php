<?php

function cptui_register_my_cpts_videos()
{

    /**
     * Post Type: Videos.
     */

    $labels = [
        "name" => esc_html__("Videos", "_s"),
        "singular_name" => esc_html__("Video", "_s"),
        "menu_name" => esc_html__("Videos", "_s"),
        "all_items" => esc_html__("Todos os Videos", "_s"),
        "add_new" => esc_html__("Adicionar Novo", "_s"),
    ];

    $args = [
        "label" => esc_html__("Videos", "_s"),
        "labels" => $labels,
        "description" => "Videos para serem exibidos no site",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "videos", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-editor-video",
        "supports" => ["title", "editor", "thumbnail"],
        "taxonomies" => ["category"],
        "show_in_graphql" => false,
    ];

    register_post_type("videos", $args);
}

add_action('init', 'cptui_register_my_cpts_videos');


function register_custom_metabox()
{
    add_meta_box(
        'video_info_metabox', // Unique ID
        'Informações do video', // Box title
        'video_info_metabox_html', // Content callback, to be filled with the desired HTML
        'videos', // Post type
        'normal', // Context
        'default', // Priority

    );
}
add_action('add_meta_boxes', 'register_custom_metabox');

function video_info_metabox_html($post)
{
    $url_video = get_post_meta($post->ID, 'url_video', true);
    $tempo_video_min = get_post_meta($post->ID, 'tempo_video_min', true);

?>
    <style>
        .play-inputs input {
            background-color: #f9f9f9;
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .play-inputs label {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 8px;
            display: block;

        }
    </style>
    <div class="play-inputs">
        <label for="url_video">URL video:</label>
        <input type="url" id="url_video" name="url_video" value="<?php echo esc_attr($url_video); ?>" />
        <br>
        <label for="tempo_video_min">Tempo Vídeo em MIN:</label>
        <input type="number" id="tempo_video_min" name="tempo_video_min" value="<?php echo esc_attr($tempo_video_min); ?>" />
    </div>
<?php
}

function save_custom_metabox($post_id)
{
    if (array_key_exists('url_video', $_POST)) {
        update_post_meta(
            $post_id,
            'url_video',
            $_POST['url_video']
        );
    }
    if (array_key_exists('tempo_video_min', $_POST)) {
        update_post_meta(
            $post_id,
            'tempo_video_min',
            $_POST['tempo_video_min']
        );
    }
}
add_action('save_post', 'save_custom_metabox');
