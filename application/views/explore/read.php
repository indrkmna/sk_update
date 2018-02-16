<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
<?php foreach($listSc as $listSc){?>
	<a href="<?php echo base_url('assets/upload/image/'.$listSc['nama_foto'])?>" data-background-image="<?php echo base_url('assets/upload/image/'.$listSc['nama_foto'])?>" class="item mfp-gallery" title="<?php echo $listSc['nama_foto'] ?>"></a>
<?php } ?>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2><?php echo $explore['title']?> <span class="listing-tag"><?php echo $explore['categories_name']?></span></h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							2726 Shinn Street, New York
						</a>
					</span>
					<?php if(!empty($vote || $rate)){?>
					<div class="star-rating" data-rating="<?php echo $vote/$rate;?>">
					<div class="rating-counter"><a href="#listing-reviews">(<?php echo $rate?> Review)</a></div>
					</div>
					<?php }else{ ?>
					<div class="star-rating">
						<div class="rating-counter"><a href="#listing-reviews">(<?php echo $rate?> Review)</a></div>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
					</div>
					<?php } ?>
						
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li>
				</ul>
			</div>
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">
			<?php echo $explore['description']?>
			</div>
	
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>(<?php echo $rate?>)</span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul>
						<?php $i=0; foreach ($listRate as $listRate){?>
						<li style="display: none;">
							<div class="avatar"><img src="<?php echo base_url('assets/upload/image/'.$listRate['photo'])?>" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by"><?php echo $listRate['first_name'].' '.$listRate['last_name']?><span class="date"><?php echo date('d F Y', strtotime($listRate['post_date']))?></span>
									<div class="star-rating" data-rating="<?php echo $listRate['vote']?>"></div>
								</div>
								<p><?php echo $listRate['review']?></p>
							</div>
						</li>
						<?php $i++; } ?>
						<div class="clearfix"></div>
						<?php if($i==4){?>
						<div id="loadMore" style="text-align: center;margin-top: 15px;">
						<a href="#" class="button"> Show More</a>
						</div>
						<?php } ?>
					</ul>
				</section>

				<!-- Pagination -->
				
				<!-- Pagination / End -->
			</div>


			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Add Review</h3>
				
				<span class="leave-rating-title">Your rating for this listing</span>
				
				<form id="add-comment" class="add-comment">
				
				<div id="old_comment"></div>
				<!-- Rating / Upload Button -->
				<div class="row">
					<div class="col-md-6">
						<!-- Leave Rating -->
						<div class="clearfix"></div>
						<div class="leave-rating margin-bottom-30">
							<input class="rate" type="radio" name="rating" id="rating-1" value="5"/>
							<label for="rating-1" class="fa fa-star"></label>
							<input class="rate" type="radio" name="rating" id="rating-2" value="4"/>
							<label for="rating-2" class="fa fa-star"></label>
							<input class="rate" type="radio" name="rating" id="rating-3" value="3"/>
							<label for="rating-3" class="fa fa-star"></label>
							<input class="rate" type="radio" name="rating" id="rating-4" value="2"/>
							<label for="rating-4" class="fa fa-star"></label>
							<input class="rate" type="radio" name="rating" id="rating-5" value="1"/>
							<label for="rating-5" class="fa fa-star"></label>
						</div>
						<p></p>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<!-- Review Comment -->
					<fieldset>

						<div>
							<label>Review:</label>
							<textarea name="review" cols="40" rows="3" id="comment"></textarea>
							<input type="hidden" name="kode_id" value="<?php echo $explore['upload_id']?>"/>
						</div>

					</fieldset>

					<button id="btnrev" type="submit" name="submit" class="button">Submit Review</button>
					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

				
			<!-- Verified Badge -->
			<div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
				<i class="sl sl-icon-check"></i> Download Kode
			</div>


			<!-- Contact -->
			<div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Hosted by</span> <a href="<?php echo base_url('profile/view/'.$explore['username'])?>"><?php echo $explore['first_name'].' '.$explore['last_name']?></a></h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar"><img src="<?php echo base_url()?>assets/front/images/dashboard-avatar.jpg" alt=""></a>
				</div>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> (123) 123-456</li>
					<!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
					<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="7f0b10123f1a071e120f131a511c1012">[email&#160;protected]</span></a></li>
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

	</div>
</div>
