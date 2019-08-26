<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fees</a></li>
    <li class="active">Fee Structure</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Fee Structure</h1>
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
                <h4 class="panel-title">Fee Structure (in INR)</h4>
            </div>
            <div class="panel-body">
			<h4>Quarterly Payable</h4>
                <table class="table">
                    <thead>
                        <th>Class</th>
                        
                        <th>Tution Fee</th>
                        <th>Development</th>
                        <th>Educational Fee</th>
                        <th>Information Technology</th>
                        <th>Annual Fee</th>
                        <th>Lunch & Refreshment</th>
						<th>Total</th>
                    </thead>
                    <tbody>
                        <?php foreach($fee_list as $value):?>
                        <tr>
                            <td><?php echo $value['class'];?></td>
                            <td><?php echo json_decode($value['fee_detail_json'])->tution;?></td>
                            <td><?php echo json_decode($value['fee_detail_json'])->computer;?></td>
                            <td><?php echo json_decode($value['fee_detail_json'])->computer;?></td>
                            <td><?php echo json_decode($value['fee_detail_json'])->publication;?></td>
                            <td><?php echo json_decode($value['fee_detail_json'])->annual_charges;?></td>
                            <td><?php echo json_decode($value['fee_detail_json'])->transport;?></td>
                            <td><?php echo $value['total_fee'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
				<h4>One Time Payment</h4>
                <table class="table">
                    <thead>
                        <th>Class</th>
                        
                        <th>Admission Fee (Non-Refundable)</th>
                        <th>Caution Deposit (Refundable)</th>
                        
                    </thead>
                    <tbody>
                        <?php foreach($fee_list as $value):?>
                        <tr>
                            <td><?php echo $value['class'];?></td>
                            <td>60000</td>
                            <td>30000</td>
                           
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>


