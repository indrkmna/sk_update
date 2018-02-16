<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><?php echo $title?></h2>

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

		<div class="col-lg-9 col-md-8 padding-right-30">


			<div class="kode row">
				
			<?php $i=0; foreach ($articles as $articles){?>
				<!-- Listing Item -->
				<div class="con col-lg-12 col-md-12" style="display: none;">
					<div class="listing-item-container list-layout">
						<a href="<?php echo base_url('article/read/'.$articles['slug_article'])?>" class="listing-item">
							
							<!-- Image -->
							<div class="listing-item-image">
								<img src="<?php echo base_url('assets/upload/image/'.$articles['cover_article'])?>" alt="">
								<span class="tag"><?php echo $articles['category_name']?></span>
							</div>
							
							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
								<h3><?php echo $articles['title']?></h3>
							
								<?php
									$out = substr($articles['content'],0,100);
									echo $out;
								?>
								
								</div>

								<div class="listing-item-details"><?php echo date('d F Y', strtotime($articles['date_post']))?></div>
							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->
			
			<?php $i++;} ?>
			<?php if($i==1){?>
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


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-3 col-md-4">
			<div class="sidebar">

			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Search Article</h3>
				<div class="search-blog-input">
					<div class="input"><input class="search-field" type="text" placeholder="Type and hit enter" value=""/></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- Widget / End -->
			
			<!-- Widget -->
			<div class="widget margin-top-40">

				<h3>Popular Articles</h3>
				<ul class="widget-tabs">

					<!-- Post #1 -->
					<li>
						<div class="widget-content">
								<div class="widget-thumb">
								<a href="pages-blog-post.html"><img src="images/blog-widget-03.jpg" alt=""></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="pages-blog-post.html">Hotels for All Budgets </a></h5>
								<span>October 26, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
					
					<!-- Post #2 -->
					<li>
						<div class="widget-content">
							<div class="widget-thumb">
								<a href="pages-blog-post.html"><img src="images/blog-widget-02.jpg" alt=""></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="pages-blog-post.html">The 50 Greatest Street Arts In London</a></h5>
								<span>November 9, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
					
					<!-- Post #3 -->
					<li>
						<div class="widget-content">
							<div class="widget-thumb">
								<a href="pages-blog-post.html"><img src="images/blog-widget-01.jpg" alt=""></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="pages-blog-post.html">The Best Cofee Shops In Sydney Neighborhoods</a></h5>
								<span>November 12, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>

				</ul>

			</div>
			<!-- Widget / End-->

			</div>
			
		</div>
		<!-- Sidebar / End -->
	</div>
</div>
