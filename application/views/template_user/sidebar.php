<div class="sticky-header navbar-expand-lg">
        <div class="menu-bar clearfix">
            <div class="container clearfix">
				<!-- Header Logo ==== -->
				<div class="menu-logo">
					<a href="index.html"><img src="<?= base_url(); ?>assets/images/logo-mki.png" alt=""></a>
				</div>
				<!-- Mobile Nav Button ==== -->
                <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<!-- Author Nav ==== -->
                <div class="secondary-menu">
                    <div class="secondary-inner">
                        <ul>
							<li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
							<li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
							<!-- Search Button ==== -->
							<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
						</ul>
					</div>
                </div>
				<!-- Search Box ==== -->
                <div class="nav-search-bar">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                        <span><i class="ti-search"></i></span>
                    </form>
					<span id="search-remove"><i class="ti-close"></i></span>
                </div>
				<!-- Navigation Menu ==== -->
                <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
					<div class="menu-logo">
						<a href="index.html"><img src="<?= base_url(); ?>assets/images/logo-mki.png" alt=""></a>
					</div>
                    <ul class="nav navbar-nav">	
						<li class="active"><a href="<?= base_url(); ?>course">Home</a></li>
						<li class="add-mega-menu"><a href="javascript:;">Our Courses <i class="fa fa-chevron-down"></i></a>
							<ul class="sub-menu add-menu">
								<li class="add-menu-left">
									<h5 class="menu-adv-title">Our Courses</h5>
									<ul>
										<li><a href="courses.html">Courses </a></li>
										<li><a href="courses-details.html">Courses Details</a></li>
										<li><a href="profile.html">Instructor Profile</a></li>
										<li><a href="event.html">Upcoming Event</a></li>
										<li><a href="membership.html">Membership</a></li>
									</ul>
								</li>
								<li class="add-menu-right">
									<img src="<?= base_url(); ?>assets/images/menu-dr.jpg" alt=""/>
								</li>
							</ul>
						</li>
						<?php if ($this->session->userdata('logged_in')['level'] == 1 || $this->session->userdata('logged_in')['level'] == 2) { ?>
								<li class="nav-dashboard"><a href="<?= base_url(); ?>admin/dashboard">Manage E-Learning</a></li>
						<?php }else{redirect(base_url('auth'));} ?>
						<li class="active"><a href="<?= base_url(); ?>auth/logout">Logout</a></li>
					
					</ul>
					<div class="nav-social-link">
						<a href="javascript:;"><i class="fa fa-facebook"></i></a>
						<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
						<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
					</div>
                </div>
				<!-- Navigation Menu END ==== -->
            </div>
        </div>
    </div>
</header>
<!-- header END ==== -->