<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo $title?></h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li><a href="<?php echo base_url('dashboard')?>">Dashboard</a></li>
							<li><?php echo $title?></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
			<?php
				// Session 
				if($this->session->flashdata('sukses')) { 
					echo '<div class="notification success closeable">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} 

				// File upload error
				if(isset($error)) {
					echo '<div class="notification error closeable">';
					echo $error;
					echo '</div>';
				}

				// Error
				echo validation_errors('<div class="notification error closeable">','</div>'); 
				?>	
				<div id="add-listing">
				
					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-picture"></i> Screenshoot</h3>
						</div>
						<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/jquery-2.2.0.min.js"></script>
						<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/dropzone.js"></script>
						<!-- Dropzone -->
						<div class="submit-section">
							<form action="" class="dropzone" ></form>
						</div>
						
						<script type="text/javascript">

						Dropzone.autoDiscover = false;

						var foto_upload= new Dropzone(".dropzone",{
						url: "<?php echo base_url('explore/proses_upload') ?>",
						maxFilesize: 2,
						method:"post",
						acceptedFiles:"image/*",
						paramName:"userfile",
						dictInvalidFileType:"Type file ini tidak dizinkan",
						addRemoveLinks:true,
						});


						//Event ketika Memulai mengupload
						foto_upload.on("sending",function(a,b,c){
							a.token=Math.random();
							c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
							
						});
						
						//Event ketika Memulai mengupload
						foto_upload.on("sending",function(a,b,c){
							a.users=$("#txt_name").val();
							c.append("user_foto",a.users); //Menmpersiapkan token untuk masing masing foto
						});

						//Event ketika foto dihapus
						foto_upload.on("removedfile",function(a){
							var token=a.token;
							$.ajax({
								type:"post",
								data:{token:token},
								url:"<?php echo base_url('explore/remove_foto') ?>",
								cache:false,
								dataType: 'json',
								success: function(){
									console.log("Foto terhapus");
								},
								error: function(){
									console.log("Error");

								}
							});
						});


						</script>
						
					</div>
					<!-- Section / End -->

				<form action="<?php echo base_url('explore/create')?>" method="post">
					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>
						<?php 
						$date=date("mdY");
						$idupload = str_shuffle($date).$total+1
						?>
						<input type="hidden" name="upload_id" value="<?php echo $idupload; ?>" id="txt_name"/>
						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Judul <i class="tip" data-tip-content="Judul kode anda "></i></h5>
								<input class="search-field" type="title" name="title" value=""/>
							</div>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- kategori -->
							<div class="col-md-6">
								<h5>Category</h5>
								<select name="category_id" class="chosen-select-no-single" >
									<option label="blank">Pilih Categori</option>	
									<?php foreach ($category as $category){?>
									<option value="<?php echo $category['id_category']?>" ><?php echo $category['categories_name']?></option>
									<?php } ?>
								</select>
							</div>

							<!-- Status -->
							<div class="col-md-6">
								<h5>Status</h5>
								<select name="status_upload" class="chosen-select-no-single" >
									<option label="blank">Pilih Status</option>	
									<option value="publish" >Publish</option>
									<option value="draf" >Draf</option>
								</select>
							</div>

						</div>
						<!-- Row / End -->

					</div>
					<!-- Section / End -->

					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-docs"></i> Details</h3>
						</div>

						<!-- Description -->
						<div class="form">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
						</div>

					</div>
					<!-- Section / End -->

					<button type="submit" name="submit" class="button preview">Simpan <i class="fa fa-arrow-circle-right"></i></button>
				</form>
				</div>
			</div>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
			</div>

		</div>

	</div>
	<!-- Content / End -->
