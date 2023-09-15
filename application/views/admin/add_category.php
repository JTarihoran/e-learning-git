
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title"><?php echo $title ?></h4>
				<!-- <ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li><?php echo $title ?></li>
				</ul> -->
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h5>Category</h5>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" method="post" action="<?php echo base_url('admin/category/insert'); ?>">
								<div class="row">
									<div class="form-group col-12">
										<label class="col-form-label">Category</label>
										<div>
											<input class="form-control" type="text" name="name">
										</div>
									</div>
									<div class="form-group col-12">
										<label class="col-form-label">Category Description</label>
										<div>
											<textarea class="form-control" name="description"></textarea>
										</div>
									</div>
									<div class="seperator"></div>
									<div class="col-12">
										 <a href="<?php echo base_url(); ?>admin/category"><button type="button" href="<?php echo base_url(); ?>admin/category" class="btn-secondry add-item m-r5"><i class="fa fa-arrow-left"></i> Back</button></a> 
										<button type="submit" class="btn">Save Changes</button>
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
	<div class="ttr-overlay"></div>
