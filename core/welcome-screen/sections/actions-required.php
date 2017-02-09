<?php
/**
 * Actions required
 */
wp_enqueue_style( 'plugin-install' );
wp_enqueue_script( 'plugin-install' );
wp_enqueue_script( 'updates' );
?>

<div class="feature-section action-required demo-import-boxed" id="plugin-filter">

	<?php
	global $brilliance_required_actions;
	if ( ! empty( $brilliance_required_actions ) ):
		/* brilliance_show_required_actions is an array of true/false for each required action that was dismissed */
		$brilliance_show_required_actions = get_option( "brilliance_show_required_actions" );
		foreach ( $brilliance_required_actions as $brilliance_required_action_key => $brilliance_required_action_value ):
			if ( @$brilliance_show_required_actions[ $brilliance_required_action_value['id'] ] === false ) {
				continue;
			}
			if ( @$brilliance_required_action_value['check'] ) {
				continue;
			}
			?>
			<div class="brilliance-action-required-box">
				<span class="dashicons dashicons-no-alt brilliance-dismiss-required-action"
				      id="<?php echo $brilliance_required_action_value['id']; ?>"></span>
				<h3><?php if ( ! empty( $brilliance_required_action_value['title'] ) ): echo $brilliance_required_action_value['title']; endif; ?></h3>
				<p>
					<?php if ( ! empty( $brilliance_required_action_value['description'] ) ): echo $brilliance_required_action_value['description']; endif; ?>
					<?php if ( ! empty( $brilliance_required_action_value['help'] ) ): echo '<br/>' . $brilliance_required_action_value['help']; endif; ?>
				</p>
				<?php
				if ( ! empty( $brilliance_required_action_value['plugin_slug'] ) ) {
					$active = $this->check_active( $brilliance_required_action_value['plugin_slug'] );
					$url    = $this->create_action_link( $active['needs'], $brilliance_required_action_value['plugin_slug'] );
					$label  = '';
					switch ( $active['needs'] ) {
						case 'install':
							$class = 'install-now button';
							$label = __( 'Install', 'brilliance' );
							break;
						case 'activate':
							$class = 'activate-now button button-primary';
							$label = __( 'Activate', 'brilliance' );
							break;
						case 'deactivate':
							$class = 'deactivate-now button';
							$label = __( 'Deactivate', 'brilliance' );
							break;
					}
					?>
					<p class="plugin-card-<?php echo esc_attr( $brilliance_required_action_value['plugin_slug'] ) ?> action_button <?php echo ( $active['needs'] !== 'install' && $active['status'] ) ? 'active' : '' ?>">
						<a data-slug="<?php echo esc_attr( $brilliance_required_action_value['plugin_slug'] ) ?>"
						   class="<?php echo $class; ?>"
						   href="<?php echo esc_url( $url ) ?>"> <?php echo $label ?> </a>
					</p>
					<?php
				};
				?>
			</div>
			<?php
		endforeach;
	endif;
	$nr_actions_required = 0;
	/* get number of required actions */
	if ( get_option( 'brilliance_show_required_actions' ) ):
		$brilliance_show_required_actions = get_option( 'brilliance_show_required_actions' );
	else:
		$brilliance_show_required_actions = array();
	endif;
	if ( ! empty( $brilliance_required_actions ) ):
		foreach ( $brilliance_required_actions as $brilliance_required_action_value ):
			if ( ( ! isset( $brilliance_required_action_value['check'] ) || ( isset( $brilliance_required_action_value['check'] ) && ( $brilliance_required_action_value['check'] == false ) ) ) && ( ( isset( $brilliance_show_required_actions[ $brilliance_required_action_value['id'] ] ) && ( $brilliance_show_required_actions[ $brilliance_required_action_value['id'] ] == true ) ) || ! isset( $brilliance_show_required_actions[ $brilliance_required_action_value['id'] ] ) ) ) :
				$nr_actions_required ++;
			endif;
		endforeach;
	endif;
	if ( $nr_actions_required == 0 ):
		echo '<span class="hooray">' . __( 'Hooray! There are no required actions for you right now.', 'brilliance' ) . '</span>';
	endif;
	?>

</div>