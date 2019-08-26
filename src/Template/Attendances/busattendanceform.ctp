<?php


foreach ($routes_list as $key => $value) {
  $route[$value['id']]=$value['name'];
}
?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fleet</a></li>
    <li class="active">Bus Attendance</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Bus Attendance Form</h1>
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
                <h4 class="panel-title">Generate Form</h4>
            </div>
            <div class="panel-body">

                <form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >

              <!--  <div class="form-group">
                        <label class="col-md-3 control-label">Report | Type</label>
                        <div class="col-md-9">
                            <select name="report_type" class="form-control">
                                <option value="1">Bus Students</option>
                                <option value="2">Bus Route</option>
                            </select>
                        </select>
                        </div>
                    </div> -->
					<div class="form-group">
                        <label class="col-md-3 control-label">Route Number | Name<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('route_id', array('type'=>'select','class'=>'form-control','data-parsley-required'=>true,'label'=>false, 'options'=>$route));?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-warning" name="submit" value="Download Form" />
                            </select>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- end panel -->
	</div>
	<!-- end col-6 -->
</div>
<!-- end row -->