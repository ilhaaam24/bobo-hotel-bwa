<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSearchHotelRequest;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.index');
    }
    public function hotels(){
        return view('front.hotels');
    }
    public function search_hotels(StoreSearchHotelRequest $request){

    }
}
