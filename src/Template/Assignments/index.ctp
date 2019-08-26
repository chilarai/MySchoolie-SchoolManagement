
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Assignments</a></li>
    <li class="active">Assignments</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Assignments</h1>
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
                <h4 class="panel-title">Assignments</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Assignment to View </label>
                        <div class="col-md-9">
                            <select class="form-control" name="type">
                                <option value=1>Completed</option>
                                <option value=2>Today's Submission</option>
                                <option value=3>Upcoming</option>
                                <option value=4>All</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Select</button>
                        </div>
                    </div>
                    
                </form>
            </div>    
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
    
</div>

    
<?php if(!empty($assignment_list['details'])){?>

<!-- begin panel -->
<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Assignments</h4>
    </div>
    <div class="panel-body">

        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">

            <div class="panel-body">
                <table  id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>Subject</th>
                        <th>Homework</th>
                        <th>Submission Date </th>
						<th></th>
                    </thead>
                    <tbody>

                         


						<?php  foreach ($assignment_list['details'] as $key => $value): ?>
							<tr>
								<td><?php echo $value['subject_name'];?></td>
								<td><?php echo $value['homework'];?></td>
								<td><?php echo $value['date_submission'];?></td>
								<td><div><button class="btn btn-warning" onclick="location.href='/assignments/editassignment/<?php echo $value['id'];?>'">Edit</button></div></td>
							</tr>
						<?php endforeach ; ?>
						
                    </tbody>
                </table>
            </div>
        </div>        
    </div>   
</div>
<!-- end panel -->
<?php }?>