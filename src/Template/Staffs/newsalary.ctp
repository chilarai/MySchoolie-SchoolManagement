
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Staffs</a></li>
    <li class="active">Salary Payment</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Salary Payment for <?php echo date("M, Y", time());?></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Salary</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Staff Type</label>
                        <div class="col-md-9">
                            <select name="staff_type" placeholder="Select Staff" class="form-control">
                                <option value="1">Teachers</option>
                                <option value="2">Other Staffs</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
						<label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-warning" name="submit" value="Search"/>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- end panel -->


        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Staff List (Showing Teachers)</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($teacher_detail_salary as $key => $value): ?>
                    
                        <tr>

                            <td><?php echo $value['name'];?></td>
                            <td><?php echo json_decode($value['details_json'])->applied_for; ?></td>
                            <td><?php echo $value['total_salary'];?></td>

                            <form method="post"  action="salarypayment " >
                            <?php if($value['status']=='pending'): ?>
                            <td>Pending</td>
                            <td><button class="btn btn-warning btn-xs" value="<?php echo $value['salary_status_id'] ?>" name="salary_status_id">Pay</button></td>
                            <?php elseif($value['status']=='paid'): ?>
                            <td>View</td>
                            
                            <td><button class="btn btn-success btn-xs" value="<?php echo $value['salary_status_id'] ?>" name="salary_status_id">View</button></td>

                            <?php endif; ?>
                            </form>

                        </tr>
                    
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->

    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->

