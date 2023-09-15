
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
							 <a href="<?php echo base_url(); ?>admin/category/add"><button type="button" class="btn mb-1 btn-primary">Add Category</button></a> 
						</div>
						<div class="widget-inner">
							<table id="table_id" class="display">
			    				<thead>
							        <tr>
							            <th>No</th>
							            <th>Name</th>
							            <th>Description</th>
							            <th>Created At</th>
							            <th>Action</th>
							        </tr>
							    </thead>
							    <tbody>
						    	  <?php 
						    	  $no = 1;
						    	  foreach ($category as $row) { ?>
							        <tr>
							            <td><?php echo $no++?></td>
							            <td><?php echo $row->name;?></td>
							            <td><?php echo $row->description;?></td>
							            <td><?php echo $row->created_at;?></td>
							            <td class="text-center">
	                                        <div class="btn-group mb-2 btn-group-sm">
	                                            <a href="<?php echo base_url(); ?>admin/category/edit/<?php echo $row->id; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
	                                            <a href="<?php echo base_url(); ?>admin/category/delete/<?php echo $row->id; ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i> Delete</a>
	                                        </div>
                                        </td>
							        </tr>
							    <?php } ?>
							    </tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>
