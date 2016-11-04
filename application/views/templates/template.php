<?php 
	$this->load->view('templates/header.php');
	$this->load->view('templates/sidebar.php');
	// main content start
	if ( isset( $main_content ) ):
		$this->load->view( $main_content );
	endif;
	// end of main content
	$this->load->view('templates/footer.php');
?>