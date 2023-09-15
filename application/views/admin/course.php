<!--Main container start -->
<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Setup Courses</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="<?= base_url(); ?>admin/dashboard"><i class="fa fa-home"></i>Home</a></li>
				<li>Setup Courses</li>
			</ul>
		</div>	
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<a href="<?php echo base_url(); ?>admin/course/add"><button type="button" class="btn mb-1 btn-primary">Add Course</button></a> 
					</div>
					<div class="widget-inner">
						 <?php 
						  $no = 1;
						  foreach ($course as $row) { ?>
						<div class="card-courses-list admin-courses">
							<div class="card-courses-media">
								<img src="assets/images/courses/pic1.jpg" alt=""/>
							</div>
							<div class="card-courses-full-dec">
								<div class="card-courses-title">
									<h4><?php echo $row->name ?></h4>
								</div>
								<div class="card-courses-list-bx">
									<ul class="card-courses-view">
										<li class="card-courses-user">
											<div class="card-courses-user-pic">
												<img src="assets/images/testimonials/pic3.jpg" alt=""/>
											</div>
											<div class="card-courses-user-info">
												<h5>Teacher</h5>
												<h4>Keny White</h4>
											</div>
										</li>
										<li class="card-courses-categories">
											<h5>3 Categories</h5>
											<h4>Backend</h4>
										</li>
										<li class="card-courses-review">
											<h5>3 Review</h5>
											<ul class="cours-star">
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
										</li>
										<li class="card-courses-stats">
											<a href="#" class="btn button-sm green radius-xl">Pending</a>
										</li>
										<li class="card-courses-price">
											<del>$190</del>
											<h5 class="text-primary">$120</h5>
										</li>
									</ul>
								</div>
								<div class="row card-courses-dec">
									<div class="col-md-12">
										<h6 class="m-b10">Course Description</h6>
										<p><?php echo $row->description?></p>	
									</div>
									<div class="col-md-12">
										<a href="#" class="btn green radius-xl outline">Approve</a>
										<a href="#" class="btn red outline radius-xl ">Cancel</a>
									</div>
								</div>
								
							</div>
						</div>
						<?php } ?>
						<div class="row">
					        <div class="col">
					                <!--Tampilkan pagination-->
					                <?php echo $pagination; ?>
					        </div>
					    </div>
					</div>
				</div>
			</div>
			<!-- Your Profile Views Chart END-->
		</div>
	</div>
</main>