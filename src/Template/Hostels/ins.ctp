<?php 
// if(!empty($hostel_on_leave_list)){
    
//     foreach ($hostel_on_leave_list as $key => $value) {
       
//     $hostel_student_dropdown[$value['hostel_leave_id']]=$value['name'];
//     }

// }

?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Hostels</a></li>
    <li class="active">Facilities</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">In</h1>
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
                <h4 class="panel-title">Search</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Select</label>
                        <div class="col-md-9">
                            <select name="leave_type" class="form-control">
                                <option value="upcoming">Upcoming</option>
                                <option value="today">Today</option>
                                <option value="all">All</option>
                                <option value="past">Past</option>
                            </select>
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
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Roll Number</th>
            <th>Class</th>
            <th>Hostel</th>
            <th>Back On</th>
            <th>Activity</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
     <?php foreach($hostel_on_leave_list as $list):?>
        <tr>
            <td><?php echo $list['name'];?></td>
            <td><?php echo $list['rollno'];?></td>
            <td><?php echo $list['class'];?></td>
            <td><?php echo $list['name_hostel'];?></td>
            <td><?php echo $list['back_on'];?></td>
            <?php  if($list['status'] == 1){


                    echo '<td><button class="btn btn-danger btn-small  btn-accept" value = "'.$list['hostel_leave_id'] .'" id="mark_btn-'.$list['hostel_leave_id'].'">Mark In</button></td>';
                    echo '<td><input type="text" ></td>';
                }
                else if($list['status'] == 0){
                    echo '<td><button class="btn btn-success btn-small" id="mark" disabled>Closed</button></td>';    
                    echo '<td><input type="text" ></td>';
                }

            ?>
            
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<script>
    
    $(".btn-accept").click(function(){
        var leave_id = $(this).attr("value");
        var mark_button_id = $(this).attr("id");

        console.log(mark_button_id);


        $("#"+mark_button_id).addClass("btn-success");
        $("#"+mark_button_id).removeClass("btn-danger btn-accept");
        $("#"+mark_button_id).text("Closed");
        $("#"+mark_button_id).prop("disabled",true); 


         $.post("<?php echo HOSTEL_LEAVE_UPDATE; ?>",{ "hostel_leave_id": leave_id}, function(data,status){

        });
    });

</script>