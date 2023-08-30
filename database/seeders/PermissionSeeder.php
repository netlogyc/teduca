<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            //*** Application Modules ***//
            ['name' => 'application-view', 'group' => 'Application', 'title' => 'View'],
            ['name' => 'application-create', 'group' => 'Application', 'title' => 'Admission'],
            ['name' => 'application-edit', 'group' => 'Application', 'title' => 'Action'],
            ['name' => 'application-delete', 'group' => 'Application', 'title' => 'Delete'],
            //*** Application Modules ***//



            //*** Student Modules ***//
            ['name' => 'student-view', 'group' => 'Student', 'title' => 'View'],
            ['name' => 'student-create', 'group' => 'Student', 'title' => 'Create'],
            ['name' => 'student-edit', 'group' => 'Student', 'title' => 'Edit'],
            ['name' => 'student-delete', 'group' => 'Student', 'title' => 'Delete'],
            ['name' => 'student-password-print', 'group' => 'Student', 'title' => 'Password Print'],
            ['name' => 'student-password-change', 'group' => 'Student', 'title' => 'Password Change'],
            ['name' => 'student-card', 'group' => 'Student', 'title' => 'ID Card'],

            ['name' => 'id-card-setting-view', 'group' => 'ID Card', 'title' => 'Setting'],
            //*** Student Modules ***//



            //*** Student Transfer Modules ***//
            ['name' => 'student-transfer-in-view', 'group' => 'Student Transfer In', 'title' => 'View'],
            ['name' => 'student-transfer-in-create', 'group' => 'Student Transfer In', 'title' => 'Transfer'],
            ['name' => 'student-transfer-in-edit', 'group' => 'Student Transfer In', 'title' => 'Edit'],

            ['name' => 'student-transfer-out-view', 'group' => 'Student Transfer Out', 'title' => 'View'],
            ['name' => 'student-transfer-out-create', 'group' => 'Student Transfer Out', 'title' => 'Transfer'],
            ['name' => 'student-transfer-out-edit', 'group' => 'Student Transfer Out', 'title' => 'Edit'],
            //*** Student Transfer Modules ***//



            //*** Academic Modules ***//
            ['name' => 'status-type-view', 'group' => 'Status Type', 'title' => 'View'],
            ['name' => 'status-type-create', 'group' => 'Status Type', 'title' => 'Create'],
            ['name' => 'status-type-edit', 'group' => 'Status Type', 'title' => 'Edit'],
            ['name' => 'status-type-delete', 'group' => 'Status Type', 'title' => 'Delete'],
            //*** Academic Modules ***//

            

            //*** Student Attendance Modules ***//
            ['name' => 'student-attendance-action', 'group' => 'Student Attendance', 'title' => 'Manage'],
            ['name' => 'student-attendance-report', 'group' => 'Student Attendance', 'title' => 'Report'],
            //*** Student Attendance Modules ***//



            //*** Student Leave Modules ***//
            ['name' => 'student-leave-manage-view', 'group' => 'Student Leave Manage', 'title' => 'View'],
            ['name' => 'student-leave-manage-edit', 'group' => 'Student Leave Manage', 'title' => 'Action'],
            ['name' => 'student-leave-manage-delete', 'group' => 'Student Leave Manage', 'title' => 'Delete'],
            //*** Student Leave Modules ***//



            //*** Student Note Modules ***//
            ['name' => 'student-note-view', 'group' => 'Student Note', 'title' => 'View'],
            ['name' => 'student-note-create', 'group' => 'Student Note', 'title' => 'Create'],
            ['name' => 'student-note-edit', 'group' => 'Student Note', 'title' => 'Edit'],
            ['name' => 'student-note-delete', 'group' => 'Student Note', 'title' => 'Delete'],
            //*** Student Note Modules ***//



            //*** Student Enroll Modules ***//
            ['name' => 'student-enroll-single', 'group' => 'Student Enroll', 'title' => 'Single Enroll'],
            ['name' => 'student-enroll-group', 'group' => 'Student Enroll', 'title' => 'Group Enroll'],
            ['name' => 'student-enroll-adddrop', 'group' => 'Student Enroll', 'title' => 'Course Add Drop'],
            ['name' => 'student-enroll-complete', 'group' => 'Student Enroll', 'title' => 'Course Complete'],
            ['name' => 'student-enroll-alumni', 'group' => 'Student Enroll', 'title' => 'Student Alumni'],
            //*** Student Enroll Modules ***//



            //*** Academic Modules ***//
            ['name' => 'faculty-view', 'group' => 'Faculty', 'title' => 'View'],
            ['name' => 'faculty-create', 'group' => 'Faculty', 'title' => 'Create'],
            ['name' => 'faculty-edit', 'group' => 'Faculty', 'title' => 'Edit'],
            ['name' => 'faculty-delete', 'group' => 'Faculty', 'title' => 'Delete'],

            ['name' => 'program-view', 'group' => 'Program', 'title' => 'View'],
            ['name' => 'program-create', 'group' => 'Program', 'title' => 'Create'],
            ['name' => 'program-edit', 'group' => 'Program', 'title' => 'Edit'],
            ['name' => 'program-delete', 'group' => 'Program', 'title' => 'Delete'],

            ['name' => 'batch-view', 'group' => 'Batch', 'title' => 'View'],
            ['name' => 'batch-create', 'group' => 'Batch', 'title' => 'Create'],
            ['name' => 'batch-edit', 'group' => 'Batch', 'title' => 'Edit'],
            ['name' => 'batch-delete', 'group' => 'Batch', 'title' => 'Delete'],

            ['name' => 'session-view', 'group' => 'Session', 'title' => 'View'],
            ['name' => 'session-create', 'group' => 'Session', 'title' => 'Create'],
            ['name' => 'session-edit', 'group' => 'Session', 'title' => 'Edit'],
            ['name' => 'session-delete', 'group' => 'Session', 'title' => 'Delete'],

            ['name' => 'semester-view', 'group' => 'Semester', 'title' => 'View'],
            ['name' => 'semester-create', 'group' => 'Semester', 'title' => 'Create'],
            ['name' => 'semester-edit', 'group' => 'Semester', 'title' => 'Edit'],
            ['name' => 'semester-delete', 'group' => 'Semester', 'title' => 'Delete'],

            ['name' => 'section-view', 'group' => 'Section', 'title' => 'View'],
            ['name' => 'section-create', 'group' => 'Section', 'title' => 'Create'],
            ['name' => 'section-edit', 'group' => 'Section', 'title' => 'Edit'],
            ['name' => 'section-delete', 'group' => 'Section', 'title' => 'Delete'],

            ['name' => 'class-room-view', 'group' => 'Class Room', 'title' => 'View'],
            ['name' => 'class-room-create', 'group' => 'Class Room', 'title' => 'Create'],
            ['name' => 'class-room-edit', 'group' => 'Class Room', 'title' => 'Edit'],
            ['name' => 'class-room-delete', 'group' => 'Class Room', 'title' => 'Delete'],
            //*** Academic Modules ***//



            //*** Subject Modules ***//
            ['name' => 'subject-view', 'group' => 'Course', 'title' => 'View'],
            ['name' => 'subject-create', 'group' => 'Course', 'title' => 'Create'],
            ['name' => 'subject-edit', 'group' => 'Course', 'title' => 'Edit'],
            ['name' => 'subject-delete', 'group' => 'Course', 'title' => 'Delete'],

            ['name' => 'enroll-subject-view', 'group' => 'Enroll Course', 'title' => 'View'],
            ['name' => 'enroll-subject-create', 'group' => 'Enroll Course', 'title' => 'Create'],
            ['name' => 'enroll-subject-edit', 'group' => 'Enroll Course', 'title' => 'Edit'],
            ['name' => 'enroll-subject-delete', 'group' => 'Enroll Course', 'title' => 'Delete'],
            //*** Subject Modules ***//



            //*** Routine Modules ***//
            ['name' => 'class-routine-view', 'group' => 'Class Routine', 'title' => 'View'],
            ['name' => 'class-routine-create', 'group' => 'Class Routine', 'title' => 'Manage'],
            ['name' => 'class-routine-print', 'group' => 'Class Routine', 'title' => 'Print'],

            ['name' => 'exam-routine-view', 'group' => 'Exam Routine', 'title' => 'View'],
            ['name' => 'exam-routine-create', 'group' => 'Exam Routine', 'title' => 'Create'],
            ['name' => 'exam-routine-edit', 'group' => 'Exam Routine', 'title' => 'Edit'],
            ['name' => 'exam-routine-delete', 'group' => 'Exam Routine', 'title' => 'Delete'],
            ['name' => 'exam-routine-print', 'group' => 'Exam Routine', 'title' => 'Print'],

            ['name' => 'class-routine-teacher', 'group' => 'Teacher Routine', 'title' => 'View'],

            ['name' => 'routine-setting-class', 'group' => 'Routine Setting', 'title' => 'Class Routine'],
            ['name' => 'routine-setting-exam', 'group' => 'Routine Setting', 'title' => 'Exam Routine'],
            //*** Routine Modules ***//



            //*** Exam Manage Modules ***//
            ['name' => 'exam-attendance', 'group' => 'Exam', 'title' => 'Attendance'],
            ['name' => 'exam-marking', 'group' => 'Exam', 'title' => 'Mark Ledger'],
            ['name' => 'exam-result', 'group' => 'Exam', 'title' => 'Result'],

            ['name' => 'subject-marking', 'group' => 'Course Final', 'title' => 'Mark Ledger'],
            ['name' => 'subject-result', 'group' => 'Course Final', 'title' => 'Result'],
            //*** Exam Manage Modules ***//



            //*** Exam Modules ***//
            ['name' => 'grade-view', 'group' => 'Grade', 'title' => 'View'],
            ['name' => 'grade-create', 'group' => 'Grade', 'title' => 'Create'],
            ['name' => 'grade-edit', 'group' => 'Grade', 'title' => 'Edit'],
            ['name' => 'grade-delete', 'group' => 'Grade', 'title' => 'Delete'],

            ['name' => 'exam-type-view', 'group' => 'Exam Type', 'title' => 'View'],
            ['name' => 'exam-type-create', 'group' => 'Exam Type', 'title' => 'Create'],
            ['name' => 'exam-type-edit', 'group' => 'Exam Type', 'title' => 'Edit'],
            ['name' => 'exam-type-delete', 'group' => 'Exam Type', 'title' => 'Delete'],
            
            ['name' => 'admit-card-view', 'group' => 'Admit Card', 'title' => 'View'],
            ['name' => 'admit-card-print', 'group' => 'Admit Card', 'title' => 'Print'],
            ['name' => 'admit-card-download', 'group' => 'Admit Card', 'title' => 'Download'],

            ['name' => 'admit-setting-view', 'group' => 'Admit Card', 'title' => 'Setting'],
            ['name' => 'result-contribution-view', 'group' => 'Contribution', 'title' => 'Setting'],
            //*** Exam Modules ***//



            //*** Download Center Modules ***//
            ['name' => 'assignment-view', 'group' => 'Assignment', 'title' => 'View'],
            ['name' => 'assignment-create', 'group' => 'Assignment', 'title' => 'Create'],
            ['name' => 'assignment-edit', 'group' => 'Assignment', 'title' => 'Edit'],
            ['name' => 'assignment-delete', 'group' => 'Assignment', 'title' => 'Delete'],
            ['name' => 'assignment-marking', 'group' => 'Assignment', 'title' => 'Mark Ledger'],

            ['name' => 'content-view', 'group' => 'Content', 'title' => 'View'],
            ['name' => 'content-create', 'group' => 'Content', 'title' => 'Create'],
            ['name' => 'content-edit', 'group' => 'Content', 'title' => 'Edit'],
            ['name' => 'content-delete', 'group' => 'Content', 'title' => 'Delete'],

            ['name' => 'content-type-view', 'group' => 'Content Type', 'title' => 'View'],
            ['name' => 'content-type-create', 'group' => 'Content Type', 'title' => 'Create'],
            ['name' => 'content-type-edit', 'group' => 'Content Type', 'title' => 'Edit'],
            ['name' => 'content-type-delete', 'group' => 'Content Type', 'title' => 'Delete'],
            //*** Download Center Modules ***//


            
            //*** Fees Collection Modules ***//
            ['name' => 'fees-student-due', 'group' => 'Student Fees', 'title' => 'Fees Due'],
            ['name' => 'fees-student-quick-assign', 'group' => 'Student Fees', 'title' => 'Quick Assign'],
            ['name' => 'fees-student-quick-received', 'group' => 'Student Fees', 'title' => 'Quick Received'],
            ['name' => 'fees-student-report', 'group' => 'Student Fees', 'title' => 'Report'],
            ['name' => 'fees-student-action', 'group' => 'Student Fees', 'title' => 'Action'],
            ['name' => 'fees-student-print', 'group' => 'Student Fees', 'title' => 'Print'],

            ['name' => 'fees-receipt-view', 'group' => 'Fees Receipt', 'title' => 'Setting'],
            //*** Fees Collection Modules ***//



            //*** Fees Master Modules ***//
            ['name' => 'fees-master-view', 'group' => 'Fees Master', 'title' => 'View'],
            ['name' => 'fees-master-create', 'group' => 'Fees Master', 'title' => 'Manage'],

            ['name' => 'fees-category-view', 'group' => 'Fees Type', 'title' => 'View'],
            ['name' => 'fees-category-create', 'group' => 'Fees Type', 'title' => 'Create'],
            ['name' => 'fees-category-edit', 'group' => 'Fees Type', 'title' => 'Edit'],
            ['name' => 'fees-category-delete', 'group' => 'Fees Type', 'title' => 'Delete'],
            //*** Fees Master Modules ***//



            //*** Fees Management Modules ***//
            ['name' => 'fees-discount-view', 'group' => 'Fees Discount', 'title' => 'View'],
            ['name' => 'fees-discount-create', 'group' => 'Fees Discount', 'title' => 'Create'],
            ['name' => 'fees-discount-edit', 'group' => 'Fees Discount', 'title' => 'Edit'],
            ['name' => 'fees-discount-delete', 'group' => 'Fees Discount', 'title' => 'Delete'],

            ['name' => 'fees-fine-view', 'group' => 'Fees Fine Setting', 'title' => 'View'],
            ['name' => 'fees-fine-create', 'group' => 'Fees Fine Setting', 'title' => 'Create'],
            ['name' => 'fees-fine-edit', 'group' => 'Fees Fine Setting', 'title' => 'Edit'],
            ['name' => 'fees-fine-delete', 'group' => 'Fees Fine Setting', 'title' => 'Delete'],
            //*** Fees Management Modules ***//

            

            //*** Staff Modules ***//
            ['name' => 'user-view', 'group' => 'Staff', 'title' => 'View'],
            ['name' => 'user-create', 'group' => 'Staff', 'title' => 'Create'],
            ['name' => 'user-edit', 'group' => 'Staff', 'title' => 'Edit'],
            ['name' => 'user-delete', 'group' => 'Staff', 'title' => 'Delete'],
            // ['name' => 'user-password-print', 'group' => 'Staff', 'title' => 'Password Print'],
            ['name' => 'user-password-change', 'group' => 'Staff', 'title' => 'Password Change'],
            //*** Staff Modules ***//



            //*** Staff Attendance Modules ***//
            ['name' => 'staff-daily-attendance-action', 'group' => 'Staff Daily Attendance', 'title' => 'Manage'],
            ['name' => 'staff-daily-attendance-report', 'group' => 'Staff Daily Attendance', 'title' => 'Report'],

            ['name' => 'staff-hourly-attendance-action', 'group' => 'Staff Hourly Attendance', 'title' => 'Manage'],
            ['name' => 'staff-hourly-attendance-report', 'group' => 'Staff Hourly Attendance', 'title' => 'Report'],
            //*** Staff Attendance Modules ***//



            //*** Staff Note Modules ***//
            ['name' => 'staff-note-view', 'group' => 'Staff Note', 'title' => 'View'],
            ['name' => 'staff-note-create', 'group' => 'Staff Note', 'title' => 'Create'],
            ['name' => 'staff-note-edit', 'group' => 'Staff Note', 'title' => 'Edit'],
            ['name' => 'staff-note-delete', 'group' => 'Staff Note', 'title' => 'Delete'],
            //*** Staff Note Modules ***//

            

            //*** Payroll Modules ***//
            ['name' => 'payroll-view', 'group' => 'Payroll', 'title' => 'View'],
            ['name' => 'payroll-action', 'group' => 'Payroll', 'title' => 'Action'],
            ['name' => 'payroll-report', 'group' => 'Payroll', 'title' => 'Report'],
            ['name' => 'payroll-print', 'group' => 'Payroll', 'title' => 'Print'],

            ['name' => 'pay-slip-setting-view', 'group' => 'Pay Slip', 'title' => 'Setting'],
            //*** Payroll Modules ***//



            //*** Staff Leave Modules ***//
            ['name' => 'staff-leave-manage-view', 'group' => 'Staff Leave Manage', 'title' => 'View'],
            ['name' => 'staff-leave-manage-edit', 'group' => 'Staff Leave Manage', 'title' => 'Action'],
            ['name' => 'staff-leave-manage-delete', 'group' => 'Staff Leave Manage', 'title' => 'Delete'],

            ['name' => 'staff-leave-view', 'group' => 'Staff Leave', 'title' => 'View'],
            ['name' => 'staff-leave-create', 'group' => 'Staff Leave', 'title' => 'Create'],
            ['name' => 'staff-leave-delete', 'group' => 'Staff Leave', 'title' => 'Delete'],

            ['name' => 'leave-type-view', 'group' => 'Leave Type', 'title' => 'View'],
            ['name' => 'leave-type-create', 'group' => 'Leave Type', 'title' => 'Create'],
            ['name' => 'leave-type-edit', 'group' => 'Leave Type', 'title' => 'Edit'],
            ['name' => 'leave-type-delete', 'group' => 'Leave Type', 'title' => 'Delete'],
            //*** Staff Leave Modules ***//



            //*** HR Modules ***//
            ['name' => 'work-shift-type-view', 'group' => 'Work Shift Type', 'title' => 'View'],
            ['name' => 'work-shift-type-create', 'group' => 'Work Shift Type', 'title' => 'Create'],
            ['name' => 'work-shift-type-edit', 'group' => 'Work Shift Type', 'title' => 'Edit'],
            ['name' => 'work-shift-type-delete', 'group' => 'Work Shift Type', 'title' => 'Delete'],

            ['name' => 'tax-setting-view', 'group' => 'Tax Setting', 'title' => 'View'],
            ['name' => 'tax-setting-create', 'group' => 'Tax Setting', 'title' => 'Create'],
            ['name' => 'tax-setting-edit', 'group' => 'Tax Setting', 'title' => 'Edit'],
            ['name' => 'tax-setting-delete', 'group' => 'Tax Setting', 'title' => 'Delete'],
            //*** HR Modules ***//



            //*** Department Modules ***//
            ['name' => 'designation-view', 'group' => 'Designation', 'title' => 'View'],
            ['name' => 'designation-create', 'group' => 'Designation', 'title' => 'Create'],
            ['name' => 'designation-edit', 'group' => 'Designation', 'title' => 'Edit'],
            ['name' => 'designation-delete', 'group' => 'Designation', 'title' => 'Delete'],

            ['name' => 'department-view', 'group' => 'Department', 'title' => 'View'],
            ['name' => 'department-create', 'group' => 'Department', 'title' => 'Create'],
            ['name' => 'department-edit', 'group' => 'Department', 'title' => 'Edit'],
            ['name' => 'department-delete', 'group' => 'Department', 'title' => 'Delete'],
            //*** Department Modules ***//



            //*** Income Modules ***//
            ['name' => 'income-view', 'group' => 'Income', 'title' => 'View'],
            ['name' => 'income-create', 'group' => 'Income', 'title' => 'Create'],
            ['name' => 'income-edit', 'group' => 'Income', 'title' => 'Edit'],
            ['name' => 'income-delete', 'group' => 'Income', 'title' => 'Delete'],

            ['name' => 'income-category-view', 'group' => 'Income Category', 'title' => 'View'],
            ['name' => 'income-category-create', 'group' => 'Income Category', 'title' => 'Create'],
            ['name' => 'income-category-edit', 'group' => 'Income Category', 'title' => 'Edit'],
            ['name' => 'income-category-delete', 'group' => 'Income Category', 'title' => 'Delete'],
            //*** Income Modules ***//



            //*** Expense Modules ***//
            ['name' => 'expense-view', 'group' => 'Expense', 'title' => 'View'],
            ['name' => 'expense-create', 'group' => 'Expense', 'title' => 'Create'],
            ['name' => 'expense-edit', 'group' => 'Expense', 'title' => 'Edit'],
            ['name' => 'expense-delete', 'group' => 'Expense', 'title' => 'Delete'],

            ['name' => 'expense-category-view', 'group' => 'Expense Category', 'title' => 'View'],
            ['name' => 'expense-category-create', 'group' => 'Expense Category', 'title' => 'Create'],
            ['name' => 'expense-category-edit', 'group' => 'Expense Category', 'title' => 'Edit'],
            ['name' => 'expense-category-delete', 'group' => 'Expense Category', 'title' => 'Delete'],

            ['name' => 'outcome-view', 'group' => 'Outcome Overview', 'title' => 'View'],
            //*** Expense Modules ***//



            //*** Notify Modules ***//
            ['name' => 'email-notify-view', 'group' => 'Email Notify', 'title' => 'View'],
            ['name' => 'email-notify-create', 'group' => 'Email Notify', 'title' => 'Send'],
            ['name' => 'email-notify-delete', 'group' => 'Email Notify', 'title' => 'Delete'],

            ['name' => 'sms-notify-view', 'group' => 'SMS Notify', 'title' => 'View'],
            ['name' => 'sms-notify-create', 'group' => 'SMS Notify', 'title' => 'Send'],
            ['name' => 'sms-notify-delete', 'group' => 'SMS Notify', 'title' => 'Delete'],
            //*** Notify Modules ***//



            //*** Event Modules ***//
            ['name' => 'event-view', 'group' => 'Event', 'title' => 'View'],
            ['name' => 'event-create', 'group' => 'Event', 'title' => 'Create'],
            ['name' => 'event-edit', 'group' => 'Event', 'title' => 'Edit'],
            ['name' => 'event-delete', 'group' => 'Event', 'title' => 'Delete'],

            ['name' => 'event-calendar', 'group' => 'Event Calendar', 'title' => 'View'],
            //*** Event Modules ***//



            //*** Notice Modules ***//
            ['name' => 'notice-view', 'group' => 'Notice', 'title' => 'View'],
            ['name' => 'notice-create', 'group' => 'Notice', 'title' => 'Create'],
            ['name' => 'notice-edit', 'group' => 'Notice', 'title' => 'Edit'],
            ['name' => 'notice-delete', 'group' => 'Notice', 'title' => 'Delete'],

            ['name' => 'notice-category-view', 'group' => 'Notice Category', 'title' => 'View'],
            ['name' => 'notice-category-create', 'group' => 'Notice Category', 'title' => 'Create'],
            ['name' => 'notice-category-edit', 'group' => 'Notice Category', 'title' => 'Edit'],
            ['name' => 'notice-category-delete', 'group' => 'Notice Category', 'title' => 'Delete'],
            //*** Notice Modules ***//
            


            //*** Issue Return Modules ***//
            ['name' => 'book-issue-return-view', 'group' => 'Book Issue Return', 'title' => 'View'],
            ['name' => 'book-issue-return-action', 'group' => 'Book Issue Return', 'title' => 'Action'],
            ['name' => 'book-issue-return-delete', 'group' => 'Book Issue Return', 'title' => 'Delete'],
            ['name' => 'book-issue-return-over', 'group' => 'Book Issue Return', 'title' => 'Date Over'],
            //*** Issue Return Modules ***//



            //*** Library Member Modules ***//
            ['name' => 'library-member-view', 'group' => 'Library Member', 'title' => 'View'],
            ['name' => 'library-member-create', 'group' => 'Library Member', 'title' => 'Create'],
            ['name' => 'library-member-edit', 'group' => 'Library Member', 'title' => 'Edit'],
            ['name' => 'library-member-delete', 'group' => 'Library Member', 'title' => 'Delete'],
            ['name' => 'library-member-card', 'group' => 'Library Member', 'title' => 'Card Print'],

            ['name' => 'library-card-setting-view', 'group' => 'Library Card', 'title' => 'Setting'],
            //*** Library Member Modules ***//



            //*** Book Modules ***//
            ['name' => 'book-view', 'group' => 'Book', 'title' => 'View'],
            ['name' => 'book-create', 'group' => 'Book', 'title' => 'Create'],
            ['name' => 'book-edit', 'group' => 'Book', 'title' => 'Edit'],
            ['name' => 'book-delete', 'group' => 'Book', 'title' => 'Delete'],
            ['name' => 'book-print', 'group' => 'Book', 'title' => 'Token Print'],

            ['name' => 'book-request-view', 'group' => 'Book Request', 'title' => 'View'],
            ['name' => 'book-request-create', 'group' => 'Book Request', 'title' => 'Create'],
            ['name' => 'book-request-edit', 'group' => 'Book Request', 'title' => 'Edit'],
            ['name' => 'book-request-delete', 'group' => 'Book Request', 'title' => 'Delete'],

            ['name' => 'book-category-view', 'group' => 'Book Category', 'title' => 'View'],
            ['name' => 'book-category-create', 'group' => 'Book Category', 'title' => 'Create'],
            ['name' => 'book-category-edit', 'group' => 'Book Category', 'title' => 'Edit'],
            ['name' => 'book-category-delete', 'group' => 'Book Category', 'title' => 'Delete'],
            //*** Book Modules ***//



            //*** Inventory Modules ***//
            ['name' => 'item-issue-view', 'group' => 'Item Issue', 'title' => 'View'],
            ['name' => 'item-issue-action', 'group' => 'Item Issue', 'title' => 'Action'],
            ['name' => 'item-issue-delete', 'group' => 'Item Issue', 'title' => 'Delete'],

            ['name' => 'item-stock-view', 'group' => 'Item Stock', 'title' => 'View'],
            ['name' => 'item-stock-create', 'group' => 'Item Stock', 'title' => 'Create'],
            ['name' => 'item-stock-edit', 'group' => 'Item Stock', 'title' => 'Edit'],
            ['name' => 'item-stock-delete', 'group' => 'Item Stock', 'title' => 'Delete'],

            ['name' => 'item-view', 'group' => 'Item', 'title' => 'View'],
            ['name' => 'item-create', 'group' => 'Item', 'title' => 'Create'],
            ['name' => 'item-edit', 'group' => 'Item', 'title' => 'Edit'],
            ['name' => 'item-delete', 'group' => 'Item', 'title' => 'Delete'],

            ['name' => 'item-store-view', 'group' => 'Item Store', 'title' => 'View'],
            ['name' => 'item-store-create', 'group' => 'Item Store', 'title' => 'Create'],
            ['name' => 'item-store-edit', 'group' => 'Item Store', 'title' => 'Edit'],
            ['name' => 'item-store-delete', 'group' => 'Item Store', 'title' => 'Delete'],

            ['name' => 'item-supplier-view', 'group' => 'Item Supplier', 'title' => 'View'],
            ['name' => 'item-supplier-create', 'group' => 'Item Supplier', 'title' => 'Create'],
            ['name' => 'item-supplier-edit', 'group' => 'Item Supplier', 'title' => 'Edit'],
            ['name' => 'item-supplier-delete', 'group' => 'Item Supplier', 'title' => 'Delete'],

            ['name' => 'item-category-view', 'group' => 'Item Category', 'title' => 'View'],
            ['name' => 'item-category-create', 'group' => 'Item Category', 'title' => 'Create'],
            ['name' => 'item-category-edit', 'group' => 'Item Category', 'title' => 'Edit'],
            ['name' => 'item-category-delete', 'group' => 'Item Category', 'title' => 'Delete'],
            //*** Inventory Modules ***//



            //*** Hostel Modules ***//
            ['name' => 'hostel-member-view', 'group' => 'Hostel Member', 'title' => 'View'],
            ['name' => 'hostel-member-create', 'group' => 'Hostel Member', 'title' => 'Manage'],

            ['name' => 'hostel-room-view', 'group' => 'Hostel Room', 'title' => 'View'],
            ['name' => 'hostel-room-create', 'group' => 'Hostel Room', 'title' => 'Create'],
            ['name' => 'hostel-room-edit', 'group' => 'Hostel Room', 'title' => 'Edit'],
            ['name' => 'hostel-room-delete', 'group' => 'Hostel Room', 'title' => 'Delete'],

            ['name' => 'hostel-view', 'group' => 'Hostel', 'title' => 'View'],
            ['name' => 'hostel-create', 'group' => 'Hostel', 'title' => 'Create'],
            ['name' => 'hostel-edit', 'group' => 'Hostel', 'title' => 'Edit'],
            ['name' => 'hostel-delete', 'group' => 'Hostel', 'title' => 'Delete'],

            ['name' => 'room-type-view', 'group' => 'Room Type', 'title' => 'View'],
            ['name' => 'room-type-create', 'group' => 'Room Type', 'title' => 'Create'],
            ['name' => 'room-type-edit', 'group' => 'Room Type', 'title' => 'Edit'],
            ['name' => 'room-type-delete', 'group' => 'Room Type', 'title' => 'Delete'],
            //*** Hostel Modules ***//



            //*** Transport Modules ***//
            ['name' => 'transport-member-view', 'group' => 'Transport Member', 'title' => 'View'],
            ['name' => 'transport-member-create', 'group' => 'Transport Member', 'title' => 'Manage'],

            ['name' => 'transport-vehicle-view', 'group' => 'Transport Vehicle', 'title' => 'View'],
            ['name' => 'transport-vehicle-create', 'group' => 'Transport Vehicle', 'title' => 'Create'],
            ['name' => 'transport-vehicle-edit', 'group' => 'Transport Vehicle', 'title' => 'Edit'],
            ['name' => 'transport-vehicle-delete', 'group' => 'Transport Vehicle', 'title' => 'Delete'],

            ['name' => 'transport-route-view', 'group' => 'Transport Route', 'title' => 'View'],
            ['name' => 'transport-route-create', 'group' => 'Transport Route', 'title' => 'Create'],
            ['name' => 'transport-route-edit', 'group' => 'Transport Route', 'title' => 'Edit'],
            ['name' => 'transport-route-delete', 'group' => 'Transport Route', 'title' => 'Delete'],
            //*** Transport Modules ***//



            //*** Visitor Modules ***//
            ['name' => 'visitor-view', 'group' => 'Visitor', 'title' => 'View'],
            ['name' => 'visitor-create', 'group' => 'Visitor', 'title' => 'Create'],
            ['name' => 'visitor-edit', 'group' => 'Visitor', 'title' => 'Edit'],
            ['name' => 'visitor-delete', 'group' => 'Visitor', 'title' => 'Delete'],
            ['name' => 'visitor-print', 'group' => 'Visitor', 'title' => 'Token Print'],

            ['name' => 'visit-purpose-view', 'group' => 'Visit Purpose', 'title' => 'View'],
            ['name' => 'visit-purpose-create', 'group' => 'Visit Purpose', 'title' => 'Create'],
            ['name' => 'visit-purpose-edit', 'group' => 'Visit Purpose', 'title' => 'Edit'],
            ['name' => 'visit-purpose-delete', 'group' => 'Visit Purpose', 'title' => 'Delete'],

            ['name' => 'visitor-token-setting-view', 'group' => 'Visitor Token', 'title' => 'Setting'],
            //*** Visitor Modules ***//



            //*** Phone Log Modules ***//
            ['name' => 'phone-log-view', 'group' => 'Phone Call Log', 'title' => 'View'],
            ['name' => 'phone-log-create', 'group' => 'Phone Call Log', 'title' => 'Create'],
            ['name' => 'phone-log-edit', 'group' => 'Phone Call Log', 'title' => 'Edit'],
            ['name' => 'phone-log-delete', 'group' => 'Phone Call Log', 'title' => 'Delete'],
            //*** Phone Log Modules ***//



            //*** Enquiry Modules ***//
            ['name' => 'enquiry-view', 'group' => 'Enquiry', 'title' => 'View'],
            ['name' => 'enquiry-create', 'group' => 'Enquiry', 'title' => 'Create'],
            ['name' => 'enquiry-edit', 'group' => 'Enquiry', 'title' => 'Edit'],
            ['name' => 'enquiry-delete', 'group' => 'Enquiry', 'title' => 'Delete'],

            ['name' => 'enquiry-reference-view', 'group' => 'Enquiry Reference', 'title' => 'View'],
            ['name' => 'enquiry-reference-create', 'group' => 'Enquiry Reference', 'title' => 'Create'],
            ['name' => 'enquiry-reference-edit', 'group' => 'Enquiry Reference', 'title' => 'Edit'],
            ['name' => 'enquiry-reference-delete', 'group' => 'Enquiry Reference', 'title' => 'Delete'],

            ['name' => 'enquiry-source-view', 'group' => 'Enquiry Source', 'title' => 'View'],
            ['name' => 'enquiry-source-create', 'group' => 'Enquiry Source', 'title' => 'Create'],
            ['name' => 'enquiry-source-edit', 'group' => 'Enquiry Source', 'title' => 'Edit'],
            ['name' => 'enquiry-source-delete', 'group' => 'Enquiry Source', 'title' => 'Delete'],
            //*** Enquiry Modules ***//



            //*** Complain Modules ***//
            ['name' => 'complain-view', 'group' => 'Complain', 'title' => 'View'],
            ['name' => 'complain-create', 'group' => 'Complain', 'title' => 'Create'],
            ['name' => 'complain-edit', 'group' => 'Complain', 'title' => 'Edit'],
            ['name' => 'complain-delete', 'group' => 'Complain', 'title' => 'Delete'],

            ['name' => 'complain-type-view', 'group' => 'Complain Type', 'title' => 'View'],
            ['name' => 'complain-type-create', 'group' => 'Complain Type', 'title' => 'Create'],
            ['name' => 'complain-type-edit', 'group' => 'Complain Type', 'title' => 'Edit'],
            ['name' => 'complain-type-delete', 'group' => 'Complain Type', 'title' => 'Delete'],

            ['name' => 'complain-source-view', 'group' => 'Complain Source', 'title' => 'View'],
            ['name' => 'complain-source-create', 'group' => 'Complain Source', 'title' => 'Create'],
            ['name' => 'complain-source-edit', 'group' => 'Complain Source', 'title' => 'Edit'],
            ['name' => 'complain-source-delete', 'group' => 'Complain Source', 'title' => 'Delete'],
            //*** Complain Modules ***//



            //*** Postal Exchange Modules ***//
            ['name' => 'postal-exchange-view', 'group' => 'Postal Exchange', 'title' => 'View'],
            ['name' => 'postal-exchange-create', 'group' => 'Postal Exchange', 'title' => 'Create'],
            ['name' => 'postal-exchange-edit', 'group' => 'Postal Exchange', 'title' => 'Edit'],
            ['name' => 'postal-exchange-delete', 'group' => 'Postal Exchange', 'title' => 'Delete'],

            ['name' => 'postal-type-view', 'group' => 'Postal Type', 'title' => 'View'],
            ['name' => 'postal-type-create', 'group' => 'Postal Type', 'title' => 'Create'],
            ['name' => 'postal-type-edit', 'group' => 'Postal Type', 'title' => 'Edit'],
            ['name' => 'postal-type-delete', 'group' => 'Postal Type', 'title' => 'Delete'],
            //*** Postal Exchange Modules ***//



            //*** Meeting Modules ***//
            ['name' => 'meeting-view', 'group' => 'Meeting Schedule', 'title' => 'View'],
            ['name' => 'meeting-create', 'group' => 'Meeting Schedule', 'title' => 'Create'],
            ['name' => 'meeting-edit', 'group' => 'Meeting Schedule', 'title' => 'Edit'],
            ['name' => 'meeting-delete', 'group' => 'Meeting Schedule', 'title' => 'Delete'],

            ['name' => 'meeting-type-view', 'group' => 'Meeting Type', 'title' => 'View'],
            ['name' => 'meeting-type-create', 'group' => 'Meeting Type', 'title' => 'Create'],
            ['name' => 'meeting-type-edit', 'group' => 'Meeting Type', 'title' => 'Edit'],
            ['name' => 'meeting-type-delete', 'group' => 'Meeting Type', 'title' => 'Delete'],
            //*** Meeting Modules ***//


            
            //*** Marksheet Modules ***//
            ['name' => 'marksheet-view', 'group' => 'Marksheet', 'title' => 'View'],
            ['name' => 'marksheet-print', 'group' => 'Marksheet', 'title' => 'Print'],
            ['name' => 'marksheet-download', 'group' => 'Marksheet', 'title' => 'Download'],

            ['name' => 'marksheet-setting-view', 'group' => 'Marksheet', 'title' => 'Setting'],
            //*** Marksheet Modules ***//



            //*** Certificate Modules ***//
            ['name' => 'certificate-view', 'group' => 'Certificate', 'title' => 'View'],
            ['name' => 'certificate-create', 'group' => 'Certificate', 'title' => 'Genarate'],
            ['name' => 'certificate-edit', 'group' => 'Certificate', 'title' => 'Edit'],
            ['name' => 'certificate-print', 'group' => 'Certificate', 'title' => 'Print'],
            ['name' => 'certificate-download', 'group' => 'Certificate', 'title' => 'Download'],

            ['name' => 'certificate-template-view', 'group' => 'Certificate Template', 'title' => 'View'],
            ['name' => 'certificate-template-create', 'group' => 'Certificate Template', 'title' => 'Create'],
            ['name' => 'certificate-template-edit', 'group' => 'Certificate Template', 'title' => 'Edit'],
            ['name' => 'certificate-template-delete', 'group' => 'Certificate Template', 'title' => 'Delete'],
            //*** Certificate Modules ***//



            //*** Address Modules ***//
            ['name' => 'province-view', 'group' => 'State', 'title' => 'View'],
            ['name' => 'province-create', 'group' => 'State', 'title' => 'Create'],
            ['name' => 'province-edit', 'group' => 'State', 'title' => 'Edit'],
            ['name' => 'province-delete', 'group' => 'State', 'title' => 'Delete'],

            ['name' => 'district-view', 'group' => 'District', 'title' => 'View'],
            ['name' => 'district-create', 'group' => 'District', 'title' => 'Create'],
            ['name' => 'district-edit', 'group' => 'District', 'title' => 'Edit'],
            ['name' => 'district-delete', 'group' => 'District', 'title' => 'Delete'],
            //*** Address Modules ***//



            //*** Language Modules ***//
            ['name' => 'language-view', 'group' => 'Language', 'title' => 'View'],
            ['name' => 'language-create', 'group' => 'Language', 'title' => 'Create'],
            ['name' => 'language-edit', 'group' => 'Language', 'title' => 'Edit'],
            ['name' => 'language-delete', 'group' => 'Language', 'title' => 'Delete'],

            ['name' => 'translations-view', 'group' => 'Translation', 'title' => 'View'],
            ['name' => 'translations-create', 'group' => 'Translation', 'title' => 'Create'],
            ['name' => 'translations-delete', 'group' => 'Translation', 'title' => 'Delete'],
            //*** Language Modules ***//



            //*** Setting Modules ***//
            ['name' => 'setting-view', 'group' => 'General Setting', 'title' => 'Manage'],

            ['name' => 'mail-setting-view', 'group' => 'Mail Setting', 'title' => 'Manage'],
            ['name' => 'sms-setting-view', 'group' => 'SMS Setting', 'title' => 'Manage'],

            ['name' => 'application-setting-view', 'group' => 'Application Setting', 'title' => 'Manage'],
            // ['name' => 'schedule-setting-view', 'group' => 'Fees Reminder', 'title' => 'Setting'],
            ['name' => 'bulk-import-export-view', 'group' => 'Bulk Import Export', 'title' => 'Manage'],

            ['name' => 'role-view', 'group' => 'Role and Permissions', 'title' => 'View'],
            ['name' => 'role-create', 'group' => 'Role and Permissions', 'title' => 'Create'],
            ['name' => 'role-edit', 'group' => 'Role and Permissions', 'title' => 'Edit'],
            ['name' => 'role-delete', 'group' => 'Role and Permissions', 'title' => 'Delete'],

            ['name' => 'profile-view', 'group' => 'Profile', 'title' => 'View'],
            ['name' => 'profile-edit', 'group' => 'Profile', 'title' => 'Edit'],
            ['name' => 'profile-account', 'group' => 'Profile', 'title' => 'Account'],
            //*** Setting Modules ***//
        ];

        DB::table('permissions')->insert($permissions);
    }
}
