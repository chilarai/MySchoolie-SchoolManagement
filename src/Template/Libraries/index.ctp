<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Library</a></li>
	<li class="active">Books</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Books</h1>
<!-- end page-header -->



<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
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
                <h4 class="panel-title">List of Books</h4>
            </div>
		<div class="panel-body">
        <div class="result-container">
       <!-- <div class="input-group m-b-20"> //COMMENTED USED FOR SEARCH BOX
                <input type="text" class="form-control input-white" placeholder="Enter keywords here..." />
                <div class="input-group-btn">
                    <button type="button" class="btn btn-inverse"><i class="fa fa-search"></i> Search</button>
                    <button type="button" class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:;">Action</a></li>
                        <li><a href="javascript:;">Another action</a></li>
                        <li><a href="javascript:;">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:;">Separated link</a></li>
                    </ul>
                </div>
            </div> 
            
            <ul class="pagination pagination-without-border pull-right m-t-0">
                <li class="disabled"><a href="javascript:;">«</a></li>
                <li class="active"><a href="javascript:;">1</a></li>
                <li><a href="javascript:;">2</a></li>
                <li><a href="javascript:;">3</a></li>
                <li><a href="javascript:;">4</a></li>
                <li><a href="javascript:;">5</a></li>
                <li><a href="javascript:;">6</a></li>
                <li><a href="javascript:;">7</a></li>
                <li><a href="javascript:;">»</a></li>
            </ul> -->
            <ul class="result-list" style="margin-top:10px;">
            <?php foreach ($books as $key => $value): ?>
                <li>
                    <div class="result-image">
                        <a href="javascript:;"><img src="<?php echo BASE_URL?>img/gallery/library_book.jpg" alt="" /></a>
                    </div>
                    <div class="result-info">
                        <h4 class="title"><a href="javascript:;"><?php echo $value['book_name']; ?></a></h4>
                        <p class="location"><?php echo $value['genre']; ?></p>
                        <p class="desc">
                            <?php echo $value['description']; ?>
                        </p>
                        <div class="btn-row">
                            <?php echo 'Added on : '.$value['added_on']; ?>
                        </div>

                    </div>
                    <div class="result-price">
                        <?php echo $value['quantity'].' Copies'; ?> <small><?php echo $value['available_quantity'].' Available'; ?></small>


                        <?php if($value['available_quantity'] > 0) {
									echo $this->Html->link("Issue Book", array("controller"=>"libraries", "action"=>"issue/".$value['id']), array("class"=>"btn btn-success btn-small", "role"=>"button"));
									echo $this->Html->link("Edit", array("controller"=>"libraries", "action"=>"editbook/".$value['id']), array("class"=>"btn btn-warning btn-small", "role"=>"button"));
								}
                               else {
                                   echo $this->Html->link("Not Available", array("controller"=>"libraries", "action"=>"issue"), array("class"=>"btn btn-danger btn-small", "disabled"=>true,"role"=>"button"));  
								   echo $this->Html->link("Edit", array("controller"=>"libraries", "action"=>"editbook/".$value['id']), array("class"=>"btn btn-warning btn-small", "role"=>"button"));
								}							   

                        ?>


                    </div>
                </li>
            <?php endforeach; ?>

            </ul>
            <div class="clearfix">
                <ul class="pagination pagination-without-border pull-right">
                    <li class="disabled"><a href="javascript:;">«</a></li>
                    <li class="active"><a href="javascript:;">1</a></li>
                   <!-- <li><a href="javascript:;">2</a></li>
                    <li><a href="javascript:;">3</a></li>-->
                    <li><a href="javascript:;">»</a></li>
                </ul>
            </div>
        </div>
		</div>
    </div>
	<!-- end panel -->
	</div>
	
    <!-- end col-12 -->
</div>
<!-- end row -->


