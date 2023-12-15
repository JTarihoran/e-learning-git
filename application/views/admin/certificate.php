<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title"><?php echo $title ?></h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li><?php echo $title ?></li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4><?php echo $title ?> - <?php echo $result->name_course ?></h4>
						</div>
						<div class="widget-inner">
							<div class="col-lg-12">
									<!-- <iframe src="<?= base_url(); ?>assets/admin/template/template.pdf" frameborder="0" width="100%" height="480px" allowfullscreen="false" mozallowfullscreen="false" webkitallowfullscreen="false"></iframe> -->
									<?php if ($result->file_path == NULL && $result->file_name == NULL){ ?>
										<img src="<?= base_url(); ?>assets/admin/template/notfound.png" style="display: block;margin-left: auto;margin-right: auto;width: 50%;">
									<?php }else{ ?>
										<img src="<?= base_url(); ?>/<?php echo $result->file_path ?>/<?php echo $result->file_name?>" style="display: block;margin-left: auto;margin-right: auto;width: 50%;">
									<?php }?>
							</div>
							<form class="edit-profile m-b30" action="<?php echo base_url('admin/course/update_cert/'); ?>" method="post" enctype="multipart/form-data">
								<div class="row">
									 <input type="hidden" name="id_course" value="<?php echo $result->id_course ?>">
									<div class="form-group col-6">
										<label class="col-form-label">Certificate <span class="text-danger">*</span></label>
										<div>
											<input class="form-control" type="file" name="certif"> 
										</div>
										<label class="col-form-label" style="color: red;">Notes : Apabila ingin merubah certificate dapat upload file pdf</label>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-6">
										<label class="col-form-label">Score <span class="text-danger">*</span></label>
										<div>
											<input class="form-control" type="text" name="score" value="<?php echo $result->score ?>"> 
											<?php echo form_error('score'); ?>
										</div>
										<label class="col-form-label" style="color: red;">Notes : Setup score minimal untuk mendapatkan certificate</label>
									</div>
									
									<div class="col-12">
										<a  href="<?php echo base_url('admin/course'); ?>"><button type="button" class="btn-secondry add-item m-r5"></i>Back</button></a>
										<button type="submit" value="upload" class="btn">Save</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>