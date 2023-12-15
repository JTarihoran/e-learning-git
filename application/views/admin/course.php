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
		<!-- <iframe src="<?= base_url(); ?>assets/Presentation SHE Leader Talk MKI-01.pdf#toolbar=0" width="800" height="600"></iframe>	 -->
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<a href="<?php echo base_url(); ?>admin/course/add"><button type="button" class="btn mb-1 btn-primary">Add Course</button></a> 
					</div>
					<div class="widget-inner">
						<?php if ($course == NULL) { ?>
							<center><h7>Course Not Found</h7></center>
						<?php } ?>
						<?php 
						  $no = 1;
						  foreach ($course as $row) { ?>
						<div class="card-courses-list admin-courses">
							<div class="card-courses-media">
								<img src="<?php echo base_url(); ?>assets/images/courses/pic9.jpg" alt=""/>
							</div>
							<div class="card-courses-full-dec">
								<div class="card-courses-title">
									<h4><?php echo $row->name ?></h4>
								</div>
								<div class="card-courses-list-bx">
									<ul class="card-courses-view">
										<li class="card-courses-categories">
											<h5>Categories</h5>
											<h4>Backend</h4>
										</li>
										<li class="card-courses-list">
											<?php if ($row->status == "Available") { ?> 
											 	<a style="text-align: right;" class="btn button-sm blue radius-xl">Available</a>
											<?php }else if ($row->status == "Pending") { ?>
												<a style="text-align: right;" class="btn button-sm orange radius-xl">Pending</a>
											<?php }else if ($row->status == "Hold") { ?>
												<a style="text-align: right;" class="btn button-sm red radius-xl">Hold</a>
											<?php } ?>
											
										</li>
									</ul>
								</div>
								<div class="row card-courses-dec">
									<div class="col-md-12">
										<h6 class="m-b10">Course Description</h6>
										<p><?php echo $row->description?></p>	
									</div>
									<div class="col-md-12">
										<a href="<?php echo base_url(); ?>admin/course/add_quiz/<?php echo encode_id($row->id);?>" class="btn green radius-xl outline">Add Quiz</a>
										<a href="<?php echo base_url(); ?>admin/course/bank_quiz/<?php echo encode_id($row->id);?>" class="btn blue radius-xl outline">Bank Quiz</a>
										<a href="<?php echo base_url(); ?>admin/course/certificate/<?php echo encode_id($row->id);?>" class="btn yellow radius-xl outline">Certifacate & Score</a>
										<a href="<?php echo base_url(); ?>admin/course/edit/<?php echo encode_id($row->id);?>" class="btn orange radius-xl outline">Edit</a>
										<a href="<?php echo base_url(); ?>admin/course/delete/<?php echo encode_id($row->id);?>" class="btn red outline radius-xl ">Delete</a>
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