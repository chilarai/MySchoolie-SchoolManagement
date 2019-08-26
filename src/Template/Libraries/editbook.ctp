<?php
foreach ($book_categories as $key => $value) {
  $category[$value['id']]=$value['name'];
}

?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Library</a></li>
	<li class="active">Edit a Book </li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Book</h1>
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
                <h4 class="panel-title">Book Details</h4>
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
                    <label class="col-md-3 control-label">Book Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="name" data-parsley-required="true" class="form-control" value="<?php echo $books['name'];?>"/>
                    </div>
                </div>
				
                <div class="form-group">
                    <label class="col-md-3 control-label">Category <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('category_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$category,'default'=>$books['category_id']));?>
                    </div>

                </div>
                
				
                <div class="form-group">
                    <label class="col-md-3 control-label">Quantity<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="quantity" data-parsley-required="true"  data-parsley-type="number" class="form-control" value="<?php echo $books['quantity']; ?>" />
                    </div>
                </div>
				
                <div class="form-group">
                    <label class="col-md-3 control-label">Author Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="author" data-parsley-required="true" class="form-control" value="<?php echo $books['author']; ?>"/>
                    </div>
                </div>

          <!--  <div class="form-group">
                    <label class="control-label col-md-3">Publish Date</label>
                    <div class="col-md-9">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" name="publish_date" class="form-control" value="<?php echo $books['publish_date']; ?>" data-parsley-required="true"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div> -->
				
				<div class="form-group">
                    <label class="col-md-3 control-label">Price <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="price" data-parsley-required="true" class="form-control" placeholder="Price" value="<?php echo $books['price']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">ISBN Code <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="isbn_code" data-parsley-required="true" class="form-control" value="<?php echo $books['isbn_code']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Book Code <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="book_code" data-parsley-required="true" class="form-control" value="<?php echo $books['book_code']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Publication <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="publication" data-parsley-required="true" class="form-control" value="<?php echo $books['publication']; ?>"/>
                    </div>
                </div>

                

                <div class="form-group">
                    <label class="col-md-3 control-label">Description  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <textarea name="description" data-parsley-required="true" class="form-control"><?php echo $books['description']; ?></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-9">
                        <input type="submit" class="btn btn-warning" name="submit" value="Update"/>
                    </div>
                </div>
            </div>

        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->

</div>
</form>
