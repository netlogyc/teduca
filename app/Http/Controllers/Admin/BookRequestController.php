<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\BookRequest;
use Toastr;
use Image;
use File;
use Auth;

class BookRequestController extends Controller
{
    use FileUploader;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_book_request', 1);
        $this->route = 'admin.book-request';
        $this->view = 'admin.book-request';
        $this->path = 'book';
        $this->access = 'book-request';


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
    public function index(Request $request)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;


        if(!empty($request->category) || $request->category != null){
            $data['selected_category'] = $category = $request->category;
        }
        else{
            $data['selected_category'] = $category = '0';
        }

        if(!empty($request->title) || $request->title != null){
            $data['selected_title'] = $title = $request->title;
        }
        else{
            $data['selected_title'] = $title = null;
        }


        // Search Filter
        $data['categories'] = BookCategory::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        $rows = BookRequest::where('title', 'LIKE', '%'.$title.'%');
                    if(!empty($request->category) || $request->category != null){
                        $rows->where('category_id', $category);
                    }
        $data['rows'] = $rows->orderBy('id', 'desc')->get();

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
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['categories'] = BookCategory::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        return view($this->view.'.create', $data);
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
            'category' => 'required',
            'title' => 'required|max:191',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'attach' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('attach')){
            //Upload New Image
            $filenameWithExt = $request->file('attach')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('attach')->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->path.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (100 width, 150 height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file('attach')->getRealPath())->fit(100, 150, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = Null;
        }


        // Insert Data
        $bookRequest = new BookRequest;
        $bookRequest->category_id = $request->category;
        $bookRequest->title = $request->title;
        $bookRequest->isbn = $request->isbn;
        $bookRequest->code = $request->code;
        $bookRequest->author = $request->author;
        $bookRequest->publisher = $request->publisher;
        $bookRequest->edition = $request->edition;
        $bookRequest->publish_year = $request->publish_year;
        $bookRequest->language = $request->language;
        $bookRequest->price = $request->price;
        $bookRequest->quantity = $request->quantity;
        $bookRequest->request_by = $request->request_by;
        $bookRequest->phone = $request->phone;
        $bookRequest->email = $request->email;
        $bookRequest->description = $request->description;
        $bookRequest->note = $request->note;
        $bookRequest->attach = $fileNameToStore;
        $bookRequest->created_by = Auth::guard('web')->user()->id;
        $bookRequest->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookRequest $bookRequest)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $bookRequest;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookRequest $bookRequest)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $bookRequest;
        $data['categories'] = BookCategory::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookRequest $bookRequest)
    {
        // Field Validation
        $request->validate([
            'category' => 'required',
            'title' => 'required|max:191',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'attach' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('attach')){

            $file_path = public_path('uploads/'.$this->path.'/'.$bookRequest->attach);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('attach')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('attach')->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->path.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (100 width, 150 height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file('attach')->getRealPath())->fit(100, 150, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = $bookRequest->attach;
        }


        // Update Data
        $bookRequest->category_id = $request->category;
        $bookRequest->title = $request->title;
        $bookRequest->isbn = $request->isbn;
        $bookRequest->code = $request->code;
        $bookRequest->author = $request->author;
        $bookRequest->publisher = $request->publisher;
        $bookRequest->edition = $request->edition;
        $bookRequest->publish_year = $request->publish_year;
        $bookRequest->language = $request->language;
        $bookRequest->price = $request->price;
        $bookRequest->quantity = $request->quantity;
        $bookRequest->request_by = $request->request_by;
        $bookRequest->phone = $request->phone;
        $bookRequest->email = $request->email;
        $bookRequest->description = $request->description;
        $bookRequest->note = $request->note;
        $bookRequest->attach = $fileNameToStore;
        $bookRequest->status = $request->status;
        $bookRequest->updated_by = Auth::guard('web')->user()->id;
        $bookRequest->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookRequest $bookRequest)
    {
        // Delete Data
        $this->deleteMedia($this->path, $bookRequest);

        $bookRequest->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
