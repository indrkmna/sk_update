<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><?php echo $title?></h2><span>Temukan kode yang anda cari dinisi</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li><?php echo $title?></li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">
		
		<!-- Search -->
		<div class="col-md-12">
			<div class="main-search-input gray-style margin-top-0 margin-bottom-10">

				<div class="main-search-input-item">
					<input type="text" placeholder="What are you looking for?" value=""/>
				</div>

				<div class="main-search-input-item">
					<select data-placeholder="All Categories" class="chosen-select" >
						<option>All Categories</option>	
						<option>Shops</option>
						<option>Hotels</option>
						<option>Restaurants</option>
						<option>Fitness</option>
						<option>Events</option>
					</select>
				</div>

				<button class="button">Search</button>
			</div>
		</div>
		<!-- Search Section / End -->


		<div class="col-md-12">

			<div class="kode row">

				<!-- Listing Item -->
				<?php $i=0;foreach ($explore as $explore){?>
				<div id="con" class="col-lg-4 col-md-6">
					<a id="kode_upload" href="<?php echo base_url('explore/read/'.$explore['slug_upload'])?>" class="listing-item-container compact">
						<div class="listing-item">
							<?php 
							$vote 		= $this->mUpload->totalVote($explore['upload_id']);
							$rate 		= $this->mUpload->totalRate($explore['upload_id']);
							$limitSc 	= $this->mUpload->limitScreenshoot($explore['upload_id']);
							foreach ($limitSc as $limitSc){
							?>
							<img src="<?php echo base_url('assets/upload/image/'.$limitSc['nama_foto'])?>" alt="">
							<?php } ?>
							<div class="listing-item-details">
								<ul>
									<li><?php echo date('d F Y', strtotime($explore['date_post']))?></li>
								</ul>
							</div>
							<div class="listing-item-content">
							<?php if(!empty($vote || $rate)){?>
								<div class="numerical-rating" data-rating="<?php echo round($vote/$rate, 1)?>"></div>
							<?php }else{?>
								<div class="numerical-rating" data-rating="0"></div>
							<?php }?>
								<h3><?php echo $explore['title']?></h3>
								<span><?php echo $explore['description']?></span>
							</div>
							<span class="like-icon"></span>
						</div>

					</a>
				</div>
				<?php $i++;} ?>
				<!-- Listing Item / End -->
				<?php if($i>=9){?>
				<div class="col-md-12">
				<div id="MoreKode" style="text-align: center;margin-top: 15px;">
					<a href="#" class="button"> Show More</a>
				</div>
				</div>
				<?php }else{} ?>
			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							<ul>
								<?php if(isset($pagin)) { echo $pagin; }  ?> 
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	</div>
</div>
