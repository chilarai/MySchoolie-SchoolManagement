
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Hostels</a></li>
    <li class="active">Facilities</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Hostels</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
     
        <?php foreach ($hostels_list as $key => $value): ?>
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-2">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"><?php echo $value['hostel_name']; ?></h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Facility</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Stay Type</td>
                            <td><?php echo $value['hostel_type']; ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Occupancy</td>
                            <td><?php echo $value['capacity']; ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Vacancy</td>
                            <td><?php echo $value['vacancy']; ?></td>
                        </tr>                        
                        <tr>
                            <td>3</td>
                            <td>Mess</td>
                            <td><?php echo json_decode($value['details_json'])->mess; ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Food</td>

                            <?php   if(json_decode($value['details_json'])->breakfast == 1) $breakfast = ' Breakfast '; else $breakfast='';
                                    if(json_decode($value['details_json'])->lunch == 1) $lunch = ' Lunch '; else $lunch='';
                                    if(json_decode($value['details_json'])->dinner == 1) $dinner = ' Dinner '; else $dinner='';
     
                                    echo "<td>".$breakfast.$lunch,$dinner."</td>";
                            ?>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Fees</td>
                            <td><?php echo json_decode($value['details_json'])->fees; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
        <?php endforeach ; ?>
        
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->

