<div class="page-content bg-white">
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="<?= base_url().'course'; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> My Dashboard</a></li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row d-flex flex-row-reverse">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="course-detail-bx">
								<div class="course-buy-now text-center">
									<span>Menu Course</span>
								</div>
								<div class="cours-more-info">
									<div class="review">
										<span>3 Review</span>
										<ul class="cours-star">
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
									</div>
									<div class="price categories">
										<span>Categories</span>
										<h5 class="text-primary">Frontend</h5>
									</div>
								</div>
								<div class="course-info-list scroll-page">
									<ul class="navbar">
										<li><a class="nav-link" href="#overview"><i class="ti-zip"></i>Overview</a></li>
										<li><a class="nav-link" href="#curriculum"><i class="ti-bookmark-alt"></i>Curriculum</a></li>
										<li><a class="nav-link" href="#instructor"><i class="ti-user"></i>Instructor</a></li>
										<li><a class="nav-link" href="#reviews"><i class="ti-comments"></i>Reviews</a></li>
									</ul>
								</div>
							</div>
						</div>
					
						<div class="col-lg-9 col-md-8 col-sm-12">
						<?php 
						  $no = 1;
						  foreach ($course as $row) { ?>
							<div class="courses-post">
								<div class="ttr-post-info">
									<h2 class="post-title"><?php echo $row->name_course ?></h2>
                                    <div class="ttr-post-text">
                                    <iframe src="<?php echo base_url() ?><?php echo $row->file_path; ?>#toolbar=0&navpanes=0" frameborder="0" width="100%" height="720px" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
									<embed src="<?php echo base_url() ?><?php echo $row->file_path; ?>#toolbar=0&navpanes=0" width="500" height="375">
									<iframe ?wmode="transparent" type="application/pdf" id="iframe" src="<?php echo base_url() ?><?php echo $row->file_path; ?>#toolbar=0&navpanes=0&scrollbar=0" id="iframe" width="100%" height="685"></iframe>
									</div>
									<div class="ttr-post-text">
										<form class="contact-bx" action="<?= base_url('course/course_play'); ?>" method="post">
											<div class="heading-bx left">
												<input type="hidden" name="id_course" value="<?php echo $row->id_course ?>">
											</div>
										</form>
									</div>
								</div>
								<!--Tampilkan pagination-->
								<?php echo $pagination; ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>