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
    <li><a href="javascript:;">Certificates</a></li>
    <li class="active">List</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">All Certificates</h1>
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
                <h4 class="panel-title">Certificates</h4>
            </div>
            <div class="panel-body">
                <form method="post"  class="form-horizontal" data-parsley-validate="true" >

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
                        <label class="col-md-3 control-label">Certificate  Type<i class="fa fa-asterisk text-danger f-s-8"></i> </label>
                        <div class="col-md-9">
                            <select class="form-control" id="certificate_type" name="certificate_type"   data-parsley-required="true" >
                                <option value=1>Character Certificate</option>
                                <option value=2>Transfer Type</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-warning" name="submit" value="Submit"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>


<!-- <script>

$(document).ready(function(){



    $("#certificate").change(function(){    

          if ($(this).data('options') === undefined) {
            /*Taking an array of all options-2 and kind of embedding it on the select1*/
            $(this).data('options', $('#certificate_type option').clone());
          }


          var id = $(this).val();

          if(id == 1){

            $('#certificate_type').empty().append('<option value=1>Transfer Certificate</option>');
            $('#certificate_type').append('<option value=2>Character Certificate</option>');
            $('#certificate_type').append('<option value=3>Marks Card</option>');

          }

          if(id == 2){

            $('#certificate_type').empty().append('<option value=1>Relieving Letter</option>');
            $('#certificate_type').append('<option value=2>Character Certificate</option>');
            

          }

    });

});

    

</script> -->

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
