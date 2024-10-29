<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Member;
use App\Models\User;
use App\Models\Bill;
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
            $fcount = Member::where('join_month', $months[$i])->where('gender','Female')->count();
            $mcount = Member::where('join_month', $months[$i])->where('gender','Male')->count();
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
        $account->pay_method = $req->pay_method;
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

        $data = $req->only('heads', 'amount');
$maxValue = Bill::max('receipt_no');
    foreach ($data['heads'] as $index => $value) {
        $bill = new Bill();
        $bill->receipt_no = $maxValue+1;
            $bill->member_id = $member->id;
            $bill->account_id = $account->id;
            $bill->head = $data['heads'][$index];
            $bill->amount = $data['amount'][$index];
            $bill->generated_by = auth()->user()->id;
        $bill->save();
    }

        Member::where("id", $member->id)->update(["current_plan_id" => $account->id, 'biometric' => (date('Y').date('m').$member->id)]);

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

    public function fees_structure()
    {
        $pageTitle = 'Fees Stucture';
         $feehead = FeeHead::where('is_deleted',0)->get();
        return view('admin.fee_heads', compact('pageTitle','feehead'));
    }

    public function add_fees_structure(Request $request)
    {
        $request->validate([
            'head' => 'required',
            'amount' => 'required',
        ]);

        $fee = new FeeHead();
        $fee->head = $request->head;
        $fee->price = $request->amount;
        $fee->description = $request->description;
        $fee->year = $request->year;
         $fee->package = $request->package;
          $fee->membership_type = $request->type;
        $fee->created_by = auth()->user()->id;
        $fee->save();
        return back()->with('success', 'Successfully Added.');
    }

    public function ajax_manage_feehead(Request $request)
    {
          if ($request->ajax()) {


                $data = DB::table('fee_heads');
                $data->where('is_deleted',0);

                if ($request->has('year') && $request->year != '') {
                    $data->where('year', $request->year);
                }
                if ($request->has('package') && $request->package != '') {
                    $data->where('package', $request->package);
                }
                if ($request->has('type') && $request->type != '') {
                    $data->where('membership_type', $request->type);
                }


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                 $btn = '
                  <div class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Action</span>
          </a>
                 <ul class="dropdown-menu">
            <li>

              <button class="dropdown-item d-flex align-items-center text-danger" onclick="is_delete('.$row->id.')">Delete</button>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center text-success" onclick="openModalButton('.$row->id.')">
                    Edit
                </button>
            </li>
          </ul> </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return abort(403, 'Unauthorized action.');
    }

    public function delete_fees_structure(Request $request)
    {

        $fee = FeeHead::findOrFail($request->id);
        $fee->is_deleted = 1;
        $fee->deleted_by = auth()->user()->id;
        $fee->save();

          return response()->json([ 'success' => 'Deleted Successfully !' ]);
    }
    public function member_attendance()
    {
        $pageTitle = 'Member Attendance';
        return view('admin.dfc', compact('pageTitle'));
    }

    public function get_fees_structure(Request $request)
    {
        $fee = FeeHead::findOrFail($request->id);
        return response()->json([ 'data' => $fee ]);
    }

    public function update_fees_structure(Request $request)
    {
        $fee = FeeHead::findOrFail($request->id);
        $fee->head = $request->head;
        $fee->price = $request->price;
        $fee->description = $request->description;
        $fee->year = $request->year;
        $fee->package = $request->package;
        $fee->membership_type = $request->membership_type;
        $fee->save();
        return response()->json([ 'data' => 'Successfully Updated !' ]);
    }

    public function allot_fees_structure(Request $request)
    {
        $fee = FeeHead::where('package',$request->package)->where('membership_type',$request->membership_type)->get();
        $table = '<table class="table table-bordered text-center mt20_n_b1" id="dynamicTable">
                        <thead>
                            <tr>
                            <th>Sr</th>
                            <th>Fee Head</th>
                            <th>Fee Amount</th>
                            <th>Fee Paid</th>
                            <th>Remove</th>
                        </tr>
                         </thead>
                        <tbody>
                        ';
                        $i=1;
                        foreach ($fee as $value) {
                        $table .= '<tr class="dynamic-row">
                        <td class="sr-no">'.$i++.'</td>
                            <td><input type="text" name="heads[]" value="'.$value->head.'" class="form-control heads_total"></td>
                            <td><input type="text" name="amount[]" value="'.$value->price.'" class="form-control amount_total"></td>
                            <td><input type="text" name="paid[]" value="'.$value->price.'" class="form-control paid_total"></td>
                            <td><button class="removeRow btn btn-danger"> X </button></td>
                        </tr>';
                        }
                    $table .='</tbody></table>';
         return response()->json([ 'table' => $table ]);
    }

}