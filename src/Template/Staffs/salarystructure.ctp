
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Staffs</a></li>
    <li class="active">Salary Structure</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Salary Structure</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">

        <?php foreach ($salary_structure_details as $key => $value): ?>
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"><?php echo $value['grade']; ?></h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Head</th>
                            <th>Amount (in INR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Basic Salary</td>
                            <td><?php echo $value['basic']; ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>HRA</td>
                            <td><?php echo $value['hra']; ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Conveyance</td>
                            <td><?php echo $value['conveyance']; ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Deductions</td>
                            <td><?php echo $value['deduction']; ?></td>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Total</th>
                            <th><?php echo $value['total']; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
        <?php endforeach; ?>
        
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->

