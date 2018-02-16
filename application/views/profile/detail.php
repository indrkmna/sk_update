<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="user-profile-titlebar">
					<div class="user-profile-avatar"><img src="<?php echo base_url('assets/upload/'.$user['photo'])?>" alt="<?php  echo $user['first_name'].' '.$user['last_name']?>"></div>
					<div class="user-profile-name">
						<h2><?php  echo $user['first_name'].' '.$user['last_name']?></h2>
						<div class="star-rating" data-rating="5">
							<div class="rating-counter"><a href="#listing-reviews">(60 reviews)</a></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>



<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-0">
				
			<!-- Verified Badge -->
			<div class="verified-badge with-tip" data-tip-content="Account has been verified and belongs to the person or organization represented.">
				<i class="sl sl-icon-user-following"></i> Verified Account
			</div>

			<!-- Contact -->
			<div class="boxed-widget margin-top-30 margin-bottom-50">
				<h3>Contact</h3>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> <?php  echo $user['phone']?></li>
					<li><i class="fa fa-envelope-o"></i><span class="__cf_email__" data-cfemail="e5918a88a5809d8488958980cb868a88"><?php  echo $user['email']?></span></li>
				</ul>

				<ul class="listing-details-sidebar social-profiles">
					<li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
					<!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
				</ul>

				<!-- Reply to review popup -->
				<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
					<div class="small-dialog-header">
						<h3>Send Message</h3>
					</div>
					<div class="message-reply margin-top-0">
						<textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
						<button class="button">Send Message</button>
					</div>
				</div>

				<a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
			</div>
			<!-- Contact / End-->

		</div>
		<!-- Sidebar / End -->


		<!-- Content
		================================================== -->
		<div class="col-lg-8 col-md-8 padding-left-30">

			<h3 class="margin-top-0 margin-bottom-40"><?php echo $user['first_name']?> Kode</h3>

			<!-- Listings Container -->
			<div class="row">
				<?php foreach($kode as $kode){?>
				<!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout">
						<a href="<?php echo base_url('explore/read/'.$kode['slug_upload'])?>" class="listing-item">
							
							<!-- Image -->
							<div class="listing-item-image">
								<?php 
									$limitSc 	= $this->mUpload->limitScreenshoot($kode['upload_id']);
									foreach ($limitSc as $limitSc){
								?>
								<img src="<?php echo base_url('assets/upload/image/'.$limitSc['nama_foto'])?>" alt="">
								<?php }?>
								<span class="tag"><?php echo $kode['title']?></span>
							</div>
							
							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
								<h3>Hotel Govendor</h3>
								<span>778 Country Street, New York</span>
								<?php 
								$vote 		= $this->mUpload->totalVote($kode['upload_id']);
								$rate 		= $this->mUpload->totalRate($kode['upload_id']);
								?>
									<?php if(!empty($vote || $rate)){?>
										<div class="star-rating" data-rating="<?php echo $vote/$rate?>">
											<div class="rating-counter">(<?php echo $rate?> reviews)</div>
										</div>
										<?php }else{?>
										<div class="star-rating">
											<div class="rating-counter">(<?php echo $rate?> Review)</div>
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
										</div>
										<?php } ?>
								</div>

								<span class="like-icon"></span>

								<div class="listing-item-details">Starting from $59 per night</div>
							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->
				<?php } ?>
				<div class="col-md-12 browse-all-user-listings">
					<a href="#">Browse All Listings <i class="fa fa-angle-right"></i> </a>
				</div>

			</div>
			<!-- Listings Container / End -->

				
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="margin-top-60 margin-bottom-20">Reviews</h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul class="rates">
						
						<?php foreach($review as $review){?>
						<li class="lirates" style="display: none;">
							<div class="avatar"><img src="<?php echo base_url('assets/upload/image/'.$review['photo'])?>" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by"><?php echo $review['first_name'].' '.$review['last_name'] ?> <div class="comment-by-listing">on <a href="<?php echo base_url('explore/read/'.$review['slug_upload'])?>"><?php echo $review['title']?></a></div> <span class="date"><?php echo date('d F Y', strtotime($review['post_date']))?></span>
									<div class="star-rating" data-rating="<?php echo $review['vote']?>"></div>
								</div>
								<p><?php echo $review['review']?></p>
								
							</div>
						</li>
						<?php } ?>
						<div class="clearfix"></div>
						<div id="loadMore" style="text-align: center;margin-top: 15px;">
							<a href="#" class="button"> Show More</a>
						</div>
					</ul>
				</section>
				<!-- Pagination / End -->
			</div>


		</div>

	</div>
</div>

