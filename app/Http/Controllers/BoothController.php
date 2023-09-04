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
        $redeemData = RedeemCode::with(['user', 'booth'])->where('booth_id', $boothData->id)->get()->sortBy('created_at');
        return view('booths.booth_visitor', ['booth' => $boothData, 'redeemData' => $redeemData]);
    }
}
