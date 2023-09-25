<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\RedeemCode;
use Illuminate\Http\Request;

class BoothController extends Controller
{
    public function boothVisitorView($booth)
    {
        $boothData = Booth::where('slug', $booth)->first();
        return view('booths.booth_visitor', ['booth' => $boothData]);
    }

    public function boothVisitorGetRedeem(Booth $booth)
    {
        $redeemData = RedeemCode::with(['user', 'booth'])->where('booth_id', $booth->id)->get()->sortByDesc('created_at');
        return response()->json($redeemData->values());
    }
}
