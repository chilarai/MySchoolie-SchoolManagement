<?php


foreach ($route_details as $key => $value) {
  $route[$value['id']]=$value['name'];
}


foreach ($driver_details as $key => $value) {
  $driver[$value['id']]=$value['name'];
}

foreach ($fleet_details as $key => $value) {
  $fleet[$value['id']]=$value['vehicle_name'].' , '.$value['vehicle_no'];
}

foreach ($escort_details as $key => $value) {
	$escort[$value['escort_id']]=$value['escort_name'];
}
?>


<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fleet</a></li>
    <li class="active">RouteMap</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">RouteMap</h1>
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
                <h4 class="panel-title">Map The Route</h4>
            </div>
            <div class="panel-body">

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

                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data"   data-parsley-validate="true"  >

                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Route Number | Name<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('route_id', array('type'=>'select','class'=>'form-control','data-parsley-required'=>true,'label'=>false, 'options'=>$route));?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Fleet | Name<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('fleet_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$fleet));?>
                        </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Driver<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('driver_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$driver));?>
                        </select>
                        </div>
                    </div>
					 <div class="form-group">
                        <label class="col-md-3 control-label">Escort<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('escort_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$escort));?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Session  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <select class="form-control" name="session">
                                <option value="morning">Morning</option>
                                <option value="afternoon">Afternoon</option>
                                <option value="evening">Evening</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-warning" name="submit" />
                            </select>
                        </div>
                    </div>

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
                <h4 class="panel-title">RouteMap List</h4>
            </div>
            <div class="panel-body">

                <table class="table">
                    <thead>
                        <th>Route Name</th>
                        <th>Vehicle</th>
                        <th>Driver</th>
						<th>Escort</th>
                        <th>Time</th>
                    </thead>
                    <tbody>
                    <?php foreach ($fleet_route_list as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['route_name']; ?></td>
                            <td><?php echo $value['vehicle_no']."|". $value['vehicle_name']; ?></td>
                            <td><?php echo $value['driver_name']; ?></td>
							  <td><?php echo $value['escort_name']; ?></td>
                            <td><?php echo $value['timings']; ?></td>
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


<script>
    
    $("#class_id").change(function(){
        var newval = $("#class_id").val();
       /* $.post("<?php echo ALL_STUDENT_LIST; ?>",{"class_id":newval}, function(data,status){
            $("a").text(data);
        });*/

          $.post("<?php echo STUDENT_LIST; ?>",{ class_id: newval}, function(data,status){
            //console.log(data);
            var obj = JSON.parse(data);

            //console.log(newarr);
            //console.log(typeof(newarr.student_list));
            var newoptions = "";
            $.each(obj.details.student_list, function(index, obj2){
                //console.log(obj2.name+"-"+obj2.id);
                newoptions += "<option value='"+obj2.id+"'>"+obj2.name+"</option>";
            });
            console.log(newoptions);
            $("#student_id").empty();
            $("#student_id").append(newoptions);
        });
    });

</script>
