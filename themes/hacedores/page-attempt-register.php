<?php
	if (!empty($_POST))
	{
		$response = register_user_new($_POST);
		if (!$response['error']){
			$location = site_url().'/wp-admin/profile.php';
			wp_redirect( $location );
		}else{
			$location = site_url().'/registro/?my_error=1';
			wp_redirect( $location );
		}
	}
?>