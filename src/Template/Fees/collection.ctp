<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fees</a></li>
    <li class="active">Collection</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Collection</h1>
<!-- end page-header -->

<!-- begin row -->
<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}




foreach ($studentlist['details']['student_list'] as $key => $value) {
  $student[$value['id']]=$value['name'];
}

?>

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
                <h4 class="panel-title">Fee Collection</h4>
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

        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Payment History</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Class | Section</th>
                        <th>Roll no</th>
                        <th>Fee Amount</th>
                        <th>Status</th>
                        <th>Payment Date</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php foreach ($fee as $key => $value): ?>
                        <tr class="">
                            <td><?php echo $value['student_name']; ?></td>
                            <td><?php echo $value['class']." ".$value['section']; ?></td>
                            <td><?php echo $value['rollno']; ?></td>


                            <td><?php if(is_null($value['exempted_fee'])) echo $value['actual_fee']; else echo $value['exempted_fee']; ?></td>


                            <td><?php echo $value['fee_status']; ?></td>
                            <td><?php if(is_null($value['payment_date'])) echo "Yet To Pay"; else echo $value['payment_date']; ?></td>

                            <form method="post" action="payment " >
                            <?php 



                                if($value['fee_status'] == 'pending')
                                    echo '<td>
                                            <button class="btn btn-warning btn-icon btn-circle btn-sm" name="fee_status_id" value='.$value['fee_student_status_id'].'><i class="fa fa-plus"></i></button></td>';
                                else

                                    echo '<td>
                                            <button class="btn btn-success btn-icon btn-circle btn-sm" name="fee_status_id" value='.$value['fee_student_status_id'].'><i class="fa fa-check"></i></button></td>';
                                    


                            ?>
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


