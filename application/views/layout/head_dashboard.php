<?php
	$logged = $this->session->userdata('user_id');
	$user   = $this->users_model->detail($logged);
	// Cek login
	$this->user_login->cek_login();
?>
<!DOCTYPE html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/colors/main.css" id="colors">
	<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
	<?php require_once('css_texteditor.php');?>
</head>
