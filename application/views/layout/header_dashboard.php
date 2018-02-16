<!-- Wrapper -->
<div id="wrapper">

<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="index-2.html"><img src="<?php echo base_url('assets/upload/image/'.$site['logo']);?>" alt=""></a>
					<a href="index-2.html" class="dashboard-logo"><img src="<?php echo base_url('assets/upload/image/'.$site['logo']);?>" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li><a href="<?php echo base_url();?>explore">Explore Kode</a></li>
						<!-- <li><a href="#">Tanya Kode</a></li> -->
						<li><a href="<?php echo base_url();?>article">Articles</a></li>				
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
			
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="<?php echo base_url();?>assets/front/images/dashboard-avatar.jpg" alt=""></span><?php echo $user['username'];?></div>
						<ul>
							<li><a href="<?php echo base_url('profile/setting');?>"><i class="sl sl-icon-settings"></i> Pengaturan</a></li>
							<li><a href="<?php echo base_url('dashboard');?>"><i class="sl sl-icon-envelope-open"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url('login/logout');?>"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->