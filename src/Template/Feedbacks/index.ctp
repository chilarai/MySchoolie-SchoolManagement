<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Feedbacks</a></li>
    <li class="active">Feedbacks</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Feedbacks</h1>
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
                <h4 class="panel-title">Feedbacks</h4>
            </div>
            <div class="panel-body">
                        <table  id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Roll No</th>
                                <th>Teacher Name</th>
                                <th>Heading</th>
                                <th>Details</th>
                                <th>Link</th>
                                <th>Link Type</th>
                                <th>Date</th>
								<th></th>
                            </thead>
                            <tbody>

                                <?php 


                                    foreach ($feedbacklist['details']['notice_list'] as $key => $value) {
                                        //pr($value);
                                        echo "<tr> <td>".$value['student_name']."</td>
                                                  <td>" . $value['class']."</td>
                                                  <td>" . $value['rollno']."</td>
                                                  <td>".$value['teacher_name']."</td>
                                                  <td>" . $value['heading']."</td>
                                                  <td>" . $value['details']."</td>
                                                  <td><a href='". BASE_URL.'uploads/notices/images/'.$value['attachment_link']."' 
                                                        target='_blank'><i class='fa fa-attachment'></i> View Attachment</a></td>
                                                  <td>" . $value['attachment_type']."</td>
                                                  <td>" . $value['date_created']."</td>
												  <td><div id='center_button'><button class='btn btn-warning' onclick=\"location.href='/feedbacks/editlist/". $value['id']."'\">Edit</button></div></td>
                                             </tr>";
                                    
                                    } 

                                ?>
								
                            </tbody>
                        </table>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>


