<?php
/**
 * Changelog
 */

$theme_name = wp_get_theme( 'theme_name' );

?>
<div class="featured-section changelog">
	

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$theme_name_changelog       = $wp_filesystem->get_contents( get_template_directory() . '/changelog.txt' );
	$theme_name_changelog_lines = explode( PHP_EOL, $theme_name_changelog );
	foreach ( $theme_name_changelog_lines as $theme_name_changelog_line ) {
		if ( substr( $theme_name_changelog_line, 0, 3 ) === "###" ) {
			echo '<h4>' . substr( $theme_name_changelog_line, 3 ) . '</h4>';
		} else {
			echo $theme_name_changelog_line, '<br/>';
		}


	}

	echo '<hr />';


	?>

</div>