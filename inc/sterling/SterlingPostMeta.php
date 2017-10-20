<?php

class Sterling_Post_Style_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php', array ( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array ( $this, 'init_metabox' ) );
        }
    }

    public function init_metabox() {

        add_action( 'add_meta_boxes', array ( $this, 'add_metabox' ) );
        add_action( 'save_post', array ( $this, 'save_metabox' ), 10, 2 );
    }

    public function add_metabox() {

        add_meta_box(
                'sterling-post-style', __( 'Post Customization', 'sterling' ), array ( $this, 'render_metabox' ), array ( 'post', 'page' ), 'side', 'high'
        );
    }

    public function render_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'sterling_nonce_action', 'sterling_nonce' );

        // Retrieve an existing value from the database.
        $sterling_disable_header = get_post_meta( $post->ID, 'sterling_disable_header', true );
        $sterling_sidebar = get_post_meta( $post->ID, 'sterling_sidebar', true );

        // Set default values.
        if ( empty( $sterling_disable_header ) )
            $sterling_disable_header = 'show';
        if ( empty( $sterling_sidebar ) )
            $sterling_sidebar = 'sterling_rsidebar';

        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="sterling_disable_header" class="sterling_disable_header_label">' . __( 'Site header', 'sterling' ) . '</label></th>';
        echo '		<td>';
        echo '			<select id="sterling_disable_header" name="sterling_disable_header" class="sterling_disable_header_field">';
        echo '			<option value="show" ' . selected( $sterling_disable_header, 'show', false ) . '> ' . __( 'Show', 'sterling' ) . '</option>';
        echo '			<option value="hide" ' . selected( $sterling_disable_header, 'hide', false ) . '> ' . __( 'Hide', 'sterling' ) . '</option>';
        echo '			</select>';
//        echo '			<p class="description">' . __( 'How do you want the featured image to show ?', 'sterling' ) . '</p>';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="sterling_sidebar" class="sterling_sidebar_label">' . __( 'Sidebar Location', 'sterling' ) . '</label></th>';
        echo '		<td>';
        echo '			<select id="sterling_sidebar" name="sterling_sidebar" class="sterling_sidebar_field">';
        echo '			<option value="sterling_lsidebar" ' . selected( $sterling_sidebar, 'sterling_lsidebar', false ) . '> ' . __( 'Left Sidebar', 'sterling' ) . '</option>';
        echo '			<option value="sterling_rsidebar" ' . selected( $sterling_sidebar, 'sterling_rsidebar', false ) . '> ' . __( 'Right Sidebar', 'sterling' ) . '</option>';
        echo '			</select>';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';
    }

    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name = isset( $_POST[ 'sterling_nonce' ] ) ? $_POST[ 'sterling_nonce' ] : '';
        $nonce_action = 'sterling_nonce_action';

        // Check if a nonce is set.
        if ( !isset( $nonce_name ) )
            return;

        // Check if a nonce is valid.
        if ( !wp_verify_nonce( $nonce_name, $nonce_action ) )
            return;
        
        // Sanitize user input.
        $sterling_new_disable_header = isset( $_POST[ 'sterling_disable_header' ] ) ? $_POST[ 'sterling_disable_header' ] : '';
        $sterling_new_sidebar = isset( $_POST[ 'sterling_sidebar' ] ) ? $_POST[ 'sterling_sidebar' ] : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'sterling_disable_header', $sterling_new_disable_header );
        update_post_meta( $post_id, 'sterling_sidebar', $sterling_new_sidebar );
    }

}

new Sterling_Post_Style_Meta_Box;