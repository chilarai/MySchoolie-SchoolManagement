<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Canteens</a></li>
    <li class="active">Menu</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Menu</h1>
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
                <h4 class="panel-title">Upload Menu</h4>
            </div>
			<div class="panel-body">
			
				<?php if($message['status'] == 200): ?>
                    <div class="alert alert-success fade in m-b-15">
                        <strong>Success!</strong>
                        <?php echo $message['message']; ?>
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>
                    <?php elseif($message['status'] == 400): ?>
                    <div class="alert alert-danger fade in m-b-15">
                        <strong>Failure! </strong>
                        <?php echo $message['message']; ?>
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>                    
				<?php endif; ?>

				<!-- begin form -->
                <form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
			
                   
                    <div class="panel-body">
						<table class="table col-md-12">
							<thead>
								<th>Date</th>
								<th>Weekday</th>
								<th>Breakfast</th>
								<th>Lunch</th>
								
							</thead>
							<tbody>
								<?php for ($i=1;$i<=$number; $i++) : ?>
								<tr>
									<td><?php echo $i." ".$Month;?><input type="hidden" value="<?php echo $i;?>" name="date[]" ></td>
									<td>
										<select  class="form-control" name="week[]">
										<option value="">--Select Day--</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										</select>
									</td>
									<td><input type="text" class="form-control" name="breakfast[]" placeholder="breakfast"></td>
									<td><input type="text" class="form-control" name="lunch[]" placeholder="lunch"></td>
									
									
								</tr>
								<?php endfor; ?>
							</tbody>
						</table>
					</div>
					
				
					
					 <div class="form-group">
                        <div class="col-md-9">
						<label class="col-md-4 control-label">
                            <input type="submit" class="btn btn-warning" name="submit" value="Upload" />
                            </select>
                        </div>
                    </div> 
				
				</form>
				<!-- end form -->
			</div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->

    
</div>