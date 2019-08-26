<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Staffs</a></li>
	<li class="active">Teachers</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Teachers</h1>
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
                <h4 class="panel-title">Teachers</h4>
            </div>
            <div class="panel-body">

                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact number</th>
                            <th>Class Teacher</th>
							<th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($response['details']['teacher_list'] as $key => $value): ?>
                        <?php if($key % 2 == 1) $oddeven = 'odd'; else $oddeven = 'even';?>
                        <tr class="<?php echo $oddeven; ?>">
                            <td><?php echo $this->Html->link($value['teacher_name'], array("controller"=>"staffs", "action"=>"view",$value['teacher_id']));?></td>
                            <td><?php echo $value['mobile']; ?></td>
                            <td><?php echo $value['class'].'-'.$value['section']; ?></td>
							<td><?php echo $value['email']; ?></td>
                        </tr>
                    <?php endforeach ; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
    
</div>

