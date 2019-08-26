<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}

$student=array('student_id'=>'Select Class',);

if(isset($hostel_detail)){
    
    foreach ($hostel_detail as $key => $value) {
    $hostel_dropdown[$value['id']]=$value['hostel_name'];
    }

}

?>



<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li class="active">Hostel</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Allotments</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">

    <?php foreach($hostels_list_all as $list):?>
    <!-- begin col-3 -->
    <div class="col-md-2 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-child"></i></div>
            <div class="stats-info">
                <h4><?php echo $list['hostel_name'];?></h4>
                <p><?php echo $list['vacancy'].'/'.$list['capacity'];?></p>    
            </div>
            <div class="stats-link">
                <a href="javascript:;"> Available/Total Seats <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <?php endforeach;?>
</div>
<!-- end row -->

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
                <h4 class="panel-title">Search Student</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, "id"=>"class_id"));?>
                            <div id="a"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Student</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('student_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$student, "id"=>"student_id"));?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Search</button>
                        </div>
                    </div>                    
                    
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>


<?php if(isset($student_detail['details'])): ?>
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
                <h4 class="panel-title">Student Details</h4>
            </div>

            <table class="table">
                <tr>
                    <td>Name</td>
                    <td><a href="#"><?php echo $student_detail['details']['student_name'];?></a></td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td><?php echo $student_detail['details']['class'].' - '.$student_detail['details']['section'];?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $student_detail['details']['gender'];?></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<?php endif; ?> 


<?php if(isset($hostel_dropdown)): ?>
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
                <h4 class="panel-title">New Allotment</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Hostel Name</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('hostel_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$hostel_dropdown, "id"=>"class_id"));?>
                            <div id="a"></div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Room Number</label>
                        <div class="col-md-9">
                            <input name="room_no" type="text" class="form-control" placeholder="Enter Room Number"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Allotment From</label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input name="allotted_from" type="text" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Allot</button>
                        </div>
                    </div> 

                    <input type="hidden" name="student_id" value="<?php echo $student_id;?>">
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?> 

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

