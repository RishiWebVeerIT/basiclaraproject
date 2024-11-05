<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Offer;
use App\Models\Account;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
class FeeController extends Controller
{
    public function outstanding($account_no)
    {
        $pageTitle = 'Pay Outstanding';
        $offers = Offer::where('status',1)->get();
        $maxValue = Bill::where('account_id', $account_no)->max('receipt_no');
        $bills = DB::table('bills')
        ->where('account_id', $account_no)
        ->where('receipt_no', $maxValue)
        ->join('accounts', 'bills.account_id', '=', 'accounts.id')
        ->join('members', 'bills.member_id', '=', 'members.id')
        ->select('members.name', 'members.id as mem_id','accounts.total_amount','accounts.payable_amount','accounts.paid_amount as total_paid_amount','accounts.balance_amount','bills.*','accounts.id as acc_id','accounts.package','accounts.type','accounts.month','accounts.year')->get();
        return view('admin.outstanding', compact('pageTitle','bills','offers','account_no'));  
    }
    public function upgrade($member_id)
    {
      $pageTitle = 'Add New Plan';
      $offers = Offer::where('status',1)->get();
      $member = Member::where('id', $member_id)->first();
      return view('admin.add_plan', compact('pageTitle','offers','member'));
    }
    public function pay_outstanding(Request $request)
    {
      $maxReceiptNo = Bill::where('account_id', $request->account_no)->max('receipt_no');
      $bills = DB::table('bills')
      ->where('receipt_no', $maxReceiptNo)
        ->where('account_id', $request->account_no)->get();

        $data = $request->only('pay');
        $maxValue = Bill::max('receipt_no');
        $maxinstallment_no = Bill::where('account_id', $request->account_no)->max('installment_no');
        for ($i = 0; $i < count($bills); $i++)
        {
          $last_bill = Bill::find($bills[$i]->id);
          $bill = new Bill();
          $bill->receipt_no = $maxValue+1;
            $bill->member_id = $last_bill->member_id;
            $bill->account_id = $last_bill->account_id;
            $bill->head = $last_bill->head;
            $bill->installment_no = $maxinstallment_no+1;
            $bill->discount = $last_bill->discount;
            $bill->after_discount_amount = $last_bill->after_discount_amount;
            $bill->amount = $last_bill->amount;
            $bill->paid_amount = $data['pay'][$i];
            $bill->pay_mode = $request->pay_mode;
            $bill->pay_method = $request->pay_method;
            $bill->outstanding = (double)$last_bill->outstanding - (double)$data['pay'][$i];
            $bill->generated_by = auth()->user()->id;
            $bill->save();
        }

        $account = Account::findOrFail($request->account_no);
        $account->paid_amount = (double)$account->paid_amount + (double)$request->current_pay_amount;
        $account->balance_amount =  (double)$account->balance_amount - (double)$request->current_pay_amount;;
        $account->updated_by = auth()->user()->id;
        $account->save();

        return redirect()->route('admin.edit_member',[$last_bill->member_id])->with('success', 'Successfully Added.');
    }

    public function member_receipts($member_id, $account_id)
    {
      $pageTitle = 'Member Receipts';
      $member = Member::findOrFail($member_id);
      $account = Account::findOrFail($account_id);
      $receipts = Bill::where('member_id', $member_id)->where('account_id', $account_id)->groupBy('receipt_no')->get();
      return view('admin.member_receipts', compact('pageTitle','receipts','member','account'));  

    }

    public function add_plan(Request $req)
    {
 // dd($req->all());
 $req->validate([
  'payable_amount' => 'required',
  'total_amount' => 'required',
  'paid_amount' => 'required',
  'balance_amount' => 'required|gte:0'
]);

$member = Member::findOrFail($req->member_id);

$account = new Account();
$account->member_id = $member->id;
$account->month = date("F", strtotime($req->join_date));
$account->year = date("Y", strtotime($req->join_date));
$account->package = $req->package;
$account->type = $req->type;
$account->payable_amount = $req->payable_amount;
$account->discount = $req->discount;
$account->total_amount = $req->total_amount;
$account->paid_amount = $req->paid_amount;
$account->balance_amount = $req->balance_amount;
$account->join_date = $req->join_date;

if ($req->package == '1 Month') {
  $due_date = date('Y-m-d', strtotime($req->join_date . ' + 1 months'));
}
if ($req->package == '3 Month') {
  $due_date = date('Y-m-d', strtotime($req->join_date . ' + 3 months'));
}
if ($req->package == '6 Month') {
  $due_date = date('Y-m-d', strtotime($req->join_date . ' + 6 months'));
}
if ($req->package == '12 Month') {
  $due_date = date('Y-m-d', strtotime($req->join_date . ' + 12 months'));
}

$account->due_date = $due_date;
$account->created_by = auth()->user()->id;

$account->save();

$data = $req->only('heads', 'amount', 'paid');
$maxValue = Bill::max('receipt_no');
if ($maxValue == 0) {
  $maxValue = 100;
}
foreach ($data['heads'] as $index => $value) {
  $bill = new Bill();
  $bill->receipt_no = date('Y').$maxValue + 1;
  $bill->member_id = $member->id;
  $bill->installment_no = 1;
  $bill->account_id = $account->id;
  $bill->head = $data['heads'][$index];
  $bill->discount = $req->discount;
  $after_discount_amount = ((double) $data['amount'][$index] - (((double) $data['amount'][$index] / 100) * (int) $req->discount));
  $bill->after_discount_amount = (double) $after_discount_amount;
  $bill->amount = $data['amount'][$index];
  $bill->paid_amount = $data['paid'][$index];
  $bill->pay_mode = $req->pay_mode;
  $bill->pay_method = $req->pay_method;
  $bill->outstanding = (double) $after_discount_amount - (double) $data['paid'][$index];
  $bill->generated_by = auth()->user()->id;
  $bill->save();
}

Member::where("id", $member->id)->update(["current_plan_id" => $account->id]);

return redirect()->route('admin.edit_member', [$member->id])->with('success', 'Successfully Added.');
    }

    public function ajax_manage_revenue_data(Request $request)
    {
      if ($request->ajax()) {


        $data = DB::table('bills')
            ->join('users', 'bills.generated_by', '=', 'users.id')
            ->join('members', 'bills.member_id', '=', 'members.id')
            ->select('bills.*', 'users.name','members.name as mem_name','members.id as mem_id')->orderBy('bills.id', 'DESC')
            ->groupBy('receipt_no');

            if ($request->has('pay_mode') && $request->pay_mode != '') {
              $data->where('bills.pay_mode', $request->pay_mode);
            }
            if ($request->has('pay_method') && $request->pay_method != '') {
              $data->where('bills.pay_method', $request->pay_method);
            }
            if ($request->has('date') && $request->date != '') {
              $data->whereDate('bills.created_at', date('Y-m-d ', strtotime($request->date)));
            }
            if ($request->has('received_by') && $request->received_by != '') {
              $data->where('bills.generated_by', $request->received_by);
            }
            if ($request->has('year') && $request->year != '') {
              $data->whereYear('bills.created_at', $request->year);
            }
            if ($request->has('month') && $request->month != '') {
              // $data->where('month', $request->month);
              $data->whereMonth('bills.created_at', $request->month);
            }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('admin.receipt', [$row->receipt_no]) . '" class="btn btn-success">Receipt</a>';
                return $btn;
            })
            ->addColumn('amount', function ($user) {
                $amount = DB::table('bills')->where('receipt_no',$user->receipt_no)->sum('paid_amount');
                return '  ₹  '.$amount;
            })
            ->addColumn('date', function ($user) {
                $date = date('d-M-Y ', strtotime($user->created_at));
                return $date;
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    return abort(403, 'Unauthorized action.');
    }

    public function get_filtered_revenue(Request $request)
    {
      $data = DB::table('bills');
  

            if ($request->has('pay_mode') && $request->pay_mode != '') {
              $data->where('pay_mode', $request->pay_mode);
            }
            if ($request->has('pay_method') && $request->pay_method != '') {
              $data->where('pay_method', $request->pay_method);
            }
            if ($request->has('date') && $request->date != '') {
              $data->whereDate('created_at', date('Y-m-d ', strtotime($request->date)));
            }
            if ($request->has('received_by') && $request->received_by != '') {
              $data->where('generated_by', $request->received_by);
            }
            if ($request->has('year') && $request->year != '') {
              $data->whereYear('created_at', $request->year);
            }
            if ($request->has('month') && $request->month != '') {
              // $data->where('month', $request->month);
              $data->whereMonth('created_at', $request->month);
            }

            $amount = 0;
            foreach ($data->get() as $item) {
              $amount += (double)$item->paid_amount;
            }
            
            return response()->json(['amount' => number_format($amount,2)]);
    }
}
