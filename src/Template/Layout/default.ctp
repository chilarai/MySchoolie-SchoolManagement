<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title id="page-title">MySchoolie | Admin</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?php echo BASE_URL?>plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL?>css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL?>css/style.min.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL?>css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL?>css/theme/orange.css" rel="stylesheet" id="theme" />
	<link rel="icon" href="<?php echo BASE_URL?>img/favicon.png">
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo BASE_URL?>plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL?>plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL?>plugins/parsley/src/parsley.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo BASE_URL?>plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo BASE_URL?>plugins/jquery/jquery-3.4.1.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo BASE_URL?>crossbrowserjs/html5shiv.js"></script>
		<script src="<?php echo BASE_URL?>crossbrowserjs/respond.min.js"></script>
		<script src="<?php echo BASE_URL?>crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo BASE_URL?>plugins/jquery-hashchange/jquery.hashchange.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo BASE_URL?>plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?php echo BASE_URL?>plugins/flot/jquery.flot.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/flot/jquery.flot.time.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/sparkline/jquery.sparkline.js"></script>
	<script src="<?php echo BASE_URL?>plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo BASE_URL?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

	<script src="<?php echo BASE_URL?>plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo BASE_URL?>plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

	<script src="<?php echo BASE_URL?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo BASE_URL?>plugins/bootstrap-daterangepicker/moment.js"></script>
    <script src="<?php echo BASE_URL?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo BASE_URL?>plugins/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo BASE_URL?>plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo BASE_URL?>plugins/parsley/dist/parsley.js"></script>
    <script src="<?php echo BASE_URL?>plugins/gritter/js/jquery.gritter.js"></script>
    <script src="<?php echo BASE_URL?>plugins/sparkline/jquery.sparkline.js"></script>
    <script src="<?php echo BASE_URL?>plugins/flot/jquery.flot.min.js"></script>
    <script src="<?php echo BASE_URL?>plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
    <script src="<?php echo BASE_URL?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<script src="<?php echo BASE_URL?>js/table-manage-buttons.demo.min.js"></script>
	
	<script src="<?php echo BASE_URL?>js/dashboard.min.js"></script>
	<script src="<?php echo BASE_URL?>js/dashboard-v2.js"></script>
	<script src="<?php echo BASE_URL?>js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->


	
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="/dashboards" class="navbar-brand"><span class="navbar-logo"></span> MySchoolie</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
							<i class="fa fa-bell-o"></i>
							<?php if($notification_bar['total_notification'] > 0): ?>
								<span class="label"> <?php echo $notification_bar['total_notification']; ?></span>
							<?php endif; ?>

						</a>
						<ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications</li>

                            
                            <?php if($notification_bar['upcoming_appointments'] > 0): ?>
                            <li class="media">
                                <a href='<?php echo BASE_URL.'appointments' ?>'>
                                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                    <div class="media-body">
                                    	<h6 class="media-heading"><?php echo $notification_bar['upcoming_appointments']." Upcoming Appointment"; ?></h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>

                                    </div>
                                </a>



                            </li>
                            <?php endif; ?>

   							<?php if($notification_bar['notification_leave'] > 0): ?>
                            <li class="media">
                                <a href='<?php echo BASE_URL.'staffs/leaves' ?>'>
                                    <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"><?php echo $notification_bar['notification_leave']." New Leave Request"; ?></h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <?php endif; ?>



                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
						</ul>
					</li>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo BASE_URL?>img/user-13.jpg" alt="" /> 
							<span class="hidden-xs"><?php echo $_SESSION['name']; ?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><?php echo $this->Html->link("Manage Profile", array("controller"=>"users", "action"=>"profile"));?></li>
							<li><?php echo $this->Html->link("Settings", array("controller"=>"settings", "action"=>"index"));?></li>
							<li><?php echo $this->Html->link("General Info", array("controller"=>"infos", "action"=>"index"));?></li>
							<li class="divider"></li>
							<li><?php echo $this->Html->link("Logout", array("controller"=>"users", "action"=>"logout"));?></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="<?php echo BASE_URL?>img/school_logo.jpg" alt="" /></a>
						</div>
						<div class="info">
							<?php echo 'Sanskar Jyoti';  ?>
							<small>School Admin</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub">
						<a href="<?php echo BASE_URL;?>dashboards">
						    
						    <i class="fa fa-bar-chart-o"></i>
						    <span>Dashboard</span>
					    </a>
						
					</li>
					
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret pull-right"></b>
							<i class="fa fa-child"></i> 
							<span>Students</span>
						</a>
						<ul class="sub-menu">
						    <li><?php echo $this->Html->link("New Admission", array("controller"=>"students", "action"=>"newadmission"), array("data-toggle"=>"ajax"));?></li>
						    <li><?php echo $this->Html->link("Students", array("controller"=>"students", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
						    <li><?php echo $this->Html->link("List Download", array("controller"=>"students", "action"=>"listdownload"), array("data-toggle"=>"ajax"));?></li>
						    <!-- <li><?php //echo $this->Html->link("ID Cards", array("controller"=>"students", "action"=>"idcards"), array("data-toggle"=>"ajax"));?></li> -->
						</ul>
					</li>
					<li class="has-sub">
						
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-pencil-square-o"></i>
						    <span>Anecdotes</span>
						</a>
						<ul class="sub-menu">
							
							<li><?php echo $this->Html->link("Add Anecdote", array("controller"=>"students", "action"=>"anecdote"), array("data-toggle"=>"ajax"));?></li>
							
							<li><?php echo $this->Html->link("View Anecdotes", array("controller"=>"students", "action"=>"anecdoteslist"), array("data-toggle"=>"ajax"));?></li>

							
						</ul>
						
					</li>
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret pull-right"></b>
							<i class="fa fa-id-card"></i> 
							<span>Reports</span>
						</a>
						<ul class="sub-menu">
						    <li><?php echo $this->Html->link("View Report", array("controller"=>"reports", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
						    <li><?php echo $this->Html->link("Generate Report", array("controller"=>"reports", "action"=>"generatereport"), array("data-toggle"=>"ajax"));?></li>
						   
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-star"></i>
						    <span>Attendance</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Working Days", array("controller"=>"attendances", "action"=>"workingdays"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Upload", array("controller"=>"attendances", "action"=>"upload"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Reports", array("controller"=>"attendances", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Add Classwise Attendance", array("controller"=>"attendances", "action"=>"classattendance"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Edit Student Attendance", array("controller"=>"attendances", "action"=>"editattendance"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Bus Attendance Form", array("controller"=>"attendances", "action"=>"busattendanceform"),    array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Bus Attendance Upload", array("controller"=>"attendances", "action"=>"busattendance"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Bus Attendance Reports", array("controller"=>"attendances", "action"=>"busattendancereport"), array("data-toggle"=>"ajax"));?></li>
							
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-user"></i>
						    <span>Staff</span> 
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Teaching Staff", array("controller"=>"staffs", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Admin Staff", array("controller"=>"staffs", "action"=>"otherstaffs"), array("data-toggle"=>"ajax"));?></li>
							
							



						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-users"></i>
						    <span>Human Resources</span> 
						</a>
						<ul class="sub-menu">
							
							<li><?php echo $this->Html->link("Leaves", array("controller"=>"staffs", "action"=>"leaves"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("New Recruitment", array("controller"=>"staffs", "action"=>"recruitment"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Relieving", array("controller"=>"staffs", "action"=>"relieving"), array("data-toggle"=>"ajax"));?></li>
							



						</ul>
					</li>
					<li class="has-sub">
						<a href="<?php echo BASE_URL;?>staffs/vacancy">
						    
						    <i class="fa fa-street-view"></i>
						    <span>Vacancies</span>
					    </a>
					
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-inr"></i>
						    <span>Accounts</span> 
						</a>
						<ul class="sub-menu">
							
							<li><?php echo $this->Html->link("Salary Structure", array("controller"=>"staffs", "action"=>"salarystructure"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Salaries", array("controller"=>"staffs", "action"=>"newsalary"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Accounts Summary", array("controller"=>"staffs", "action"=>"accounts"), array("data-toggle"=>"ajax"));?></li>

						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-cutlery"></i>
						    <span>Canteen</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Upload Menu", array("controller"=>"canteens", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Menu List", array("controller"=>"canteens", "action"=>"menulist"), array("data-toggle"=>"ajax"));?></li>
						<!--	<li><?php// echo $this->Html->link("Sales History", array("controller"=>"canteens", "action"=>"saleshistory"), array("data-toggle"=>"ajax"));?></li> -->

							
						</ul>
					</li>
					
					<!-- <li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-institution"></i>
						    <span>Hostels</span>
						</a>
						<ul class="sub-menu">
							<li><?php //echo $this->Html->link("New", array("controller"=>"hostels", "action"=>"createhostel"), array("data-toggle"=>"ajax"));?></li>
							<li><?php //echo $this->Html->link("Facilities", array("controller"=>"hostels", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php //echo $this->Html->link("Allotments", array("controller"=>"hostels", "action"=>"allotments"), array("data-toggle"=>"ajax"));?></li>
							<li><?php //echo $this->Html->link("Out", array("controller"=>"hostels", "action"=>"outs"), array("data-toggle"=>"ajax"));?></li>
							<li><?php //echo $this->Html->link("In", array("controller"=>"hostels", "action"=>"ins"), array("data-toggle"=>"ajax"));?></li>
							<li><?php //echo $this->Html->link("Reports", array("controller"=>"hostels", "action"=>"reports"), array("data-toggle"=>"ajax"));?></li>
							
						</ul>
					</li> -->
					
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-calendar"></i>
						    <span>Timetable</span>
						</a>
						<ul class="sub-menu">
							
							<li><?php echo $this->Html->link("Manage Timetable", array("controller"=>"calendars", "action"=>"newtimetable"), array("data-toggle"=>"ajax"));?></li>
							
							<li><?php echo $this->Html->link("View Timetable", array("controller"=>"calendars", "action"=>"timetableview"), array("data-toggle"=>"ajax"));?></li>

							
						</ul>
					</li>
					<!-- <li class="has-sub"> -->
						<!-- <a href="javascript:;"> -->
						    <!-- <b class="caret pull-right"></b> -->
						    <!-- <i class="fa fa-wechat"></i> -->
						    <!-- <span>Meetings</span> -->
						<!-- </a> -->
						<!-- <ul class="sub-menu"> -->
							<!-- <li><?php //echo $this->Html->link("Appointments", array("controller"=>"appointments", "action"=>"index"), array("data-toggle"=>"ajax"));?></li> -->
							
							
						<!-- </ul> -->
					<!-- </li> -->
					<li class="has-sub">
						<a href="<?php echo BASE_URL;?>appointments">
						    
						    <i class="fa fa-wechat"></i>
						    <span>Appointments</span>
					    </a>
					
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-rocket"></i>
						    <span>Circulars</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("New Circular", array("controller"=>"circulars", "action"=>"upload"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Circular List", array("controller"=>"circulars", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>

							
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-language"></i>
						    <span>Courses & Subjects</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Courses", array("controller"=>"courses", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Subjects", array("controller"=>"courses", "action"=>"subjects"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Course Subject Relation", array("controller"=>"courses", "action"=>"coursesubjects"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Classes", array("controller"=>"settings", "action"=>"uploadclasssection"), array("data-toggle"=>"ajax"));?></li>
							
						</ul>
					</li>
				<!--<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-tachometer"></i>
						    <span>Exams & Results</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Exam List", array("controller"=>"exams", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Past Results", array("controller"=>"exams", "action"=>"results"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Upload Results", array("controller"=>"exams", "action"=>"newresults"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Grading System", array("controller"=>"exams", "action"=>"marksystem"), array("data-toggle"=>"ajax"));?></li>
							
						</ul>
					</li>-->
					<li class="has-sub">
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
						<i class="fa fa-window-minimize" aria-hidden="true"></i>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
							
						    <i class="fa fa-inr"></i>
						    <span>Fee Collection</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Fee Structure", array("controller"=>"fees", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Exemptions", array("controller"=>"fees", "action"=>"exemptions"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Collection", array("controller"=>"fees", "action"=>"collection"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Reports", array("controller"=>"fees", "action"=>"reports"), array("data-toggle"=>"ajax"));?></li>
							
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-book"></i>
						    <span>Library</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Books", array("controller"=>"libraries", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Issued Books/Return", array("controller"=>"libraries", "action"=>"issuedbook"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Reports", array("controller"=>"libraries", "action"=>"reports"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Add Book", array("controller"=>"libraries", "action"=>"addbook"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Add/Edit Categories", array("controller"=>"libraries", "action"=>"addcategory"), array("data-toggle"=>"ajax"));?></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-upload"></i>
						    <span>Assignments/Homework</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("New Assignment", array("controller"=>"assignments", "action"=>"upload"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Assignment List", array("controller"=>"assignments", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>

							
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-certificate"></i>
						    <span>Certificates</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Certificates", array("controller"=>"certificates", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Assign Certificate", array("controller"=>"certificates", "action"=>"assign"), array("data-toggle"=>"ajax"));?></li>

							
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-comment"></i>
						    <span>Feedback</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("New Feedback", array("controller"=>"feedbacks", "action"=>"newfeedback"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("List", array("controller"=>"feedbacks", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							
						</ul>
					</li>
					
					<!-- <li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-briefcase"></i>
						    <span>Inventory</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Stock", array("controller"=>"inventories", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Purchase Order", array("controller"=>"inventories", "action"=>"neworder"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Payments", array("controller"=>"inventories", "action"=>"payments"), array("data-toggle"=>"ajax"));?></li>

							
						</ul>
					</li> -->
					
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-car"></i>
						    <span>Fleet</span>
						</a>
						<ul class="sub-menu">
							<li><?php echo $this->Html->link("Fleets", array("controller"=>"fleets", "action"=>"index"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Drivers", array("controller"=>"fleets", "action"=>"drivers"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Routes", array("controller"=>"fleets", "action"=>"routes"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Fleet Routemap", array("controller"=>"fleets", "action"=>"fleetroutemap"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Students", array("controller"=>"fleets", "action"=>"passengers"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Reports", array("controller"=>"fleets", "action"=>"reports"), array("data-toggle"=>"ajax"));?></li>
							<li><?php echo $this->Html->link("Vendors", array("controller"=>"fleets", "action"=>"vendor"), array("data-toggle"=>"ajax"));?></li>
						</ul>
					</li>


			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin content -->
		<div id="content" class="content">
			<?php echo $this->fetch('content');?>
		</div>
		<!-- end content -->
		
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageButtons.init();
			// Dashboard.init();
			// FormPlugins.init();
			DashboardV2.init();
		});
	</script>
	<script>
		$(document).ready(function(){
				
			$("#submit_save").click(function(){
				if ( $('#m_name').val() != "" && $('#m_email').val() != "" && $('#m_contact').val() != "" ){

					document.getElementById("submit_button").disabled = false;
					document.getElementById("modal_body").innerHTML = "Are you sure you want to proceed?";
					$("#modal_body").removeClass('alert alert-danger m-b-0');
				}
				else if ( $('#f_name').val() != "" && $('#f_email').val() != "" && $('#f_contact').val() != "" ){

					document.getElementById("submit_button").disabled = false;
					document.getElementById("modal_body").innerHTML = "Are you sure you want to proceed?";
					$("#modal_body").removeClass('alert alert-danger m-b-0');
				}
				else 
				{
					document.getElementById("submit_button").disabled = true;
					document.getElementById("modal_body").innerHTML = "Please fill basic details of at least one parent!";
					$("#modal_body").addClass('alert alert-danger m-b-0');
				}
				 
			});
				  return false;
			  
		});
</script>

	<script>
		/*Menu handler*/
		$(document).ready(function(){
		    var url = window.location;


		    // Will only work if string in href matches with location
		    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

		    // Will also work for relative and absolute hrefs
		    $('ul.nav a').filter(function() {
		        return this.href == url;		        
		    }).parent().addClass('active');


		    $('ul.nav a').filter(function() {
		        return this.href == url;		        
		    }).parent().parent().parent().addClass('active');           
		});


	    $(document).ready(function() {

	        $('.input-group.date').datepicker({
	        	dateFormat: 'yy/mm/dd'
	        });

	    });
		$(document).ready(function() {
			$('.select2').select2();
		});

	</script>
</body>
</html>
