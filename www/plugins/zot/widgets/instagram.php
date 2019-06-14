<?php 
// Register and load the widget
function zot_load_widget_instagram() {
    register_widget( 'zot_instagram_widget' );
}
add_action( 'widgets_init', 'zot_load_widget_instagram' );

// Creating the widget 
class zot_instagram_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'zot_instagram_widget', 
            // Widget name will appear in UI
            __('Instagram', 'zot_widget_domain'), 
            // Widget description
            array( 'description' => __( 'Listagem dos Posts do Instagram', 'zot_widget_domain' ), ) 
        );
    }

    // Creating widget front-end 
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $number = apply_filters( 'widget_number', $instance['number'] );
        $token = apply_filters( 'widget_number', $instance['token'] );
        $user_id = apply_filters( 'widget_number', $instance['user_id'] );
        $number = $number ? $number : 5;

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        echo '<h3 class="widget__title widget__title--small">';
        echo $title;
        echo $args['after_title'];
        ?>
        <div id="instafeed"></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>
        <script>
            var userFeed = new Instafeed({
                get: 'user',
                userId: '<?php echo $user_id; ?>',
                accessToken: '<?php echo $token; ?>',
                limit: <?php echo $number; ?>
            });
            userFeed.run();
        </script>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Titulo', 'zot_widget_domain' );
        }

        if ( isset( $instance[ 'number' ] ) ) {
            $number = $instance[ 'number' ];
        }
        else {
            $number = __( 'Numeros de Posts exibidos', 'zot_widget_domain' );
        }
        

        if ( isset( $instance[ 'user_id' ] ) ) {
            $user_id = $instance[ 'user_id' ];
        }
        else {
            $user_id = __( '', 'zot_widget_domain' );
        }

        if ( isset( $instance[ 'token' ] ) ) {
            $token = $instance[ 'token' ];
        }
        else {
            $token = __( '', 'zot_widget_domain' );
        }
        
        // Widget admin form
        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titulo:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Quantidade de Posts:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'user_id' ); ?>"><?php _e( 'ID do Usuário:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'user_id' ); ?>" name="<?php echo $this->get_field_name( 'user_id' ); ?>" type="text" value="<?php echo esc_attr( $user_id ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'token' ); ?>"><?php _e( 'Token do Instagram:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'token' ); ?>" name="<?php echo $this->get_field_name( 'token' ); ?>" type="text" value="<?php echo esc_attr( $token ); ?>" />
            </p>
        <?php 
    }
    
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
        $instance['user_id'] = ( ! empty( $new_instance['user_id'] ) ) ? strip_tags( $new_instance['user_id'] ) : '';
        $instance['token'] = ( ! empty( $new_instance['token'] ) ) ? strip_tags( $new_instance['token'] ) : '';
        return $instance;
    }
}