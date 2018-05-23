<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MainSend extends Model
{

    protected $table = "sending_mail";

    protected $primaryKey = 'id';

    public $timestamps = false;
    //non numeric primary
    //incrementing =false;
    protected $fillable = [
        'email_id','link','user_name','session_id','status','created_on_time','updated_on_time','pdf_link'
    ];
}

?>