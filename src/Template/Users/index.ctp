<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">

					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-child"></i></div>
						<div class="stats-info">
							<h4>TOTAL STUDENTS</h4>
							<p><?php echo $response['students'];?></p>	
						</div>
						<div class="stats-link">
							<a href='<?php echo BASE_URL.'students' ?>'>View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-user"></i></div>
						<div class="stats-info">
							<h4>TOTAL STAFF</h4>
							<p><?php echo $response['teachers'];?></p>	
						</div>
						<div class="stats-link">
							<a href='<?php echo BASE_URL.'staffs/otherstaffs' ?>'> View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-book"></i></div>
						<div class="stats-info">
							<h4>LIBRARY BOOKS</h4>
							<p><?php echo $response['book_count'];?></p>	
						</div>
						<div class="stats-link">
							<a href='<?php echo BASE_URL.'libraries' ?>'> View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-car"></i></div>
						<div class="stats-info">
							<h4>TOTAL FLEET</h4>
							<p><?php echo $response['fleet_count'];?></p>	
						</div>
						<div class="stats-link">
							<a href='<?php echo BASE_URL.'fleets' ?>'> View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 --
				<div class="col-md-2 col-sm-6">
					<div class="widget widget-stats bg-black">
						<div class="stats-icon"><i class="fa fa-institution"></i></div>
						<div class="stats-info">
							<h4>TOTAL HOSTELLERS</h4>
							<p>?php echo $response['hosteller_count'];?></p>	
						</div>
						<div class="stats-link">
							<a href='?php echo BASE_URL.'hostels/allotments' ?>'> View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 --
				<!-- begin col-3 --
				<div class="col-md-2 col-sm-6">
					<div class="widget widget-stats bg-orange">
						<div class="stats-icon"><i class="fa fa-building"></i></div>
						<div class="stats-info">
							<h4>VACCANT ROOMS</h4>
							<p>?php echo $response['hostel_vacancy'];?></p>	
						</div>
						<div class="stats-link">
							<a href='?php echo BASE_URL.'hostels' ?>'> View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-8">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Transactions</h4>
						</div>
						<div class="panel-body p-t-0">
							<div id="interactive-chart" class="height-sm"></div>
						</div>
					</div>
					
					
				</div>
				<!-- end col-8 -->
				<!-- begin col-4 -->
				<div class="col-md-4">
					<div class="panel panel-inverse" data-sortable-id="index-6">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Daily Tracker</h4>
						</div>
						<div class="panel-body p-t-0">
							<table class="table table-valign-middle m-b-0">
								<thead>
									<tr>	
										<th>Parameter</th>
										<th>Value</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><label class="label label-danger">Staffs On Leave</label></td>
										<td> <?php echo $response['teachers_on_leave'];?> </td>
									</tr>
					<!--            <tr>
										<td><label class="label label-warning">Operational Fleet</label></td>
										<td> <?php echo $response['fleets_active'];?> </td>
									</tr>
									<tr> -->
										<td><label class="label label-success">Total Upcoming Appointments</label></td>
										<td> <?php echo $response['upcoming_appointments'];?> </td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					
					
					
					
					
					
					
					<div class="panel panel-inverse" data-sortable-id="index-10">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Calendar/Programme</h4>
						</div>
						<div class="panel-body">
							<div id="datepicker-inline" class="datepicker-full-width"><div></div></div>
						</div>
					</div>
				</div>
				<!-- end col-4 -->
			</div>
			<!-- end row -->