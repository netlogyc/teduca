<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Image;
use File;

trait FileUploader {

    /**
     * @param Request $request
     */
    public function uploadMedia(Request $request, $attach, $directory) {

        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){

            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp','pdf','doc','docx','txt','zip','rar','csv','xls','xlsx','ppt','pptx','mp3','avi','mp4','mpeg','3gp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {

            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move file inside public/uploads/ directory
            $request->file($attach)->move('uploads/'.$directory.'/', $fileNameToStore);

            }
            else {
                $fileNameToStore = Null;
            }
        }
        else{
            $fileNameToStore = Null;
        }


        return $fileNameToStore;
    }


    /**
     * @param Request $request
     */
    public function updateMedia(Request $request, $attach, $directory, $model) {

        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){

            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp','pdf','doc','docx','txt','zip','rar','csv','xls','xlsx','ppt','pptx','mp3','avi','mp4','mpeg','3gp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {

            $old_attach = public_path('uploads/'.$directory.'/'.$model->attach);
            if(File::isFile($old_attach)){
                File::delete($old_attach);
            }

            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move file inside public/uploads/ directory
            $request->file($attach)->move('uploads/'.$directory.'/', $fileNameToStore);

            }
            else {
                $fileNameToStore = $model->attach;
            }
        }
        else{
            $fileNameToStore = $model->attach;
        }


        return $fileNameToStore;
    }


    /**
     * @param Request $request
     */
    public function deleteMedia($directory, $model) {

        // Delete attach
        $attach = public_path('uploads/'.$directory.'/'.$model->attach);
        if(File::isFile($attach)){
            File::delete($attach);
        }

        return $deleted = true;
    }


    /**
     * @param Request $request
     */
    public function updateMultiMedia(Request $request, $attach, $directory, $model, $field) {

        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){

            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp','pdf','doc','docx','txt','zip','rar','csv','xls','xlsx','ppt','pptx','mp3','avi','mp4','mpeg','3gp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {

            $old_attach = public_path('uploads/'.$directory.'/'.$model->$field);
            if(File::isFile($old_attach)){
                File::delete($old_attach);
            }

            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move file inside public/uploads/ directory
            $request->file($attach)->move('uploads/'.$directory.'/', $fileNameToStore);

            }
            else {
                $fileNameToStore = $model->$field;
            }
        }
        else{
            $fileNameToStore = $model->$field;
        }


        return $fileNameToStore;
    }


    /**
     * @param Request $request
     */
    public function deleteMultiMedia($directory, $model, $field) {

        // Delete attach
        $attach = public_path('uploads/'.$directory.'/'.$model->$field);
        if(File::isFile($attach)){
            File::delete($attach);
        }

        return $deleted = true;
    }


    /**
     * @param Request $request
     */
    public function uploadImage(Request $request, $attach, $directory, $width, $height) {

        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){

            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {

            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here ($width width, $height height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file($attach)->getRealPath())->resize($width, $height, function ($constraint) { $constraint->aspectRatio(); $constraint->upsize(); })->save($thumbnailpath);

            }
            else {
                $fileNameToStore = Null;
            }
        }
        else{
            $fileNameToStore = Null;
        }


        return $fileNameToStore;
    }


    /**
     * @param Request $request
     */
    public function updateImage(Request $request, $attach, $directory, $width, $height, $model, $field) {

        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){

            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {

            $old_attach = public_path('uploads/'.$directory.'/'.$model->$field);
            if(File::isFile($old_attach)){
                File::delete($old_attach);
            }

            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here ($width width, $height height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file($attach)->getRealPath())->resize($width, $height, function ($constraint) { $constraint->aspectRatio(); $constraint->upsize(); })->save($thumbnailpath);

            }
            else {
                $fileNameToStore = $model->$field;
            }
        }
        else{
            $fileNameToStore = $model->$field;
        }


        return $fileNameToStore;
    }
}