<?php
namespace App\Repositories;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuestionAnswer;
use App\Models\ProductCatalog;
use App\Models\ExamDesign;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;
use App\Util\BLAlphaNumericCodeGenerator;
use Log;
use App\Models\MainSend;
use PDF;
use Mail;
use Queue;
class QuestionRepository
{
    
    public function saveQuestion(array $data,$user_profile_id,$user_id,$clnt_group_id)
    {
      DB::beginTransaction();

        try {


            $question = Question::where ('clnt_id',$data['clnt_id'])
                         ->first();
            // if(! empty($question )){
            //     return ['status' => 'exist' ];
            // }
                
            $data['question_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.question_code'));
            $data['clnt_group_id'] = $clnt_group_id;
            $data['clnt_id'] = $data['clnt_id'];
            //$data['clnt_id'] = $user_id;
         //   $data['neg_marks'] = $data['neg_marks'];
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $question = new  Question;
            $question->fill($data);
            $question->save();


            Log::info($data['answer_options'] );
            // if($data['question_type_id'] != 10){
              foreach($data['answer_options'] as $option) {
                $option['question_id'] = (int)$question->question_id;
                $option['last_update_user_id'] = $user_profile_id;
                $option['created_by_user_id'] = $user_profile_id;
                $questionOption = new QuestionOption;
                $questionOption->fill($option);
                $questionOption->save();
              }
              $answer['question_answer_txt'] = $data['key_answers'];
              $answer['description'] = $data['key_answers'];
              $answer['question_id'] = $question->question_id;
              $answer['last_update_user_id'] =$user_profile_id;
              $answer['created_by_user_id'] = $user_profile_id;
              $questionAnswer = new QuestionAnswer;
              $questionAnswer->fill($answer);
              $questionAnswer->save();
          //   }
          //   else
          //   {
          //       // $option['question_option_txt'] = $data['answer_options'];
          //       // $option['question_id'] = (int)$question->question_id;
          //       // $option['last_update_user_id'] = $user_profile_id;
          //       // $option['created_by_user_id'] = $user_profile_id;
          //       // $questionOption = new QuestionOption;
          //       // $questionOption->fill($option);
          //       // $questionOption->save();
          //     foreach($data['answer_options'] as $option) {
          //       $option['question_id'] = (int)$question->question_id;
          //       $option['last_update_user_id'] = $user_profile_id;
          //       $option['created_by_user_id'] = $user_profile_id;
          //       $questionOption = new QuestionOption;
          //       $questionOption->fill($option);
          //       $questionOption->save();
          //     }
          //     $answer['question_answer_txt'] = $data['key_answers'];
          //     $answer['description'] = $data['key_answers'];
          //     $answer['question_id'] = $question->question_id;
          //     $answer['last_update_user_id'] =$user_profile_id;
          //     $answer['created_by_user_id'] = $user_profile_id;
          //     $questionAnswer = new QuestionAnswer;
          //     $questionAnswer->fill($answer);
          //     $questionAnswer->save();
          // }     

        } 
        catch(Exception $e) {
            DB::rollBack();

            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();

       // return $answer;
        return GlobalResponse::createResponse($question);

    }

    public function updateQuestion(array $data,$user_profile_id,$user_id,$clnt_group_id){

        DB::beginTransaction();

        try {
          
           $question = Question::where ("question_id",$data['question_id'])->first(); 
           $question->fill($data);
           $question->save();

            QuestionOption::where('question_id',$question->question_id)->delete();
            
            QuestionAnswer::where('question_id',$question->question_id)->delete();

          // if($data['question_type_id'] != 10){
            foreach($data['answer_options'] as $option) {
                $option['question_id'] = (int)$question->question_id;
                $option['last_update_user_id'] = $user_profile_id;
                $option['created_by_user_id'] = $user_profile_id;
                $questionOption = new QuestionOption;
                $questionOption->fill($option);
                $questionOption->save();
            }
            $answer['question_answer_txt'] = $data['key_answers'];
            $answer['description'] = $data['key_answers'];
            $answer['question_id'] = $question->question_id;
            $answer['last_update_user_id'] =$user_profile_id;
            $answer['created_by_user_id'] = $user_profile_id;
            $questionAnswer = new QuestionAnswer;
            $questionAnswer->fill($answer);
            $questionAnswer->save();
        // }else{
        //       foreach($data['answer_options'] as $option) {
        //         $option['question_id'] = (int)$question->question_id;
        //         $option['last_update_user_id'] = $user_profile_id;
        //         $option['created_by_user_id'] = $user_profile_id;
        //         $questionOption = new QuestionOption;
        //         $questionOption->fill($option);
        //         $questionOption->save();
        //       }
        //       $answer['question_answer_txt'] = $data['key_answers'];
        //       $answer['description'] = $data['key_answers'];
        //       $answer['question_id'] = $question->question_id;
        //       $answer['last_update_user_id'] =$user_profile_id;
        //       $answer['created_by_user_id'] = $user_profile_id;
        //       $questionAnswer = new QuestionAnswer;
        //       $questionAnswer->fill($answer);
        //       $questionAnswer->save();
        // }     
           

        } catch(Exception $e) {
            DB::rollBack();

            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();

            return GlobalResponse::createResponse($data);

    } public function getpageQuestion(array $data,$user_profile_id,$user_id,$clnt_group_id,$user_type){
        try{
            
            $pagesize  = $data['noques'];
            $pageno = $data['pageNO'];
            $limitques = ($pagesize * $pageno);
            $ofsetques = ($limitques - $pagesize); 
          
     if($data['search_text'] == null){
           
      if($user_type == 'S'){


        $qus = DB::table('bl_question_master as qm')
         ->where ('qm.is_deleted', '=', 0)
         ->leftJoin('bl_client as cl','cl.client_id','=','qm.clnt_id')
         ->leftJoin('bl_difficulty_level_master as dl','dl.difficulty_level_id','=','qm.difficulty_level_id')
         ->leftJoin('bl_question_type_master as qt','qt.question_type_id','=','qm.question_type_id')
         ->leftJoin('bl_category as cat','cat.category_id','=','qm.category_id')
         ->leftJoin('bl_subject as sub','sub.subject_id','=','qm.subject_id')
         ->leftJoin('bl_topic as top','top.topic_id','=','qm.topic_id')
         ->select('qm.*','cl.client_id','cl.clnt_name','dl.difficulty_level_id','dl.difficulty_level_name','qt.question_type_id','qt.question_type_name','cat.category_id','cat.category_name','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name')
         ->orderBy('qm.created_on_timestamp', 'desc')->offset($ofsetques)->limit($pagesize)->get(); 
         
        }else{

            
        $qus = DB::table('bl_question_master as qm')
         ->where([['qm.is_deleted', '=', 0],['qm.clnt_id','=',$user_id]])
         ->leftJoin('bl_client as cl','cl.client_id','=','qm.clnt_id')
         ->leftJoin('bl_difficulty_level_master as dl','dl.difficulty_level_id','=','qm.difficulty_level_id')
         ->leftJoin('bl_question_type_master as qt','qt.question_type_id','=','qm.question_type_id')
         ->leftJoin('bl_category as cat','cat.category_id','=','qm.category_id')
         ->leftJoin('bl_subject as sub','sub.subject_id','=','qm.subject_id')
         ->leftJoin('bl_topic as top','top.topic_id','=','qm.topic_id')
         ->select('qm.*','cl.client_id','cl.clnt_name','dl.difficulty_level_id','dl.difficulty_level_name','qt.question_type_id','qt.question_type_name','cat.category_id','cat.category_name','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name')
         ->orderBy('qm.created_on_timestamp', 'desc')->offset($ofsetques)->limit($pagesize)->get();         
         
        
        }

            

     } else{


     if($user_type == 'S'){

      $sql = "qm.is_active = 1 and qm.is_deleted = 0 and ( cl.clnt_name like '%".$data['search_text']."%' or cat.category_name like '%".$data['search_text']."%' or sub.subject_name like '%".$data['search_text']."%' or  top.topic_name like '%".$data['search_text']."%' or  dl.difficulty_level_name like '%".$data['search_text']."%' or qt.question_type_name like '%".$data['search_text']."%' or qm.question_txt_format like '%".$data['search_text']."%')"; 

        $qus = DB::table('bl_question_master as qm')
         ->whereRaw($sql)
         ->leftJoin('bl_client as cl','cl.client_id','=','qm.clnt_id')
         ->leftJoin('bl_difficulty_level_master as dl','dl.difficulty_level_id','=','qm.difficulty_level_id')
         ->leftJoin('bl_question_type_master as qt','qt.question_type_id','=','qm.question_type_id')
         ->leftJoin('bl_category as cat','cat.category_id','=','qm.category_id')
         ->leftJoin('bl_subject as sub','sub.subject_id','=','qm.subject_id')
         ->leftJoin('bl_topic as top','top.topic_id','=','qm.topic_id')
         ->select('qm.*','cl.client_id','cl.clnt_name','dl.difficulty_level_id','dl.difficulty_level_name','qt.question_type_id','qt.question_type_name','cat.category_id','cat.category_name','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name')
         ->orderBy('qm.created_on_timestamp', 'desc')->offset($ofsetques)->limit($pagesize)->get(); 
         
          }else{

             $sql = " qm.clnt_id = '".$user_id."' and qm.is_active = 1 and qm.is_deleted = 0 and ( cl.clnt_name like '%".$data['search_text']."%' or cat.category_name like '%".$data['search_text']."%' or sub.subject_name like '%".$data['search_text']."%' or  top.topic_name like '%".$data['search_text']."%' or  dl.difficulty_level_name like '%".$data['search_text']."%' or qt.question_type_name like '%".$data['search_text']."%' or qm.question_txt_format like '%".$data['search_text']."%')"; 
             

        $qus = DB::table('bl_question_master as qm')
         ->whereRaw($sql)
         ->leftJoin('bl_client as cl','cl.client_id','=','qm.clnt_id')
         ->leftJoin('bl_difficulty_level_master as dl','dl.difficulty_level_id','=','qm.difficulty_level_id')
         ->leftJoin('bl_question_type_master as qt','qt.question_type_id','=','qm.question_type_id')
         ->leftJoin('bl_category as cat','cat.category_id','=','qm.category_id')
         ->leftJoin('bl_subject as sub','sub.subject_id','=','qm.subject_id')
         ->leftJoin('bl_topic as top','top.topic_id','=','qm.topic_id')
         ->select('qm.*','cl.client_id','cl.clnt_name','dl.difficulty_level_id','dl.difficulty_level_name','qt.question_type_id','qt.question_type_name','cat.category_id','cat.category_name','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name')
         ->orderBy('qm.created_on_timestamp', 'desc')->offset($ofsetques)->limit($pagesize)->get();         
         
        
          }

     }     
           
           
         
         }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
       
          return GlobalResponse::createResponse($qus);
    }

    public function getAllQuestion(array $data,$user_profile_id,$user_id,$clnt_group_id,$user_type){
        try{
     if($data['search_text'] == null){              
            
          if($user_type == 'S'){      
             $qus = DB::select("select count(qm.question_id) as totalques from bl_question_master as qm left join bl_client as cl on cl.client_id = qm.clnt_id left join bl_difficulty_level_master as dl on dl.difficulty_level_id = qm.difficulty_level_id left join bl_question_type_master as qt on qt.question_type_id = qm.question_type_id left join bl_category as cat on cat.category_id = qm.category_id left join bl_subject as sub on sub.subject_id = qm.subject_id left join bl_topic as top on top.topic_id = qm.topic_id where (qm.is_deleted = 0) order by qm.created_on_timestamp desc");
         
          }else{

             $qus = DB::select("select count(qm.question_id) as totalques from bl_question_master as qm left join bl_client as cl on cl.client_id = qm.clnt_id left join bl_difficulty_level_master as dl on dl.difficulty_level_id = qm.difficulty_level_id left join bl_question_type_master as qt on qt.question_type_id = qm.question_type_id left join bl_category as cat on cat.category_id = qm.category_id left join bl_subject as sub on sub.subject_id = qm.subject_id left join bl_topic as top on top.topic_id = qm.topic_id where (qm.is_deleted = 0 and qm.clnt_id = '".$user_id."') order by qm.created_on_timestamp desc");        
        
          }
          
      }else{
          if($user_type == 'S'){    
             $sql = "qm.is_active = 1 and qm.is_deleted = 0 and ( cl.clnt_name like '%".$data['search_text']."%' or cat.category_name like '%".$data['search_text']."%' or sub.subject_name like '%".$data['search_text']."%' or  top.topic_name like '%".$data['search_text']."%' or  dl.difficulty_level_name like '%".$data['search_text']."%' or qt.question_type_name like '%".$data['search_text']."%' or qm.question_txt_format like '%".$data['search_text']."%')";  

          
              $qus = DB::table('bl_question_master as qm')
                   ->whereRaw($sql)
                   ->leftJoin('bl_client as cl','cl.client_id','=','qm.clnt_id')
                   ->leftJoin('bl_difficulty_level_master as dl','dl.difficulty_level_id','=','qm.difficulty_level_id')
                   ->leftJoin('bl_question_type_master as qt','qt.question_type_id','=','qm.question_type_id')
                   ->leftJoin('bl_category as cat','cat.category_id','=','qm.category_id')
                   ->leftJoin('bl_subject as sub','sub.subject_id','=','qm.subject_id')
                   ->leftJoin('bl_topic as top','top.topic_id','=','qm.topic_id')
                   ->select('qm.question_id')
                   ->orderBy('qm.created_on_timestamp', 'desc')->count();
         
          }else{

            $sql = " qm.clnt_id = '".$user_id."' and qm.is_active = 1 and qm.is_deleted = 0 and ( cl.clnt_name like '%".$data['search_text']."%' or cat.category_name like '%".$data['search_text']."%' or sub.subject_name like '%".$data['search_text']."%' or  top.topic_name like '%".$data['search_text']."%' or  dl.difficulty_level_name like '%".$data['search_text']."%' or qt.question_type_name like '%".$data['search_text']."%' or qm.question_txt_format like '%".$data['search_text']."%')"; 


             $qus = DB::table('bl_question_master as qm')
               ->whereRaw($sql)
               ->leftJoin('bl_client as cl','cl.client_id','=','qm.clnt_id')
               ->leftJoin('bl_difficulty_level_master as dl','dl.difficulty_level_id','=','qm.difficulty_level_id')
               ->leftJoin('bl_question_type_master as qt','qt.question_type_id','=','qm.question_type_id')
               ->leftJoin('bl_category as cat','cat.category_id','=','qm.category_id')
               ->leftJoin('bl_subject as sub','sub.subject_id','=','qm.subject_id')
               ->leftJoin('bl_topic as top','top.topic_id','=','qm.topic_id')
               ->select('qm.question_id')
               ->orderBy('qm.created_on_timestamp', 'desc')->count();    
         
        
          }
      }

         }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
       
          return GlobalResponse::createResponse($qus);
    }

    public function getQuestionById($data){
        try{
            $question = Question::find($data['question_id']);
            $question['answer_options'] = QuestionOption::where('question_id',$question->question_id)->get();
            $question['key_answers'] = QuestionAnswer::where('question_id',$question->question_id)->get();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
          return GlobalResponse::createResponse($question);
    }

    public function getOptionsByQuestionId($data){
        try{
            $questionOptions = QuestionOption::where('question_id',$data['question_id'])->get();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($questionOptions);
    }

     public function getAnswersByQuestionId($data){
        try{
            $questionAnswers = QuestionAnswer::where('question_id',$data['question_id'])->get();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($questionAnswers);
    }


    public function saveQuestionOption($data){
        try{
            $questionOption =new  QuestionOption;
            $questionOption->fill($data);
            $questionOption->save();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($questionOption);
    }



    public function saveQuestionAnswer($data){
        try{
            $questionAnswer =new  QuestionAnswer;
            $questionAnswer->fill($data);
            $questionAnswer->save();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
       return GlobalResponse::createResponse($questionAnswer);
    }

 public function saveBulkQuestionOption($data){
        DB::beginTransaction();

        try {

            foreach($data as $option) {
                $questionOption = new QuestionOption;
                $questionOption->fill($option);
                $questionOption->save();
             }

             //  foreach($data['key_answers'] as $answer) {
             //    $answer['question_id'] = $question->question_id;
             //    $answer['last_update_user_id'] =$question->last_update_user_id;
             //    $answer['created_by_user_id'] = $question->created_by_user_id;
             //    $questionAnswer = new QuestionAnswer;
             //    $questionAnswer->fill($answer);
             //    $questionAnswer->save();
             // }
        } catch(Exception $e) {
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
            
        }
        DB::commit();
        return GlobalResponse::createResponse($questionOption);
    }

    public function saveBulkQuestionAnswer($data){
        DB::beginTransaction();

        try {

            foreach($data as $answer) {
               $questionAnswer = new QuestionAnswer;
                $questionAnswer->fill($answer);
                $questionAnswer->save();
             }
        } catch(Exception $e) {
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
            
        }
        DB::commit();
        return GlobalResponse::createResponse($questionAnswer);
    }

    public function deleteQuestionOption(array $data){
        try{
              $question_option = QuestionOption::where ("question_option_id",$data['question_option_id'])->first(); 
            $question_option->delete();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($question_option);
    }

    public function deleteQuestionAnswer(array $data){
        try{

            $question_answer = QuestionOption::where ("question_answer_id",$data['question_answer_id'])->first(); 
            $question_answer->delete();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($question_answer);
    }
    
public function alertQuestion(array $data){
    
     try{
           
            $delete = DB::table('bl_product_catalog as qm')
                        ->where ([['qm.clnt_id','=',$data['clnt_id']],
                                  ['qm.category_id','=',$data['category_id']],
                                  ['qm.subject_id','=',$data['subject_id']],
                                  ['qm.topic_id','=',$data['topic_id']],
                                  ['qm.is_deleted','=','0']])
                        ->select('qm.id')
                        ->get();
            $questioncount = DB::table('bl_question_master as qm')
                             ->where ([['qm.is_deleted',0],
                                  ['qm.clnt_id','=',$data['clnt_id']],
                                  ['qm.category_id','=',$data['category_id']],
                                  ['qm.subject_id','=',$data['subject_id']],
                                  ['qm.topic_id','=',$data['topic_id']],
                                  ['qm.is_active','=','1'],
                                  ['qm.is_deleted','=','0']])
                             ->select('qm.question_id')
                             ->get();
            $error = "Deleteing the question impacts the following products: <br>";
                if(count($delete) > 0){
                        $prodid = $delete->pluck('id');
                       
                        $exmdesign = DB::table('bl_exam_design_rules')->where([['rule','=','no_of_question']])
                                     ->whereIn("product_catalog_id",$prodid)
                                     ->select('value','product_catalog_id')
                                     ->get();
                          
                        $tmp = json_decode($exmdesign);
                     foreach ($tmp as $tmp1 ) {
                        $questcount = $tmp1->value;
                         if(count($questioncount) > $questcount){
                         
                         } else{
                            $prodname =DB::table('bl_product_catalog as qm')
                                        ->where ("id","=",$tmp1->product_catalog_id)
                                        ->select('qm.name')
                                        ->get();
                            $tmpprod = json_decode($prodname,true);
                          
                            $error = $error . "<b>". $tmpprod[0]['name'] . "</b>";
                            $error  = $error ."<br>";
                         }
                     }
            $error = $error . "Also impacted products will be disabled. To enable configure the design rule.";
          //  return GlobalResponse::clientErrorResponse($error);
        } else{
          //  $question = Question::where ("question_id",$data['question_id'])->update(['is_deleted' => 1]);
            $error = "";
        }

           
     } catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
     }
       return GlobalResponse::createResponse($error);
    }

public function deleteQuestion(array $data){
    
     try{
            $delete = DB::table('bl_product_catalog as qm')
                        ->where ([['qm.clnt_id','=',$data['clnt_id']],
                                  ['qm.category_id','=',$data['category_id']],
                                  ['qm.subject_id','=',$data['subject_id']],
                                  ['qm.topic_id','=',$data['topic_id']],
                                  ['qm.is_deleted','=','0']])
                        ->select('qm.id')
                        ->get();
            $questioncount = DB::table('bl_question_master as qm')
                             ->where ([['qm.is_deleted',0],
                                  ['qm.clnt_id','=',$data['clnt_id']],
                                  ['qm.category_id','=',$data['category_id']],
                                  ['qm.subject_id','=',$data['subject_id']],
                                  ['qm.topic_id','=',$data['topic_id']],
                                  ['qm.is_active','=','1'],
                                  ['qm.is_deleted','=','0']])
                             ->select('qm.question_id')
                             ->get();
           
                if(count($delete) > 0){
                        $prodid = $delete->pluck('id');
            
                        $exmdesign = DB::table('bl_exam_design_rules')->where([['rule','=','no_of_question']])
                                     ->whereIn("product_catalog_id",$prodid)
                                     ->select('value','product_catalog_id')
                                     ->get();
         
                        $tmp = json_decode($exmdesign);
                     foreach ($tmp as $tmp1 ) {
                        $questcount = $tmp1->value;
                         if(count($questioncount) > $questcount){
                            $question = Question::where ("question_id",$data['question_id'])->update(['is_deleted' => 1]);
                            $question_option = QuestionOption::where ("question_id",$data['question_id'])->update(['is_deleted'=>1]);
                            $question_option = QuestionAnswer::where ("question_id",$data['question_id'])->update(['is_deleted'=>1]); 
                           
                         } else{
                            $question = Question::where ("question_id",$data['question_id'])->update(['is_deleted' => 1]);
                            $question_option = QuestionOption::where ("question_id",$data['question_id'])->update(['is_deleted'=>1]);
                            $question_option = QuestionAnswer::where ("question_id",$data['question_id'])->update(['is_deleted'=>1]); 
                            $prod = ProductCatalog::where ("id",$tmp1->product_catalog_id)->update(['is_active' => 0]);
          
                        
                           
                         }
                     }
        } else{
            $question = Question::where ("question_id",$data['question_id'])->update(['is_deleted' => 1]);
            $question_option = QuestionOption::where ("question_id",$data['question_id'])->update(['is_deleted'=>1]);
            $question_option = QuestionAnswer::where ("question_id",$data['question_id'])->update(['is_deleted'=>1]);
           
        }

           
     } catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
     }
       return GlobalResponse::createResponse($question);
    }

    public function deleteAll(){
        try{
              $question = Question::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($question);
    }

    public function activateQuestion(array $data){
        try{
            $question = Question::where ("question_id",$data['question_id'])->first();
            $question->is_active = 1;
            $question->save();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
       return GlobalResponse::createResponse($question);
    }

    public function deActivateQuestion(array $data){
        try{
            $question = Question::where ("question_id",$data['question_id'])->first();
            $question->is_active = 0;
            $question->save();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($question);
}

    // public function searchQuestion($data,$user_type,$user_id){
    //     try{
    //       $pageNo = $data['pageNo'];
    //       $pagesize = $data['pagesize'];
         
    //       if($user_type == 'S'){
    //       $sql = "qm.is_active = 1 and qm.is_deleted = 0 and ( cl.clnt_name like '%".$data['search_text']."%' or cat.category_name like '%".$data['search_text']."%' or sub.subject_name like '%".$data['search_text']."%' or  top.topic_name like '%".$data['search_text']."%' or  dl.difficulty_level_name like '%".$data['search_text']."%' or qt.question_type_name like '%".$data['search_text']."%' or qm.question_txt_format like '%".$data['search_text']."%')";  

    //       // Log::info('Some message here.'.$sql);
    //       //       $faq = DB::table("bl_topic as top")            ->whereRaw($sql)            ->leftJoin("bl_category as cat","cat.category_code","=","top.category_code")            ->leftJoin("bl_subject as sub","sub.subject_code","=","top.subject_code")           ->select("top.*","cat.category_id","cat.category_name","sub.subject_id","sub.subject_name") 

    //      $question = DB::table('bl_question_master as qm')
    //      ->whereRaw ($sql)
    //      ->leftJoin('bl_client as cl','cl.client_id','=','qm.clnt_id')
    //      ->leftJoin('bl_difficulty_level_master as dl','dl.difficulty_level_id','=','qm.difficulty_level_id')
    //      ->leftJoin('bl_question_type_master as qt','qt.question_type_id','=','qm.question_type_id')
    //      ->leftJoin('bl_category as cat','cat.category_id','=','qm.category_id')
    //      ->leftJoin('bl_subject as sub','sub.subject_id','=','qm.subject_id')
    //      ->leftJoin('bl_topic as top','top.topic_id','=','qm.topic_id')
    //      ->select('qm.*','cl.client_id','cl.clnt_name','dl.difficulty_level_id','dl.difficulty_level_name','qt.question_type_id','qt.question_type_name','cat.category_id','cat.category_name','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name')
    //      ->orderBy('qm.created_on_timestamp', 'desc')->get(); 
    //     } else{

    //       $sql = " qm.clnt_id = '".$user_id."' and qm.is_active = 1 and qm.is_deleted = 0 and ( cl.clnt_name like '%".$data['search_text']."%' or cat.category_name like '%".$data['search_text']."%' or sub.subject_name like '%".$data['search_text']."%' or  top.topic_name like '%".$data['search_text']."%' or  dl.difficulty_level_name like '%".$data['search_text']."%' or qt.question_type_name like '%".$data['search_text']."%' or qm.question_txt_format like '%".$data['search_text']."%')"; 
    //       Log::info($sql); 

    //       // Log::info('Some message here.'.$sql);
    //       //       $faq = DB::table("bl_topic as top")            ->whereRaw($sql)            ->leftJoin("bl_category as cat","cat.category_code","=","top.category_code")            ->leftJoin("bl_subject as sub","sub.subject_code","=","top.subject_code")           ->select("top.*","cat.category_id","cat.category_name","sub.subject_id","sub.subject_name") 

    //      $question = DB::table('bl_question_master as qm')
    //      ->whereRaw ($sql)
    //      ->leftJoin('bl_client as cl','cl.client_id','=','qm.clnt_id')
    //      ->leftJoin('bl_difficulty_level_master as dl','dl.difficulty_level_id','=','qm.difficulty_level_id')
    //      ->leftJoin('bl_question_type_master as qt','qt.question_type_id','=','qm.question_type_id')
    //      ->leftJoin('bl_category as cat','cat.category_id','=','qm.category_id')
    //      ->leftJoin('bl_subject as sub','sub.subject_id','=','qm.subject_id')
    //      ->leftJoin('bl_topic as top','top.topic_id','=','qm.topic_id')
    //      ->select('qm.*','cl.client_id','cl.clnt_name','dl.difficulty_level_id','dl.difficulty_level_name','qt.question_type_id','qt.question_type_name','cat.category_id','cat.category_name','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name')
    //      ->orderBy('qm.created_on_timestamp', 'desc')->get();


    //     }
         
    //      }catch(Exception $e){
    //         return GlobalResponse::clientErrorResponse("error");
    //     }
    //     return $question;
                    
    // }


    



     // public function getAllQuestionAndAnswer(){
     //     try{
     //           $data = DB::table('bl_question_master')
     //         ->leftJoin('bl_question_option', 'bl_question_master.question_id', '=', 'bl_question_option.question_id')
     //         ->leftJoin('bl_question_answer', 'bl_question_master.question_id', '=', 'bl_question_answer.question_id')
     //         ->get();
     //      }catch(Exception $e){
     //         return GlobalResponse::clientErrorResponse("error");
     //     }
     //     return $data;
     //     return Question::with(['question_option','question_answer']);
     // }
 public function getAllQuestionAndOptions(){
         try{
               $data = DB::table('bl_question_master as qm')->where ('qm.is_deleted',0)
             ->join('bl_question_option as qo ','qo.question_option_id','=','qm.question_id')
             ->select('qm.question_txt_format','qo.question_option_txt')
             ->get();

            $data = DB::table("bl_question_master as qus")->where('qus.is_deleted',0)       
            ->join('bl_question_option as opt','opt.question_option_id','=','qus.question_id')  
            ->select('qus.question_txt_format as Question','opt.question_option_txt as Option1','opt.question_option_2 as Option2','opt.question_option_3 as Option3','opt.question_option_4 as Option4')              
            ->get(); 


          

          }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
         }
         return GlobalResponse::createResponse($data);
         
     }


    public function renderQuestion(){
         try{
            
            //  $data = DB::table("bl_question_master as qus")->where('qus.is_deleted',0)       
            // ->join('bl_question_option as opt','opt.question_id','=','qus.question_id')  
            // ->join('bl_question_answer as ans','ans.question_id','=','qus.question_id')  
            // ->select('qus.*','opt.question_option_txt','opt.description','ans.question_answer_txt','ans.description')   
            // ->get(); 


            $data = DB::select('SELECT qus.question_txt_format, qus.question_type_id, qus.question_id, group_concat(qus1.question_option_txt) question_option_txt FROM bl_question_master as qus, bl_question_option as qus1 WHERE qus.question_id = qus1.question_id and qus.is_deleted = 0 group by qus.question_txt_format,qus.question_type_id,qus.question_id');


          }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
         }
         return GlobalResponse::createResponse($data);
         
     }

    public function sendingMail(array $data,$user_profile_id,$user_id,$user_login_id)
    {    
            $sendmail = new MainSend;
            $sendmail['email_id']=$user_login_id;
            $sendmail['type'] = 'certification';
            $examName = $data['exam_name'];
            $marks = $data['marks_scored'];
            $totmarks = $data['total_marks'];
            $examId = $data['exam_code'];
            $parts = explode("@", $user_login_id);
            $username = $parts[0];
            $pdftemplate=view('mail_Certificate',['username'=> $username,'examid' => $examId, 'examName'=> $examName, 'marks'=>$marks,'totmarks'=>$totmarks]);
            $pdfpath = public_path().'/pdfdocument/'.$data['exam_code'].$username.'.pdf';
            $sendmail['template']=view('emailsend',['username'=> $username,'examid' => $examId, 'examName'=> $examName]);
            $sendmail['pdf_link'] = $pdfpath;
             $sendmail->save();
              $pdf = PDF::loadHTML($pdftemplate)->save($pdfpath);
            return $sendmail->id;

    }

    public function scoreCard(array $data,$user_profile_id,$user_id,$user_login_id)
    {


            $sendmail['email_id']=$user_login_id;
            $sendmail['type'] = 'certification';
            $examName = $data['exam_name'];
            $marks = $data['marks_scored'];
            $totmarks = $data['total_marks'];

            $totques = $data['no_of_questions'];
            $cortansques = $data['no_of_questions_right'];
            $noquesblank = $data['no_of_questions_blank'];
            $wrongques = $data['no_of_questions_wrong'];
             $markscored = $data['marks_scored'];
             $timestamp = $data['last_update_timestamp'];

            $splits =  explode(" ",$timestamp);

            $get_date = $splits[0];
        

            $examId = $data['exam_code'];
            $parts = explode("@", $user_login_id);
            $username = $parts[0];
            $pdftemplate=view('mail_scoreCard',['username'=> $username,'examid' => $examId, 'examName'=> $examName, 'marks'=>$marks,'totmarks'=>$totmarks,'totques'=>$totques,'cortansques'=>$cortansques,'noquesblank'=>$noquesblank,'markscored'=>$markscored,'get_date'=>$get_date,'wrongques'=>$wrongques]);
            $pdfpath = public_path().'/pdfdocument/'.$data['exam_code'].$username.'.pdf';
            

              $pdf = PDF::loadHTML($pdftemplate)->save($pdfpath);
        return ('/pdfdocument/'.$data['exam_code'].$username.'.pdf');
    }

    public function pdfView()
    {
      Log::info("gdgdgdg");
            
    }



   

} ?>

