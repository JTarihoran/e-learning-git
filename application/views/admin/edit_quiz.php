<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Edit Quiz</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Edit Quiz</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4><?php echo $title ?> - </h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" action="<?php echo base_url('admin/course/update/'); ?>" method="post">
								<div class="row">
									<input type="hidden" name="id_course" value="<?php echo $row->id_course ?>">
									<div class="col-12">
										<label class="col-form-label">Question <span class="text-danger">*</span></label>
										<div>
											<textarea class="form-control" name="question"><?php echo $row->question?></textarea>
											<?php echo form_error('question'); ?>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Answer A <span class="text-danger" >*</span></label>
										<div>
											<input class="form-control" type="text" name="A" value="<?php echo $row->a ?>">

											<?php echo form_error('A'); ?>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Answer B <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="B" value="<?php echo $row->b ?>">
											<?php echo form_error('B'); ?>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Answer C <span class="text-danger">*</span></label>
										<div>
											<input class="form-control" name="C" type="text" value="<?php echo $row->c ?>">
											<?php echo form_error('C'); ?>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Answer D <span class="text-danger">*</span></label>
										<div>
											<input class="form-control" name="D" type="text" value="<?php echo $row->d ?>">
											<?php echo form_error('D'); ?>
										</div>
									</div>
									<div class="form-group col-2">
										<label class="col-form-label">Correct Answer <span class="text-danger">*</span></label>
										<div>
											<select class="form-control" name="correct_answer">
	                                            <option value="A">A</option>
	                                            <option value="B">B</option>
	                                            <option value="C">C</option>
	                                            <option value="D">D</option>
	                                        </select>
	                                        <?php echo form_error('correct_answer'); ?>
										</div>
									</div>
									<div class="seperator"></div>
									<div class="col-12">
										<a  href="<?php echo base_url(); ?>admin/course/bank_quiz/<?php echo encode_id($row->id_course);?>"><button type="button" class="btn-secondry add-item m-r5"></i>Back</button></a>
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