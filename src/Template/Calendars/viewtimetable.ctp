
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
              
              
              <div class="table-responsive">
                  <table id="data-table" class="table table-bordered table-striped">
                      <thead>
                          <tr>
							  <th>S No</th>
                              <th>Day</th>
                              <th>I<br/>8:00 - 8:40</th>
                              <th>II<br/>8:40 - 9:20</th>
                              <th>III<br/>9:20 - 10:00</th>
                              <th></th>
                              <th>IV<br/>10:20 - 11:00</th>
                              <th>V<br/>11:00 - 11:40</th>
                              <th></th>
                              <th>VI<br/>12:00 - 12:40</th>
                              <th>VII<br/>12:40 - 13:20</th>
                              <th></th>
                              <th>VIII<br/>14:00 - 14:40</th>
                              <th>IX<br/>14:40 - 15:20</th>
                          </tr>
                      </thead>
					 
                      <tbody>
                        <tr>
                              <th>1</th>
							  <td><b>MON</b></td>
                              <td><?php echo $subjects[$timetable_json['d1p1']];?></td> 
                              <td><?php echo $subjects[$timetable_json['d1p2']];?></td>
                              <td><?php echo $subjects[$timetable_json['d1p3']];?></td>
                              <th>SNACK<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d1p4']];?></td>
                              <td><?php echo $subjects[$timetable_json['d1p5']];?></td>
                              <th>PLAY<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d1p6']];?></td>
                              <td><?php echo $subjects[$timetable_json['d1p7']];?></td>
                              <th>LUNCH<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d1p8']];?></td>
                              <td><?php echo $subjects[$timetable_json['d1p9']];?></td>
                          </tr>
						
                          <tr>
                              <th>2</th>
							  <td><b>TUE</b></td>
                              <td><?php echo $subjects[$timetable_json['d2p1']];?></td>
                              <td><?php echo $subjects[$timetable_json['d2p2']];?></td>
                              <td><?php echo $subjects[$timetable_json['d2p3']];?></td>
                              <th>SNACK<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d2p4']];?></td>
                              <td><?php echo $subjects[$timetable_json['d2p5']];?></td>
                              <th>PLAY<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d2p6']];?></td>
                              <td><?php echo $subjects[$timetable_json['d2p7']];?></td>
                              <th>LUNCH<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d2p8']];?></td>
                              <td><?php echo $subjects[$timetable_json['d2p9']];?></td>
                          </tr>
                          <tr>
                              <th>3</th>
							  <td><b>WED</b></td>
                              <td><?php echo $subjects[$timetable_json['d3p1']];?></td>
                              <td><?php echo $subjects[$timetable_json['d3p2']];?></td>
                              <td><?php echo $subjects[$timetable_json['d3p3']];?></td>
                              <th>SNACK<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d3p4']];?></td>
                              <td><?php echo $subjects[$timetable_json['d3p5']];?></td>
                              <th>PLAY<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d3p6']];?></td>
                              <td><?php echo $subjects[$timetable_json['d3p7']];?></td>
                              <th>LUNCH<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d3p8']];?></td>
                              <td><?php echo $subjects[$timetable_json['d3p9']];?></td>
                          </tr>
                          <tr>
                              <th>4</th>
							  <td><b>THU</b></td>
                              <td><?php echo $subjects[$timetable_json['d4p1']];?></td>
                              <td><?php echo $subjects[$timetable_json['d4p2']];?></td>
                              <td><?php echo $subjects[$timetable_json['d4p3']];?></td>
                              <th>SNACK<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d4p4']];?></td>
                              <td><?php echo $subjects[$timetable_json['d4p5']];?></td>
                              <th>PLAY<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d4p6']];?></td>
                              <td><?php echo $subjects[$timetable_json['d4p7']];?></td>
                              <th>LUNCH<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d4p8']];?></td>
                              <td><?php echo $subjects[$timetable_json['d4p9']];?></td>
                          </tr>
                          <tr>
                              <th>5</th>
							  <td><b>FRI</b></td>
                              <td><?php echo $subjects[$timetable_json['d5p1']];?></td>
                              <td><?php echo $subjects[$timetable_json['d5p2']];?></td>
                              <td><?php echo $subjects[$timetable_json['d5p3']];?></td>
                              <th>SNACK<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d5p4']];?></td>
                              <td><?php echo $subjects[$timetable_json['d5p5']];?></td>
                              <th>PLAY<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d5p6']];?></td>
                              <td><?php echo $subjects[$timetable_json['d5p7']];?></td>
                              <th>LUNCH<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d5p8']];?></td>
                              <td><?php echo $subjects[$timetable_json['d5p9']];?></td>
                          </tr>
                          <tr>
                              <th>6</th>
							  <td><b>SAT</b></td>
                              <td><?php echo $subjects[$timetable_json['d6p1']];?></td>
                              <td><?php echo $subjects[$timetable_json['d6p2']];?></td>
                              <td><?php echo $subjects[$timetable_json['d6p3']];?></td>
                              <th>SNACK<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d6p4']];?></td>
                              <td><?php echo $subjects[$timetable_json['d6p5']];?></td>
                              <th>PLAY<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d6p6']];?></td>
                              <td><?php echo $subjects[$timetable_json['d6p7']];?></td>
                              <th>LUNCH<br/>BREAK</th>
                              <td><?php echo $subjects[$timetable_json['d6p8']];?></td>
                              <td><?php echo $subjects[$timetable_json['d6p9']];?></td>
                          </tr>
                          
                          
                      </tbody>
                  </table>
              </div> 

            </div>
        </div>
        <!-- end panel -->        
    </div>
    <!-- end col-6 --> 
</div>
