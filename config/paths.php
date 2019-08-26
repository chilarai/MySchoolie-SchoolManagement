<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */

/**
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/**
 * The actual directory name for the application directory. Normally
 * named 'src'.
 */
define('APP_DIR', 'src');

/**
 * Path to the application's directory.
 */
define('APP', ROOT . DS . APP_DIR . DS);

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * File path to the webroot directory.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/**
 * Path to the tests directory.
 */
define('TESTS', ROOT . DS . 'tests' . DS);

/**
 * Path to the temporary files directory.
 */
define('TMP', ROOT . DS . 'tmp' . DS);

/**
 * Path to the logs directory.
 */
define('LOGS', ROOT . DS . 'logs' . DS);

/**
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
define('CACHE', TMP . 'cache' . DS);

/**
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * CakePHP should always be installed with composer, so look there.
 */
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');

/**
 * Path to the cake directory.
 */
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);
define('CAKE', CORE_PATH . 'src' . DS);


// define('BASE_URL', 'http://localhost/newadmin/');
define('BASE_URL', 'http://sjs.myschoolie.net/');

define('CIRCULARLIST', BASE_URL.'circulars/circularslistapi');
define('CIRCULARADD', BASE_URL.'circulars/addcircularapi');
define('USER_LOGIN', BASE_URL.'users/login');
define('USER_DASHBOARD', BASE_URL.'users/dashboard');
define('APPLY_FOR_LEAVE', BASE_URL.'leaves/applyleave');
define('SCHOOL_INFO', BASE_URL.'infos/schoolapi');
define('ASSIGNMENT_LIST', BASE_URL.'listings/assignmentlist');
define('APP_ABOUT', BASE_URL.'infos/appinfoapi');
define('VIEW_LEAVE', BASE_URL.'leaves/viewleave');
define('CIRCULAR_LIST', BASE_URL.'infos/circularslist');
define('STUDENT_PROFILE', BASE_URL.'users/studentprofile');
define('PASSWORD_CHANGE', BASE_URL.'users/passwordchangeapi');
define('PARENT_STUDENT_LIST', BASE_URL.'users/parentstudent');
define('VIEW_ATTENDANCE', BASE_URL.'attendances/attendanceview');
define('CLASS_LIST', BASE_URL.'listings/classlist');
define('TEACHER_LIST', BASE_URL.'listings/teacherlist');
define('VENDOR_LIST', BASE_URL.'listings/vendorlist');
define('SUBJECT_LIST', BASE_URL.'listings/subjectlist');
define('VIEW_APPOINTMENTS', BASE_URL.'appointments/viewappointment');
define('VIEW_RESULT_BY_STUDENT', BASE_URL.'exams/viewresultbystudentapi');
define('FEEDBACK_LIST', BASE_URL.'listings/feedbacklist');
define('VIEW_CALENDAR', BASE_URL.'calendars/viewcalendar');
define('APPOINTMENT_REQUEST', BASE_URL.'appointments/request');
define('ADD_TEACHER_CSV', BASE_URL.'staffs/uploadteacherapi');
define('ADD_PARENTS_CSV', BASE_URL.'students/uploadparentapi');
define('ADD_CLASS_CSV', BASE_URL.'listings/uploadclassapi');
define('ADD_STUDENTS_CSV', BASE_URL.'students/uploadcsv');
define('ADD_ATTENDANCES_CSV', BASE_URL.'attendances/uploadcsv');
define('ADD_RESULTS_CSV', BASE_URL.'exams/uploadresultcsvapi');
define('ADD_CIRCULARS', BASE_URL.'circulars/addcircularapi');
define('SEARCH_TEACHERS', BASE_URL.'teachers/search');
define('LEAVE_TEACHERS', BASE_URL.'teachers/teacherleave');
define('APPOINTMENT_LIST', BASE_URL.'listings/appointmentlist');
define('TEACHER_VIEW_HOMEWORK', BASE_URL.'teachers/viewassignment');
define('STUDENT_DETAIL', BASE_URL.'listings/studentdetail');
define('LEAVE_ACCEPT', BASE_URL.'listings/acceptleaveteacher');
define('LEAVE_REJECT', BASE_URL.'listings/rejectleaveteacher');
define('TEACHERS_LIST', BASE_URL.'teachers/teacherlist');
define('TEACHER_LEAVE_LIST', BASE_URL.'listings/teacherleavelist');
define('ATTENDANCE_REPORT', BASE_URL.'attendances/reportsdatewise');
define('ALL_STUDENT_LIST', BASE_URL.'listings/allstudentlist');
define('STUDENT_LIST', BASE_URL.'listings/studentlist');
define('AJAX_APPOINTMENT_UPDATE', BASE_URL.'appointments/modifyappointment');
define('HOSTEL_LEAVE_UPDATE', BASE_URL.'hostels/modifyleave');
define('EXAMS_LIST', BASE_URL.'listings/examslist');



/* FCM Key  */

define( 'API_ACCESS_KEY', 'AAAAumx0yE0:APA91bH1QsW6gLMEpLbctajNjnas62G21nsI308yAf9nYDrH2Ne2_9FQ5WzI9bwBokyJv9bWYtXYbWa7Mf3rqStKM2yXHp8PYw-yNFtBB4ofZHpRsbMKkb1fmb6smce_YoBwbo0UVhE3' );