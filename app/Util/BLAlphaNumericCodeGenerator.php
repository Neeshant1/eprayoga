<?php
namespace App\Util;
use \Datetime;
use \DateTimeZone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Log;
define('CONST_SERVER_TIMEZONE', 'Asia/Kolkata');
define('CONST_SERVER_DATEFORMAT', 'YmdHis');
class BLAlphaNumericCodeGenerator {    
	       public static function getCode($prefix) {
           $str_server_timezone = CONST_SERVER_TIMEZONE;
           $str_server_dateformat = CONST_SERVER_DATEFORMAT;        
           $date = new DateTime('now');
           $date->setTimezone(new DateTimeZone($str_server_timezone));
           $str_server_now = $date->format($str_server_dateformat);        
           return $prefix . $str_server_now;
   }
     //For sending  mail to multiple address added Palanikumar
      public static function multiple_mail(array $data, $sub){
         try{
              $subject = "From eprayoga!";
              $body = $sub;
              foreach( $data as $value ) { 
               if (mail($value, $subject, $body)) {
                 echo("<p>Email successfully sent!</p>");
                } else {
                 echo("<p>Email delivery failed?~@?</p>");
                 Return "mail failed";
            }   

         }   

       }catch(Exception $e){
           throw $e; 
       }   
        return "success";
   } 

    public static function generatePromoCode($tmp2, $user_type) {

            Log::info($user_type);
           $str_server_timezone = CONST_SERVER_TIMEZONE;
           $str_server_dateformat = CONST_SERVER_DATEFORMAT;  
           if($user_type == 'T'){
              if(count($tmp2) > 0){
              Log::info($tmp2[0]['promo_code']);
              $date1 = Carbon::today();
              $str_server_now1 = $date1->format($str_server_dateformat);
              $oldData = $tmp2[0]['promo_code'];
              $new  = substr($oldData, 10);
              $data1 =  $str_server_now1 + $new + 1;
               return 'CL'. $data1; 
           } else {
               $date = Carbon::today();
               //$date->setTimezone(new DateTimeZone($str_server_timezone));
               $str_server_now = $date->format($str_server_dateformat);   
               $number = substr($str_server_dateformat, 10);    
               $data = $str_server_now + $number + 1;
               return 'CL'. $data; 
             //  return 'CU' . $str_server_now($number) + 1;
           }
           } else {
            if(count($tmp2) > 0){
              Log::info($tmp2[0]['promo_code']);
              $date1 = Carbon::today();
              $str_server_now1 = $date1->format($str_server_dateformat);
              $oldData = $tmp2[0]['promo_code'];
              $new  = substr($oldData, 10);
              $data1 =  $str_server_now1 + $new + 1;
               return 'CU'. $data1; 
           } else {
               $date = Carbon::today();
               //$date->setTimezone(new DateTimeZone($str_server_timezone));
               $str_server_now = $date->format($str_server_dateformat);   
               $number = substr($str_server_dateformat, 10);    
               $data = $str_server_now + $number + 1;
               return 'CU'. $data; 
             //  return 'CU' . $str_server_now($number) + 1;
           }
          
   }



}


  public static function generateSeqNo($seq) {
    
      if(count($seq) > 0){
              Log::info($seq[0]['seq_no']);
              $oldData = $seq[0]['seq_no'];
              $new  = substr($oldData, 6);
              $data1 = $new + 1 ;
              $seqn = sprintf("%'.06d", $data1);
              return 'BLPROA'. $seqn; 

      }

      else {
               $seqn = "000001";
               return 'BLPROA'. $seqn; 
      }

  }

  public static function generatePromoCode2($tmp1) {

            
           $str_server_timezone = CONST_SERVER_TIMEZONE;
           $str_server_dateformat = CONST_SERVER_DATEFORMAT;  
           
           Log::info(strtoupper($tmp1[0]['name']));
           $date = new DateTime('now');
           $date->setTimezone(new DateTimeZone($str_server_timezone));
           $str_server_now = $date->format($str_server_dateformat); 
           $name = substr(strtoupper($tmp1[0]['name']), 0,5);
           return $name. $str_server_now; 
}

}

?>



         