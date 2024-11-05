<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Notification;

class UserController extends Controller
{
    public function index()
    {
        $pageTitle = 'Home';
        if(Auth::user()) {
    return view('users.index',compact('pageTitle'));
        } else {
            return view('admin.coming_soon',compact('pageTitle'));
        }
    }

    public function bmi_calculator()
    {
        $pageTitle = 'BMI Calculator';
    return view('users.bmi_calculator',compact('pageTitle'));
    }

    public function services()
    {
        $pageTitle = 'Services';
        return view('users.services',compact('pageTitle'));
    }

public function our_team()
{
    $pageTitle = 'Our Team';
    return view('users.our_team',compact('pageTitle'));
}
public function contact()
{
    $pageTitle = 'Contact Us';
    return view('users.contact',compact('pageTitle'));
}

public function about()
{
    $pageTitle = 'About Us';
    return view('users.about',compact('pageTitle'));
}

public function gallery()
{
    $pageTitle = 'Gallery';
    return view('users.gallery',compact('pageTitle'));
}

public function rules()
{
    $pageTitle = 'Rules';
    return view('users.rules',compact('pageTitle')); 
}

public function policies()
{
    $pageTitle = "Our Policies";
    return view('users.policies',compact('pageTitle'));
}


public function enquiry(Request $req)
{
    $enquiry = new Enquiry();
    $enquiry->name = $req->name;
    $enquiry->mobile = $req->mobile;
    $enquiry->age = $req->age;
    $enquiry->month = date('F');
    $enquiry->year = date('Y');
    $enquiry->address = $req->address;

    $enquiry->save();

    $notify = new Notification();
    $notify->notification_type = 'enquiry';
    $notify->inquiry_id = $enquiry->id;
    $notify->heading = 'Enquiry Request';
    $notify->message = $req->name.' showing interest to know about the Gym !';
    $notify->status = 1;
    $notify->save();
    return back()->with('success', 'We have received your request. Soon our expert will contact you.');
}

}
