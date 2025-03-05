<?php 
/*=== SOCIAL MEDIA FUNCTION ===*/
function dv_social_icons(){ 
	$dv_social_bg_clr = get_theme_mod( 'social_bg_clr', '#ffffff00' );
	$dv_social_clr = get_theme_mod( 'social_clr', '#000' );
	$dv_facebook = get_theme_mod( 's_facebook', true );
	$dv_twitter = get_theme_mod( 'c_twitter', true );
	$dv_youtube = get_theme_mod( 'c_youtube', true );
	$dv_instagram = get_theme_mod( 'c_instagram', true );
	$dv_linkedin = get_theme_mod( 'c_linkedin', true );
	$dv_pinterest = get_theme_mod( 'c_pinterest', true );
	$dv_tiktok = get_theme_mod( 'c_tiktok', true );
	$dv_whatsapp = get_theme_mod( 'c_whatsapp', '1XXXXXXXXXX' );



	$tbar_social_s_facebook = get_theme_mod( 'tbar_social_s_facebook', 0 );
	$tbar_social_c_twitter = get_theme_mod( 'tbar_social_c_twitter', 0 );
	$tbar_social_c_youtube = get_theme_mod( 'tbar_social_c_youtube', 0 );
	$tbar_social_c_instagram = get_theme_mod( 'tbar_social_c_instagram', 0 );
	$tbar_social_c_linkedin = get_theme_mod( 'tbar_social_c_linkedin', 0 );
	$tbar_social_c_pinterest = get_theme_mod( 'tbar_social_c_pinterest', 0 );
	$tbar_social_c_tiktok = get_theme_mod( 'tbar_social_c_tiktok', 0 );
	$tbar_social_c_whatsapp = get_theme_mod( 'tbar_social_c_whatsapp', 0 );


	
	?>
	<ul class="dv_social_icons">
		<?php if ($tbar_social_s_facebook==1) {
		if ($dv_facebook) { ?><li><a <?php if ($dv_social_bg_clr){ echo 'style="background: '.$dv_social_bg_clr.'; margin: 0 4px;'; } ?> target="blank" href="<?php echo $dv_facebook; ?>"><svg width="20px" height="20px" fill="<?php echo $dv_social_clr; ?>" version="1.1" viewBox="0 0 310 310" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"> <path d="m81.703 165.11h33.981v139.89c0 2.762 2.238 5 5 5h57.616c2.762 0 5-2.238 5-5v-139.24h39.064c2.54 0 4.677-1.906 4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899-0.949-1.064-2.307-1.673-3.732-1.673h-44.996v-32.284c0-9.732 5.24-14.667 15.576-14.667h29.42c2.762 0 5-2.239 5-5v-47.274c0-2.762-2.238-5-5-5h-40.545c-0.286-0.014-0.921-0.037-1.857-0.037-7.035 0-31.488 1.381-50.804 19.151-21.402 19.692-18.427 43.27-17.716 47.358v37.752h-35.673c-2.762 0-5 2.238-5 5v50.844c0 2.762 2.238 5.001 5 5.001z"/> </svg></a></li><?php } } ?>
		<?php if ($tbar_social_c_twitter==1) {
		if ($dv_twitter) { ?><li><a <?php if ($dv_social_bg_clr){ echo 'style="background: '.$dv_social_bg_clr.'; margin: 0 4px;'; } ?> target="blank" href="<?php echo $dv_twitter; ?>"><svg width="20px" height="20px" fill="<?php echo $dv_social_clr; ?>" version="1.1" x="0px" y="0px" viewBox="0 0 1668.56 1221.19" xml:space="preserve"><g id="layer1" transform="translate(52.390088,-25.058597)"><path id="path1009" d="M283.94,167.31l386.39,516.64L281.5,1104h87.51l340.42-367.76L984.48,1104h297.8L874.15,558.3l361.92-390.99 h-87.51l-313.51,338.7l-253.31-338.7H283.94z M412.63,231.77h136.81l604.13,807.76h-136.81L412.63,231.77z"/></g></svg></a></li><?php } } ?>
		<?php if ($tbar_social_c_youtube==1) {
		if ($dv_youtube) { ?><li><a <?php if ($dv_social_bg_clr){ echo 'style="background: '.$dv_social_bg_clr.'; margin: 0 4px;'; } ?> target="blank" href="<?php echo $dv_youtube; ?>"><svg height="20px" width="20px" version="1.1" viewBox="0 0 461.001 461.001" xml:space="preserve"><g><path fill="<?php echo $dv_social_clr; ?>" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728 c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137 C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607 c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/></g></svg></a></li><?php } } ?>
		<?php if ($tbar_social_c_instagram==1) {
		if ($dv_instagram) { ?><li><a <?php if ($dv_social_bg_clr){ echo 'style="background: '.$dv_social_bg_clr.'; margin: 0 4px;'; } ?> target="blank" href="<?php echo $dv_instagram; ?>"><svg width="20px" height="20px" viewBox="0 0 24 24" fill="<?php echo $dv_social_clr; ?>" xmlns="http://www.w3.org/2000/svg"><path fill="<?php echo $dv_social_clr; ?>" fill-rule="evenodd" clip-rule="evenodd" d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" /><path fill="<?php echo $dv_social_clr; ?>" d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z" /><path fill="<?php echo $dv_social_clr; ?>" fill-rule="evenodd" clip-rule="evenodd" d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z" /></svg></a></li><?php } } ?>
		<?php if ($tbar_social_c_tiktok==1) {
		if ($dv_tiktok) { ?><li><a <?php if ($dv_social_bg_clr){ echo 'style="background: '.$dv_social_bg_clr.'; margin: 0 4px;'; } ?> target="blank" href="<?php echo $dv_tiktok; ?>"><svg fill="<?php echo $dv_social_clr; ?>" width="20px" height="20px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M16.656 1.029c1.637-0.025 3.262-0.012 4.886-0.025 0.054 2.031 0.878 3.859 2.189 5.213l-0.002-0.002c1.411 1.271 3.247 2.095 5.271 2.235l0.028 0.002v5.036c-1.912-0.048-3.71-0.489-5.331-1.247l0.082 0.034c-0.784-0.377-1.447-0.764-2.077-1.196l0.052 0.034c-0.012 3.649 0.012 7.298-0.025 10.934-0.103 1.853-0.719 3.543-1.707 4.954l0.020-0.031c-1.652 2.366-4.328 3.919-7.371 4.011l-0.014 0c-0.123 0.006-0.268 0.009-0.414 0.009-1.73 0-3.347-0.482-4.725-1.319l0.040 0.023c-2.508-1.509-4.238-4.091-4.558-7.094l-0.004-0.041c-0.025-0.625-0.037-1.25-0.012-1.862 0.49-4.779 4.494-8.476 9.361-8.476 0.547 0 1.083 0.047 1.604 0.136l-0.056-0.008c0.025 1.849-0.050 3.699-0.050 5.548-0.423-0.153-0.911-0.242-1.42-0.242-1.868 0-3.457 1.194-4.045 2.861l-0.009 0.030c-0.133 0.427-0.21 0.918-0.21 1.426 0 0.206 0.013 0.41 0.037 0.61l-0.002-0.024c0.332 2.046 2.086 3.59 4.201 3.59 0.061 0 0.121-0.001 0.181-0.004l-0.009 0c1.463-0.044 2.733-0.831 3.451-1.994l0.010-0.018c0.267-0.372 0.45-0.822 0.511-1.311l0.001-0.014c0.125-2.237 0.075-4.461 0.087-6.698 0.012-5.036-0.012-10.060 0.025-15.083z"></path></svg></a></li><?php } } ?>
		<?php if ($tbar_social_c_linkedin==1) {
		if ($dv_linkedin) { ?><li><a <?php if ($dv_social_bg_clr){ echo 'style="background: '.$dv_social_bg_clr.'; margin: 0 4px;'; } ?> target="blank" href="<?php echo $dv_linkedin; ?>"><svg width="20px" height="20px" fill="<?php echo $dv_social_clr; ?>" version="1.1" viewBox="0 0 310 310" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m72.16 99.73h-62.233c-2.762 0-5 2.239-5 5v199.93c0 2.762 2.238 5 5 5h62.233c2.762 0 5-2.238 5-5v-199.93c0-2.761-2.238-5-5-5z"/><path d="M41.066,0.341C18.422,0.341,0,18.743,0,41.362C0,63.991,18.422,82.4,41.066,82.4   c22.626,0,41.033-18.41,41.033-41.038C82.1,18.743,63.692,0.341,41.066,0.341z"/><path d="m230.45 94.761c-24.995 0-43.472 10.745-54.679 22.954v-12.985c0-2.761-2.238-5-5-5h-59.599c-2.762 0-5 2.239-5 5v199.93c0 2.762 2.238 5 5 5h62.097c2.762 0 5-2.238 5-5v-98.918c0-33.333 9.054-46.319 32.29-46.319 25.306 0 27.317 20.818 27.317 48.034v97.204c0 2.762 2.238 5 5 5h62.12c2.762 0 5-2.238 5-5v-109.66c0-49.565-9.451-100.23-79.546-100.23z"/></svg></a></li><?php } } ?>
		<?php if ($tbar_social_c_pinterest==1) {
		if ($dv_pinterest) { ?><li><a <?php if ($dv_social_bg_clr){ echo 'style="background: '.$dv_social_bg_clr.'; margin: 0 4px;'; } ?> target="blank" href="<?php echo $dv_pinterest; ?>"><svg width="20px" height="20px" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path fill="<?php echo $dv_social_clr; ?>" d="m405.02 52.467c-35.243-33.833-84.016-52.467-137.33-52.467-81.444 0-131.54 33.385-159.22 61.39-34.114 34.513-53.675 80.34-53.675 125.73 0 56.993 23.839 100.74 63.76 117.01 2.68 1.098 5.377 1.651 8.021 1.651 8.422 0 15.095-5.511 17.407-14.35 1.348-5.071 4.47-17.582 5.828-23.013 2.906-10.725 0.558-15.884-5.78-23.353-11.546-13.662-16.923-29.817-16.923-50.842 0-62.451 46.502-128.82 132.69-128.82 68.386 0 110.87 38.868 110.87 101.43 0 39.482-8.504 76.046-23.951 102.96-10.734 18.702-29.609 40.995-58.585 40.995-12.53 0-23.786-5.147-30.888-14.121-6.709-8.483-8.921-19.441-6.222-30.862 3.048-12.904 7.205-26.364 11.228-39.376 7.337-23.766 14.273-46.213 14.273-64.122 0-30.632-18.832-51.215-46.857-51.215-35.616 0-63.519 36.174-63.519 82.354 0 22.648 6.019 39.588 8.744 46.092-4.487 19.01-31.153 132.03-36.211 153.34-2.925 12.441-20.543 110.7 8.618 118.54 32.764 8.803 62.051-86.899 65.032-97.713 2.416-8.795 10.869-42.052 16.049-62.495 15.817 15.235 41.284 25.535 66.064 25.535 46.715 0 88.727-21.022 118.3-59.189 28.679-37.02 44.474-88.618 44.474-145.28-2e-3 -44.298-19.026-87.97-52.191-119.81z" /></svg></a></li><?php } } ?>
		<?php if ($tbar_social_c_whatsapp==1) {
		if ($dv_whatsapp) { ?><li><a <?php if ($dv_social_bg_clr){ echo 'style="background: '.$dv_social_bg_clr.'; margin: 0 4px;'; } ?> href="https://wa.me/<?php echo $dv_whatsapp; ?>"><svg width="20px" height="20px" fill="<?php echo $dv_social_clr; ?>" version="1.1" viewBox="0 0 308 308" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m227.9 176.98c-0.6-0.288-23.054-11.345-27.044-12.781-1.629-0.585-3.374-1.156-5.23-1.156-3.032 0-5.579 1.511-7.563 4.479-2.243 3.334-9.033 11.271-11.131 13.642-0.274 0.313-0.648 0.687-0.872 0.687-0.201 0-3.676-1.431-4.728-1.888-24.087-10.463-42.37-35.624-44.877-39.867-0.358-0.61-0.373-0.887-0.376-0.887 0.088-0.323 0.898-1.135 1.316-1.554 1.223-1.21 2.548-2.805 3.83-4.348 0.607-0.731 1.215-1.463 1.812-2.153 1.86-2.164 2.688-3.844 3.648-5.79l0.503-1.011c2.344-4.657 0.342-8.587-0.305-9.856-0.531-1.062-10.012-23.944-11.02-26.348-2.424-5.801-5.627-8.502-10.078-8.502-0.413 0 0 0-1.732 0.073-2.109 0.089-13.594 1.601-18.672 4.802-5.385 3.395-14.495 14.217-14.495 33.249 0 17.129 10.87 33.302 15.537 39.453 0.116 0.155 0.329 0.47 0.638 0.922 17.873 26.102 40.154 45.446 62.741 54.469 21.745 8.686 32.042 9.69 37.896 9.69h1e-3c2.46 0 4.429-0.193 6.166-0.364l1.102-0.105c7.512-0.666 24.02-9.22 27.775-19.655 2.958-8.219 3.738-17.199 1.77-20.458-1.348-2.216-3.671-3.331-6.612-4.743z"/><path d="m156.73 0c-83.416 0-151.28 67.354-151.28 150.14 0 26.777 7.166 52.988 20.741 75.928l-25.983 76.645c-0.484 1.429-0.124 3.009 0.933 4.085 0.763 0.779 1.798 1.199 2.855 1.199 0.405 0 0.813-0.061 1.211-0.188l79.92-25.396c21.87 11.685 46.588 17.853 71.604 17.853 83.408 1e-3 151.26-67.346 151.26-150.13 0-82.789-67.857-150.14-151.27-150.14zm0 268.99c-23.539 0-46.338-6.797-65.936-19.657-0.659-0.433-1.424-0.655-2.194-0.655-0.407 0-0.815 0.062-1.212 0.188l-40.035 12.726 12.924-38.129c0.418-1.234 0.209-2.595-0.561-3.647-14.924-20.392-22.813-44.485-22.813-69.677 0-65.543 53.754-118.87 119.83-118.87 66.064 0 119.81 53.324 119.81 118.87 1e-3 65.535-53.746 118.85-119.81 118.85z"/></svg></a></li><?php } } ?>
	</ul>
<?php }
//for footer
function dv_social_media() {
	$social_icon_h_text = get_theme_mod( 'social_icon_h_text', '' );
	$social_icn = get_theme_mod( 'social_icn', 0 );
	$social_loc = get_theme_mod( 'social_loc', true );
	$tp_social = get_theme_mod( 'tbar_social', 0 );
	if($social_icn == 1){
		if($social_loc != 'social_copyright'){ ?><h3><?php echo $social_icon_h_text; ?></h3><?php }
		dv_social_icons();
	}

}
//for topbar
function dv_social_media_top_bar() {
	$social_icon_h_text = get_theme_mod( 'social_icon_h_text', '' );
	$social_icn = get_theme_mod( 'social_icn', 0 );
	$social_loc = get_theme_mod( 'social_loc', true );
	$tp_social = get_theme_mod( 'tbar_social', 0 );
	if($tp_social == 1){
	
		dv_social_icons();
	}

}

/*=== REGISTER CATEGORY FOR PATTERN ===*/
add_action( 'init', 'register_pattern_categories' );
function register_pattern_categories() {
	register_block_pattern_category( 'themeslug/fancybox', array( 
		'label'       => __( 'Fancy Box', 'themeslug' ),
		'description' => __( 'Fancy Box', 'themeslug' )
	) );
}

/*=== WRAP MENU IN DIV ===*/
class submenu_wrap extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='mega_menu_wrpr'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}







