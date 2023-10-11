<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Web Routes

use Illuminate\Support\Facades\Route;

Route::middleware(['XSS'])->namespace('Web')->group(function () {

    // Home Route
    Route::get('/', function() {
       return redirect()->route('student.dashboard.index');
    });

    // SetCookie Route
    Route::get('/set-cookie', 'HomeController@setCookie')->name('setCookie');

    Route::resource('application', 'ApplicationController');
});


// Ajax Filter Routes
Route::middleware(['XSS'])->group(function () {

    Route::post('filter-district', 'AddressController@filterDistrict')->name('filter-district');
    Route::post('filter-batch', 'FilterController@filterBatch')->name('filter-batch');
    Route::post('filter-program', 'FilterController@filterProgram')->name('filter-program');
    Route::post('filter-session', 'FilterController@filterSession')->name('filter-session');
    Route::post('filter-semester', 'FilterController@filterSemester')->name('filter-semester');
    Route::post('filter-section', 'FilterController@filterSection')->name('filter-section');
    Route::post('filter-subject', 'FilterController@filterSubject')->name('filter-subject');
    Route::post('filter-enroll-subject', 'FilterController@filterEnrollSubject')->name('filter-enroll-subject');
    Route::post('filter-student-subject', 'FilterController@filterStudentSubject')->name('filter-student-subject');
    Route::post('filter-techer-subject', 'FilterController@filterTecherSubject')->name('filter-techer-subject');
    Route::post('filter-item', 'InventoryController@filterItem')->name('filter-item');
    Route::post('filter-quantity', 'InventoryController@filterQuantity')->name('filter-quantity');
    Route::post('filter-department', 'InventoryController@filterDepartment')->name('filter-department');
    Route::post('filter-room', 'HostelController@filterRoom')->name('filter-room');
    Route::post('filter-vehicle', 'TransportController@filterVehicle')->name('filter-vehicle');
});


// Set Lang Version
Route::get('locale/language/{locale}', function ($locale){

    \Session::put('locale', $locale);

    \App::setLocale($locale);

    return redirect()->back();
    
})->name('version');


// Auth Routes
Route::middleware(['XSS'])->prefix('admin')->group(function () {
    // Auth::routes();
    Auth::routes(['register' => false]);
});


// Admin Routes
Route::middleware(['auth:web', 'XSS'])->name('admin.')->namespace('Admin')->prefix('admin')->group(function () {


    
    Route::get('admission/preregistration', 'PreregistrationController@show')->name('preregistration.show');
    Route::get('admission/preregistration/aplicaciones', 'PreregistrationController@index')->name('preregistration.index');
    Route::get('admission/preregistration/{preregistration}', 'PreregistrationController@view')->name('preregistration.view');
    Route::put('admission/preregistration/{id}', 'PreregistrationController@update')->name('preregistration.update');
    
    // Dashboard Route
    // Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');



    // Student Routes
    Route::resource('admission/application', 'ApplicationController');
    Route::resource('admission/student', 'StudentController');
    Route::get('admission/student-card/{id}', 'StudentController@card')->name('student.card');
    // Route::get('admission/student-status/{id}', 'StudentController@status')->name('student.status');
    Route::post('admission/student-send-password/{id}', 'StudentController@sendPassword')->name('student.send-password');
    Route::get('admission/student-print-password/{id}', 'StudentController@printPassword')->name('student.print-password');
    Route::post('admission/student-password-change', 'StudentController@passwordChange')->name('student-password-change');

    // Admission Routes
    Route::resource('admission/student-transfer-out', 'StudentTransferOutController');
    Route::resource('admission/student-transfer-in', 'StudentTransferInController');
    Route::resource('admission/status-type', 'StatusTypeController');
    Route::resource('admission/id-card-setting', 'StudentIdCardSettingController');



    // Student Attendance Routes
    Route::resource('student-attendance', 'StudentAttendanceController');
    Route::get('student-attendance-report', 'StudentAttendanceController@report')->name('student-attendance.report');

    // Student Leave Manage
    Route::resource('student-leave-manage', 'StudentLeaveManagementController');
    Route::post('student-leave-manage-status/{id}', 'StudentLeaveManagementController@status')->name('student-leave-manage.status');

    // Student Action Routes
    Route::resource('student/student-note', 'StudentNoteController');
    Route::resource('student/single-enroll', 'StudentSingleEnrollController');
    Route::resource('student/group-enroll', 'StudentGroupEnrollController');
    Route::resource('student/subject-adddrop', 'SubjectAddDropController');
    Route::resource('student/course-complete', 'CourseCompleteController');
    Route::resource('student/student-alumni', 'StudentAlumniController');



    // Academic Routes
    Route::resource('academic/faculty', 'FacultyController');
    Route::resource('academic/program', 'ProgramController');
    Route::resource('academic/batch', 'BatchController');
    Route::resource('academic/session', 'SessionController');
    Route::get('academic/session-current/{id}', 'SessionController@current')->name('session.current');
    Route::resource('academic/semester', 'SemesterController');
    Route::resource('academic/section', 'SectionController');
    Route::resource('academic/room', 'ClassRoomController');
    Route::resource('academic/subject', 'SubjectController');
    Route::resource('academic/enroll-subject', 'EnrollSubjectController');

    // Routine Routes
    Route::resource('academic/class-routine', 'ClassRoutineController');
    Route::get('academic/class-routine-teacher', 'ClassRoutineController@teacher')->name('class-routine.teacher');
    Route::post('academic/class-routine/print', 'ClassRoutineController@print')->name('class-routine.print');
    Route::resource('academic/exam-routine', 'ExamRoutineController');
    Route::post('academic/exam-routine/print', 'ExamRoutineController@print')->name('exam-routine.print');
    Route::get('academic/routine-setting/class', 'RoutineSettingController@class')->name('routine-setting.class');
    Route::get('academic/routine-setting/exam', 'RoutineSettingController@exam')->name('routine-setting.exam');
    Route::post('academic/routine-setting/store', 'RoutineSettingController@store')->name('routine-setting.store');



    // Exam Routes
    Route::resource('exam/exam-attendance', 'ExamAttendanceController');
    Route::resource('exam/exam-marking', 'ExamMarkingController');
    Route::get('exam/exam-result', 'ExamMarkingController@result')->name('exam-result');
    Route::resource('exam/subject-marking', 'SubjectMarkingController');
    Route::get('exam/subject-result', 'SubjectMarkingController@result')->name('subject-result');
    Route::resource('exam/exam-type', 'ExamTypeController');
    Route::resource('exam/grade', 'GradeController');
    Route::resource('exam/result-contribution', 'ResultContributionController');
    Route::resource('exam/admit-card', 'AdmitCardController');
    Route::get('exam/admit-card-print/{id}', 'AdmitCardController@print')->name('admit-card.print');
    Route::get('exam/admit-card-multiprint', 'AdmitCardController@multiPrint')->name('admit-card.multiprint');
    Route::get('exam/admit-card-download/{id}', 'AdmitCardController@download')->name('admit-card.download');
    Route::resource('exam/admit-setting', 'AdmitCardSettingController');



    // Assignment Routes
    Route::resource('download/assignment', 'AssignmentController');
    Route::post('download/assignment-marking', 'AssignmentController@marking')->name('assignment.marking');

    // Content Routes
    Route::resource('download/content', 'ContentController');    
    Route::resource('download/content-type', 'ContentTypeController');



    // Fees Collection Student
    Route::get('fees-student', 'FeesStudentController@index')->name('fees-student.index');
    Route::post('fees-student-pay', 'FeesStudentController@pay')->name('fees-student.pay');
    Route::post('fees-student-unpay/{id}', 'FeesStudentController@unpay')->name('fees-student.unpay');
    Route::post('fees-student-cancel/{id}', 'FeesStudentController@cancel')->name('fees-student.cancel');
    Route::get('fees-student-report', 'FeesStudentController@report')->name('fees-student.report');
    Route::get('fees-student-print/{id}', 'FeesStudentController@print')->name('fees-student.print');

    // Quick Collection Student
    Route::get('fees-student-quick-received', 'FeesStudentController@quickReceived')->name('fees-student.quick.received');
    Route::post('fees-student-quick-received', 'FeesStudentController@quickReceivedStore')->name('fees-student.quick.received.store');
    Route::get('fees-student-quick-assign', 'FeesStudentController@quickAssign')->name('fees-student.quick.assign');
    Route::post('fees-student-quick-assign', 'FeesStudentController@quickAssignStore')->name('fees-student.quick.assign.store');

    // Fees Routes
    Route::resource('fees-master', 'FeesMasterController');
    Route::resource('fees-discount', 'FeesDiscountController');
    Route::resource('fees-fine', 'FeesFineController');
    Route::resource('fees-category', 'FeesCategoryController');
    Route::resource('fees-receipt', 'ReceiptSettingController');


    
    // Human Resource Routes
    Route::resource('staff/designation', 'DesignationController');
    Route::resource('staff/department', 'DepartmentController');
    Route::resource('staff/work-shift-type', 'WorkShiftTypeController');
    Route::resource('staff/staff-note', 'StaffNoteController');
    Route::resource('staff/tax-setting', 'TaxSettingController');

    // Staff Routes
    Route::resource('staff/user','UserController');
    Route::get('staff/user-status/{id}', 'UserController@status')->name('user.status');
    Route::post('staff/user-send-password/{id}', 'UserController@sendPassword')->name('user.send-password');
    // Route::get('staff/user-print-password/{id}', 'UserController@printPassword')->name('user.print-password');
    Route::post('staff/user-password-change', 'UserController@passwordChange')->name('user-password-change');

    // Staff Attendance Routes
    Route::resource('staff-daily-attendance', 'StaffAttendanceController');
    Route::get('staff-daily-report', 'StaffAttendanceController@report')->name('staff-daily-attendance.report');
    Route::resource('staff-hourly-attendance', 'StaffHourlyAttendanceController');
    Route::get('staff-hourly-report', 'StaffHourlyAttendanceController@report')->name('staff-hourly-attendance.report');
    Route::get('staff-hourly-report/{id}', 'StaffHourlyAttendanceController@reportDetails')->name('staff-hourly-attendance.report.details');

    // Staff Leave Routes
    Route::resource('staff/staff-leave', 'LeaveController');
    Route::resource('staff/leave-type', 'LeaveTypeController');
    Route::resource('staff/leave-manage', 'LeaveManagementController');
    Route::post('staff/leave-manage-status/{id}', 'LeaveManagementController@status')->name('leave-manage.status');

    // Payroll Routes
    Route::resource('staff/payroll', 'PayrollController');
    Route::get('staff/payroll-generate/{id}/{month}/{year}', 'PayrollController@generate')->name('payroll.generate');
    Route::post('staff/payroll-pay/{id}', 'PayrollController@pay')->name('payroll.pay');
    Route::post('staff/payroll-unpay/{id}', 'PayrollController@unpay')->name('payroll.unpay');
    Route::get('staff/payroll-report', 'PayrollController@report')->name('payroll.report');
    Route::get('staff/payroll-print/{id}', 'PayrollController@print')->name('payroll.print');
    Route::resource('staff/pay-slip-setting', 'PaySlipSettingController');



    // Income Expense Routes
    Route::resource('account/income', 'IncomeController');
    Route::resource('account/income-category', 'IncomeCategoryController');
    Route::resource('account/expense', 'ExpenseController');
    Route::resource('account/expense-category', 'ExpenseCategoryController');
    Route::resource('account/outcome', 'OutcomeCalculationController');



    // Communicate Routes
    Route::resource('communicate/email-notify', 'EmailNotifyController');
    Route::resource('communicate/sms-notify', 'SMSNotifyController');
    Route::resource('communicate/event', 'EventController');
    Route::get('communicate/event-calendar', 'EventController@calendar')->name('event.calendar');
    Route::post('communicate/event-calendar-filter', 'EventController@getDataFilter')->name('event.calendarfilter');
    Route::resource('communicate/notice', 'NoticeController');
    Route::resource('communicate/notice-category', 'NoticeCategoryController');



    // Library Routes
    Route::resource('library/book-list', 'BookController');
    Route::get('library/book-list-token-print/{id}', 'BookController@tokenPrint')->name('book-list.token.print');
    Route::get('library/book-list-multitoken-print', 'BookController@multitokenPrint')->name('book-list.multitoken.print');
    Route::resource('library/book-request', 'BookRequestController');
    Route::resource('library/book-category', 'BookCategoryController');
    Route::resource('library/issue-return', 'IssueReturnController');
    Route::get('library/issue-return-over', 'IssueReturnController@dateOver')->name('issue-return.over');
    Route::post('library/issue-return-penalty/{id}', 'IssueReturnController@penalty')->name('issue-return.penalty');

    // Library Member Routes
    Route::resource('member/library-student', 'LibraryStudentController');
    Route::resource('member/library-staff', 'LibraryStaffController');
    Route::resource('member/library-outsider', 'OutSideUserController');
    Route::post('member/library-outsider-status/{id}', 'OutSideUserController@status')->name('library-outsider.status');
    Route::get('member/library-student-card/{id}', 'LibraryStudentController@libraryCard')->name('library-student.card');
    Route::get('member/library-staff-card/{id}', 'LibraryStaffController@libraryCard')->name('library-staff.card');
    Route::get('member/library-outsider-card/{id}', 'OutSideUserController@libraryCard')->name('library-outsider.card');
    Route::resource('library-card-setting', 'LibraryIdCardSettingController');



    // Inventory Routes
    Route::resource('inventory/item-list', 'ItemController');
    Route::resource('inventory/item-issue', 'ItemIssueController');
    Route::post('inventory/item-issue-penalty/{id}', 'ItemIssueController@penalty')->name('item-issue.penalty');
    Route::resource('inventory/item-stock', 'ItemStockController');
    Route::resource('inventory/item-store', 'ItemStoreController');
    Route::resource('inventory/item-supplier', 'ItemSupplierController');
    Route::resource('inventory/item-category', 'ItemCategoryController');



    // Hostel Routes
    Route::resource('hostel/hostel', 'HostelController');
    Route::resource('hostel/hostel-room', 'HostelRoomController');
    Route::resource('hostel/room-type', 'HostelRoomTypeController');
    Route::resource('hostel-student', 'HostelStudentController');
    Route::resource('hostel-staff', 'HostelStaffController');



    // Transport Routes
    Route::resource('transport-route', 'TransportRouteController');
    Route::resource('transport-vehicle', 'TransportVehicleController');
    Route::resource('transport-student', 'TransportStudentController');
    Route::resource('transport-staff', 'TransportStaffController');



    // Visitor Routes
    Route::resource('frontdesk/visitor', 'VisitorController');
    Route::get('frontdesk/visitor-out/{id}', 'VisitorController@outTime')->name('visitor.out');
    Route::get('frontdesk/visitor-token-print/{id}', 'VisitorController@tokenPrint')->name('visitor.token.print');
    Route::resource('frontdesk/visit-purpose', 'VisitPurposeController');
    Route::resource('frontdesk/visitor-token-setting', 'VisitorTokenSettingController');

    // Phone Log Routes
    Route::resource('frontdesk/phone-log', 'PhoneLogController');

    // Enquiry Routes
    Route::resource('frontdesk/enquiry', 'EnquiryController');
    Route::post('frontdesk/enquiry-status/{id}', 'EnquiryController@status')->name('enquiry.status');
    Route::resource('frontdesk/enquiry-source', 'EnquirySourceController');
    Route::resource('frontdesk/enquiry-reference', 'EnquiryReferenceController');

    // Complain Routes
    Route::resource('frontdesk/complain', 'ComplainController');
    Route::post('frontdesk/complain-status/{id}', 'ComplainController@status')->name('complain.status');
    Route::resource('frontdesk/complain-type', 'ComplainTypeController');
    Route::resource('frontdesk/complain-source', 'ComplainSourceController');

    // Postal Exchange Routes
    Route::resource('frontdesk/postal-exchange', 'PostalExchangeController');
    Route::post('frontdesk/postal-exchange-status/{id}', 'PostalExchangeController@status')->name('postal-exchange.status');
    Route::resource('frontdesk/postal-type', 'PostalExchangeTypeController');

    // Postal Exchange Routes
    Route::resource('frontdesk/meeting', 'MeetingScheduleController');
    Route::post('frontdesk/meeting-status/{id}', 'MeetingScheduleController@status')->name('meeting.status');
    Route::resource('frontdesk/meeting-type', 'MeetingTypeController');




    // Marksheet Routes
    Route::resource('transcript/marksheet', 'MarksheetController');
    Route::get('transcript/marksheet-print/{id}', 'MarksheetController@print')->name('marksheet.print');
    Route::get('transcript/marksheet-download/{id}', 'MarksheetController@download')->name('marksheet.download');
    Route::resource('transcript/marksheet-setting', 'MarksheetSettingController');

    // Certificate Routes
    Route::resource('transcript/certificate', 'CertificateController');
    Route::get('transcript/certificate-print/{id}', 'CertificateController@print')->name('certificate.print');
    Route::get('transcript/certificate-download/{id}', 'CertificateController@download')->name('certificate.download');
    Route::resource('transcript/certificate-template', 'CertificateTemplateController');
    

    

    // Setting Routes
    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::post('setting/siteinfo', 'SettingController@siteInfo')->name('setting.siteinfo');

    // Address Routes
    Route::resource('setting/province','ProvinceController');
    Route::resource('setting/district','DistrictController');

    // Language Routes
    Route::resource('setting/language', 'LanguageController');
    Route::get('setting/language-default/{id}', 'LanguageController@default')->name('language.default');

    // Translations Routes
    Route::get('translations', 'TranslateController@index')->name('translations.index');
    Route::post('translations/create', 'TranslateController@store')->name('translations.create');
    Route::post('translations/update', 'TranslateController@transUpdate')->name('translation.update.json');
    Route::post('translations/updateKey', 'TranslateController@transUpdateKey')->name('translation.update.json.key');
    Route::delete('translations/destroy/{key}', 'TranslateController@destroy')->name('translations.destroy');

    // Roles And Permission Routes
    Route::resource('setting/role','RoleController');

    // Env Setting Routes
    Route::resource('setting/mail-setting','MailSettingController');
    Route::resource('setting/sms-setting','SMSSettingController');

    // DB Import Export Routes
    Route::get('setting/bulk-import-export', 'BulkImportExportController@importExportView')->name('bulk.import-export');
    Route::get('setting/bulk-export/{table}', 'BulkImportExportController@export')->name('bulk.export');
    Route::post('setting/bulk-import/{table}', 'BulkImportExportController@import')->name('bulk.import');

    // Sechedule Setting
    Route::resource('setting/schedule-setting', 'ScheduleSettingController');

    // Application Setting
    Route::resource('setting/application-setting', 'ApplicationSettingController');




    // Profile Routes
    Route::resource('profile','ProfileController');
    Route::get('profile/account', 'ProfileController@account')->name('profile.account');
    Route::post('profile/changemail', 'ProfileController@changeMail')->name('profile.changemail');
    Route::post('profile/changepass', 'ProfileController@changePass')->name('profile.changepass');
});


// Student Login Routes
Route::prefix('student')->name('student.')->namespace('Student')->group(function(){
    
    Route::namespace('Auth')->group(function(){
            
        // Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('login.store');
        Route::post('/logout','LoginController@logout')->name('logout');

        // Register Routes
        // Route::get('/register','RegisterController@showRegisterForm')->name('register');
        // Route::post('/register','RegisterController@register')->name('register.store');

        // Forgot Password Routes
        // Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        // Reset Password Routes
        // Route::get('/password/reset/{token}/{email}','ResetPasswordController@showResetForm')->name('password.reset');
        // Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });

});



// Student Dashboard Routes
Route::middleware(['auth:student', 'XSS'])->prefix('student')->name('student.')->namespace('Student')->group(function () {

    // Dashboard Route
    // Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    // Transcript Routes
    Route::get('transcript', 'TranscriptController@index')->name('transcript.index');

    // Assignment Routes
    Route::get('assignment', 'AssignmentController@index')->name('assignment.index');
    Route::get('assignment/{id}', 'AssignmentController@show')->name('assignment.show');
    Route::post('assignment/{id}/update', 'AssignmentController@update')->name('assignment.update');

    // Class Routine Routes
    Route::get('class-routine', 'ClassRoutineController@index')->name('class-routine.index');

    // Attendance Report
    Route::get('attendance', 'AttendanceController@index')->name('attendance.index');

    // Exam Routine Routes
    Route::get('exam-routine', 'ExamRoutineController@index')->name('exam-routine.index');

    // Fees Routes
    Route::get('fees', 'FeesController@index')->name('fees.index');

    // Library Routes
    Route::get('library', 'LibraryController@index')->name('library.index');

    // Calendar Routes
    // Route::get('event-calendar', 'EventController@calendar')->name('event.calendar');

    // Notice Routes
    Route::get('notice', 'NoticeController@index')->name('notice.index');
    Route::get('notice/{id}', 'NoticeController@show')->name('notice.show');

    // Leave Routes
    Route::resource('leave', 'LeaveController');

    // Download Routes
    Route::get('download', 'DownloadCenterController@index')->name('download.index');
    Route::get('download/{id}', 'DownloadCenterController@show')->name('download.show');

    // Profile Routes
    Route::resource('profile','ProfileController');
    Route::get('profile/account', 'ProfileController@account')->name('profile.account');
    // Route::post('profile/changemail', 'ProfileController@changeMail')->name('profile.changemail');
    // Route::post('profile/changepass', 'ProfileController@changePass')->name('profile.changepass');
});