<?php
foreach ($teacherlist['details']['teacher_list'] as $key => $value) {
  $teacher[$value['id']]=$value['name'];
}

?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Feedback</a></li>
    <li class="active">New Feedback</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">New Feedback</h1>
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
                <h4 class="panel-title">New Feedback</h4>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST','class'=>'form-horizontal']);?>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Hostel Name</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="name" placeholder="Hostel Name"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Type</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('hostel_type', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>array('male'=>'Male','female'=>'Female','co-ed'=>'Co-ed'), "id"=>"hostel_type"));?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Warden</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('user_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$teacher));?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Seats</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="seats" placeholder="Total Seats"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Mess Availability</label>
                        <div class="col-md-9">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="mess" value="yes" checked/>
                                        Yes
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="mess" value="no"/>
                                        No
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Food Timings</label>
                        <div class="col-md-9">
                              <input type="checkbox" name="breakfast" value="1">Breakfast  
                              <input type="checkbox" name="lunch" value="1" >Lunch                                 
                              <input type="checkbox" name="dinner" value="1" >Dinner <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Fees</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="fees" placeholder="Fees"></textarea>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Create</button>
                        </div>
                    </div>
                    
                </form>
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
