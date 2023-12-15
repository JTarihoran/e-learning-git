 <div class="page-content bg-white">
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Course Start</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
	
        <!-- inner page banner -->
        <div class="page-banner contact-page section-sp2">
            <div class="container">
                <div class="row">
					<div class="col-lg-5 col-md-8 m-b30">
						<div class="bg-gray text-black contact-info-bx">
							<img src="<?= base_url(); ?>assets/images/logo-mki.png" alt="">
							<br><br><br>
							<h2 class="m-b10 title-head">Course <span>Start</span></h2>
							<p>Page untuk validasi user untuk memulai course. Apabila user siap maka dapat klik confirm.</p>
							<h5 class="m-t0 m-b20">Follow Us</h5>
							<ul class="list-inline contact-social-bx">
								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-7 col-md-7">
						<br><br>
						<form class="contact-bx" action="<?= base_url('course/course_play/'.encode_id($course->id_course)); ?>" method="post">
							<div class="heading-bx left">
								<input type="hidden" name="id_course" value="<?php echo $course->id_course ?>">
								<h2 class="title-head"><?php echo $course->name_course ?></h2>
								<p>Description : <?php echo $course->description?></p>
							</div>
								<div class="col-lg-12">
									<button name="submit" type="submit" class="btn button-md"> Confirm</button>
								</div>
						</form>
					</div>
				</div>
            </div>
		</div>
        <!-- inner page banner END -->
    </div>