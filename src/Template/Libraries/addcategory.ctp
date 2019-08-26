<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Library</a></li>
	<li class="active">Add a Category </li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Add a Category</h1>
<!-- end page-header -->


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Book Category Details</h4>
            </div>
        <div class="panel-body">
			<form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >

					<?php if($status == 200): ?>
					<div class="alert alert-success fade in m-b-15">
						<strong>Success!</strong>
						<?php echo $message; ?>
						<span class="close" data-dismiss="alert">&times;</span>
					</div>
					<?php elseif($status == 400): ?>
					<div class="alert alert-danger fade in m-b-15">
						<strong>Failure! </strong>
						<?php echo $message; ?>
						<span class="close" data-dismiss="alert">&times;</span>
					</div>                    
					<?php endif; ?>
					

					<div class="form-group">
						<label class="col-md-3 control-label">Category Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
						<div class="col-md-9">
							<input type="text" name="category_name" data-parsley-required="true" class="form-control" placeholder="Category Name"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Category Code  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
						<div class="col-md-9">
							<input type="text" name="category_code" data-parsley-required="true" class="form-control" placeholder="Category Code"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Description<i class="fa fa-asterisk text-danger f-s-8"></i> </label>
						<div class="col-md-9">
							<input type="text" name="description" data-parsley-required="true" class="form-control" placeholder="Description"/>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-9">
							<input type="submit" class="btn btn-warning" name="submit" value="Add"/>
						</div>
					</div>
			</form>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->

</div>

				

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
               <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Category List</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                    </thead>
                    <tbody>
                    <?php foreach ($book_categories as $key => $value): ?>
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $value['code'];?></td>
							<td><div id="center_button"><button class="btn btn-warning" onclick="location.href='editcategory/<?php echo $value['id'];?>'">Edit</button></div></td> 
                        </tr>
                    <?php endforeach ; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
	</div>
</div>
