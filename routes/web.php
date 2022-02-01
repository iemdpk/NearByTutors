<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();


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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/AuthLogin', function (Request $req) {
    $username = $req -> username;
    $password = $req -> password;
    
    // $users = DB::select("INSERT INTO `blogs` (`id`, `heading_1`, `sub_heading_2`, `sub_heading_3`, `sub_heading_4`) VALUES (NULL, 'work', 'asd', '', 'asd');");

    if($username == 'admin' && $password == 'admin'){
        // echo "You Enter Correct PAssword";

        $_SESSION['username'] = $username;
        echo "<script>window.location.href = '/Dashboard'</script>";
    }
    else{
        echo "<script>alert('You Enter Incorrect Password')</script>";
    }

    // print_r($req->input());
   
});



Route::get('/Dashboard', function () {
    if(isset($_SESSION['username'])){
        return view('dashboard');
    }
    else{
        echo "<script>alert('You are not Login Please Login First')</script>";
        echo "<script>window.location.href = '/'</script>";
    }
});

Route::get('/newClient',function(){
    return view("newClient");
});


Route::get('/newTutor',function(){
    return view("newTutor");
});

Route::post('/tutoregister1',function(Request $req){

    // name,dob,gender,alt_contact,permanent_housenum,permanent_landmark,permanent_area,permanent_pincode,billingtoo,current_housenum,
    // current_landmark,current_area,current_pincode,qualification,experience,fees,vehicle,mode

    $name = $req -> name;
    $dob = $req -> dob;
    $gender = $req -> gender;
    $alt_contact = $req -> alt_contact;
    $permanent_housenum = $req -> permanent_housenum;
    $permanent_landmark = $req -> permanent_landmark;
    $permanent_area = $req -> permanent_area;
    $permanent_pincode = $req -> permanent_pincode;
    $billingtoo = $req -> billingtoo;
    $current_housenum = $req -> current_housenum;
    $current_landmark = $req -> current_landmark;
    $current_area = $req -> current_area;
    $current_pincode = $req -> current_pincode;
    $qualification = $req -> qualification;
    $experience = $req -> experience;
    $fees = $req -> fees;
    $vehicle = $req -> vehicle;
    $mode = $req -> mode;

    // $users = DB::select("INSERT INTO `Tutors` (`id`, `name`, `dob`, `gender`, `alt_contact`, `permananet_housenum`, `permanent_landmark`, `permanent_area`, `permanent_pincode`, `billingtoo`, `current_housenum`, `current_landmark`, `current_area`, `current_pincode`, `qualification`, `experience`, `fees`, `vehicle`, `mode`) VALUES (NULL, '$name', '$dob', '$gender', '$alt_contact', '$permanent_housenum', '$permanent_landmark', '$permanent_area', '$permanent_pincode', '$billingtoo', '$current_housenum', '$current_landmark', '$current_area', '$current_pincode', '$qualification', '$experience', '$fees', '$vehicle', '$mode')");

    $check = DB::select("INSERT INTO `Tutors` (`id`, `name`, `dob`, `gender`, `alt_contact`, `permananet_housenum`, `permanent_landmark`, `permanent_area`, `permanent_pincode`, `billingtoo`, `current_housenum`, `current_landmark`, `current_area`, `current_pincode`, `qualification`, `experience`, `fees`, `vehicle`, `mode`) VALUES(NULL, '$name', '$dob', '$gender', '$alt_contact', '$permanent_housenum', '$permanent_landmark', '$permanent_area', '$permanent_pincode', '$billingtoo', '$current_housenum', '$current_landmark', '$current_area', '$current_pincode', '$qualification', '$experience', '$fees', '$vehicle', '$mode')");

    // echo "INSERT INTO `Tutors` (`id`, `name`, `dob`, `gender`, `alt_contact`, `permananet_housenum`, `permanent_landmark`, `permanent_area`, `permanent_pincode`, `billingtoo`, `current_housenum`, `current_landmark`, `current_area`, `current_pincode`, `qualification`, `experience`, `fees`, `vehicle`, `mode`) VALUES(NULL, '$name', '$dob', '$gender', '$alt_contact', '$permanent_housenum', '$permanent_landmark', '$permanent_area', '$permanent_pincode', '$billingtoo', '$current_housenum', '$current_landmark', '$current_area', '$current_pincode', '$qualification', '$experience', '$fees', '$vehicle', '$mode')";

    return view('newTutor2');
});

Route::post('/tutoregister3',function(Request $req){

    $course = $req -> courses;

    $subject = $req -> $course;

    return "Tutor is Added";
    
});