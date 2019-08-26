<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Students & Parents</a></li>
	<li class="active">ID Cards</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">ID Cards</h1>
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
                <h4 class="panel-title">Select Class</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section</label>
                        <div class="col-md-9">
                            <select class="form-control">
                                <option>All Classes</option>
                                <option>I-A</option>
                                <option>I-B</option>
                                <option>II-A</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Select</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- end panel -->



        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Students</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Roll Number</th>
                                <th>Name</th>
                                <th>ID Card Number</th>
                                <th>Class | Section</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                <td>1</td>
                                <td>Mohit Kumar</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0001", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="even">
                                <td>2</td>
                                <td>Amit Singh</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0002", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="odd">
                                <td>3</td>
                                <td>Rohan Singh</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0003", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="even">
                                <td>4</td>
                                <td>Amardeep Gujral</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0004", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="odd">
                                <td>5</td>
                                <td>Monika Kumari</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0005", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="even">
                                <td>6</td>
                                <td>Kanima Kaur</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0006", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="odd">
                                <td>7</td>
                                <td>Arjun Pandit</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0007", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="even">
                                <td>8</td>
                                <td>Manav Garg</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0008", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="odd">
                                <td>9</td>
                                <td>Ankita Yadav</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0009", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            <tr class="even">
                                <td>10</td>
                                <td>Avimanyu Gujjar</td>
                                <td><?php echo $this->Form->input("id_name", array("class"=>"form-control", "placeholder"=>"NDS0010", "label"=>false));?></td>
                                <td>IV-A</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <div class="form-group p-r-15">
                        <button class="btn btn-warning pull-right">Submit</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>


