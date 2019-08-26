
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Library</a></li>
    <li class="active">Return Book</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Return Book</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
     <!--   <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Return Book</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sort</label>
                        <div class="col-md-9">
                            <select class="form-control" name="type">
                                <option value=1>Classwise</option>
                                <option value=2>Active Books</option>
                                <option value=3>Upcoming</option>
                                <option value=4>All</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">View</button>
                        </div>
                    </div>
                    
                </form>-->

                <?php if(!empty($books_issued)){?>

                <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">List of Issued Books</h4>
                    </div>
                    <div class="panel-body">
                        <table  id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <th>Student Name</th>
                                <th>Book Name</th>
                                <th>Author</th>
                                <th>Issued Till </th>
                                <th>Issued From </th>
                                <th>Class</th>
                                <th>Roll No</th>
								<th>Return</th>
                            </thead>
                            <tbody>

                                <?php 


                                    foreach ($books_issued as $key => $value) {
                                        //pr($value);
                                        echo "<tr> 
												  <td>" . $value['student_name']."</td>
                                                  <td>" . $value['book_name']."</td>
                                                  <td>" . $value['author']."</td>
                                                  <td>" . $value['issued_till']."</td>
                                                  <td>" . $value['issued_from']."</td>
                                                  <td>" . $value['class']."</td>
                                                  <td>" . $value['rollno']."</td>
												  <td><a href=".BASE_URL."libraries/returnbook/".$value['issuance_id']."><button class='btn btn-warning' value='return'>return</button></td>
                                             </tr>";
                                    
                                    } 

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end panel -->
                <?php }?>              
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>