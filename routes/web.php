<?php

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
//
Route::get('/', function () {
    return redirect('/introduce');
});
Route::get('/introduce', 'ControllerIntroduce@getIntroduce')->name('getIntroduce');
Route::get('/cat/{id_category}', 'ControllerLvCategory@getCategoryList')->name('getCategoryList');
Route::get('/cat/{id_category}/{id_posts}', 'ControllerLvPosts@getPosts')->name('getPosts');
Route::get('/hline', 'ControllerHlineItems@getHline')->name('getHline');
Route::get('/search', 'ControllerSearchItems@getSearch')->name('getSearch');
Route::get('/contact', 'ControllerContact@getContact')->name('getContact');
Route::get('/static-posts', 'ControllerStaticPosts@getStaticPosts')->name('getStaticPosts');
Route::get('/form', 'ControllerClientForm@getClientForm')->name('getClientForm');
//MAIL
Route::post('/send_mail', 'ControllerSendMail@postSendMail')->name('postSendMail');
Route::get('/thank-you', 'ControllerThanks@getThanks')->name('getThanks');
//
Route::get('/login', 'ControllerUserLogin@getLogin')->name('login');
Route::post('/login', 'ControllerUserLogin@postLogin')->name('postLogin');
Route::get('/logout', 'ControllerUserLogout@getLogout')->name('getLogout');
Route::get('/user/repasswd', 'ControllerUserRePasswd@getRePasswd')->name('getRePasswd');
Route::post('/user/repasswd', 'ControllerUserRePasswd@postRePasswd')->name('postRePasswd');

Route::group(['middleware' => ['auth']], function () {
    //CMS
    //welcome and roll back
    Route::get('/cms/welcome', 'ControllerCmsWelcome@getCmsWelcome')->name('getCmsWelcome');
    Route::get('/cms/roll_back', 'ControllerCmsRollBack@getCmsRollBack')->name('getCmsRollBack');
    //Cms User
    Route::get('/cms/User/List', 'ControllerCmsUser@getCmsUserList')->name('getCmsUserList');
    Route::get('/cms/User/Add', 'ControllerCmsUser@getCmsUserAdd')->name('getCmsUserAdd');
    Route::post('/cms/User/Add', 'ControllerCmsUser@postCmsUserAdd')->name('postCmsUserAdd');
    Route::get('/cms/User/Edit', 'ControllerCmsUser@getCmsUserEdit')->name('getCmsUserEdit');
    Route::post('/cms/User/Edit', 'ControllerCmsUser@postCmsUserEdit')->name('postCmsUserEdit');
    Route::post('/cms/User/Delete', 'ControllerCmsUser@postCmsUserDelete')->name('postCmsUserDelete');
    
    Route::get('/cms/User/Role', 'ControllerCmsUser@getCmsUserRole')->name('getCmsUserRole');
    Route::get('/cms/User/Role/Add', 'ControllerCmsUser@getCmsUserRoleAdd')->name('getCmsUserRoleAdd');
    Route::post('/cms/User/Role/Add', 'ControllerCmsUser@postCmsUserRoleAdd')->name('postCmsUserRoleAdd');
    Route::get('/cms/User/Role/Edit', 'ControllerCmsUser@getCmsUserRoleEdit')->name('getCmsUserRoleEdit');
    //Cms Recruitment
    Route::get('/cms/Recruitment/List', 'ControllerCmsRecruiment@getCmsRecruimentList')->name('getCmsRecruimentList');
    Route::get('/cms/Recruitment/Files', 'ControllerCmsRecruiment@getCmsRecruimentFiles')->name('getCmsRecruimentFiles');
    //Cms Admissions
    Route::get('/cms/Admissions/List', 'ControllerCmsAdmissions@getCmsAdmissionsList')->name('getCmsAdmissionsList');
    
    Route::get('/cms/Admissions/EditForm', 'ControllerCmsAdmissions@getCmsAdmissionsEditForm')->name('getCmsAdmissionsEditForm');
    Route::post('/cms/Admissions/EditForm', 'ControllerCmsAdmissions@postCmsAdmissionsEditForm')->name('postCmsAdmissionsEditForm');
    
    Route::get('/cms/Admissions/Files', 'ControllerCmsAdmissions@getCmsAdmissionsFiles')->name('getCmsAdmissionsFiles');
    //Cms Posts
    Route::get('/cms/Posts/List', 'ControllerCmsPosts@getCmsPostsList')->name('getCmsPostsList');
    Route::get('/cms/Posts/Events-and-news', 'ControllerCmsPosts@getCmsPostsNewsList')->name('getCmsPostsNewsList');
    
    Route::get('/cms/Posts/Events-and-news-Edit', 'ControllerCmsPosts@getCmsPostsNewsEdit')->name('getCmsPostsNewsEdit');
    Route::post('/cms/Posts/Events-and-news-Edit', 'ControllerCmsPosts@postCmsPostsNewsEdit')->name('postCmsPostsNewsEdit');
   
    Route::get('/cms/Posts/Events-and-news-Add', 'ControllerCmsPosts@getCmsPostsNewsAdd')->name('getCmsPostsNewsAdd');
    Route::post('/cms/Posts/Events-and-news-Add', 'ControllerCmsPosts@postCmsPostsNewsAdd')->name('postCmsPostsNewsAdd');
    //
    Route::get('/cms/Posts/Present', 'ControllerCmsPostsPresent@getCmsPostsPresentList')->name('getCmsPostsPresentList');
    Route::get('/cms/Posts/Present-Add', 'ControllerCmsPostsPresent@getCmsPostsPresentAdd')->name('getCmsPostsPresentAdd');
    Route::post('/cms/Posts/Present-Add', 'ControllerCmsPosts@postCmsPostsNewsAdd')->name('postCmsPostsNewsAdd');
    
    Route::get('/cms/Posts/Present-Edit', 'ControllerCmsPosts@getCmsPostsNewsEdit')->name('getCmsPostsNewsEdit');
    Route::post('/cms/Posts/Present-Edit', 'ControllerCmsPosts@postCmsPostsNewsEdit')->name('postCmsPostsNewsEdit');
    //
    Route::get('/cms/Posts/Programs', 'ControllerCmsPostsPrograms@getCmsPostsProgramsList')->name('getCmsPostsProgramsList');
    Route::get('/cms/Posts/Programs-Add', 'ControllerCmsPostsPrograms@getCmsPostsProgramsAdd')->name('getCmsPostsProgramsAdd');
    Route::post('/cms/Posts/Programs-Add', 'ControllerCmsPosts@postCmsPostsNewsAdd')->name('postCmsPostsNewsAdd');
    
    Route::get('/cms/Posts/Programs-Edit', 'ControllerCmsPosts@getCmsPostsNewsEdit')->name('getCmsPostsNewsEdit');
    Route::post('/cms/Posts/Programs-Edit', 'ControllerCmsPosts@postCmsPostsNewsEdit')->name('postCmsPostsNewsEdit');
    //
    Route::get('/cms/Posts/Enrollment-Information', 'ControllerCmsPostsEnrollmentInformation@getCmsPostsEnrollmentInformationList')->name('getCmsPostsEnrollmentInformationList');
    Route::get('/cms/Posts/Enrollment-Information-Add', 'ControllerCmsPostsEnrollmentInformation@getCmsPostsEnrollmentInformationAdd')->name('getCmsPostsEnrollmentInformationAdd');
    Route::post('/cms/Posts/Enrollment-Information-Add', 'ControllerCmsPosts@postCmsPostsNewsAdd')->name('postCmsPostsNewsAdd');
    
    Route::get('/cms/Posts/Enrollment-Information-Edit', 'ControllerCmsPosts@getCmsPostsNewsEdit')->name('getCmsPostsNewsEdit');
    Route::post('/cms/Posts/Enrollment-Information-Edit', 'ControllerCmsPosts@postCmsPostsNewsEdit')->name('postCmsPostsNewsEdit');
    //
    Route::get('/cms/Posts/Recruitment', 'ControllerCmsPostsRecruitment@getCmsPostsRecruitmentList')->name('getCmsPostsRecruitmentList');
    Route::get('/cms/Posts/Recruitment-Add', 'ControllerCmsPostsRecruitment@getCmsPostsRecruitmentAdd')->name('getCmsPostsRecruitmentAdd');
    Route::post('/cms/Posts/Recruitment-Add', 'ControllerCmsPosts@postCmsPostsNewsAdd')->name('postCmsPostsNewsAdd');
    
    Route::get('/cms/Posts/Recruitment-Edit', 'ControllerCmsPosts@getCmsPostsNewsEdit')->name('getCmsPostsNewsEdit');
    Route::post('/cms/Posts/Recruitment-Edit', 'ControllerCmsPosts@postCmsPostsNewsEdit')->name('postCmsPostsNewsEdit');
    //
    //message
    Route::get('/cms/Posts/Message', 'ControllerCmsPostsMessage@getCmsPostsMessageList')->name('getCmsPostsMessageList');
    Route::get('/cms/Posts/Message-Edit', 'ControllerCmsPostsMessage@getCmsPostsMessageEdit')->name('getCmsPostsMessageEdit');
    Route::post('/cms/Posts/Message-Edit', 'ControllerCmsPostsMessage@postCmsPostsMessageEdit')->name('postCmsPostsMessageEdit');
    
    //static posts
    Route::get('/cms/Posts/Static-Posts', 'ControllerCmsPostsStaticPosts@getCmsPostsStaticPostsList')->name('getCmsPostsStaticPostsList');
    Route::get('/cms/Posts/Static-Posts-Edit-Contact', 'ControllerCmsPostsStaticPosts@getCmsPostsMessageEdit')->name('getCmsPostsMessageEdit');
    Route::post('/cms/Posts/Static-Posts-Edit-Contact', 'ControllerCmsPostsStaticPosts@postCmsPostsMessageEdit')->name('postCmsPostsMessageEdit');
    
    //
    Route::get('/user/welcome', 'ControllerUserWelcome@getUserWelcome')->name('getUserWelcome');
    Route::get('/user/setting', 'ControllerUserSetting@getUserSetting')->name('getUserSetting');
    Route::post('/user/setting', 'ControllerUserSetting@postUserSetting')->name('postUserSetting');
});
