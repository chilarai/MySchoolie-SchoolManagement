<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}


foreach ($studentlist['details']['student_list'] as $key => $value) {
  $student[$value['id']]=$value['name'];
}

?>


<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fees</a></li>
    <li class="active">Exemptions</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Exemptions</h1>
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
                <h4 class="panel-title">New Exemption</h4>
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

                <form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
                    
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
                        <label class="col-md-3 control-label">Exempted on</label>
                        <div class="col-md-9">
                            <select name="exempted_on" class="form-control"   data-parsley-required="true">
                                <option value="tution">Tution Fee</option>
                                <option value="computer">Computer</option>
                                <option value="publication">Publication</option>
                                <option value="annual_charges">Annual Charges</option>
                                <option value="transport">Transport</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Exempted Amount</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="amount"  data-parsley-required="true" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Reason</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="reason" placeholder="Reason for Exemption"  data-parsley-required="true"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Submit</button>
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
                <h4 class="panel-title">Exempted Lists (all amounts in INR)</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Class | Section</th>
                        <th>Roll no</th>
                        <th>Actual Fee</th>
                        <th>Exempted Fee</th>
                        <th>Concession</th>
                        <th>Date</th>
                        <th>Reason</th>
                    </thead>
                    <tbody>
                        <?php foreach($exempt_list as $value):?>
                        <tr>
                            <td><?php echo $value['student_name'];?></td>
                            <td><?php echo $value['class'].' '.$value['section'];?></td>
                            <td><?php echo $value['rollno'];?></td>
                            <td><?php echo $value['actual_fee'];?></td>
                            <td><?php echo $value['exempted_fee'];?></td>
                            <td><?php echo $value['concession'];?></td>
                            <td><?php echo $value['date'];?></td>
                            <td><?php echo $value['exemption_reason'];?></td>
                        </tr>
                        <?php endforeach;?>
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


