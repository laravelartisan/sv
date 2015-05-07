<?php namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Request;
use Session;
use Intervention\Image\Facades\Image;
class ApplyController extends Controller {
    public function multiple_upload() {
        // getting all of the post data
        $files = Input::file('images');

//        dd($files);
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
            if($validator->passes()){
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
//                dd(Image::make($file->getRealPath())->resize(468,249));
               $testImage = Image::make($file->getRealPath())->resize(468,249)->save('uploads/'.$filename);
//                          dd($testImage);
//                $upload_success = $file->move($destinationPath, $filename);
//                dd($upload_success);

                $uploadcount ++;
            }
        }
        if($uploadcount == $file_count){
            Session::flash('success', 'Upload successfully');
            return Redirect::to('upload');
        }
        /*else {
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }*/
    }
}