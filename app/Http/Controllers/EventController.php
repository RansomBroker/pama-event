<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\RedeemCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {

    }

    public function boothRedeemPageView($booth)
    {
        $booth = Booth::where('slug', $booth)->first();
        return view('events.booth_redeem_code', ['booth' => $booth]);
    }

    public function boothRedeem(Booth $booth, Request $request, RedeemCode $redeemCode)
    {
        $userId = Auth::user()->id;
        $data = $request->all();
        $isRedeemCodeExist = RedeemCode::where('user_id', $userId)
            ->where('code', $request->code)
            ->where('booth_id', $booth->id)
            ->first();

        // check redeem code
        if ($isRedeemCodeExist == null) {
            $data['booth_id'] = $booth->id;
            $data['user_id'] = $userId;

            $redeemCode->create($data);
        }

        return redirect()->route('event.booth.redeem.success', $booth->id);
    }

    public function boothRedeemSuccess(Booth $booth)
    {
        return view('events.booth_redeem_success', ['booth' => $booth]);
    }
}
