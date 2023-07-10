<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Toastr;
use File;

class TranslateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_translate', 1);
        $this->route = 'admin.translations';
        $this->view = 'admin.translate';
        $this->access = 'translations';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
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
        $data['access'] = $this->access;


        $languages = Language::orderBy('id', 'asc')->get();

        $columns = [];

        $columnsCount = $languages->count();

        if($languages->count() > 0){

            foreach ($languages as $key => $language){
                if ($key == 0) {

                    $columns[$key] = $this->openJSONFile($language->code);
                }

                $columns[++$key] = ['data'=>$this->openJSONFile($language->code), 'lang'=>$language->code];
            }
        }

        return view($this->view.'.index', compact('languages','columns','columnsCount'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);

        $data = $this->openJSONFile('en');
        $data[$request->key] = $request->value;

        $this->saveJSONFile('en', $data);

        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($key)
    {
        $languages = Language::orderBy('id', 'asc')->get();

        if($languages->count() > 0){
            foreach ($languages as $language){

                $data = $this->openJSONFile($language->code);
                unset($data[$key]);
                $this->saveJSONFile($language->code, $data);
            }
        }

        return response()->json(['success' => $key]);
    }

    /**
     * Open Translation File
     * @return Response
    */
    private function openJSONFile($code)
    {

        $jsonString = [];

        if(File::exists(base_path('resources/lang/'.$code.'.json'))){

            $jsonString = file_get_contents(base_path('resources/lang/'.$code.'.json'));
            $jsonString = json_decode($jsonString, true);
        }

        return $jsonString;
    }

    /**
     * Save JSON File
     * @return Response
    */
    private function saveJSONFile($code, $data)
    {

        ksort($data);
        $jsonData = json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

        file_put_contents(base_path('resources/lang/'.$code.'.json'), stripslashes($jsonData));
    }

    /**
     * Save JSON File
     * @return Response
    */
    public function transUpdate(Request $request)
    {

        $data = $this->openJSONFile($request->code);
        $data[$request->pk] = $request->value;

        $this->saveJSONFile($request->code, $data);

        return response()->json(['success'=>'Done!']);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
    */
    public function transUpdateKey(Request $request)
    {

        $languages = Language::orderBy('id', 'asc')->get();

        if($languages->count() > 0){

            foreach ($languages as $language){

                $data = $this->openJSONFile($language->code);

                if (isset($data[$request->pk])){

                    $data[$request->value] = $data[$request->pk];
                    unset($data[$request->pk]);
                    $this->saveJSONFile($language->code, $data);
                }
            }
        }

        return response()->json(['success'=>'Done!']);
    }
}
