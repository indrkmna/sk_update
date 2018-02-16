<style>
    #imagePreview {
        margin-top: 7px;
        width: 458px;
        height: 355px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
</style>
<script type="text/javascript">
    $(function() {
        $("#file").on("change", function() {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    $("#imagePreview").css("background-image", "url(" + this.result + ")");
                }
            }
        });
    });
</script>

<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Buat Artikel</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                        <li>Buat Artikel</li>
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
                    <div class="add-listing-section">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> Informasi dasar</h3>
                        </div>

                        <form action="<?php echo base_url('article/create');?>" method="post" enctype="multipart/form-data">
                            <!-- Title -->
                            <div class="row with-forms">
                                <div class="col-md-12">
                                    <h5>Judul <i class="tip" data-tip-content="Judul untuk artikel anda."></i></h5>
                                    <input name="title" class="search-field" type="text" name="title" value="" />
                                </div>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Status -->
                                <div class="col-md-6">
                                    <h5>Kategori <i class="tip" data-tip-content="Kategori untuk artikel anda."></i></h5>
                                    <select name="category_id" class="chosen-select-no-single">
                                        <option label="blank">Pilih Kategori</option>
                                        <?php foreach ($categories as $category){?>
                                            <option value="<?php echo $category['category_id'];?>">
                                                <?php echo $category['category_name'];?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <h5>Status <i class="tip" data-tip-content="Status artikel anda."></i></h5>
                                    <select name="status_article" class="chosen-select-no-single">
                                        <option label="blank">Pilih Status</option>
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <!-- Section / End -->

                    <!-- Section -->
                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-picture"></i> Upload Cover</h3>
                        </div>
                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>Upload Cover</h5>
                                <input type="file" name="cover_article" class="form-control" id="file">
                            </div>
                            <!-- Dropzone -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="imagePreview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Section / End -->

                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-docs"></i> Deksripsi Artikel</h3>
                        </div>

                        <!-- Description -->
                            <h5>Deksripsi <i class="tip" data-tip-content="Deksripsi untuk artikel anda."></i></h5>
                                <textarea name="content" id="edit"></textarea>
                    </div>
                    <div class="form-row">
                        <input type="submit" class="button preview" name="login" value="Simpan" style="width:15%; border-radius: 6px; margin-bottom:10px " />

                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>


