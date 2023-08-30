<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ApplicationsExport;
use App\Imports\ApplicationsImport;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Exports\SubjectsExport;
use App\Imports\SubjectsImport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Exports\BooksExport;
use App\Imports\BooksImport;
use Toastr;

class BulkImportExportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_bulk_import_export', 1);
        $this->route = 'admin.bulk-import-export';
        $this->view = 'admin.bulk-import-export';
        $this->path = 'bulk-import-export';
        $this->access = 'bulk-import-export';


        $this->middleware('permission:'.$this->access.'-view');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        return view($this->view.'.index', $data);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export($table)
    {
        //
        if($table == 'users'){

            return Excel::download(new UsersExport, date('d-m-y').'_staffs.csv');
        }
        elseif($table == 'students'){

            return Excel::download(new StudentsExport, date('d-m-y').'_students.csv');
        }
        elseif($table == 'subjects'){

            return Excel::download(new SubjectsExport, date('d-m-y').'_courses.csv');
        }
        elseif($table == 'books'){

            return Excel::download(new BooksExport, date('d-m-y').'_books.csv');
        }
        elseif($table == 'applications'){

            return Excel::download(new ApplicationsExport, date('d-m-y').'_applications.csv');
        }

        return redirect()->back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request, $table)
    {
        // Field Validation
        $request->validate([
            'import' => 'required|file|mimes:csv',
        ]);

        //
        if($table == 'users'){

            Excel::import(new UsersImport, $request->file('import'));
        }
        elseif($table == 'students'){

            Excel::import(new StudentsImport, $request->file('import'));
        }
        elseif($table == 'subjects'){

            Excel::import(new SubjectsImport, $request->file('import'));
        }
        elseif($table == 'books'){

            Excel::import(new BooksImport, $request->file('import'));
        }
        elseif($table == 'applications'){

            Excel::import(new ApplicationsImport, $request->file('import'));
        }
        

        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
