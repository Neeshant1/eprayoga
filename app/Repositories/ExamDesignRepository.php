<?php
namespace App\Repositories;
use App\Models\ExamDesign;
use App\Response\GlobalResponse;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Models\ProductCatalog;
use Log;

class ExamDesignRepository
{
  private static  $RECORDS_PER_PAGE =5;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_id)
    {
        try{
          $noQuestion = $data['no_of_question'];
         
          
          $productvalid = DB::table("bl_question_master as qus")->where('qus.is_deleted',0)
          ->select('qus.question_id')
          ->join('bl_difficulty_level_master as diff','diff.difficulty_level_id','=','qus.difficulty_level_id')
          ->where([
            ['qus.category_id','=',$data['category_id']],
            ['qus.subject_id','=',$data['subject_id']],
            ['qus.topic_id','=',$data['topic_id']],
            ])                
          ->get(); 
          
           

       
       $key1 = array_keys($data);
      // Log::info($key1);
       $output1 = array_slice($key1,6);
       $simple = $complex = $medium = null;
       $varsam = $varmed = $varcom = null;


       for($i= 0;$i<count($output1);$i++){
       if($output1[$i] == "simple"){
         $sim = $data['simple'];
         $noOfQuestionSimple =ceil($noQuestion * ($sim/100));
         $varsam = ceil($noOfQuestionSimple);
         
       }
       if($output1[$i] == "medium"){
         $med = $data['medium'];
         $noOfQuestionMedium = ceil($noQuestion * ($med/100));
          $varmed = ceil($noOfQuestionMedium);
          
       }
       if($output1[$i] == "complex"){
         $com = $data['complex'];
         $noOfQuestionComplex = ceil($noQuestion * ($com/100));
         $varcom = ceil($noOfQuestionComplex);
         
       }
      }
        $vartotal = $varsam + $varmed + $varcom;
     
                   
            $noOfQuestionSimple1 = DB::table("bl_question_master as qus")->where([['qus.is_deleted',0],['qus.is_active',1]])
            ->select('diff.difficulty_level_name')
            ->join('bl_difficulty_level_master as diff','diff.difficulty_level_id','=','qus.difficulty_level_id')
            ->where([['qus.category_id','=',$data['category_id']],
            ['qus.subject_id','=',$data['subject_id']],
            ['qus.topic_id','=',$data['topic_id']],['diff.difficulty_level_name','=','simple'],['qus.clnt_id','=',$user_id]])
            ->get();
            $test1 = count($noOfQuestionSimple1);
            
            


             $noOfQuestionMedium1 = DB::table("bl_question_master as qus")->where([['qus.is_deleted',0],['qus.is_active',1]])
            ->select('diff.difficulty_level_name')
            ->join('bl_difficulty_level_master as diff','diff.difficulty_level_id','=','qus.difficulty_level_id')
            ->where([['qus.category_id','=',$data['category_id']],
            ['qus.subject_id','=',$data['subject_id']],
            ['qus.topic_id','=',$data['topic_id']],['diff.difficulty_level_name','=','medium'],['qus.clnt_id','=',$user_id]])
            ->get();
            $test2 = count($noOfQuestionMedium1);
            
           

             $noOfQuestionComplex1 = DB::table("bl_question_master as qus")->where([['qus.is_deleted',0],['qus.is_active',1]])
            ->select('diff.difficulty_level_name')
            ->join('bl_difficulty_level_master as diff','diff.difficulty_level_id','=','qus.difficulty_level_id')
            ->where([['qus.category_id','=',$data['category_id']],
            ['qus.subject_id','=',$data['subject_id']],
            ['qus.topic_id','=',$data['topic_id']],['diff.difficulty_level_name','=','complex'],['qus.clnt_id','=',$user_id]])
            ->get();
            $test3 = count($noOfQuestionComplex1);
    
          
          $errorarray = array();
            //array_push($errorarray,1);

          if($test1 < intval($varsam)){
            array_push($errorarray,'Simple');
            array_push($errorarray, $test1);
            array_push($errorarray, intval($varsam)-$test1);
            return GlobalResponse::clientErrorResponse(array("conflictMsg"=>$errorarray));
          }
          if($test2 < intval($varmed)){
            array_push($errorarray,'Medium');
            array_push($errorarray, $test2);
            array_push($errorarray, intval($varmed)-$test2);
            return GlobalResponse::clientErrorResponse(array("conflictMsg"=>$errorarray));
          }
          if($test3 < intval($varcom)){
             array_push($errorarray,'Complex');
             array_push($errorarray, $test3);
             array_push($errorarray, intval($varcom)-$test3);
            return GlobalResponse::clientErrorResponse(array("conflictMsg"=>$errorarray));
          }
          if($vartotal >= $noQuestion){
            $errorarray = array();
                $keys = array_keys($data);
              $output = array_slice($keys, 4);          
              $array1 = array();
        
          foreach ($output as $key => $value) {
         
              $variable = array('rule'=>$value,'value'=>$data[$value],'category_id'=>$data['category_id'],'subject_id'=>$data['subject_id'],'topic_id'=>$data['topic_id'],'product_catalog_id'=>$data['product_catalog_id']);       
               array_push($array1, $variable);
              }     
              ExamDesign::insert($array1);

            
          }else{

            return GlobalResponse::clientErrorResponse(array("conflictMsg"=>$errorarray));
             }
          
          } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
          }
            return GlobalResponse::createResponse($variable);
          
    }


     public function update(array $data,$user_id)
     {
        try{
         
          $id = $data['product_catalog_id'];
          
         
          

          $noQuestion = $data['no_of_question'];
       $productvalid = DB::table("bl_question_master as qus")->where([['qus.is_deleted',0],['qus.is_active',1]])
          ->select('qus.question_id')
          ->join('bl_difficulty_level_master as diff','diff.difficulty_level_id','=','qus.difficulty_level_id')
          ->where([
            ['qus.category_id','=',$data['category_id']],
            ['qus.subject_id','=',$data['subject_id']],
            ['qus.topic_id','=',$data['topic_id']],
            ])                
          ->get();  


       
       $key1 = array_keys($data);
       $output1 = array_slice($key1,6);
      
       $simple = $complex = $medium = null;
       $varsam = $varmed = $varcom = null;

       for($i= 0;$i<count($output1);$i++){
       if($output1[$i] == "simple"){
         $sim = $data['simple'];
         $noOfQuestionSimple =ceil($noQuestion * ($sim/100));
         $varsam = ceil($noOfQuestionSimple);
       }
       if($output1[$i] == "medium"){
         $med = $data['medium'];
         $noOfQuestionMedium = ceil($noQuestion * ($med/100));
          $varmed = ceil($noOfQuestionMedium);
       }
       if($output1[$i] == "complex"){
         $com = $data['complex'];
         $noOfQuestionComplex = ceil($noQuestion * ($com/100));
         $varcom = ceil($noOfQuestionComplex);
       }
      }

        $vartotal = $varsam + $varmed + $varcom;
     
                   
            $noOfQuestionSimple1 = DB::table("bl_question_master as qus")->where([['qus.is_deleted',0],['qus.is_active',1]])
            ->select('diff.difficulty_level_name')
            ->join('bl_difficulty_level_master as diff','diff.difficulty_level_id','=','qus.difficulty_level_id')
            ->where([['qus.category_id','=',$data['category_id']],
            ['qus.subject_id','=',$data['subject_id']],
            ['qus.topic_id','=',$data['topic_id']],['diff.difficulty_level_name','=','simple'],['qus.clnt_id','=',$user_id]])
            ->get();
            $test1 = count($noOfQuestionSimple1);
         


             $noOfQuestionMedium1 = DB::table("bl_question_master as qus")->where([['qus.is_deleted',0],['qus.is_active',1]])
            ->select('diff.difficulty_level_name')
            ->join('bl_difficulty_level_master as diff','diff.difficulty_level_id','=','qus.difficulty_level_id')
            ->where([['qus.category_id','=',$data['category_id']],
            ['qus.subject_id','=',$data['subject_id']],
            ['qus.topic_id','=',$data['topic_id']],['diff.difficulty_level_name','=','medium'],['qus.clnt_id','=',$user_id]])
            ->get();
            $test2 = count($noOfQuestionMedium1);
           

             $noOfQuestionComplex1 = DB::table("bl_question_master as qus")->where([['qus.is_deleted',0],['qus.is_active',1]])
            ->select('diff.difficulty_level_name')
            ->join('bl_difficulty_level_master as diff','diff.difficulty_level_id','=','qus.difficulty_level_id')
            ->where([['qus.category_id','=',$data['category_id']],
            ['qus.subject_id','=',$data['subject_id']],
            ['qus.topic_id','=',$data['topic_id']],['diff.difficulty_level_name','=','complex'],['qus.clnt_id','=',$user_id]])
            ->get();
            $test3 = count($noOfQuestionComplex1);
          
          $errorarray = array();
           
          if($test1 < intval($varsam)){
            array_push($errorarray,'Simple');
            array_push($errorarray, $test1);
            array_push($errorarray, intval($varsam)-$test1);
            return GlobalResponse::clientErrorResponse(array("conflictMsg"=>$errorarray));
          }
          if($test2 < intval($varmed)){
            array_push($errorarray,'Medium');
            array_push($errorarray, $test2);
            array_push($errorarray, intval($varmed)-$test2);
            return GlobalResponse::clientErrorResponse(array("conflictMsg"=>$errorarray));
          }
          if($test3 < intval($varcom)){
             array_push($errorarray,'Complex');
             array_push($errorarray, $test3);
             array_push($errorarray, intval($varcom)-$test3);
            return GlobalResponse::clientErrorResponse(array("conflictMsg"=>$errorarray));
          }
          if($vartotal >= $noQuestion){
             DB::table('bl_exam_design_rules')->where('product_catalog_id', $id)->delete();
            $errorarray = array();
                $keys = array_keys($data);
              $output = array_slice($keys, 4);          
              $array1 = array();
        
          foreach ($output as $key => $value) {
         
              $variable = array('rule'=>$value,'value'=>$data[$value],'category_id'=>$data['category_id'],'subject_id'=>$data['subject_id'],'topic_id'=>$data['topic_id'],'product_catalog_id'=>$data['product_catalog_id']);       
               array_push($array1, $variable);
              }     
              ExamDesign::insert($array1);

            
          }else{

            return GlobalResponse::clientErrorResponse($errorarray);
             }
          
          } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
          }
            return GlobalResponse::createResponse($variable);
          
    }


    public function getAll($user_id,$user_type)
    {
      try{

               
     // $ExamDesign= DB::select('SELECT exm.product_catalog_id,exm.category_id,exm.subject_id,exm.topic_id,proc.name,cat.category_name,sub.subject_name,top.topic_name,proc.id,
     //               group_concat(rule) as rule,group_concat(value) as value
     //             FROM bl_exam_design_rules as exm,bl_product_catalog as proc,bl_category as cat,bl_subject as sub,bl_topic as top 
     //             where cat.category_id=exm.category_id and sub.subject_id=exm.subject_id and top.topic_id = exm.topic_id and proc.id = exm.product_catalog_id and exm.is_deleted = 0
     //             group by exm.product_catalog_id,exm.category_id,exm.subject_id,exm.topic_id,proc.name,cat.category_name,sub.subject_name,top.topic_name,proc.id');
     // $sql ="cat.category_id=exm.category_id and sub.subject_id=exm.subject_id and top.topic_id = exm.topic_id and proc.id = exm.product_catalog_id and exm.is_deleted = 0
     //             group by exm.product_catalog_id,exm.category_id,exm.subject_id,exm.topic_id,proc.name,cat.category_name,sub.subject_name,top.topic_name,proc.id";

                if($user_type == 'S'){

                   $design = DB::table('bl_exam_design_rules as exm')
                              ->join('bl_product_catalog as proc','exm.product_catalog_id','=','proc.id')
                              ->join('bl_category as cat','exm.category_id','=','cat.category_id')
                              ->join('bl_subject as sub','exm.subject_id','=','sub.subject_id')
                              ->join('bl_topic as top','exm.topic_id','=','top.topic_id')
                              ->where('exm.is_deleted',0)
                              ->select('exm.product_catalog_id','exm.category_id','exm.subject_id','exm.topic_id','proc.name','cat.category_name','sub.subject_name','top.topic_name','proc.id')
                              ->selectRaw('GROUP_CONCAT(value) as value')
                              ->selectRaw('GROUP_CONCAT(rule) as rule')
                              ->groupBy('exm.product_catalog_id','exm.category_id','exm.subject_id','exm.topic_id','proc.name','cat.category_name','sub.subject_name','top.topic_name','proc.id')
                              ->simplePaginate(self::$RECORDS_PER_PAGE);
                 }else{
                         $design = DB::table('bl_exam_design_rules as exm')
                              ->join('bl_product_catalog as proc','exm.product_catalog_id','=','proc.id')
                              ->join('bl_category as cat','exm.category_id','=','cat.category_id')
                              ->join('bl_subject as sub','exm.subject_id','=','sub.subject_id')
                              ->join('bl_topic as top','exm.topic_id','=','top.topic_id')
                             ->where([['exm.is_deleted',0],['proc.clnt_id','=',$user_id]])
                              ->select('exm.product_catalog_id','exm.category_id','exm.subject_id','exm.topic_id','proc.name','cat.category_name','sub.subject_name','top.topic_name','proc.id')
                              ->selectRaw('GROUP_CONCAT(value) as value')
                              ->selectRaw('GROUP_CONCAT(rule) as rule')
                              ->groupBy('exm.product_catalog_id','exm.category_id','exm.subject_id','exm.topic_id','proc.name','cat.category_name','sub.subject_name','top.topic_name','proc.id')
                              ->simplePaginate(self::$RECORDS_PER_PAGE);
                }   


                              if (is_null($design))
                            

                
            {
                return "failed";
            }
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($design); 

    }

     public function getById(array $data)
{
      try{

        $ExamDesign = DB::table('bl_exam_design_rules as exm')->where('exm.product_catalog_id',$data['product_catalog_id'])
                ->join('bl_product_catalog as proc','exm.product_catalog_id','=','proc.id')
                ->join('bl_category as cat','exm.category_id','=','cat.category_id')
                ->join('bl_subject as sub','exm.subject_id','=','sub.subject_id')
                ->join('bl_topic as top','exm.topic_id','=','top.topic_id')
                ->where('exm.is_deleted',0)
                ->select('exm.product_catalog_id','exm.category_id','exm.subject_id','exm.topic_id','proc.name','cat.category_name','sub.subject_name','top.topic_name','proc.id')
                ->selectRaw('GROUP_CONCAT(value) as value')
                ->selectRaw('GROUP_CONCAT(rule) as rule')
                ->groupBy('exm.product_catalog_id','exm.category_id','exm.subject_id','exm.topic_id','proc.name','cat.category_name','sub.subject_name','top.topic_name','proc.id')
                ->get();
               
     // $ExamDesign= DB::select('SELECT exm.product_catalog_id,exm.category_id,exm.subject_id,exm.topic_id,proc.name,cat.category_name,sub.subject_name,top.topic_name,proc.id,
     //               group_concat(rule) as rule,group_concat(value) as value
     //             FROM bl_exam_design_rules as exm,bl_product_catalog as proc,bl_category as cat,bl_subject as sub,bl_topic as top 
     //             where cat.category_id=exm.category_id and sub.subject_id=exm.subject_id and top.topic_id = exm.topic_id and proc.id = exm.product_catalog_id and exm.product_catalog_id and exm.is_deleted = 0
     //             group by exm.product_catalog_id,exm.category_id,exm.subject_id,exm.topic_id,proc.name,cat.category_name,sub.subject_name,top.topic_name,proc.id');
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($ExamDesign);

    }


    public function delete(array $data){

        try{

            DB::beginTransaction();

            $ExamDesign = ExamDesign::where ("product_catalog_id",$data['product_catalog_id'])-> update(['is_deleted' => 1]);
          $product = ProductCatalog::where('id', '=',$data['product_catalog_id'])->update(['is_active' => 0]);
                  

        }catch(Exception $e){
            DB::rollBack();
           return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();

         return GlobalResponse::createResponse($ExamDesign);
    }
     public function deleteAll(){
         try{
              $ExamDesign = ExamDesign::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($ExamDesign);
    }

    public function search($data){
        try{


             $sql = "exm.is_deleted = 0 and ( proc.name like '%".$data."%' or cat.category_name like '%".$data."%' or sub.subject_name like '%".$data."%' )";

          $ExamDesign = DB::table("bl_exam_design_rules as exm")

            ->join('bl_product_catalog as proc','exm.product_catalog_id','=','proc.id')
            ->join('bl_category as cat','exm.category_id','=','cat.category_id')
            ->join('bl_subject as sub','exm.subject_id','=','sub.subject_id')

            ->select("proc.id","proc.name","exm.category_id","sub.subject_name","cat.category_name","proc.name") 
            ->whereRaw($sql)
            ->groupBy('exm.product_catalog_id','exm.category_id','exm.subject_id','exm.topic_id','proc.name','cat.category_name','sub.subject_name','proc.id')

            ->simplePaginate(self::$RECORDS_PER_PAGE);

            if (is_null($ExamDesign))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($ExamDesign);

    }

    

} ?>

