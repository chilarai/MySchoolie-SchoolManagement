<?php if($salary_status['paid_salary'] != 0)
        $total_salary = $salary_status['paid_salary'];
      elseif(empty($salary_status['total_salary']))
        $total_salary = 0;
      else
        $total_salary = $salary_status['total_salary'];
 ?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Salary</a></li>
    <li class="active">Payment</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Details</h1>
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
                <h4 class="panel-title">Invoice</h4>
            </div>
            <div class="panel-body">

                <!-- begin invoice -->
            <div class="invoice">
                <div class="invoice-company">
                    <span class="pull-right hidden-print">
                    <a href="javascript:;" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Export as PDF</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>
                    </span>
                    School Name
                </div>
                <div class="invoice-header">
                    <div class="invoice-from">
                        <small>from</small>
                        <address class="m-t-5 m-b-5">
                            <strong><?php echo $schoolinfo['school_name'];?></strong><br />
                            <?php echo json_decode($schoolinfo['school_detail_json'])->address;?><br />
                            Phone: <?php echo json_decode($schoolinfo['school_detail_json'])->phone;?><br />
                            Email: <?php echo json_decode($schoolinfo['school_detail_json'])->email;?>
                        </address>
                    </div>
                    <div class="invoice-to">
                        <small>to</small>
                        <address class="m-t-5 m-b-5">
                            <strong><?php echo $salary_status['name'];?></strong><br />


                            Phone: <?php echo $salary_status['mobile'];?><br />
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Invoice / July period</small>
                        <div class="date m-t-5">   <?php echo date('l, d F Y',strtotime($salary_status['date']));?>   </div>
                        <div class="invoice-detail">
                            #0000NDS<?php echo $salary_status['salary_status_id'];?><br />
                            Services Product
                        </div>
                    </div>
                </div>
                <div class="invoice-content">
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                    <th>SALARY HEADS</th>
                                    <th>LINE TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>
                                        BASIC<br />
                                        <small>FEE</small>
                                    </td>
                                    <td>INR <?php echo $salary_status['basic'] ?>.00</td>
                                </tr>


                                <tr>
                                    <td>
                                        HRA<br />
                                        <small>FEE</small>
                                    </td>
                                    <td>INR <?php echo $salary_status['hra']; ?>.00</td>
                                </tr>

                                <tr>
                                    <td>
                                        CONVEYANCE<br />
                                        <small>FEE</small>
                                    </td>
                                    <td>INR <?php echo  $salary_status['conveyance'] ?>.00</td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    INR <?php echo  $total_salary; ?>.00
                                </div>
<!--                                 <div class="sub-price">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <div class="sub-price">
                                    <small>PAYPAL FEE (5.4%)</small>
                                    INR 108.00
                                </div> -->
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> INR <?php echo  $total_salary; ?>.00
                        </div>
                    </div>
                </div>
                <div class="invoice-note">
                    * Make all cheques payable to [Your Company Name]<br />
                    * Payment is due within 30 days<br />
                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
                </div>
                <div class="invoice-footer text-muted">
                    <p class="text-center m-b-5">
                        THANK YOU FOR YOUR BUSINESS
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-globe"></i> matiasgallipoli.com</span>
                        <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
                        <span class="m-r-10"><i class="fa fa-envelope"></i> rtiemps@gmail.com</span>
                    </p>
                </div>
            </div>
            <!-- end invoice -->
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->  
</div>

<?php if( $salary_status['status'] == 'pending'): ?>

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
                <h4 class="panel-title">Payment</h4>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" method="post"   data-parsley-validate="true" >
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Salary</label>
                        <div class="col-md-9" >
                            <input type="text" class="form-control" data-parsley-required="true" name="total_salary" value=" INR <?php echo  $total_salary; ?>/-">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3">Date</label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" name="date" class="form-control"  data-parsley-required="true"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                  <div class="form-group">
                        <label class="col-md-3 control-label">Remarks</label>
                        <div class="col-md-9">
                            <textarea class="form-control" data-parsley-required="true" name="remarks" placeholder="Remarks"></textarea>
                        </div>
                    </div>

                    <input type="hidden" value=<?php echo  $salary_status['salary_status_id'];?> name="salary_status_id" />
                    <input type="hidden" value=<?php echo $total_salary;?> name="total_salary" />

                    <div class="form-group">
                        <label class="col-md-3 control-label">Payment Mode</label>
                        <div class="col-md-9">
                            <select class="form-control" name='payment_mode'>
                                <option value="cash">Cash</option>
                                <option value="check">Check</option>
                                <option value="credit card" disabled>Credit Card</option>
                                <option value="debit card" disabled>Debit Card</option>
                                <option value="Net Banking" disabled>Net Banking</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Proceed To Payment</button>
                        </div>
                    </div>

                </form>
            </div>
        
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->  
</div>
<?php endif; ?>
