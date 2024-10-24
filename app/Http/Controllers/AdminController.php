<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Member;
use App\Models\User;
use App\Models\Account;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use DateTime;
use DB;
use Session;
use DataTables;

class AdminController extends Controller
{
    public function dashboard()
    {

        $pageTitle = 'Dashboard';
        $total_enquiry = Enquiry::all()->count();
        $invoices = Account::where('month', date('F'))->get();
        $Members = Member::whereYear('created_at',date('Y'))->get();

        $totalMembers = count($Members);
        $Total_revenue = $invoices->sum('paid_amount');

        $accounts = DB::table('accounts')
        ->join('members', 'accounts.member_id', '=', 'members.id')
    ->select('accounts.package', 'members.name','accounts.due_date','accounts.join_date')->get();
        
        return view('admin.dashboard', compact('pageTitle','total_enquiry','Total_revenue','totalMembers','accounts')); 
    }

    public function get_dashbord_data()
    {
        

        $girls = [];
        $boys = [];
        $other = [];

        $months = array(
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December',
        );

        for($i=0; $i <= 11; $i++)
        {
            $fcount = Member::where('join_month', $months[$i])->where('gender','Male')->count();
            $mcount = Member::where('join_month', $months[$i])->where('gender','Female')->count();
            $Ocount = Member::where('join_month', $months[$i])->where('gender','Other')->count();

            $girls[] = $fcount;
            $boys[] = $mcount;
            $other[] = $Ocount;

        }

        $data = [
          'girls' => $girls,
          'boys' => $boys,
          'other' => $other,
          'months' => $months
        ];

        return response()->json($data);
    }

    
    public function add_member()
    {
        $pageTitle = 'Add Member';
        $members = Member::all();
        return view('admin.add_member', compact('pageTitle','members')); 
    }

    public function create_action(Request $req)
    {
        $req->validate([
            'name' => 'required',  
        'mobile' => 'required|min:11|numeric',
        'address' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'payable_amount' => 'required',
        'discount' => 'required',
        'total_amount' => 'required',
        'paid_amount' => 'required',
        'balance_amount' => 'required|gte:0'
        ]);
        
        $member = new Member();
        $member->name = $req->name;
        $member->join_date = $req->join_date;
        $member->join_month = date("F",$req->join_month);
        $member->join_year = date("Y",$req->join_year);
   
        $member->mobile = $req->mobile;
        $member->alt_mobile = $req->alt_mobile;
        
        if($req->reference_type == 1)
        {
            $member->refference_id = $req->refference_id;
        }
        if($req->reference_type == 0){
            $member->refference_name = $req->refference_name;
        }
        
        $member->reference_type = $req->reference_type;
        $member->address = $req->address;
        $member->dob = $req->dob;

        if(!empty($req->dob)){
            $from = new DateTime($req->dob);
$to   = new DateTime('today');
$member->age = $from->diff($to)->y;
           
        }
      
        $member->gender = $req->gender;
        $member->email = $req->email;
        $member->pre_booked = $req->pre_booked;
        $member->created_by = auth()->user()->id;

        $member->save();

        $account = new Account();
        $account->member_id = $member->id;
        $account->month = date("F",$req->join_month);
        $account->year = date("Y",$req->join_year);
        $account->package = $req->package;
        $account->type = $req->type;
        $account->payable_amount = $req->payable_amount;
        $account->discount = $req->discount;
        $account->total_amount = $req->total_amount;
        $account->paid_amount = $req->paid_amount;
        $account->pay_mode = $req->pay_mode;
        $account->balance_amount = $req->balance_amount;
        $account->join_date = $req->join_date;

        if($req->package == '1 Month')
        {
        $due_date = date('Y-m-d',strtotime($req->join_date. ' + 1 months'));
        }
        if($req->package == '3 Month')
        {
        $due_date =  date('Y-m-d',strtotime($req->join_date. ' + 3 months'));
        }
        if($req->package == '6 Month')
        {
        $due_date = date('Y-m-d',strtotime($req->join_date. ' + 6 months'));
        }
        if($req->package == '12 Month')
        {
        $due_date = date('Y-m-d',strtotime($req->join_date. ' + 12 months'));
        }

        $account->due_date = $due_date;
        $account->created_by = auth()->user()->id;
        $account->updated_by = auth()->user()->id;

        $account->save();

        Member::where("id", $member->id)->update(["current_plan_id" => $account->id]);

        return redirect()->route('admin.edit_member',[$member->id])->with('success', 'Successfully Added.');

    }

    public function profile()
    {
        $pageTitle = 'Admin Profile';
        return view('admin.profile', compact('pageTitle')); 
    }

    public function update_profile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->designation = $request->designation;

        $user->save();
        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required',
            'renewpassword' => 'required',
        ]);

        // Check if the current password matches the one in the database
        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->with('error', 'Current password did not match!');
        }

        // Update the password in the database
        Auth::user()->update([
            'password' => Hash::make($request->renewpassword),
        ]);

        return  back()->with('success', 'Password changed successfully!');
    }

    public function edit_member($id)
    {
        $member = Member::findOrFail($id);
        $pageTitle = 'Edit Members Details';
        $receipts = Account::where('member_id',$id)->get();
        return view('admin.edit_member', compact('pageTitle','member','receipts')); 
    }

    public function continue_member($id)
    {
        $pageTitle = 'Add Member';
        $member = Enquiry::findOrFail($id);
        $members = Member::all();

        $notification = Notification::where('inquiry_id',$id)->first();
        $notification->status = 0;
        $notification->save();
        return view('admin.continue', compact('pageTitle','member','members')); 
    }

    public function update_action(Request $req, $id)
    {
        $member = Member::findOrFail($id);
        $member->name = $req->name;
        $member->join_date = $req->join_date;
        $member->join_month = date("F",$req->join_month);
        $member->join_year = date("Y",$req->join_year);
        $member->package = $req->package;
        $member->type = $req->type;
        $member->mobile = $req->mobile;
        $member->alt_mobile = $req->alt_mobile;
        
        if($req->reference_type == 1)
        {
            $member->refference_id = $req->refference_id;
            $member->refference_name = Null;
        }
        if($req->reference_type == 0){
            $member->refference_name = $req->refference_name;
            $member->refference_id = Null;
        }
        
        $member->reference_type = $req->reference_type;
        $member->address = $req->address;
        $member->dob = $req->dob;

        if(!empty($req->dob)){
            $from = new DateTime($req->dob);
$to   = new DateTime('today');
$member->age = $from->diff($to)->y;
           
        }
      
        $member->gender = $req->gender;
        $member->email = $req->email;
        $member->pre_booked = $req->pre_booked;
        $member->created_by = auth()->user()->id;
        $member->save();

        return back()->with('success', 'Successfully Updated.');
    }

    public function clear_notification()
    {
        $nitification = Notification::where('status', 1)->update(['status' => 0]);

        return response()->json([ 'success' => 'Cleared all notifications !' ]);
    }

    public function all_member()
    {
        $pageTitle = 'All Members';
        // $members = Member::all();

        $members = DB::table('members')
        ->join('accounts', 'members.current_plan_id', '=', 'accounts.id')
    ->select('members.*', 'accounts.membership_status','accounts.join_date as renew_date','accounts.due_date')->orderBy('members.id', 'DESC')->get();
        return view('admin.all_member', compact('pageTitle','members'));
    }

    public function ajax_manage_all_member(Request $request)
    {

        if ($request->ajax()) {
            
    
                $data = DB::table('members')
                ->join('accounts', 'members.current_plan_id', '=', 'accounts.id')
                ->select('members.*', 'accounts.membership_status','accounts.join_date as renew_date','accounts.due_date')->orderBy('members.id', 'DESC'); 
        
                if ($request->has('status') && $request->status != '') {
                    $data->where('accounts.membership_status', $request->status);
                }

                if ($request->has('gender') && $request->gender != '') {
                    $data->where('members.gender', $request->gender);
                }
        
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'. route('admin.edit_member',[$row->id]) .'" class="btn btn-success">Edit</a>';
                    return $btn;
                })
                ->addColumn('join_date', function ($user) {
                    $date = date('d-M-Y ',strtotime($user->join_date));
                    return $date;
                })
                ->addColumn('membership_status', function ($user) {
                    return $user->membership_status ? '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Active </span>' : '<span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Expired</span>';
                })
                ->addColumn('due_date', function ($user) {
                    $date = date('d-M-Y ',strtotime($user->due_date));
                    return $date;
                })
           
                ->rawColumns(['action','membership_status'])
                ->make(true);
        }

        return abort(403, 'Unauthorized action.');
    }


    public function  enquiry()
    {

        $enquiry = DB::table('enquiries')
        ->join('notifications', 'enquiries.id', '=', 'notifications.inquiry_id')
    ->select('enquiries.*', 'notifications.status as new')->orderBy('enquiries.id', 'DESC')->get();
    
        $pageTitle = 'All Enquiries';
        return view('admin.enquiry', compact('pageTitle','enquiry')); 
    }

    public function  revenue()
    {
        $pageTitle = 'Revenue';
        return view('admin.revenue', compact('pageTitle')); 
    }

    public function  dfc()
    {
        $pageTitle = 'DFC Register';
        return view('admin.dfc', compact('pageTitle')); 
    }

    public function  receipt($mid,$id)
    {
        $pageTitle = 'Receipt';
        $member = Member::findOrFail($mid);
        $bill = Account::where('member_id',$mid)->where('id',$id)->first();
        return view('admin.receipt', compact('pageTitle','bill','member')); 
    }
    


}
