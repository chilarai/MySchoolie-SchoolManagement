
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Staffs</a></li>
    <li class="active">Vacancy</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Vacancy</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1"   data-parsley-validate="true"  >
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">New Vacancy</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">

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
                        <label class="col-md-3 control-label">Course Name</label>
                        <div class="col-md-9">
                            <select class="form-control" name="course_id">
                                <?php foreach ($course_list as $key => $value) {
                                        echo "<option value =".$value['id'].">" . $value['course_name']."</option>";
                                    
                                    } 

                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Employment Type</label>
                        <div class="col-md-9">
                            <select class="form-control" name="type">
                                <option value="Temporary">Temporary</option>
                                <option value="Permanent">Permanent</option>
                            </select>   
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Vaccant Seats</label>
                        <div class="col-md-9">
                            <input type="text" name="total_seats"  data-parsley-required="true"  placeholder="Vacanct Seats" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Minimum Qualification</label>
                        <div class="col-md-9">
                            <select class="form-control"  data-parsley-required="true" name="qualification">
                                <option value="Graduate">Graduate</option>
                                <option value="TGT">TGT</option>
                                <option value="PGT">PGT</option>
                            </select>   
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Final Closing Date</label>
                        <div class="col-md-9">
                           <input type="date"  data-parsley-required="true"  name="final_closing_date"  class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">	
                <label class="col-md-3 control-label"></label>
                    <div class="col-md-9">
                        <a class="btn btn-warning" href="#modal-dialog" data-toggle="modal">Submit</a>
                    </div>
					
                </div>
				<!-- #modal-dialog -->
				<div class="modal fade" id="modal-dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">New Vacancy</h4>
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
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->

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
                <h4 class="panel-title">Vaccancy List</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Course</th>
                        <th>Employment Type</th>
                        <th>Total Vaccancies</th>
                        <th>Minimum Qualification</th>
                        <th>Closing Date</th>
                    </thead>

                    <tbody>
                        <?php foreach ($vacancy_detail as $key => $value) {

                                echo "<tr> 
                                      <td>".$value['course_name']."</td> 
                                      <td>" . $value['employment_type']."</td>
                                      <td>".$value['vacancy']."</td> 
                                      <td>" . $value['qualification']."</td>
                                      <td>" . $value['date_closing']."</td>
                                      </tr>";
                            
                              } 

                        ?>

                    </tbody>
                </table>    
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->


