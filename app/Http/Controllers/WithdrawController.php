<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payout;
use App\Models\Withdraw;
use App\Models\Commission;
class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::where('user_id', auth()->user()->id)->latest()->get();
        return view('backend.setting.withdraw-list', compact(['withdraws']));
    }

    public function addWithdraw()
    {
        $courses_revenue = Commission::where(['user_id' => auth()->user()->id])->sum('amount');
        $payout = Payout::where('user_id', auth()->user()->id)->first();
        return view('backend.setting.add-withdraw', compact(['payout','courses_revenue']));
    }

    public function storeWithdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $withdraw = new Withdraw();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->amount = $request->amount;
        $withdraw->description = $request->description;
        $withdraw->status = 'pending';
        $withdraw->save();

        return redirect()->route("admin.withdraw.list")->with('success', 'Withdraw request sent successfully');
    }

    public function pendingList() {
        $withdraws = Withdraw::where('status', 'pending')->latest()->get();
        return view('backend.withdraw.pending-list', compact(['withdraws']));
    }

    public function approveWithdraw($id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->status = 'approved';
        $withdraw->save();

        return redirect()->back()->with('success', 'Withdraw status updated successfully');
    }

    public function rejectWithdraw($id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->status = 'rejected';
        $withdraw->save();

        return redirect()->back()->with('success', 'Withdraw status updated successfully');
    }

    public function processingWithdraw($id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->status ='processing';
        $withdraw->save();

        return redirect()->back()->with('success', 'Withdraw status updated successfully');
    }
}
