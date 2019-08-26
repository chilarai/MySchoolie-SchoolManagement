<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
  <li><a href="javascript:;">Home</a></li>
  <li><a href="javascript:;">Settings upload</a></li>
  <li class="active">Class | Sections</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Uploads</h1>
<!-- end page-header -->

<form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
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
                <h4 class="panel-title">Upload Class | Section CSV File</h4>
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


                <div class="form-group">
                    <label class="col-md-3 control-label">CSV File</label>
                    <div class="col-md-9">
                        <input type="file" accept=".csv" class="form-control"  data-parsley-required="true"  name="upload_file">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-9">
                        <input type="submit" class="btn btn-warning" name="submit" value="Submit"/>
                        <a href='<?php echo BASE_URL.'uploads/csv/classes_sample.csv' ?>' class="btn btn-warning">Download Sample CSV</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- end panel -->

                <!-- begin panel -->
        <?php if(!empty($response['details']['class_list'][0]['id'])){?>

        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Class | Section List</h4>
            </div>
            <div class="panel-body">
                <table  id="data-table" class="table table-striped table-bordered">
                    <thead>
                  <th>Class Name</th>
                  <th>Class Sections</th>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($response['details']['class_list'] as $key => $value) {
                       //$class[$value['id']]=$value['class']." ".$value['section'];
                        echo "<td>".$value['class']."</td>";
                        echo "<td>".$value['section']."</td></tr>";
                      }
                      ?>
                    </tbody>
                </table>
            </div>




        </div>
        <!-- end panel -->
        <?php }?>
    </div>
    <!-- end col-6 -->    

</div>
</form>



