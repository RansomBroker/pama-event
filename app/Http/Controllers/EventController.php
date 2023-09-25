<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\RedeemCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        return view('mains.main');
    }

    public function play()
    {
        return view('mains.play');
    }

    public function leaderboardGet()
    {
        $leaderboardCollection = collect(RedeemCode::with(['user', 'booth'])->get());
        $leaderboardGroup = $leaderboardCollection->groupBy('user_id');
        $sortedLeaderBoards = $leaderboardGroup->sortByDesc(function ($data) {
            return count($data);
        });

        return response()->json($sortedLeaderBoards->values());
    }

    public function userRank(User $user)
    {
        // check if user was redeem
        $userRedeem = RedeemCode::where('user_id', $user->id)->first();
        $rank = "N/A";
        $point = 0;

        if ($userRedeem != null) {
            // calculate rank
            $leaderboardCollection = collect(RedeemCode::with(['user', 'booth'])->get());
            $leaderboardGroup = $leaderboardCollection->groupBy('user_id');
            $sortedLeaderBoards = $leaderboardGroup->sortByDesc(function ($data) {
                return count($data);
            })->values();

            $i = 1;
            foreach ($sortedLeaderBoards as $leaderboard) {
                if ($leaderboard[0]->user_id == $user->id) {
                    $rank = $i;
                    break;
                } else {
                    $rank = $i++;
                }
            }

            //calculate point
            $point = RedeemCode::where('user_id', $user->id)->get()->count();
        }

        $data = [];
        $data['rank'] = $rank;
        $data['point'] = $point;
        $data['user'] = $user;

        return response()->json($data);
    }

    public function leaderboard()
    {
        $leaderboardCollection = collect(RedeemCode::with(['user', 'booth'])->get());
        $leaderboards = $leaderboardCollection->groupBy('user_id');
        return view('mains.leaderboard', ['leaderboards' => $leaderboards]);
    }

    public function leaderboardUserHistory($id)
    {
        $userHistory = collect(RedeemCode::with(['user', 'booth'])->where('user_id', $id)->get())->groupBy('user_id');
        return response()->json($userHistory);
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
            ->where('booth_id', $booth->id)
            ->first();

        // check redeem code
        if ($isRedeemCodeExist == null) {
            $data['booth_id'] = $booth->id;
            $data['user_id'] = $userId;
            $redeemCode->create($data);
            return redirect()->route('event.booth.redeem.success', $booth->id);
        }

        return redirect()->route('event.booth.redeem.repeat');
    }

    public function boothRedeemSuccess(Booth $booth)
    {
        return view('events.booth_redeem_success', ['booth' => $booth]);
    }

    public function boothRedeemRepeat()
    {
        return view('events.booth_redeem_repeat');
    }
}
