<?php
//use Cookie;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $value = Cookie::get('user_profile_id');
    if(is_null($value)){
        return view('home');
    }else{
         $login = LoginController::Session_cookie($value,$request);
         return view('home');
    }
    
});

Route::get('/locallogin', function () {
    return view('home');
});

Route::get('/index', function () {
    return view('index');
});


Route::get('/admin_main', function () {
    return view('admin_main');
});

Route::get('/user_exam', function () {
    return view('user_exam');
});

Route::get('/employee', function () {
    return view('employee');
});

Route::get('/main_index', function () {
    return view('main_index');
});

Route::get('/sign_up', function () {
    return view('sign_up');
});

Route::get('/message', function () {
    return view('message');
});

Route::get('/shopCart', function () {
    return view('shop');
});

Route::get('/forgot_password', function () {
    return view('forgot_password');
});

Route::get('/forgot_password_message', function () {
    return view('forgot_password_message');
});

Route::get('/auth_reset', function () {
    return view('auth.reset_forgot');
});


Route::get('welcome_mail','MailController@welcomeMail');



 //Route::get('password/reset', 'Auth\ResetPasswordController@getReset');
Route::post('/eprayoga/login', 'Auth\LoginController@login');
Route::get('/eprayoga/logout', 'Auth\LoginController@signOut');
Route::get('password/reset/{session_id}', 'Auth\ResetPasswordController@getReset');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset');
Route::post('/eprayoga/Forgot_password', 'Auth\LoginController@Forgot_password');
Route::get('password/forgot/token={token}', 'Auth\ResetPasswordController@getToken');

//Route::post('/eprayoga/shopCart', 'Auth\LoginController@shopCart');

Route::get('/exam', function () {
    return view('main_exam');
});
/*Route::get('/admin_main', function () {
    return view('admin_main');
});*/

//Route::post('/eprayoga/login', ['uses' => 'UserController@login','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/create_address_type', ['uses' => 'AddressTypeController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_address_type', ['uses' => 'AddressTypeController@update','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_address_type', ['uses' => 'AddressTypeController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_address_type', ['uses' => 'AddressTypeController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_address_type_by_id', ['uses' => 'AddressTypeController@getById','middleware'=>'eprayoga']);

// Route::get('/eprayoga/validation_fail', ['uses' => 'AddressTypeController@getValidationFailMsg','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_address_type', ['uses' => 'AddressTypeController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_address_type', ['uses' => 'AddressTypeController@deActivate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/disable_address_type', ['uses' => 'AddressTypeController@deleteAddressType','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_address_typeall', ['uses' => 'AddressTypeController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_address_type', ['uses' => 'AddressTypeController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_address_type', ['uses' => 'AddressTypeController@selectAddressType']);
//AWS __

Route::post('/eprayoga/admin/create_aws', ['uses' => 'AwsController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_aws', ['uses' => 'AwsController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_aws', ['uses' => 'AwsController@delete','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_aws', ['uses' => 'AwsController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_aws_by_id', ['uses' => 'AwsController@getById','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_aws', ['uses' => 'AwsController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_aws', ['uses' => 'AwsController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_aws', ['uses' => 'AwsController@deleteAws','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allaws', ['uses' => 'AwsController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_aws', ['uses' => 'AwsController@search','middleware'=>'eprayoga']);


//user type
Route::post('/eprayoga/admin/create_user_type', ['uses' => 'UserTypeController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_user_type', ['uses' => 'UserTypeController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_user_type', ['uses' => 'UserTypeController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_user_type_by_id', ['uses' => 'UserTypeController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_user_type', ['uses' => 'UserTypeController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_usertype', ['uses' => 'UserTypeController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_usertype', ['uses' => 'UserTypeController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_usertype', ['uses' => 'UserTypeController@deleteUsertype','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allusertype', ['uses' => 'UserTypeController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_usertype', ['uses' => 'UserTypeController@search','middleware'=>'eprayoga']);


//QuestionType

Route::post('/eprayoga/admin/create_question_type', ['uses' => 'QuestionTypeController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_question_type', ['uses' => 'QuestionTypeController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_question_type', ['uses' => 'QuestionTypeController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_question_type_by_id', ['uses' => 'QuestionTypeController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_question_type', ['uses' => 'QuestionTypeController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_question_type', ['uses' => 'QuestionTypeController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_question_type', ['uses' => 'QuestionTypeController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_question_type', ['uses' => 'QuestionTypeController@deleteQuestionType','middleware'=>'eprayoga']);

//Louis
Route::post('/eprayoga/admin/delete_question_typeall', ['uses' => 'QuestionTypeController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_questiontype', ['uses' => 'QuestionTypeController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_question_type', ['uses' => 'QuestionTypeController@selectQuestionType','middleware'=>'eprayoga']);


//Currency

Route::post('/eprayoga/admin/create_currency', ['uses' => 'CurrencyController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_currency', ['uses' => 'CurrencyController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_currency', ['uses' => 'CurrencyController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_currency_by_id', ['uses' => 'CurrencyController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_currency', ['uses' => 'CurrencyController@getAll','middleware'=>'eprayoga']);
//balaji

Route::post('/eprayoga/admin/activate_currency', ['uses' => 'CurrencyController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_currency', ['uses' => 'CurrencyController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_currency', ['uses' => 'CurrencyController@deleteCurrency','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allcurrency', ['uses' => 'CurrencyController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_currency', ['uses' => 'CurrencyController@search','middleware'=>'eprayoga']);


//City

Route::post('/eprayoga/admin/create_city', ['uses' => 'CityController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_city', ['uses' => 'CityController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_city', ['uses' => 'CityController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_city_by_id', ['uses' => 'CityController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_city', ['uses' => 'CityController@getAll','middleware'=>'eprayoga']);

//mari
Route::post('/eprayoga/admin/activate_city', ['uses' => 'CityController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_city', ['uses' => 'CityController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_city', ['uses' => 'CityController@deleteCity','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allcity', ['uses' => 'CityController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_city', ['uses' => 'CityController@search','middleware'=>'eprayoga']);

//question complexity

Route::post('/eprayoga/admin/create_question_complexity', ['uses' => 'QuestionComplexityController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_question_complexity', ['uses' => 'QuestionComplexityController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_question_complexity', ['uses' => 'QuestionComplexityController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_question_complexity_by_id', ['uses' => 'QuestionComplexityController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_question_complexity', ['uses' => 'QuestionComplexityController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_complexity_question', ['uses' => 'QuestionComplexityController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_complexity_question', ['uses' => 'QuestionComplexityController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_question_complexity', ['uses' => 'QuestionComplexityController@deleteQuestionComplexity','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_question_complexityall', ['uses' => 'QuestionComplexityController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_questioncomplexity', ['uses' => 'QuestionComplexityController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_question_complexity', ['uses' => 'QuestionComplexityController@selectQuestionComplexity','middleware'=>'eprayoga']);


//faq

Route::post('/eprayoga/admin/create_faq', ['uses' => 'FaqController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_faq', ['uses' => 'FaqController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_faq', ['uses' => 'FaqController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_faq_by_id', ['uses' => 'FaqController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_faq', ['uses' => 'FaqController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_faq', ['uses' => 'FaqController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_faq', ['uses' => 'FaqController@deActivate','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/disable_faq', ['uses' => 'FaqController@deleteFaq','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allfaq', ['uses' => 'FaqController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_faq', ['uses' => 'FaqController@search','middleware'=>'eprayoga']);

//zonearea

Route::post('/eprayoga/admin/create_zone_area', ['uses' => 'ZoneAreaController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_zone_area', ['uses' => 'ZoneAreaController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_zone_area', ['uses' => 'ZoneAreaController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_zone_area_by_id', ['uses' => 'ZoneAreaController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_zonearea', ['uses' => 'ZoneAreaController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_zone', ['uses' => 'ZoneAreaController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_zone', ['uses' => 'ZoneAreaController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_zone', ['uses' => 'ZoneAreaController@deleteZone','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_zone_areaall', ['uses' => 'ZoneAreaController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_zone', ['uses' => 'ZoneAreaController@selectZone']);

Route::get('/eprayoga/admin/search_zonearea', ['uses' => 'ZoneAreaController@search','middleware'=>'eprayoga']);


//==========================Sms//

Route::post('/eprayoga/admin/create_sms', ['uses' => 'SmsController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_sms', ['uses' => 'SmsController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_sms', ['uses' => 'SmsController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_sms_by_id', ['uses' => 'SmsController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_sms', ['uses' => 'SmsController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_sms', ['uses' => 'SmsController@activate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/deactivate_sms', ['uses' => 'SmsController@deActivate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/disable_sms', ['uses' => 'SmsController@deleteSms','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allsms', ['uses' => 'SmsController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_sms', ['uses' => 'SmsController@search','middleware'=>'eprayoga']);
//===========================================================Email//


Route::post('/eprayoga/admin/create_email', ['uses' => 'EmailController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_email', ['uses' => 'EmailController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_email', ['uses' => 'EmailController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_email_by_id', ['uses' => 'EmailController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_email', ['uses' => 'EmailController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_email', ['uses' => 'EmailController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_email', ['uses' => 'EmailController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_email', ['uses' => 'EmailController@deleteEmail','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allemail', ['uses' => 'EmailController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_email', ['uses' => 'EmailController@search','middleware'=>'eprayoga']);

//===================================================//UserAccess//


// Route::post('/eprayoga/admin/create_user_access', ['uses' => 'UserAccessController@save','middleware'=>'eprayoga']);


// Route::post('/eprayoga/admin/update_user_access', ['uses' => 'UserAccessController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_user_access', ['uses' => 'UserAccessController@delete','middleware'=>'eprayoga']);
// Route::post('/eprayoga/admin/delete_alluseraccess', ['uses' => 'UserAccessController@deleteAll','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/get_user_access_by_id', ['uses' => 'UserAccessController@getById','middleware'=>'eprayoga']);

// Route::get('/eprayoga/admin/get_all_user_access', ['uses' => 'UserAccessController@getAll','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/activate_useraccess', ['uses' => 'UserAccessController@activate','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/deactivate_useraccess', ['uses' => 'UserAccessController@deActivate','middleware'=>'eprayoga']);

//country
Route::post('/eprayoga/admin/create_country', ['uses' => 'CountryController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_country', ['uses' => 'CountryController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_country', ['uses' => 'CountryController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_country_by_id', ['uses' => 'CountryController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_country', ['uses' => 'CountryController@getAll','middleware'=>'eprayoga']);

//Louis added 
Route::post('/eprayoga/admin/activate_country', ['uses' => 'CountryController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_country', ['uses' => 'CountryController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_country', ['uses' => 'CountryController@deleteCountry','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allcountry', ['uses' => 'CountryController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_country', ['uses' => 'CountryController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/getcountryincustomer', ['uses' => 'CountryController@getcountryincustomer']);

//State
Route::post('/eprayoga/admin/create_state', ['uses' => 'StateController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_state', ['uses' => 'StateController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_state', ['uses' => 'StateController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_state_by_id', ['uses' => 'StateController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_state', ['uses' => 'StateController@getAll','middleware'=>'eprayoga']);

//Louis added 
Route::post('/eprayoga/admin/activate_state', ['uses' => 'StateController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_state', ['uses' => 'StateController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_state', ['uses' => 'StateController@deleteState','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allstate', ['uses' => 'StateController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_state', ['uses' => 'StateController@search','middleware'=>'eprayoga']);


//Faq Category
Route::post('/eprayoga/admin/create_faqcategory', ['uses' => 'FaqCategoryController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_faqcategory', ['uses' => 'FaqCategoryController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_faqcategory', ['uses' => 'FaqCategoryController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_faqcategory_id', ['uses' => 'FaqCategoryController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_faqcategory', ['uses' => 'FaqCategoryController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_faq_category', ['uses' => 'FaqCategoryController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_faq_category', ['uses' => 'FaqCategoryController@deActivate','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/disable_faq_category', ['uses' => 'FaqCategoryController@deleteFaqCategory','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allfaqcategory', ['uses' => 'FaqCategoryController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_faqcategory', ['uses' => 'FaqCategoryController@selectFaqCategory','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_faqcategory', ['uses' => 'FaqCategoryController@search','middleware'=>'eprayoga']);

//===========================================Security Questions=====================================


Route::post('/eprayoga/admin/create_security_questions', ['uses' => 'SecurityQuestionsController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_security_questions', ['uses' => 'SecurityQuestionsController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_security_questions', ['uses' => 'SecurityQuestionsController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_security_questions_by_id', ['uses' => 'SecurityQuestionsController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_security_questions', ['uses' => 'SecurityQuestionsController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_security_questions', ['uses' => 'SecurityQuestionsController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_security_questions', ['uses' => 'SecurityQuestionsController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_security_questions', ['uses' => 'SecurityQuestionsController@deleteSecurityQuestion','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_security_questionsall', ['uses' => 'SecurityQuestionsController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_security_questions', ['uses' => 'SecurityQuestionsController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_security_questions', ['uses' => 'SecurityQuestionsController@selectSecQus']);
//=================================================instruction============================================


Route::post('/eprayoga/admin/create_instruction', ['uses' => 'InstructionController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_instruction', ['uses' => 'InstructionController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_instruction', ['uses' => 'InstructionController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_instruction_by_id', ['uses' => 'InstructionController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_instruction', ['uses' => 'InstructionController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_instruction', ['uses' => 'InstructionController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_instruction', ['uses' => 'InstructionController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_instruction', ['uses' => 'InstructionController@deleteInstruction','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_instructionall', ['uses' => 'InstructionController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_instruction', ['uses' => 'InstructionController@search','middleware'=>'eprayoga']);

//subject

Route::post('/eprayoga/admin/create_subject', ['uses' => 'SubjectController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_subject', ['uses' => 'SubjectController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_subject', ['uses' => 'SubjectController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_subject_by_id', ['uses' => 'SubjectController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_subject', ['uses' => 'SubjectController@getAll']);

Route::post('/eprayoga/admin/activate_subject', ['uses' => 'SubjectController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_subject', ['uses' => 'SubjectController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_subject', ['uses' => 'SubjectController@deleteSubject','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_subjectall', ['uses' => 'SubjectController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_subject', ['uses' => 'SubjectController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_col_subject', ['uses' => 'SubjectController@getcol']);

Route::get('/eprayoga/admin/get_subject_list_client', ['uses' => 'SubjectController@getListclient','middleware'=>'eprayoga']);



//topic

Route::post('/eprayoga/admin/create_topic', ['uses' => 'TopicController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_topic', ['uses' => 'TopicController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_topic', ['uses' => 'TopicController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_topic_by_id', ['uses' => 'TopicController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_topic', ['uses' => 'TopicController@getAll']);

Route::post('/eprayoga/admin/delete_topicall', ['uses' => 'TopicController@deleteAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_topic', ['uses' => 'TopicController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_topic', ['uses' => 'TopicController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_topic', ['uses' => 'TopicController@deleteTopic','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_topic', ['uses' => 'TopicController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_coll_topic', ['uses' => 'TopicController@getcoll']);

Route::get('/eprayoga/admin/get_topic_list_client', ['uses' => 'TopicController@getListclient','middleware'=>'eprayoga']);

//category

Route::post('/eprayoga/admin/create_category', ['uses' => 'CategoryController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_category', ['uses' => 'CategoryController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_category', ['uses' => 'CategoryController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_category_by_id', ['uses' => 'CategoryController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_category', ['uses' => 'CategoryController@getAll']);
Route::post('/eprayoga/admin/activate_category', ['uses' => 'CategoryController@activate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/deactivate_category', ['uses' => 'CategoryController@deActivate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/disable_category', ['uses' => 'CategoryController@deleteCategory','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_allcategory', ['uses' => 'CategoryController@deleteAll','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/get_category_list', ['uses' => 'CategoryController@getList']);
Route::get('/eprayoga/admin/get_category_list_client', ['uses' => 'CategoryController@getListclient','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_category', ['uses' => 'CategoryController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_category_list_cust', ['uses' => 'CategoryController@getListCust']);


//schedule

Route::post('/eprayoga/admin/create_schedule', ['uses' => 'ScheduleController@save','middleware'=>'eprayoga']);


// Route::post('/eprayoga/admin/update_schedule', ['uses' => 'ScheduleController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_schedule', ['uses' => 'ScheduleController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_schedule_by_id', ['uses' => 'ScheduleController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_schedule', ['uses' => 'ScheduleController@getAll','middleware'=>'eprayoga']);


//re_schedule

// Route::post('/eprayoga/admin/create_re_schedule', ['uses' => 'ReScheduleController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_re_schedule', ['uses' => 'ReScheduleController@update','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_re_schedule', ['uses' => 'ReScheduleController@delete','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/get_re_schedule_by_id', ['uses' => 'ReScheduleController@getById','middleware'=>'eprayoga']);

// Route::get('/eprayoga/admin/get_all_re_schedule', ['uses' => 'ReScheduleController@getAll','middleware'=>'eprayoga']);

//customer

Route::post('/eprayoga/admin/create_customer', ['uses' => 'CustomersController@save']);

Route::post('/eprayoga/admin/update_customer', ['uses' => 'CustomersController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_customer', ['uses' => 'CustomersController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_customer_by_id', ['uses' => 'CustomersController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_customer', ['uses' => 'CustomersController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_customer', ['uses' => 'CustomersController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_customer', ['uses' => 'CustomersController@deActivate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/delete_customer_all', ['uses' => 'CustomersController@deleteAll','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/search_customer', ['uses' => 'CustomersController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_customer', ['uses' => 'CustomersController@getCust','middleware'=>'eprayoga']);

//client

Route::post('/eprayoga/admin/create_client', ['uses' => 'ClientController@save']);

Route::post('/eprayoga/admin/update_client', ['uses' => 'ClientController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_client', ['uses' => 'ClientController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_client_by_id', ['uses' => 'ClientController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_client', ['uses' => 'ClientController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_client', ['uses' => 'ClientController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_client', ['uses' => 'ClientController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_client', ['uses' => 'ClientController@deleteClient','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_client_all', ['uses' => 'ClientController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_client', ['uses' => 'ClientController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_client_id', ['uses' => 'ClientController@getClientId','middleware'=>'eprayoga']);



//client_group

Route::post('/eprayoga/admin/create_client_group', ['uses' => 'ClientGroupsController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_client_group', ['uses' => 'ClientGroupsController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_client_group', ['uses' => 'ClientGroupsController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_client_group_by_id', ['uses' => 'ClientGroupsController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_client_group', ['uses' => 'ClientGroupsController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_client_group', ['uses' => 'ClientGroupsController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_client_group', ['uses' => 'ClientGroupsController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_client_group', ['uses' => 'ClientGroupsController@deleteClientGroup','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_client_group_all', ['uses' => 'ClientGroupsController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_client_group', ['uses' => 'ClientGroupsController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_client_group', ['uses' => 'ClientGroupsController@selectClientGroup']);

//employee

Route::post('/eprayoga/admin/create_employee', ['uses' => 'EmployeeController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_employee', ['uses' => 'EmployeeController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_employee', ['uses' => 'EmployeeController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_employee_by_id', ['uses' => 'EmployeeController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_employee', ['uses' => 'EmployeeController@getAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_employee_promo', ['uses' => 'EmployeeController@getEmployee','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_employee', ['uses' => 'EmployeeController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_employee', ['uses' => 'EmployeeController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_employee', ['uses' => 'EmployeeController@deleteEmployee','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_employee_all', ['uses' => 'EmployeeController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_employee', ['uses' => 'EmployeeController@search','middleware'=>'eprayoga']);

//question _ Bank

Route::post('/eprayoga/admin/create_question_bank', ['uses' => 'QuestionBankController@saveQuestion','middleware'=>'eprayoga']);

// Route::get('/eprayoga/admin/get_all_questions', ['uses' => 'QuestionBankController@getAllQuestion','middleware'=>'eprayoga']);

// Route::get('/eprayoga/admin/get_all_question_and_answers', ['uses' => 'QuestionBankController@getAllQuestionAndAnswer','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/getAll_Question_Options', ['uses' => 'QuestionBankController@getAllQuestionAndOptions','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/get_qoptions_by_question_id', ['uses' => 'QuestionBankController@getOptionsByQuestionId','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/get_qanswers_by_question_id', ['uses' => 'QuestionBankController@getAnswersByQuestionId','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/create_bulk_question_option', ['uses' => 'QuestionBankController@saveBulkQuestionOption','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/create_bulk_question_answer', ['uses' => 'QuestionBankController@saveBulkQuestionAnswer','middleware'=>'eprayoga']);


// Route::post('/eprayoga/admin/create_question_option', ['uses' => 'QuestionBankController@saveQuestionOption','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/create_question_answer', ['uses' => 'QuestionBankController@saveQuestionAnswer','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_question_option', ['uses' => 'QuestionBankController@deleteQuestionOption','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_question_answer', ['uses' => 'QuestionBankController@deleteQuestionAnswer','middleware'=>'eprayoga']);

//================================================client_Type===================


Route::post('/eprayoga/admin/create_client_type', ['uses' => 'ClientTypeController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_client_type', ['uses' => 'ClientTypeController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_client_type', ['uses' => 'ClientTypeController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_client_type_by_id', ['uses' => 'ClientTypeController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_client_type', ['uses' => 'ClientTypeController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_client_type', ['uses' => 'ClientTypeController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_client_type', ['uses' => 'ClientTypeController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_client_type', ['uses' => 'ClientTypeController@deleteClientType','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_client_typeall', ['uses' => 'ClientTypeController@deleteAll','middleware'=>'eprayoga']);


Route::get('/eprayoga/admin/search_client_type', ['uses' => 'ClientTypeController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_client_type', ['uses' => 'ClientTypeController@selectClientType']);
//================================================file_Type===================


Route::post('/eprayoga/admin/create_file_type', ['uses' => 'FileTypeController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_file_type', ['uses' => 'FileTypeController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_file_type', ['uses' => 'FileTypeController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_file_type_by_id', ['uses' => 'FileTypeController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_file_type', ['uses' => 'FileTypeController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_file_type', ['uses' => 'FileTypeController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_file_type', ['uses' => 'FileTypeController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_file_type', ['uses' => 'FileTypeController@deletefileType','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_file_typeall', ['uses' => 'FileTypeController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_file_type', ['uses' => 'FileTypeController@search','middleware'=>'eprayoga']);
//===================================emp_department==================================//


Route::post('/eprayoga/admin/create_emp_department', ['uses' => 'EmpDepartmentController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_emp_department', ['uses' => 'EmpDepartmentController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_emp_department', ['uses' => 'EmpDepartmentController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_emp_department_by_id', ['uses' => 'EmpDepartmentController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_emp_department', ['uses' => 'EmpDepartmentController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_department', ['uses' => 'EmpDepartmentController@activate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/deactivate_department', ['uses' => 'EmpDepartmentController@deActivate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/disable_department', ['uses' => 'EmpDepartmentController@deleteDepartment','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/delete_emp_departmentall', ['uses' => 'EmpDepartmentController@deleteAll','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/search_department', ['uses' => 'EmpDepartmentController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_department', ['uses' => 'EmpDepartmentController@selectDept']);
//get subject by category id

Route::post('/eprayoga/admin/get_subject_by_category_id', ['uses' => 'SubjectController@getSubjecyByCategoryId','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_subject_by_category_id_cust', ['uses' => 'SubjectController@getSubjecyByCategoryIdCust']);


//get country by zone id

Route::post('/eprayoga/admin/get_country_by_zone_id', ['uses' => 'CountryController@getCountryByZoneId']);
//get state by country id

Route::post('/eprayoga/admin/get_state_by_country_id', ['uses' => 'StateController@getStateByCountryId']);

//get city by state id

Route::post('/eprayoga/admin/get_city_by_state_id', ['uses' => 'CityController@getCityByStateId']);

// Origin Type

Route::post('/eprayoga/admin/create_origin', ['uses' => 'OriginTypeController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_origin', ['uses' => 'OriginTypeController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_origin', ['uses' => 'OriginTypeController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_origin_by_id', ['uses' => 'OriginTypeController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_origin', ['uses' => 'OriginTypeController@getAll','middleware'=>'eprayoga']);

//Louis added 
Route::post('/eprayoga/admin/activate_origin', ['uses' => 'OriginTypeController@activate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/deactivate_origin', ['uses' => 'OriginTypeController@deActivate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/disable_origin', ['uses' => 'OriginTypeController@deleteOrigin','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/delete_originall', ['uses' => 'OriginTypeController@deleteAll','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/search_origin', ['uses' => 'OriginTypeController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_origin', ['uses' => 'OriginTypeController@selectOrigin','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/select_origin_type', ['uses' => 'OriginTypeController@selectOriginType']);


//Question Bank

Route::post('/eprayoga/admin/create_question_bank', ['uses' => 'QuestionBankController@saveQuestion','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_question_bank', ['uses' => 'QuestionBankController@updateQuestion','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_question', ['uses' => 'QuestionBankController@getAllQuestion','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/get_all_question_page', ['uses' => 'QuestionBankController@getpageQuestion','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_question_by_id', ['uses' => 'QuestionBankController@getQuestionById','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/get_qoptions_by_question_id', ['uses' => 'QuestionBankController@getOptionsByQuestionId','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/get_qanswers_by_question_id', ['uses' => 'QuestionBankController@getAnswersByQuestionId','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/create_bulk_question_option', ['uses' => 'QuestionBankController@saveBulkQuestionOption','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/create_bulk_question_answer', ['uses' => 'QuestionBankController@saveBulkQuestionAnswer','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/create_question_option', ['uses' => 'QuestionBankController@saveQuestionOption','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/create_question_answer', ['uses' => 'QuestionBankController@saveQuestionAnswer','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_question_option', ['uses' => 'QuestionBankController@deleteQuestionOption','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/delete_question_answer', ['uses' => 'QuestionBankController@deleteQuestionAnswer','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_question', ['uses' => 'QuestionBankController@deleteQuestion','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_question_alert', ['uses' => 'QuestionBankController@alertQuestion','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_question', ['uses' => 'QuestionBankController@activateQuestion','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_question', ['uses' => 'QuestionBankController@deActivateQuestion','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_questionall', ['uses' => 'QuestionBankController@deleteAll','middleware'=>'eprayoga']);

//get topic by subject id

Route::post('/eprayoga/admin/get_topic_by_subject_id', ['uses' => 'TopicController@getTopicBySubjectId']);

Route::get('/eprayoga/admin/search_question_bank', ['uses' => 'QuestionBankController@searchQuestion','middleware'=>'eprayoga']);


// Language

Route::post('/eprayoga/admin/create_language', ['uses' => 'LanguageController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_language', ['uses' => 'LanguageController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_language', ['uses' => 'LanguageController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_language_by_id', ['uses' => 'LanguageController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_language', ['uses' => 'LanguageController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_language', ['uses' => 'LanguageController@activate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/deactivate_language', ['uses' => 'LanguageController@deActivate','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/disable_language', ['uses' => 'LanguageController@deleteLanguage','middleware'=>'eprayoga']);
Route::post('/eprayoga/admin/delete_languageall', ['uses' => 'LanguageController@deleteAll','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/search_language', ['uses' => 'LanguageController@search','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/select_language', ['uses' => 'LanguageController@selectLanguage','middleware'=>'eprayoga']);

// pricing

Route::post('/eprayoga/admin/create_pricing', ['uses' => 'PricingController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/update_pricing', ['uses' => 'PricingController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_pricing', ['uses' => 'PricingController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_pricing_by_id', ['uses' => 'PricingController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_pricing', ['uses' => 'PricingController@getAll','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/activate_pricing', ['uses' => 'PricingController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_pricing', ['uses' => 'PricingController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_pricing', ['uses' => 'PricingController@deletePricing','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_pricingall', ['uses' => 'PricingController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_pricing', ['uses' => 'PricingController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_currency', ['uses' => 'CurrencyController@pricingcurrency','middleware'=>'eprayoga']);


// generic param

Route::post('/eprayoga/admin/create_genp', ['uses' => 'GenpController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_genp', ['uses' => 'GenpController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_genp', ['uses' => 'GenpController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_genp_by_id', ['uses' => 'GenpController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_genp', ['uses' => 'GenpController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_genp', ['uses' => 'GenpController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_genp', ['uses' => 'GenpController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/disable_genp', ['uses' => 'GenpController@deleteGenp','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_genpall', ['uses' => 'GenpController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_genp', ['uses' => 'GenpController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/render_all_question', ['uses' => 'QuestionBankController@renderQuestion','middleware'=>'eprayoga']);

Route::get('/eprayoga/user/get_all_product', ['uses' => 'ShoppingCartController@getAllProduct']);

Route::post('/eprayoga/admin/add_shopping_cart', ['uses' => 'ShoppingCartController@addShoppingCart','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/confirm_order', ['uses' => 'ShoppingCartController@confirmOrder','middleware'=>'eprayoga']);

Route::get('/eprayoga/user/get_all_performa', ['uses' => 'ShoppingCartController@getAllPerforma','middleware'=>'eprayoga']);

Route::get('/eprayoga/user/get_all_cart_details', ['uses' => 'ShoppingCartController@getAllCart','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/confirm_order_cart', ['uses' => 'ShoppingCartController@confirmCartOrder','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/disable_cart', ['uses' => 'ShoppingCartController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/generate_promo_code', ['uses' => 'ShoppingCartController@getPromoCode','middleware'=>'eprayoga']);

Route::get('/eprayoga/user/get_all_product_home', ['uses' => 'ShoppingCartController@getAllShopCart']);

Route::get('/eprayoga/admin/search_prod', ['uses' => 'ShoppingCartController@search']);

Route::post('/eprayoga/admin/get_searchresult', ['uses' => 'ShoppingCartController@getsearchresult']);
Route::get('/eprayoga/admin/get_cust_exam_cart', ['uses' => 'ShoppingCartController@getCustExam','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_cust_exam_cart1', ['uses' => 'ShoppingCartController@getCustExam1','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_cust_exam_cart2', ['uses' => 'ShoppingCartController@getCustExam2','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_cart_count', ['uses' => 'ShoppingCartController@getCartCount','middleware'=>'eprayoga']);


Route::get('/eprayoga/admin/get_sales_summary', ['uses' => 'ShoppingCartController@getSalesSummary','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_exam_summary', ['uses' => 'ShoppingCartController@getExamSummary','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_exam_cust_summary', ['uses' => 'ShoppingCartController@getExamCustSummary','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_examPerformanceClnt_summary', ['uses' => 'ShoppingCartController@getExamClntPerformanceSummary','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_examPerformanceCust_summary', ['uses' => 'ShoppingCartController@getExamCustPerformanceSummary','middleware'=>'eprayoga']);


//================================================Product catalog===================


Route::post('/eprayoga/admin/create_product_catalog', ['uses' => 'ProductCatalogController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_product_catalog', ['uses' => 'ProductCatalogController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_product_catalog', ['uses' => 'ProductCatalogController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_product_catalog_by_id', ['uses' => 'ProductCatalogController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_product_catalog', ['uses' => 'ProductCatalogController@getAll','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/activate_product_catalog', ['uses' => 'ProductCatalogController@activate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/deactivate_product_catalog', ['uses' => 'ProductCatalogController@deActivate','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/disable_product_catalog', ['uses' => 'ProductCatalogController@deletefileType','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_product_catalogall', ['uses' => 'ProductCatalogController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_product_catalog', ['uses' => 'ProductCatalogController@search','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/select_product_catalog', ['uses' => 'ProductCatalogController@selectId']);

Route::get('/eprayoga/user/select_userproductcatalog', ['uses' => 'ProductCatalogController@selectUserProduct']);

Route::get('/eprayoga/admin/get_exam_cart', ['uses' => 'ProductCatalogController@getExamCart','middleware'=>'eprayoga']);
Route::get('/eprayoga/admin/get_exam_cart_one', ['uses' => 'ProductCatalogController@getExamCartOne','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_exam_list_client', ['uses' => 'ProductCatalogController@getListclient','middleware'=>'eprayoga']);




Route::post('/eprayoga/user/exam_schedule', ['uses' => 'ScheduleController@save','middleware'=>'eprayoga']);
Route::post('/eprayoga/user/exam_reschedule', ['uses' => 'ScheduleController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/user/get_reschedule_by_id', ['uses' => 'ScheduleController@getRescheduleId','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/upload', ['uses' => 'FileController@upload','middleware'=>'eprayoga']);

Route::post('/eprayoga/user/get_schedule_time', ['uses' => 'ScheduleController@getScheduleTime','middleware'=>'eprayoga']);


//================================================ tax ===================


// Route::get('/eprayoga/admin/get_all_tax_by_id', ['uses' => 'ProductCatalogController@getTax','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/create_exam_design', ['uses' => 'ExamDesignController@save','middleware'=>'eprayoga']);


Route::post('/eprayoga/admin/update_exam_design', ['uses' => 'ExamDesignController@update','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_exam_design', ['uses' => 'ExamDesignController@delete','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/get_exam_design_by_id', ['uses' => 'ExamDesignController@getById','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_all_exam_design', ['uses' => 'ExamDesignController@getAll','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/activate_exam_design', ['uses' => 'ExamDesignController@activate','middleware'=>'eprayoga']);

// Route::post('/eprayoga/admin/deactivate_exam_design', ['uses' => 'ExamDesignController@deActivate','middleware'=>'eprayoga']);

Route::post('/eprayoga/admin/delete_exam_design_all', ['uses' => 'ExamDesignController@deleteAll','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/search_exam_design', ['uses' => 'ExamDesignController@search','middleware'=>'eprayoga']);



Route::get('/eprayoga/admin/search_employee_pc', ['uses' => 'EmployeeController@searchEmp','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_pc_exam_details', ['uses' => 'ProductCatalogController@getExamDetails','middleware'=>'eprayoga']);   

Route::post('/eprayoga/admin/pc_to_employee', ['uses' => 'PromoController@save','middleware'=>'eprayoga']);

Route::post('/eprayoga/user/get_search_promocode', ['uses' => 'ShoppingCartController@searchPromocode','middleware'=>'eprayoga']);
Route::post('/eprayoga/user/allocate_promocode_exam', ['uses' => 'ShoppingCartController@allocatePromocode','middleware'=>'eprayoga']);

Route::post('/eprayoga/user/get_exam_result', ['uses' => 'ShoppingCartController@examResult','middleware'=>'eprayoga']);

Route::get('/eprayoga/admin/get_customer_count', ['uses' => 'CustomersController@getCount']); 

Route::get('/eprayoga/admin/get_client_count', ['uses' => 'ClientController@getEnroll']); 


Route::post('/eprayoga/user/sendingmail', ['uses' => 'QuestionBankController@sendingMail','middleware'=>'eprayoga']);

Route::post('/eprayoga/user/downscorecard', ['uses' => 'QuestionBankController@scorecard','middleware'=>'eprayoga']);



?>
 
