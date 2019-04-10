<?php

namespace App\Http\Controllers\Donations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileUploadController;
use Auth;

use App\Models\Donations\Donation;

class DonationController extends Controller
{
    private $donationModel  = null;
    private $fileUpload     = null;

    function __construct(){
        $this->donationModel    = new Donation();
        $this->fileUpload       = new FileUploadController();
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
            $this->fileUpload->fileUpload($request->file('image'),$this::S3['donations'],$fileName);
        }else {
            return 'false';
        } 
               
        $param = array(
            'title'         =>  $request->title,
            'content'       =>  $request->content,
            'image'         =>  $this::S3['donationsUrl'].$fileName,
            'target_amount' =>  $request->target_amount,
            'closed_at'     =>  $request->closed_at,
            'donator_id'    =>  Auth::id(),
        );

       $this->donationModel->create($param);

       return response()->json(['message'=>'true'],201);
    
    }

    



}
