<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Time Table</h4>
            </div>
            
            <div class="panel-body">
			<form class="form-horizontal" method="post">
              
              <div class="table-responsive">
                <?php 

                  foreach($subjects as $subject){
                    $subject_options[$subject->Subjects->id] = $subject->Subjects->name;
                  }

                ?>
                  <table id="user" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Day</td>
                              <th>I<br/>8:00 - 8:40</td>
                              <th>II<br/>8:40 - 9:20</td>
                              <th>III<br/>9:20 - 10:00</td>
                              <th></td>
                              <th>IV<br/>10:20 - 11:00</td>
                              <th>V<br/>11:00 - 11:40</td>
                              <th></td>
                              <th>VI<br/>12:00 - 12:40</td>
                              <th>VII<br/>12:40 - 13:20</td>
                              <th></td>
                              <th>VIII<br/>14:00 - 14:40</td>
                              <th>IX<br/>14:40 - 15:20</td>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                              <td>MON</td>
                              <td><?php echo $this->Form->input('d1p1', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p1'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d1p2', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p2'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d1p3', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p3'], 'label'=>false));?></td>
                              <td>SNACK<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d1p4', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p4'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d1p5', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p5'], 'label'=>false));?></td>
                              <td>PLAY<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d1p6', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p6'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d1p7', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p7'], 'label'=>false));?></td>
                              <td>LUNCH<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d1p8', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p8'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d1p9', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d1p9'], 'label'=>false));?></td>
                          </tr>
                          <tr>
                              <td>TUE</td>
                              <td><?php echo $this->Form->input('d2p1', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p1'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d2p2', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p2'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d2p3', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p3'], 'label'=>false));?></td>
                              <td>SNACK<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d2p4', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p4'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d2p5', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p5'], 'label'=>false));?></td>
                              <td>PLAY<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d2p6', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p6'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d2p7', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p7'], 'label'=>false));?></td>
                              <td>LUNCH<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d2p8', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p8'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d2p9', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d2p9'], 'label'=>false));?></td>
                          </tr>
                          <tr>
                              <td>WED</td>
                              <td><?php echo $this->Form->input('d3p1', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p1'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d3p2', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p2'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d3p3', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p3'], 'label'=>false));?></td>
                              <td>SNACK<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d3p4', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p4'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d3p5', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p5'], 'label'=>false));?></td>
                              <td>PLAY<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d3p6', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p6'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d3p7', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p7'], 'label'=>false));?></td>
                              <td>LUNCH<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d3p8', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p8'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d3p9', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d3p9'], 'label'=>false));?></td>
                          </tr>
                          <tr>
                              <td>THU</td>
                              <td><?php echo $this->Form->input('d4p1', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p1'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d4p2', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p2'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d4p3', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p3'], 'label'=>false));?></td>
                              <td>SNACK<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d4p4', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p4'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d4p5', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p5'], 'label'=>false));?></td>
                              <td>PLAY<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d4p6', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p6'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d4p7', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p7'], 'label'=>false));?></td>
                              <td>LUNCH<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d4p8', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p8'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d4p9', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d4p9'], 'label'=>false));?></td>
                          </tr>
                          <tr>
                              <td>FRI</td>
                              <td><?php echo $this->Form->input('d5p1', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p1'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d5p2', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p2'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d5p3', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p3'], 'label'=>false));?></td>
                              <td>SNACK<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d5p4', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p4'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d5p5', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p5'], 'label'=>false));?></td>
                              <td>PLAY<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d5p6', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p6'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d5p7', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p7'], 'label'=>false));?></td>
                              <td>LUNCH<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d5p8', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p8'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d5p9', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d5p9'], 'label'=>false));?></td>
                          </tr>
                          <tr>
                              <td>SAT</td>
                              <td><?php echo $this->Form->input('d6p1', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p1'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d6p2', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p2'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d6p3', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p3'], 'label'=>false));?></td>
                              <td>SNACK<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d6p4', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p4'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d6p5', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p5'], 'label'=>false));?></td>
                              <td>PLAY<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d6p6', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p6'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d6p7', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p7'], 'label'=>false));?></td>
                              <td>LUNCH<br/>BREAK</td>
                              <td><?php echo $this->Form->input('d6p8', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p8'], 'label'=>false));?></td>
                              <td><?php echo $this->Form->input('d6p9', array('class'=>'form-control subjects', 'options'=>$subject_options, 'default'=>$timetable_json['d6p9'], 'label'=>false));?></td>
                          </tr>
                          
                          
                      </tbody>
                  </table>
                  <div class="form-group">	
                
                    <div class="col-md-9">
                        <a class="btn btn-warning" href="#modal-dialog" data-toggle="modal">Save</a>
                    </div>
					
                </div>
				<!-- #modal-dialog -->
				<div class="modal fade" id="modal-dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Edit Timetable</h4>
							</div>
							<div class="modal-body">
								Are you sure you want to make changes to the timetable?
							</div>
							<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
								<input type="submit" class="btn btn-warning" name="Save" value="Proceed"/>
							</div>
						</div>
					</div>
				</div>
				<!-- end Modal -->
				</form>
              </div> 

            </div>
        </div>
        <!-- end panel -->        
    </div>
    <!-- end col-6 --> 
</div>

