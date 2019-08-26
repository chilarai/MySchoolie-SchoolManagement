<div class="widget-box">

	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
	  <h5>Leaves</h5>
	</div>
	 <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  
                  <th>Teacher</th>
                  <th>Leave Reason</th>
                  <th>Date From</th>
                  <th>Date To</th>
                  <th>Applied On</th>
                  <th colspan="2">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach($response['details']['class_list'] as $leave):?>

                  <tr>
                    <td><?php echo $leave['teacher_firstname']." ".$leave['teacher_lastname'];?></td>
                    <td><?php echo $leave['leave_reason'];?></td>
                    <td><?php echo date('d-m-Y',strtotime($leave['leave_from']));?></td>
                    <td><?php echo date('d-m-Y',strtotime($leave['leave_to']));?></td>
                    <td><?php echo date('d-m-Y',strtotime($leave['created_date']));?></td>
                    <?php if($leave['is_active']==1){ ?>
                    
                    <td><?php echo $this->Html->link(__('Accept'), ['action' => 'editaccept',$leave['leave_id'] ],array('class' => 'btn btn-mini btn-success'));?></td>
                    <td><?php echo $this->Html->link(__('Reject'), ['action' => 'editreject',$leave['leave_id']],array('class' => 'btn btn-mini btn-danger')); ?>
                    </td>
                    <?php } if($leave['is_active']==2){?>
                    <td><button type="submit"" value="2" class="btn btn-success btn-sm accept_meet" >Accepted</button></td>
                    <?php } if($leave['is_active']==3){?>
                    <td><button type="submit"" value="2" class="btn btn-danger btn-sm accept_meet" >Rejected</button></td>
                    <?php }?>


                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            
          </div>


</div>
