<?php
/**
 * Plugin Name: HempPassion
 * Plugin URI: http://hemppassion.com.uy
 * Description: Herramientas para el sitio del Grow Shop HempPassion.
 * Version: 1.0
 * Author: Lakhai
 * Author URI: https://lakhai.github.io
 * License:     GNU General Public License v2.0 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

 add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style( 'icofont', plugin_dir_url( __FILE__ ) . '/css/icofont.css' );
    wp_enqueue_style( 'weedalicious', plugin_dir_url( __FILE__ ) . '/css/weedalicious.css', [] );
    // wp_enqueue_script( 'namespaceformyscript', 'http://locationofscript.com/myscript.js', array( 'jquery' ) );
 });

// add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

add_filter( 'wc_add_to_cart_message', 'hp_custom_wc_add_to_cart_message', 10, 2 ); 
function hp_custom_wc_add_to_cart_message( $message, $product_id ) { 
    $message = sprintf(esc_html__('« %s » se agregó a tu carrito.','tm-organik'), get_the_title( $product_id ) ); 
    return $message; 
}
// Our hooked in function - $fields is passed via the filter!
// function custom_override_checkout_fields( $fields ) {
//     unset($fields['order']['order_comments']);
//     foreach($fields['billing'] as $index => $field) {
//         unset($fields['billing'][$index]);
//     }
    
//     return $fields;
// }

function hp_scrape_pictures_meta_box() {
    add_meta_box(
        'hp_scrape_pictures', // $id
        'Importar Fotos', // $title
        'hp_render_scrape_pictures_meta_box', // $callback
        'product', // $page
        'normal', // $context
        'high'
    ); // $priority
}
add_action('add_meta_boxes', 'hp_scrape_pictures_meta_box');

// Field Array
$prefix = 'hp_';
$custom_meta_fields = [[
    'label' => 'Link a tienda de españa',
    'desc'  => 'De este link se van a importar las fotos de producto.',
    'id'    => $prefix.'pictures_url',
    'type'  => 'text',
]];

// The Callback
function hp_render_scrape_pictures_meta_box() {
    global $custom_meta_fields, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="hp_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
            <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
            <td>';
            switch($field['type']) {
                case 'select':
                    echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
                    foreach ($field['options'] as $option) {
                        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
                    }
                    echo    '</select><br /><span class="description">'.$field['desc'].'</span>';
                    break;
                case 'text':
                    echo '<input class="form-control" type="text" name="'.$field['id'].'" id="'.$field['id'].'" placeholder="'.$field['label'].'" value="'.$meta.'" />';
                    break;
            } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

function hp_save_meta_fields( $post_id ) {
    global $prefix;
    // verify nonce
    if (!isset($_POST['hp_meta_box_nonce']) || !wp_verify_nonce($_POST['hp_meta_box_nonce'], basename(__FILE__)))
        return 'nonce not verified';
  
    // check autosave
    if ( wp_is_post_autosave( $post_id ) )
        return 'autosave';
  
    //check post revision
    if ( wp_is_post_revision( $post_id ) )
        return 'revision';
  
    // check permissions
    if ( 'product' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return 'cannot edit page';
        } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
            return 'cannot edit post';
    }

    $url = $_POST[$prefix.'pictures_url'];
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $html = curl_exec($ch);
    curl_close($ch);
    $dom = new DOMDocument;
    @$dom->loadHTML($html);
    $images_to_fetch = [];
    $attachments     = [];
    $description     = "";
    $links = $dom->getElementsByTagName('a');
    foreach ($links as $link) {
        if ($link->getAttribute('onclick') == "$$('.cloud-zoom-gallery').each(function(e,i){e.removeClassName('actived');});this.addClassName('actived')") {
            $images_to_fetch[] = $link->getAttribute('href');
        }
    }
    foreach(array_reverse($images_to_fetch) as $index => $image) {
        $isThumbnail = $index == 0 ? true : false;
        if ($isThumbnail)
            $attachments[] = uploadRemoteImageAndAttach($image, $post_id, true);
        else
            $attachments[] = uploadRemoteImageAndAttach($image, $post_id);
    }
    $description = $dom->getElementById('yt_tab_decription');
    if($description && isset($description->textContent) && $description->textContent != '') {
        wp_update_post([
            'ID' => $post_id,
            'post_content' => $description->textContent,
            'post_excerpt' => $description->textContent,
        ]);
    }
    update_post_meta($post_id, '_product_image_gallery', implode(',', $attachments));

    return $post_id;
}
add_action( 'save_post', 'hp_save_meta_fields' );
add_action( 'new_to_publish', 'hp_save_meta_fields' );

add_filter('woocommerce_checkout_fields','reorder_woo_fields');
function reorder_woo_fields($fields) {
    // $fields['billing']['billing_country'] = "Uruguay";
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);

    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_state']);

 
    // Add full width Classes and Clears to Adjustments
    $fields['billing']['billing_email'] = array(
		'label'     => __('Email', 'woocommerce'),
	    'required'  => false,
	    'class'     => array('form-row-wide'),
	    'clear'     => true
    );
    $fields['billing']['billing_first_name'] = array(
		'label'     => __('Tu Nombre', 'woocommerce'),
	    'required'  => true,
	    'class'     => array('form-row-wide'),
	    'clear'     => true
    );
    $fields['billing']['billing_last_name'] = array(
		'label'     => __('Tu Apellido', 'woocommerce'),
	    'required'  => true,
	    'class'     => array('form-row-wide'),
	    'clear'     => true
    );

    $fields['billing']['shipping_address_1'] = array(
		'label'     => __('Dirección de envío', 'woocommerce'),
	    'required'  => true,
	    'class'     => array('form-row-wide'),
	    'clear'     => true
    );
    $fields['billing']['shipping_city'] = array(
		'label'     => __('Ciudad', 'woocommerce'),
	    'required'  => true,
	    'class'     => array('form-row-wide'),
	    'clear'     => true
    );
    
    $fields['billing']['billing_phone'] = array(
		'label'     => __('Teléfono', 'woocommerce'),
	    'required'  => true,
	    'class'     => array('form-row-wide'),
	    'clear'     => true
    );
    $fields['order']['order_comments']['placeholder'] = 'Comentarios adicionales que nos quieras hacer llegar';

    return $fields;
}
add_action('admin_menu', 'test_plugin_setup_menu');
function test_plugin_setup_menu(){
    add_menu_page( 'Importar Productos', 'Hemp Passion', 'manage_options', 'hemp-passion', 'hp_importer' );
}

// function wc_billing_field_strings( $translated_text, $text, $domain ) {
//     if(is_checkout()) {
//         switch ( $translated_text ) {
//             case 'Billing details' :
//                 $translated_text = __( 'Información de Envío', 'woocommerce' );
//                 break;
//             case 'Additional information' :
//                 $translated_text = __( 'Información Adicional', 'woocommerce' );
//                 break;
//         }
//         return $translated_text;
//     }
//     return $text;
// }
// add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );

function hp_importer(){
    test_handle_post();
?>
    <h1>Importar Productos</h1>
    <h2>Subir un archivo para importar los productos que estan incluidos en ese archivo de importacion de productos. Chatumadre.</h2>
    <!-- Form to handle the upload - The enctype value here is very important -->
    <form  method="post" enctype="multipart/form-data">
        <input type='file' id='test_upload_csv' name='test_upload_csv'></input>
        <?php submit_button('Importar') ?>
    </form>
<?php
}

function test_handle_post(){
    // First check if the file appears on the _FILES array
    if(isset($_FILES['test_upload_csv'])) {
        require(plugin_dir_path( __FILE__ ) . '/includes/XLSXReader.php');
        $xlsx = new XLSXReader($_FILES['test_upload_csv']['tmp_name']);
        // $xlsx = new XLSXReader(plugin_dir_path( __FILE__ ) . '/lista.xlsx');
        $sheetNames = $xlsx->getSheetNames();
    
        clearWoocommerce();
    
        $categories = [];
        foreach($sheetNames as $sheetName) {
            $sheet = $xlsx->getSheet($sheetName);
            ?>
            <h3><?php echo escape($sheetName); ?></h3>
            <?php
            array2Table($sheet->getData());
        }
    }
}

function dd($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function array2Table($data) {
    echo '<table>';
    $categories = [];
    $current_category = '';
	foreach($data as $index => $row) {
        if($index > 24) {
            if(detectRow($row) == 'category') {
                $categories[$row[2]] = ['products' => []];
                $current_category = $row[2];
            } elseif(detectRow($row) == 'product') {
                $categories[$current_category]['products'][] = $row;
            }

            echo "<tr>";
            foreach($row as $cell) {
                echo "<td>" . escape($cell) . "</td>";
            }
            echo "</tr>";
        }
	}
    echo '</table>';
    foreach($categories as $category => $data) {
        $cid = wp_insert_term(
            $category,
            'product_cat',
            [
                'description'=> $category,
                'slug' => strtolower(str_replace(' ', '-', $category)),
                'parent' => false,
            ]
        );

        $cat_id = isset( $cid['term_id'] ) ? $cid['term_id'] : 0;
        foreach($data['products'] as $product) {
            $post_id = wp_insert_post([
                'post_title' => $product[2],
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => "product",
            ]);
            $metas = [
                '_visibility' => 'visible',
                '_stock_status' => 'instock',
                'total_sales' => '0',
                '_downloadable' => 'no',
                '_virtual' => 'yes',
                '_regular_price' => $product[5],
                '_sale_price' => '',
                '_purchase_note' => '',
                '_featured' => 'no',
                '_weight' => '',
                '_length' => '',
                '_width' => '',
                '_height' => '',
                '_sku' => '',
                '_product_attributes' => [],
                '_sale_price_dates_from' => '',
                '_sale_price_dates_to' => '',
                '_price' => $product[5],
                '_sold_individually' => '',
                '_manage_stock' => 'no',
                '_backorders' => 'no',
                '_stock' => ''
              ];
              foreach ($metas as $key => $value) {
                update_post_meta($post_id, $key, $value);
              }
              wp_set_object_terms( $post_id, $cid['term_id'], 'product_cat' );
        }
    }
}

function escape($string) {
	return htmlspecialchars($string, ENT_QUOTES);
}

function detectRow($row) {
    $indexes = getIndexes($row);
    if($indexes[0] == 0 && count($indexes) > 3) {
        return 'product';
    } elseif($indexes[0] == 2 && count($indexes) == 1) {
        return 'category';
    } else {
        return 'don matter';
    }
}

function getIndexes($row) {
    $existing = [];
    foreach($row as $index => $column) {
        if($column != null) {
            $existing[] = $index;
        }
    }

    return $existing;
}

function clearWoocommerce() {
    global $wpdb;

    //delete tags
    $result[] = $wpdb->query("DELETE relations.*, taxes.*, terms.*
    FROM wp_term_relationships AS relations
    INNER JOIN wp_term_taxonomy AS taxes
    ON relations.term_taxonomy_id=taxes.term_taxonomy_id
    INNER JOIN wp_terms AS terms
    ON taxes.term_id=terms.term_id
    WHERE object_id IN (SELECT ID FROM wp_posts WHERE post_type='product');");
    
    $result[] = $wpdb->query("DELETE FROM wp_postmeta WHERE post_id IN (SELECT ID FROM wp_posts WHERE post_type = 'product');");
    $result[] = $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'product';");
    
    $result[] = $wpdb->query("DELETE pm FROM wp_postmeta pm LEFT JOIN wp_posts wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL;");
    
    $result[] = $wpdb->query("delete from `wp_termmeta`
    where 
        `term_id` in ( 
            SELECT `term_id`
            FROM `wp_term_taxonomy`
            WHERE `taxonomy` in ('product_cat', 'product_type', 'product_visibility') 
        );");
    
    $result[] = $wpdb->query("delete from `wp_terms`  
    where 
        `term_id` in ( 
            SELECT `term_id`
            FROM `wp_term_taxonomy`
            WHERE `taxonomy` in ('product_cat', 'product_type', 'product_visibility') 
        );");
        
    $result[] = $wpdb->query("DELETE FROM `wp_term_taxonomy` WHERE `taxonomy` in ('product_cat', 'product_type', 'product_visibility');");

    $result[] = $wpdb->query("DELETE meta FROM wp_termmeta meta LEFT JOIN wp_terms terms ON terms.term_id = meta.term_id WHERE terms.term_id IS NULL;");

    $result[] = $wpdb->query("DELETE FROM wp_woocommerce_attribute_taxonomies;");

    $result[] = $wpdb->query("DELETE FROM wp_woocommerce_sessions;");
    
    return $result;
}

function uploadRemoteImageAndAttach($image_url, $parent_id, $thumbnail = false){
    $image = str_replace('https', 'http', $image_url);
    $get = wp_remote_get( $image );
    $type = wp_remote_retrieve_header( $get, 'content-type' );

    if (!$type)
        return false;

    $mirror = wp_upload_bits( basename( $image ), '', wp_remote_retrieve_body( $get ) );
    $attachment = array(
        'post_title'=> basename( $image ),
        'post_mime_type' => $type
    );
    
    $attach_id = wp_insert_attachment( $attachment, $mirror['file'], $parent_id );

    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $mirror['file'] );
    wp_update_attachment_metadata( $attach_id, $attach_data );

    // If thumbnail is set to true use this attachment as featured image
    if($thumbnail)
        set_post_thumbnail($parent_id, $attach_id);

    return $attach_id;
}
