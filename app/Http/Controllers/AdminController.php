<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\RedeemCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function boothView(Booth $booth)
    {
        $booths = $booth::all();
        return view('admins.booth', ['booths' => $booths]);
    }

    public function boothAddView()
    {
        return view('admins.booth_add');
    }

    public function boothEditView(Booth $booth)
    {
        return view('admins.booth_edit', ['booth' => $booth]);
    }

    public function boothAdd(Request $request, Booth $booth)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $booth->create($data);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil menambahkan booth baru');
        return redirect()->route('admin.booth.view');
    }

    public function boothEdit(Request $request, Booth $booth)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $booth->update($data);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil update nama booth');
        return redirect()->route('admin.booth.view');
    }

    public function boothDelete(Booth $booth, Request $request)
    {
        $booth->delete();
        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil menghapus booth');
        return redirect()->route('admin.booth.view');
    }

    public function getUserRedeem(RedeemCode $redeemCode)
    {
        return response()->json($redeemCode->get()->count());
    }
}
