<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DentistsController extends Controller
{
    public function index(){
        return view('dentists');
    }
    // public function detailView(){
        
    // }
    // public function shopAdd(){
    //     return view('dentists');
    // }
    // public function createShop(Request $request){
    //     $validate = Validator::make($request->only(['title','status']), [
    //         'title' => 'required',
    //         'status' => 'required',
            
    //     ]);
    //      if ($validate->fails()){
    //         return back()->withErrors($validate);
    //      }

    //      Shop::create([
    //         'title' => $validate->getValue('title'),
    //         'status' => $validate->getValue('status'),
    //         'user_id' => Auth::user()->id,
    //         'rating' => 1
    //      ]);

    //      return redirect('/account');
    // }
    // public function show(Shop $shop)
    // {
    //     return view('shops.shop', compact('shop'));
    // }
}
