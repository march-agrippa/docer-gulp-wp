<?php
add_theme_support('post-thumbnails');

/*-------------------------------------------*/
/*  いらないメタタグ消す
/*-------------------------------------------*/
// WordPressのバージョンを非表示にする
remove_action('wp_head', 'wp_generator');

// 前の文書と次の文書へのリンクを非表示にする
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// リモート投稿をする時に使うタグを非表示にする
remove_action('wp_head', 'rsd_link');

// リモート投稿をする時に使うタグを非表示にする
remove_action('wp_head', 'wlwmanifest_link');

// WordPressの投稿IDを使った短いURLを非表示にする
remove_action('wp_head', 'wp_shortlink_wp_head');

//簡単に引用表示に使うを非表示にするタグをを非表示にする
remove_action('wp_head','rest_output_link_wp_head');

//簡単に引用表示に使うを非表示にするタグをを非表示にする
 remove_action('wp_head','wp_oembed_add_discovery_links');

//絵文字用のコードを非表示にする
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles');

// ページネーション rel="index" 削除
remove_action('wp_head', 'index_rel_link');

//フィードタグ
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

//jquery読み込まない
// function my_delete_local_jquery() {
//     wp_deregister_script('jquery');
// }
// add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );

//本体の更新通知を非表示
add_filter("pre_site_transient_update_core", "__return_null");

//プラグインの更新通知を非表示
add_filter("pre_site_transient_update_plugins", "__return_null");

//テーマの更新通知を非表示
add_filter("pre_site_transient_update_themes", "__return_null");


/*-------------------------------------------*/
/*  画像サイズ
/*-------------------------------------------*/
function add_custom_image_sizes() {
    global $my_custom_image_sizes;
    $my_custom_image_sizes = array(
        /*
            'w410h300' => array(
            'name'       => 'w410h300', // 選択肢のラベル名
            'width'      => 410,    // 最大画像幅をpxで設定
            'height'     => 300,    // 最大画像高さをpxで設定
            'crop'       => true,  // 切り抜きを行うならtrue, 行わないならfalse
            'selectable' => true   // 選択肢に含めるならtrue, 含めないならfalse
        )
        */
    );
    foreach ( $my_custom_image_sizes as $slug => $size ) {
        add_image_size( $slug, $size['width'], $size['height'], $size['crop'] );
    }
}
add_action( 'after_setup_theme', 'add_custom_image_sizes' );

function add_custom_image_size_select( $size_names ) {
    global $my_custom_image_sizes;
    $custom_sizes = get_intermediate_image_sizes();
    foreach ( $custom_sizes as $custom_size ) {
        if ( isset( $my_custom_image_sizes[$custom_size]['selectable'] ) && $my_custom_image_sizes[$custom_size]['selectable'] ) {
            $size_names[$custom_size] = $my_custom_image_sizes[$custom_size]['name'];
        }
    }
    return $size_names;
}
add_filter( 'image_size_names_choose', 'add_custom_image_size_select' );

/*-------------------------------------------*/
//バージョンアップ通知を非表示にします。
/*-------------------------------------------*/

// ダッシュボードのWPバージョン更新メッセージ非表示
function update_nag_hide() {
    remove_action( 'admin_notices', 'update_nag', 3 );
    remove_action( 'admin_notices', 'maintenance_nag', 10 );
}
add_action( 'admin_init', 'update_nag_hide' );

// PHPバージョン警告消去(CSS)
function my_admin_style() {
  echo '<style>
  #dashboard_php_nag{display:none;}
  </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_admin_style');

// サイドメニュー更新バッジアイコン非表示
function remove_menus() {
remove_submenu_page('index.php','update-core.php');//ダッシュボード>更新
}
add_action('admin_menu','remove_menus');

/*-------------------------------------------*/
/* 　パーマリンク英語表示
/*-------------------------------------------*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

/*-------------------------------------------*/
/* 　カスタムフィールドもプレビューできるようにする
/*-------------------------------------------*/
function get_preview_id($postId) {
    global $post;
    $previewId = 0;
    if ( isset($_GET['preview'])
            && ($post->ID == $postId)
                && $_GET['preview'] == true
                    &&  ($postId == url_to_postid($_SERVER['REQUEST_URI']))
        ) {
        $preview = wp_get_post_autosave($postId);
        if ($preview != false) { $previewId = $preview->ID; }
    }
    return $previewId;
}

add_filter('get_post_metadata', function($meta_value, $post_id, $meta_key, $single) {
    if ($preview_id = get_preview_id($post_id)) {
        if ($post_id != $preview_id) {
            $meta_value = get_post_meta($preview_id, $meta_key, $single);
        }
    }
    return $meta_value;
}, 10, 4);
 
add_action('wp_insert_post', function ($postId) {
    global $wpdb;
    if (wp_is_post_revision($postId)) {
        if (count($_POST['fields']) != 0) {
            foreach ($_POST['fields'] as $key => $value) {
                $field = get_field($key);
                if ( !isset($field['name']) || !isset($field['key']) ) continue;
                if (count(get_metadata('post', $postId, $field['name'], $value)) != 0) {
                    update_metadata('post', $postId, $field['name'], $value);
                    update_metadata('post', $postId, "_" . $field['name'], $field['key']);
                } else {
                    add_metadata('post', $postId, $field['name'], $value);
                    add_metadata('post', $postId, "_" . $field['name'], $field['key']);
                }
            }
        }
        do_action('save_preview_postmeta', $postId);
    }
});

/*-------------------------------------------*/
/* 　カスタム投稿　ページネーション
/*-------------------------------------------*/
/*
add_action('pre_get_posts', function($query){
    if (!is_admin() && $query->is_main_query()){
        if (is_post_type_archive('news')){
             $query->set('posts_per_page',8);
        }
        if (is_post_type_archive('works')){
             $query->set('posts_per_page',8);
        }
    }
});
*/


/* ---------------------------------------------------------------------------
 TinyMCE Advanced 設定
--------------------------------------------------------------------------- */
function custom_editor_settings( $initArray ){
    $initArray['body_class'] = 'wysiwyg';
    $initArray['style_formats_merge'] = false;
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

//エディタ用CSSファイル追加
add_action('admin_init',function(){
    add_editor_style("editor-style.css");
});


/*-------------------------------------------*/
/* 　カスタム投稿タイプの記事編集画面にメタボックス（作成者変更）を表示する
/*-------------------------------------------*/
/* admin_menu アクションフックでカスタムボックスを定義 */
// add_action('admin_menu', 'myplugin_add_custom_box');

/* 投稿ページの "advanced" 画面にカスタムセクションを追加 */
/*
function myplugin_add_custom_box() {
  if( function_exists( 'add_meta_box' )) {
    add_meta_box( 'myplugin_sectionid', __( '作成者', 'myplugin_textdomain' ), 'post_author_meta_box', 'activity', 'advanced' );
   }
}
*/

/*-------------------------------------------*/
/* 　カスタム投稿タイプの記事一覧に投稿者の項目を追加する
/*-------------------------------------------*/
/*
function manage_books_columns ($columns) {
    global $post;
    if (get_post_type( $post ) == 'activity'){
        $columns = array();
        $columns["cb"] = '<input type="checkbox" />';
        $columns["title"] = 'タイトル';
        $columns["author"] = '作成者';
        //$columns["addcat"] = 'カテゴリー';
        $columns["date"] = '日付';
    }
    return $columns;
}
function add_books_column ($column, $post_id) {
    if ('author' == $column) {
        $value = get_the_term_list($post_id, 'author');
        echo attribute_escape($value);
    }
    if ('addcat' == $column) {
        echo get_the_term_list($id, 'article', '', ', ');
    }
}
add_filter('manage_posts_columns', 'manage_books_columns');
add_action('manage_posts_custom_column', 'add_books_column', 10, 2);
*/

/*-------------------------------------------*/
/* 　関連記事の調整
/*-------------------------------------------*/
add_filter( 'acf/fields/relationship/query', 'custom_acf_relationship_query', 10, 3 );
function custom_acf_relationship_query( $args, $field, $post_id ) {
  $args['orderby'] = 'post_date'; //投稿日付順
  $args['order'] = 'DESC'; //新しい順
  return $args;
}

/*-------------------------------------------*/
/* 　カテゴリーをチェックした時の位置を固定
/*-------------------------------------------*/

add_filter( 'wp_terms_checklist_args', 'ps_wp_terms_checklist_args' , 10, 2 );
function ps_wp_terms_checklist_args( $args, $post_id ){
    if ( $args['checked_ontop'] !== false ){
        $args['checked_ontop'] = false;
    }
    return $args;
}

/*-------------------------------------------*/
/* 　カテゴリーをラジオボタンに変更
/*-------------------------------------------*/
/*
function change_category_to_radio() {
?>
<script>
jQuery(function($) {
    // カテゴリーをラジオボタンに変更
    $('#taxonomy-opuscat input[type=checkbox]').each(function() {
        $(this).replaceWith($(this).clone().attr('type', 'radio'));
    });
    // 「新規カテゴリーを追加」を非表示
    $('#category-adder').hide();
    // 「よく使うもの」を非表示
    $('#category-tabs').hide();
});
</script>
<?php
}
add_action( 'admin_head-post-new.php', 'change_category_to_radio' );
add_action( 'admin_head-post.php', 'change_category_to_radio' );
*/

/*-------------------------------------------*/
/* 　【管理画面】ユーザー編集の名姓の項目を姓名の順に変更
/*-------------------------------------------*/
function lastfirst_name() {
    ?><script>
        jQuery(function($){
            $('#last_name').closest('tr').after($('#first_name').closest('tr'));
        });
    </script><?php
}
add_action( 'admin_footer-user-new.php', 'lastfirst_name' );
add_action( 'admin_footer-user-edit.php', 'lastfirst_name' );
add_action( 'admin_footer-profile.php', 'lastfirst_name' );

/*-------------------------------------------*/
/* 　【管理画面】ユーザー一覧の名前を姓名に変更(列の内部名の設定)
/*-------------------------------------------*/
function lastfirst_users_column( $columns ) {
    $new_columns = array();
    foreach ( $columns as $k => $v ) {
        if ( 'name' == $k ) $new_columns['lastfirst_name'] = $v;
        else $new_columns[$k] = $v;
    }
    return $new_columns;
}
add_filter( 'manage_users_columns', 'lastfirst_users_column' );

/*-------------------------------------------*/
/* 　【管理画面】ユーザー一覧の名前を姓名に変更(値の設定)
/*-------------------------------------------*/
function lastfirst_users_custom_column( $output, $column_name, $user_id ) {
    if ( 'lastfirst_name' == $column_name ) {
        $user = get_userdata($user_id);
        return $user->last_name . ' ' . $user->first_name;
    }
}
add_filter( 'manage_users_custom_column', 'lastfirst_users_custom_column', 10, 3 );

/*-------------------------------------------*/
/* 　【管理画面】ユーザー一覧の姓名のソート設定
/*-------------------------------------------*/
function lastfirst_users_sortable_column( $columns ) {
    $columns['lastfirst_name'] = 'lastfirst_name';
    return $columns;
}
add_filter( 'manage_users_sortable_columns', 'lastfirst_users_sortable_column' );

/*-------------------------------------------*/
/* 　【管理画面】ユーザー一覧の姓名のソート処理を追加
/*-------------------------------------------*/
function lastfirst_pre_user_query($query){
    global $wpdb;
    // 姓名
    if ( isset($query->query_vars['orderby']) && 'lastfirst_name' == $query->query_vars['orderby'] ) {
        $query->query_from .= " LEFT JOIN $wpdb->usermeta AS ln ON ($wpdb->users.ID = ln.user_id) AND ln.meta_key = 'last_name' ";
        $query->query_from .= " LEFT JOIN $wpdb->usermeta AS fn ON ($wpdb->users.ID = fn.user_id) AND fn.meta_key = 'first_name' ";
        $query->query_orderby = " ORDER BY CONCAT(ln.meta_value, fn.meta_value) " . ($query->query_vars["order"] == 'ASC' ? 'asc' : 'desc');
    }
    return $query;
}
add_filter( 'pre_user_query', 'lastfirst_pre_user_query' );








/*-------------------------------------------*/
/* 　【管理画面】メニューの表示・非表示
/*-------------------------------------------*/

/*
編集者：editor
投稿者：author
寄稿者：contributor
購読者：subscriber
*/
function remove_menus(){
        remove_menu_page( 'edit.php' ); //投稿メニュー
        remove_menu_page( 'edit-comments.php' ); //コメントメニュー

    if( current_user_can( 'editor' ) ){
        // remove_menu_page( 'index.php' ); //ダッシュボード
        // remove_menu_page( 'upload.php' ); //メディア
        // remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
        remove_menu_page( 'themes.php' ); //外観メニュー
        remove_menu_page( 'plugins.php' ); //プラグインメニュー
        remove_menu_page( 'tools.php' ); //ツールメニュー
        remove_menu_page( 'options-general.php' ); //設定メニュー
        remove_menu_page('edit.php?post_type=mw-wp-form');//MW WP Form
    }

    if( current_user_can( 'author' ) ){
        // remove_menu_page( 'index.php' ); //ダッシュボード
        // remove_menu_page( 'upload.php' ); //メディア
        remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
        remove_menu_page( 'themes.php' ); //外観メニュー
        remove_menu_page( 'plugins.php' ); //プラグインメニュー
        remove_menu_page( 'tools.php' ); //ツールメニュー
        remove_menu_page( 'options-general.php' ); //設定メニュー
        remove_menu_page('edit.php?post_type=mw-wp-form');//MW WP Form
    }
}
add_action( 'admin_menu', 'remove_menus' );


?>