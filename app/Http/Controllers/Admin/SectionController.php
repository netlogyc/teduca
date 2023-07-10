<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProgramSemesterSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Program;
use Toastr;
use DB;

class SectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_section', 1);
        $this->route = 'admin.section';
        $this->view = 'admin.section';
        $this->path = 'section';
        $this->access = 'section';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        
        $data['programs'] = Program::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['rows'] = Section::orderBy('title', 'asc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:sections,title',
            'seat' => 'nullable|numeric',
            'programs' => 'required',
            'semesters' => 'required',
            'items' => 'required',
        ]);

        try{
            // Insert Data
            DB::beginTransaction();
            $section = new Section;
            $section->title = $request->title;
            $section->seat = $request->seat;
            $section->save();

            
            // Insert Or Update Data
            foreach($request->items as $item){

                $programSemesterSection = ProgramSemesterSection::updateOrCreate(
                [
                    'program_id' => $request->programs[$item - 1],  
                    'semester_id' => $request->semesters[$item - 1], 
                    'section_id' => $section->id
                ],[
                    'program_id' => $request->programs[$item - 1],  
                    'semester_id' => $request->semesters[$item - 1], 
                    'section_id' => $section->id
                ]);
            }
            DB::commit();

            Toastr::success(__('msg_created_successfully'), __('msg_success'));

            return redirect()->back();
        }
        catch(\Exception $e){
            Toastr::error(__('msg_created_error'), __('msg_error'));

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:sections,title,'.$section->id,
            'seat' => 'nullable|numeric',
            'programs' => 'required',
            'semesters' => 'required',
            'items' => 'required',
        ]);

        // return $request->items;

        try{
            // Update Data
            DB::beginTransaction();
            $section->title = $request->title;
            $section->seat = $request->seat;
            $section->status = $request->status;
            $section->save();


            // Delete Data
            $section->programSemesters()->delete();

            // Insert Or Update Data
            foreach($request->items as $item){

                $programSemesterSection = ProgramSemesterSection::updateOrCreate(
                [
                    'program_id' => $request->programs[$item - 1],  
                    'semester_id' => $request->semesters[$item - 1], 
                    'section_id' => $section->id
                ],[
                    'program_id' => $request->programs[$item - 1],  
                    'semester_id' => $request->semesters[$item - 1], 
                    'section_id' => $section->id
                ]);
            }
            DB::commit();

            Toastr::success(__('msg_updated_successfully'), __('msg_success'));

            return redirect()->back();
        }
        catch(\Exception $e){
            
            Toastr::error(__('msg_updated_error'), __('msg_error'));

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        // Delete Data
        $section->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
