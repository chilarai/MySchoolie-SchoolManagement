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
    <li><a href="javascript:;">Library</a></li>
    <li class="active">Issue</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Book Issue</h1>
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
                <h4 class="panel-title">Book Issue</h4>
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





                    <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST', 'data-parsley-validate'=>true  ,'class'=>'form-horizontal']);?>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Book Name</label>
                        <div class="col-md-9">
                        <label class="col-md-3 control-label"><?php echo $book_detail['name']; ?></label>
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Author</label>
                        <div class="col-md-9">
                        <label class="col-md-3 control-label"><?php echo $book_detail['author']; ?></label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">ISBN CODE</label>
                        <div class="col-md-9">
                        <label class="col-md-3 control-label"><?php echo $book_detail['isbn_code']; ?></label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, "id"=>"class_id"));?>
                            <div id="a"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Student  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('student_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$student, "id"=>"student_id"));?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Issued On  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="issue_date" data-parsley-required="true" placeholder="YYYY/DD/MM" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                  <div class="form-group">
                        <label class="control-label col-md-3">Issued Till  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="issued_till" data-parsley-required="true"  placeholder="YYYY/DD/MM"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Remarks  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="remarks"  data-parsley-required="true"  placeholder="Remarks"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Issue</button>
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
