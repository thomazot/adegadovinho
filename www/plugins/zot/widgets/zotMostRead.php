<?php 
// Register and load the widget
function zot_load_widget_most_read() {
    register_widget( 'zot_most_read_widget' );
}
add_action( 'widgets_init', 'zot_load_widget_most_read' );

// Creating the widget 
class zot_most_read_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'zot_most_read_widget', 
            // Widget name will appear in UI
            __('Mais Lidos', 'zot_widget_domain'), 
            // Widget description
            array( 'description' => __( 'Listagem dos Posts mais Lidos', 'zot_widget_domain' ), ) 
        );
    }

    // Creating widget front-end 
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $number = apply_filters( 'widget_number', $instance['number'] );
        $slug = slug($title ? $title : bloginfo( 'name' ) );
        $number = $number ? $number : 5;

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        echo '<h3 class="widget__title widget__title--small">';
        echo $title;
        echo $args['after_title'];
        maislidos('', $number);
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
        <?php 
    }
    
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
        return $instance;
    }
}