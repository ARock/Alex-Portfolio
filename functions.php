<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)
require_once('library/custom-post-type.php'); // custom post type example

// Admin Functions (commented out by default)
require_once('library/admin.php');         // custom admin functions

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 274, 174, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size ('eriks-portfolio-thumb', 400, 174, true);
add_image_size('eriks-sketch-thumb', 1060, 9999, true);
/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar_right',
        'name' => 'Sidebar Right',
        'description' => 'The first (primary) sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
      'id' => 'sidebar_right_2',
      'name' => 'Sidebar Right 2',
      'description' => 'The third (third) sidebar.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    register_sidebar(array(
      'id' => 'sidebar_right_3',
      'name' => 'Sidebar Right 3',
      'description' => 'The third (third) sidebar.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    register_sidebar(array(
      'id' => 'sidebar_left',
      'name' => 'Sidebar Left',
      'description' => 'The second (secondary) sidebar.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    register_sidebar(array(
        'id' => 'sidebar2',
        'name' => 'Sidebar 2',
        'description' => 'The second (secondary) sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
        
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?>>
        <article id="comment-<?php comment_ID(); ?>" class="clearfix">
            <header class="comment-author vcard">
                <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
                <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
                <?php edit_comment_link(__('(Edit)'),'  ','') ?>
            </header>
            <?php if ($comment->comment_approved == '0') : ?>
                <div class="help">
                    <p><?php _e('Your comment is awaiting moderation.') ?></p>
                </div>
            <?php endif; ?>
            <section class="comment_content clearfix">
                <?php comment_text() ?>
            </section>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the Site..." />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!


// adds the colorbox jQuery code
function insert_colorbox_js() {
?>
    <script type="text/javascript">
    // <![CDATA[
    jQuery(document).ready(function($){
        $("a[rel='lightbox']").colorbox({
                transition:'elastic', 
                opacity:'0.7', 
                maxHeight:'90%'
        });
    });  
    // ]]>
    </script>
<?php
}
add_action( 'wp_head', 'insert_colorbox_js' );

// automatically add colorbox rel attributes to embedded images
function insert_colorbox_rel($content) {
    $pattern = '/<a(.*?)href="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?)>/i';
    $replacement = '<a$1href="$2.$3" rel=\'lightbox[page]\'$4>';
    $content = preg_replace( $pattern, $replacement, $content );
    return $content;
}
add_filter( 'the_content', 'insert_colorbox_rel' );

function testing() {
  echo 'Hello World!';
}

function get_user_role($uid) {
global $wpdb;
$role = $wpdb->get_var("SELECT meta_value FROM {$wpdb->usermeta} WHERE meta_key = 'wp_capabilities' AND user_id = {$uid}");
  if(!$role) return 'non-user';
$rarr = unserialize($role);
$roles = is_array($rarr) ? array_keys($rarr) : array('non-user');
return $roles[0];
}

/*modifying editor access level*/

function remove_dashboard_widgets(){ //remove unnecessary dashboards from dashboard
    if( !current_user_can( 'manage_options' ) ) { //check if admin
      global$wp_meta_boxes;
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
    }
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/*prevent editors from creating administrators*/
class JPB_User_Caps { 

  // Add our filters
  function JPB_User_Caps(){
    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
  }

  // Remove 'Administrator' from the list of roles if the current user is not an admin
  function editable_roles( $roles ){
    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
      unset( $roles['administrator']);
    }
    return $roles;
  }

  // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
  function map_meta_cap( $caps, $cap, $user_id, $args ){

    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
  }

}

$jpb_user_caps = new JPB_User_Caps();


function fb_custom_login_logo() {
    $style = '<style type="text/css"> h1 a { background: transparent url(' . get_bloginfo('template_directory') . '/library/images/bird.jpg) no-repeat center top !important; width: 232px; height: 249px; } </style>';
    echo $style;
}
add_action( 'login_head', 'fb_custom_login_logo' );

function fb_login_headerurl() {
    return home_url();
}
add_filter( 'login_headerurl', 'fb_login_headerurl' );


//function to redirect after logout
function logout_redirect765(){
  wp_redirect( home_url() ); 
  exit; 
}

function possibly_redirect(){
 global $pagenow;
 if( 'wp-login.php' == $pagenow ) {
 wp_redirect('wp-content/themes/destination-theme/login.php'); exit;
 }
}
//hook function  to wp_logout action
add_action('wp_logout','logout_redirect765');

function remove_menu_items() {
  global $menu;
  $restricted = array(__('Comments'), __('Plugins'), __('Tools'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
      unset($menu[key($menu)]);}
    }
  }

function give_user_edit() {
  if(current_user_can('editor')) {
    global $wp_roles;
    $wp_roles->add_cap('editor','edit_users' );
    $wp_roles->add_cap('editor','create_users' );
  }
}
 add_action('admin_init', 'give_user_edit', 10, 0);
 
function remove_some_wp_widgets(){
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_Meta');
}



if(current_user_can('editor')){
 add_action('admin_menu', 'remove_menu_items');
 add_action('widgets_init', 'remove_some_wp_widgets', 1);
}
 
$editor = current_user_can('administrator');
// $editor = false; 

$editor = current_user_can('editor');
// $editor = true; 

$editor = current_user_can('contributor');
// $editor = false; 

$editor = current_user_can('subscriber');
// $editor = false;
// Create the function to output the contents of our Dashboard Widget

function example_dashboard_widget_function() {
  // Display whatever it is you want to show
  require_once ('about.html');
} 

// Create the function use in the action hook

function example_add_dashboard_widgets() {
  wp_add_dashboard_widget('example_dashboard_widget', 'SchemersPress', 'example_dashboard_widget_function'); 
} 

// Hook into the 'wp_dashboard_setup' action to register our other functions

add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );



class social_media_widget extends WP_Widget {
  function social_media_widget() {
    parent::WP_Widget(false, 'Social Media Icons');
  }
function form($instance) {
  echo "Activate this widtget to enable social media icons.";
  }
function update($new_instance, $old_instance) {
    // processes widget options to be saved
    return $new_instance;
  }
function widget($args, $instance) {
    DISPLAY_ACURAX_ICONS();
  }
}
register_widget('social_media_widget');





?>
