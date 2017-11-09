<?php

class Kenza_Post_Style_Meta_Box {

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
                'kenza-post-style', __( 'Post Customization', 'kenza' ), array ( $this, 'render_metabox' ), array ( 'post', 'page' ), 'side', 'high'
        );
    }

    public function render_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'kenza_nonce_action', 'kenza_nonce' );

        // Retrieve an existing value from the database.
        $kenza_disable_header = get_post_meta( $post->ID, 'kenza_disable_header', true );
        $kenza_sidebar = get_post_meta( $post->ID, 'kenza_sidebar', true );

        if ( empty( $kenza_sidebar ) )
            $kenza_sidebar = 'kenza_rsidebar';

        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="kenza_sidebar" class="kenza_sidebar_label">' . __( 'Sidebar Location', 'kenza' ) . '</label></th>';
        echo '		<td>';
        echo '			<select id="kenza_sidebar" name="kenza_sidebar" class="kenza_sidebar_field">';
        echo '			<option value="kenza_lsidebar" ' . selected( $kenza_sidebar, 'kenza_lsidebar', false ) . '> ' . __( 'Left Sidebar', 'kenza' ) . '</option>';
        echo '			<option value="kenza_rsidebar" ' . selected( $kenza_sidebar, 'kenza_rsidebar', false ) . '> ' . __( 'Right Sidebar', 'kenza' ) . '</option>';
        echo '			</select>';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';
    }

    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name = isset( $_POST[ 'kenza_nonce' ] ) ? wp_unslash( sanitize_text_field( $_POST[ 'kenza_nonce' ] ) ) : '';
        $nonce_action = 'kenza_nonce_action';

        // Check if a nonce is set.
        if ( !isset( $nonce_name ) )
            return;

        // Check if a nonce is valid.
        if ( !wp_verify_nonce( $nonce_name, $nonce_action ) )
            return;
        
        // Sanitize user input.
        $kenza_new_sidebar = isset( $_POST[ 'kenza_sidebar' ] ) ? wp_unslash( sanitize_text_field( $_POST[ 'kenza_sidebar' ] ) ) : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'kenza_sidebar', $kenza_new_sidebar );
    }

}

new Kenza_Post_Style_Meta_Box;  