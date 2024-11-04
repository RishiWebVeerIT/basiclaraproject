<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Offer;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function pay_outstanding(Request $request)
    {
      $maxReceiptNo = Bill::where('account_id', $request->account_no)->max('receipt_no');
      $bills = DB::table('bills')
      ->where('receipt_no', $maxReceiptNo)
        ->where('account_id', $request->account_no)->get();

        $data = $request->only('pay');
        $maxValue = Bill::max('receipt_no');
        
        for ($i = 0; $i < count($bills); $i++)
        {
          $last_bill = Bill::find($bills[$i]->id);
          $bill = new Bill();
          $bill->receipt_no = $maxValue+1;
            $bill->member_id = $last_bill->member_id;
            $bill->account_id = $last_bill->account_id;
            $bill->head = $last_bill->head;
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
      $receipts = Bill::where('member_id', $member_id)->where('account_id', $account_id)->groupBy('receipt_no')->get();
      echo '<pre>';
      print_r($receipts);
    }
}
