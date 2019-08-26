<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Appointments</a></li>
	<li class="active">Appointments</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Appointments</h1>
<!-- end page-header -->



<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
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
                <h4 class="panel-title">Appointments</h4>
            </div>
		<div class="panel-body">
        <div class="result-container">




            <form class="form-horizontal" method="post">                    
                <div class="form-group">
                    <label class="col-md-3 control-label">Appointment Type </label>
                    <div class="col-md-9">
                        <select class="form-control" name="type">
                            <option value=1>Upcoming</option>
                            <option value=2>Past</option>
                            <option value=3>Today</option>
                            <option value=4>All</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-9">
                        <button class="btn btn-warning">View</button>
                    </div>
                </div>
                
            </form>



            <?php if(!empty($appointment_list['details'])):?>
            
           <!-- <ul class="pagination pagination-without-border pull-right m-t-0">
                <li class="disabled"><a href="javascript:;">«</a></li>
                <li class="active"><a href="javascript:;">1</a></li>
                <li><a href="javascript:;">2</a></li>
                <li><a href="javascript:;">3</a></li>
                <li><a href="javascript:;">4</a></li>
                <li><a href="javascript:;">5</a></li>
                <li><a href="javascript:;">6</a></li>
                <li><a href="javascript:;">7</a></li>
                <li><a href="javascript:;">»</a></li>
            </ul>-->
            <ul class="result-list">

            <?php foreach ($appointment_list['details'] as $key => $value) : ?>

                <li>
                    <div class="">
                        <a href="javascript:;"><img height="150px" width="100px" src="<?php echo BASE_URL?>uploads/students/images/student_photo/<?php echo json_decode($value['details_json'])->picture_link;?>" alt="" /></a>
                    </div>

                    

                    <div class="result-info">
                        <h4 class="title"><a href="javascript:;"> <?php echo $value['parent_name']; ?> </a></h4>
                        <p class="location">Student: <?php echo $value['student_name']; ?> </p>
                        <p class="desc">
                            <?php echo $value['subject']; ?>
                        </p>
                        <div class="btn-row">
                           <?php echo date('l, d F Y',strtotime($value['date'])); ?> 
                        </div>

                    </div>
                    <?php if($value['type']==1):?>
                        <div class="result-price" id="<?php echo $value['appointment_id']; ?>">                        
                            <button type="submit" id="acc-<?php echo $value['appointment_id']; ?>" value="2" class="btn btn-success btn-sm accept_meet" >Accept</button>
                            <!-- <button type="submit"  id="rej-<?php echo $value['appointment_id']; ?>" value="3" class="btn btn-danger  btn-sm accept_meet" >Reject</button> -->
                            <button type="submit" id="id-<?php echo $value['appointment_id']; ?>" class=" btn-sm hidden_button" >Fine</button>
                            <a type="submit"  href="appointments/editappointment/<?php echo $value['appointment_id'];?>" class="btn btn-sm btn-warning" >Edit</a>
                        </div>
                    <?php elseif($value['type']==2):?>
                    <div class="result-price">                        
                        <a  class="btn btn-success  btn-sm">Accepted</a>
                       

                        <a type="submit"  href="appointments/editappointment/<?php echo $value['appointment_id'];?>" class="btn btn-sm btn-info" >Edit</a>
                    </div>
                    <?php elseif($value['type']==3):?>
                    <div class="result-price">                        
                       <!--  <a class="btn btn-danger  btn-sm">Rejected</a> -->

                        <a type="submit"  href="appointments/editappointment/<?php echo $value['appointment_id'];?>" class="btn btn-sm btn-info" >Edit</a>
                    </div>
                    <?php endif; ?> 

                </li>

            <?php endforeach; ?>    

                    
            <div class="clearfix">
                <ul class="pagination pagination-without-border pull-right">
                    <li class="disabled"><a href="javascript:;">«</a></li>
                    <li class="active"><a href="javascript:;">1</a></li>
                    <!--<li><a href="javascript:;">2</a></li>
                    <li><a href="javascript:;">3</a></li>
                    <li><a href="javascript:;">4</a></li>
                    <li><a href="javascript:;">5</a></li>
                    <li><a href="javascript:;">6</a></li>
                    <li><a href="javascript:;">7</a></li>-->
                    <li><a href="javascript:;">»</a></li>
                </ul>
            </div>

            <?php endif; ?>  

        </div>
		</div>
	</div>
    </div>
    <!-- end col-12 -->
</div>
<!-- end row -->

<script>
    
    $(document).ready(function(){
        $(".hidden_button").hide();
    });
    $(".accept_meet").click(function(){
        var newval = $(this).attr("value");
        var appointment_id = $(this).parent().attr("id");


        console.log(newval+" "+appointment_id);

        
        $("#id-"+appointment_id).show();

        if(newval == 2){
            $("#id-"+appointment_id).addClass("btn btn-success");;
            $("#id-"+appointment_id).html('Accepted');
        }
        else{
            $("#id-"+appointment_id).addClass("btn btn-danger");;
            $("#id-"+appointment_id).html('Rejected');

        }

        $("#rej-"+appointment_id).hide(); 
        $("#acc-"+appointment_id).hide();


        $.post("<?php echo AJAX_APPOINTMENT_UPDATE; ?>",{ "appointment_status": newval, "appointment_id": appointment_id}, function(data,status){
        //console.log(data);
        // var obj = JSON.parse(data);
        //console.log(newarr);
        //console.log(typeof(newarr.student_list));
        //console.log(obj2.name+"-"+obj2.id);
        });
    });

</script>


