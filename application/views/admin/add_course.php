<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Add Course</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Add Course</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Add Course</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" action="<?php echo base_url('admin/course/insert'); ?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Basic info</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Course Name <span class="text-danger">*</span></label>
										<div>
											<input class="form-control" type="text" name="name">
											<?php echo form_error('name'); ?>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Status Course <span class="text-danger">*</span></label>
										<div>
											<select class="form-control" name="status">
	                                            <option value="">-- Choose Status --</option>
	                                            <option value="Available">Available</option>
	                                            <option value="Pending">Pending</option>
	                                            <option value="Hold">Hold</option>
	                                        </select>
	                                        <?php echo form_error('status'); ?>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Course start</label>
										<div>
											<input class="form-control" name="start_date" type="text">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Course expire</label>
										<div>
											<input class="form-control" name="end_date" type="text">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Department <span class="text-danger">*</span></label>
										<div>
											<select class="form-control" name="dept_id">
	                                             <option value="">All Department</option>
	                                            <?php foreach ($dept as $row) { ?>
	                                            <option value="<?php echo $row->id?>"><?php echo $row->name;?></option>
	                                            <?php } ?>
	                                        </select>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Category <span class="text-danger">*</span></label>
										<div>
											<select class="form-control" name="category_id" placeholder="-- Choose Category --">
	                                             <option value="">All Category</option>
	                                            <?php foreach ($category as $row) { ?>
	                                            <option value="<?php echo $row->id?>"><?php echo $row->name;?></option>
	                                            <?php } ?>
	                                        </select>
										</div>
									</div>
									<div class="seperator"></div>
									
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Description</h3>
										</div>
									</div>
									<div class="form-group col-12">
										<label class="col-form-label">Course description <span class="text-danger">*</span></label>
										<div>
											<textarea class="form-control" name="description"> </textarea>
											<?php echo form_error('description'); ?>
										</div>
									</div>
									<div class="col-12 m-t20">
										<div class="ml-auto">
											<h3 class="m-form__section">3. Add Item</h3>
										</div>
									</div>
									<div class="col-12">
									  <table class="" id="tableLoop">
	                                      <thead>
	                                          <tr>
	                                              <th>Materi <span class="text-danger">*</span></th>
	                                              <th>Menu Materi </th>
	                                              <!-- <th><button class="btn btn-success btn-block" id="BarisBaru"><i class="fa fa-plus"></i> Baris Baru</button></th> -->
	                                          </tr>
	                                      </thead>
	                                   <tbody>
	                                   	  <tr>
								             <td>
								                  <input type="file" name="fileUp1[]" class="form-control fileUp" multiple>
								              </td>
								             <td>
								                  <input type="text" name="menu_course" class="form-control menu_course" placeholder="Menu Course">
								             </td>
								          </tr>
								           <tr>
								             <td>
								                  <input type="file" name="fileUp2[]" class="form-control fileUp" multiple>
								              </td>
								             <td>
								                  <input type="text" name="menu_course" class="form-control menu_course" placeholder="Menu Course">
								             </td>
								          </tr>
								           <tr>
								             <td>
								                  <input type="file" name="fileUp3[]" class="form-control fileUp" multiple>
								              </td>
								             <td>
								                  <input type="text" name="menu_course" class="form-control menu_course" placeholder="Menu Course">
								             </td>
								          </tr>
	                                   </tbody>	                                      
	                                  </table>
									</div>
							<!-- 		<div class="col-12 m-t20">
										<div class="ml-auto">
											<h3 class="m-form__section">4. Add Quiz</h3>
										</div>
									</div>
									<div class="col-12">
									  <table class="" id="tableLoopQuiz">
	                                      <thead>
	                                          <tr>
	                                              <th class="text-center">#</th>
	                                              <th>Question</th>
	                                              <th>Answer</th>
	                                              <th></th>
	                                              <th><button class="btn btn-success btn-block" id="BarisBaruQuiz"><i class="fa fa-plus"></i> Baris Baru</button></th>
	                                          </tr>
	                                      </thead>
	                                      <tbody>
												
	                                      </tbody>
	                                      
	                                  </table>
									</div> -->
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