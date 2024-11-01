<div class="wrap">
<?php
$alert = '';
if ( !empty($_POST) ) {
	if ( empty($_POST['Upload']) ) {
		// process style form
		if ( empty($_POST['Submit'] ) || !wp_verify_nonce($_POST['thtw_nonce'],'Submit' ) ) {
			// get stylesheet from options database
			$cssname = get_option( 'thtw_options' );
		} else {
			// get stylesheet from form
			$cssname = $_POST['thtw_cssname'];
			update_option( 'thtw_options', $cssname );
			$alert = 'Options Saved';
			}
	} else {
		// process uploader form
		if ( wp_verify_nonce( $_POST['thtw_nonce'],'Upload' ) ) {
			$allowed_filetypes = array('png','css','ico'); 
			$max_filesize = 512000; // 500kb (1024x500)
			$upload_path = dirname( __FILE__ ) . '/uploads/'; 
			$filename = $_FILES['thtw_filename']['name'];
			$ext = substr($filename, $filename-3, 3);
			if ( !in_array($ext,$allowed_filetypes ) )
				{ $alert = 'Invalid file type '.$ext.', must be .png, .ico, or .css'; }
			elseif ( filesize( $_FILES['userfile']['tmp_name']) > $max_filesize )
				{ $alert = 'File size must be less than 500kb.'; }
			elseif ( !is_writable($upload_path ) )
				{ $alert = 'The theme-tweak uploads directory is not writeable; check with your webhost tech support for help if needed.'; }
			elseif ( move_uploaded_file( $_FILES['thtw_filename']['tmp_name'],$upload_path . $filename ) ) {
				$alert = $filename.' uploaded successfully.';
				} else {
				$alert = 'Sorry, the file was not uploaded due to an unknown technical problem. Please try again.';
				}
			}
		}
	}

echo "<h2>" . __( 'Theme Tweak Options', 'thtw_trdom' ) . "</h2>"; 
if ( $alert ) { ?>
	<div class="updated"><p><strong><?php _e( $alert ); ?></strong></p></div>
	<?php } ?>
<p>This plugin allows you to "tweak" or do minor overrides to the style for any theme, much like a child theme. But it also makes it easy to show images for your site's logo, url, smartphone bookmark, and social sharing at sites such as Facebook.</p>
<p><strong>For styles</strong>, first create a style sheet for the theme you want to adjust. For example, if you have a theme called soverycool, you might name your style sheet soverycool.css. Your file only needs to contain those style elements you'd like to change.</p>
<p>Next, upload it via the Upload File form. Once your file is uploaded, just insert its name into the css filename box and press Set Style. If you have several themes, you can keep all of your custom style sheets in that directory as long as they have different names. Then just enter the name for whichever theme you're using at the time.</p>
<p>To stop using your custom style, just remove the name from the css filename box and press Set Style. You do not need to actually delete your files from the uploads directory.</p>
<p><strong>For icons</strong>, upload them via the Upload File form and repeat for each icon. The names have to be favicon.ico, phone.png, share.png, and logo.png. Changing them is as easy as uploading new files with the same name. For your site logo to appear, the following code needs to be added to your theme&#39;s header in the place you want it to appear: &lt;?php thtw_logo(); ?&gt;</p>
	
<form name="thtw_form" method="post" action="">
	<p><?php _e("css file name: " ); ?><br /><input type="text" name="thtw_cssname" value="<?php echo $cssname; ?>" size="20">
	<input type="submit" name="Submit" value="<?php _e('Set Style', 'thtw_trdom' ) ?>" /></p>
	<?php wp_nonce_field('Submit','thtw_nonce'); ?>
</form> 

<form name="thtw_formup" method="post" action="" enctype="multipart/form-data">
	<p><input type="file" name="thtw_filename">
	<input type="submit" name="Upload" value="<?php _e('Upload File', 'thtw_trdom' ) ?>" /></p>
	<?php wp_nonce_field('Upload','thtw_nonce'); ?>
</form> 

</div> <!-- end wrap -->