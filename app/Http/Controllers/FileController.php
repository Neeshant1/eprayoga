<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use config\filesystems;
use App\Models\FileUpload;
//use App\Services\FileService;
use Illuminate\Support\Facades\Session;
use Storage;
use Log;
use File;
class FileController extends Controller
{

	// private $fileService;

 //    public function __construct(FileService $clientTypeService) {
 //        $this->clientTypeService = $clientTypeService;
 //    }
 public function upload(Request $request){
   

      $file = $request->file('uploadFile');
       Log::info(  $file);
      //Display File Name
       Log::info(  $file->getSize());
       Log::info(  $request['file_category_type']);
       $value = $request->session()->get('user');
       $clnt_id = $value ->clnt_id;
       $clnt_group_id = $value ->clnt_group_id;
       $user_profile_id = $value ->user_profile_id;
      // //Move Uploaded File
       $filedb = new FileUpload;
      // $filedb->fill($data);
       $filedata['file_name']= $file->getClientOriginalName();
       $filedata['clnt_id']=  $clnt_id;
       $filedata['user_profile_id']= $user_profile_id;
       $filedata['clnt_group_id']=  $clnt_group_id;
       $filedata['file_category_type']= $request['file_category_type'];
       $filedata['status'] = 'upload';
      // $filedata['']= '1';
       $filedb->fill($filedata);
       $filedb->save();

       $destinationPath = 'upload';
       $destinationPath1 = 'upload1';
       $file->move($destinationPath,$file->getClientOriginalName());
       $contents = File::files($destinationPath);
       Log::info(public_path().'/'.$contents[0]);
       File::move(public_path().'/'.$contents[0],public_path().'/'.$destinationPath1.'/'.$file->getClientOriginalName());
       $public_path = public_path();
       chdir($destinationPath1);
       Log::info(exec('pwd'));
       Log::info(shell_exec('ls'));
       Log::info($file->getClientOriginalName());
       Log::info(date(filemtime($file->getClientOriginalName())));
       //sleep(5);
       exec("touch {$file->getClientOriginalName()}");
      // touch($file->getClientOriginalName(),time());
       Log::info(touch($file->getClientOriginalName()));
       Log::info(filemtime($file->getClientOriginalName()));
      // Log::info(shell_exec('stat' .$file->getClientOriginalName()));

   }
}