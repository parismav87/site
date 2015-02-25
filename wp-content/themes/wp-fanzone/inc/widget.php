<?php
// Register 'FanZone Recent Posts' widget
add_action( 'widgets_init', 'init_wp_fanzone_recent_posts' );

function init_wp_fanzone_recent_posts() { return register_widget('wp_fanzone_recent_posts'); }

class wp_fanzone_recent_posts extends WP_Widget {
	/** constructor */
	function wp_fanzone_recent_posts() {
		parent::WP_Widget( 'wp_fanzone_recent_posts', $name = 'FanZone Recent Post' );
	}
	
	// Widget	
	function widget( $args, $instance ) {
		global $post;
		extract($args);

		// Widget options
		$title 	 = apply_filters('widget_title', $instance['title'] ); // Title		
		/*$cpt 	 = $instance['types'];*/ // Post type(s) 		
	    $types   = 'post';
		$number	 = absint($instance['number']); // Number of posts to show
		
        // Output
		echo $before_widget;
		
	    if ( $title ) echo $before_title . $title . $after_title;
			
		$fzq = new WP_Query(array( 'post_type' => $types, 'showposts' => $number ));
		if( $fzq->have_posts() ) : 
		?>
		<ul>
		<?php while($fzq->have_posts()) : $fzq->the_post(); ?>
		<li class="clearfix">
        <?php if ( $instance['display_featured_image'] && has_post_thumbnail() ) {?>
        	<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
        <?php
			the_post_thumbnail('widget-post-thumb', array('class' => 'alignleft'));
		?>
        	</a>
        <?php
		} ?>
        <h5><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h5>
        <div class="meta-info">
        	<span class="meta-info-date"><?php the_time('F j, Y');  ?></span>, <a href="<?php comments_link(); ?>" class="meta-info-comment"><?php comments_number( '0 <i class="fa fa-comments"></i>', '1 <i class="fa fa-comments"></i>', '% <i class="fa fa-comments"></i>' ); ?></a>
        </div>
        </li>
		<?php wp_reset_query(); 
		endwhile; ?>
		</ul>
			
		<?php endif; ?>			
		<?php
		// echo widget closing tag
		echo $after_widget;
	}

	/** Widget control update */
	function update( $new_instance, $old_instance ) {
		$instance    = $old_instance;	
		
		//Let's turn that array into something the Wordpress database can store
		$instance['title']  = esc_html( $new_instance['title'] );
		$instance['types'] = ( in_array( $new['types'], array( 'posts', 'pages' ) ) ) ? $new['types'] : 'posts';
		$instance['number'] = absint( $new_instance['number'] );
		$instance['display_featured_image'] = (bool) $new_instance['display_featured_image'];
		return $instance;
	}
	
	
	// Widget settings	
	function form( $instance ) {	
			$number = 5;
			$display_featured_image = 0;
		    // instance exist? if not set defaults
		    if ( $instance ) {
				$title  = $instance['title'];
		        $types  = $instance['types'];
		        $number = absint($instance['number']);
				$display_featured_image = (bool) $instance['display_featured_image'];
		    } 
			
			//Let's turn $types into an array
			$types = 'post';
			// The widget form
			?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"> Title:</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if(isset($title)) { echo $title; } ?>" class="widefat" />
			</p>
			<p>
            	<input type="checkbox" name="<?php echo $this->get_field_name('display_featured_image'); ?>"  <?php checked( $display_featured_image, 1 ); ?> value="1" /> 			
                <label for="<?php echo $this->get_field_id('display_featured_image'); ?>">Display Thumbnail</label>
            </p>
			<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"> Number of posts to show:</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
			</p>
	<?php 
	}
	

} // class rcp_recent_posts
?>
