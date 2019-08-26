<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Courses & Subjects</a></li>
    <li class="active">Subjects</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Subjects</h1>
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
                <h4 class="panel-title">New Subject</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" data-parsley-validate="true">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Subject Name<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" name="subject" class="form-control" data-parsley-required="true" placeholder="Subject Name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Remarks<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="remarks" data-parsley-required="true" placeholder="Remarks"></textarea>
                        </div>
                    </div>

                    <div class="form-group">	
						<label class="col-md-3 control-label"></label>
						<div class="col-md-9">
							<a class="btn btn-warning" href="#modal-dialog" data-toggle="modal">Add</a>
						</div>
					
					</div>
					<!-- #modal-dialog -->
					<div class="modal fade" id="modal-dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title">New Subject</h4>
								</div>
								<div class="modal-body">
									Are you sure you want to proceed?
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
									<input type="submit" class="btn btn-warning" name="Save" value="Proceed"/>
								</div>
							</div>
						</div>
					</div>
					<!-- end Modal -->
                    
                </form>
            </div>
        </div>
        <!-- end panel -->

        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Subjects List</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Remarks</th>
						<th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($subject_list as $key => $value): ?>
						
							<tr>
								<td><?php echo $value['name'];?></td>
								<td><?php echo $value['remark'];?></td>
								<td><div><button class="btn btn-warning" onclick="location.href='/courses/editsubject/<?php echo $value['id'];?>'">Edit</button></div></td>
							</tr>
						
						<?php endforeach ; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>


