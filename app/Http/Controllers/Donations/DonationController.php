<?php

namespace App\Http\Controllers\Donations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileUploadController;
use App\Http\Controllers\Helpers\ConstantEnum;
use Auth;

use App\Models\Donations\Donation;

class DonationController extends Controller
{
    
    private $fileUpload = null;

    function __construct(){
        $this->fileUpload  = new FileUploadController();
    }



    public function index(){
        if(Donation::all()) {
            return Donation::all();
        }else {
            return response()->json(['message'=>'false'],400);
        }
    }



    public function create(Request $request){
    
        if($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $image = config('filesystems.disks.s3.url').'/'.ConstantEnum::S3['donations'].'/'.$fileName;
            $this->fileUpload->fileUpload(
                $request->file('image'),
                ConstantEnum::S3['donations'],
                $fileName
            );
        }else {
            return response()->json(['message'=>'false'],400);
        } 
               
        $param = array(
            'title'         =>  $request->title,
            'content'       =>  $request->content,
            'image'         =>  $image,
            'target_amount' =>  $request->target_amount,
            'closed_at'     =>  $request->closed_at,
            'donator_id'    =>  Auth::id(),
        );

        Donation::create($param);

       return response()->json(['message'=>'true'],201);
    
    }

    



}
