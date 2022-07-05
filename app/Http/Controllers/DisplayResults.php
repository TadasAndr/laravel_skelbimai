<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisplayResults extends Controller
{

    public function show($id)
    {
        $ad = Ad::query()->findOrFail($id);

        return view('show_ad', compact('ad'));
    }

    // display by

    function display_all_results()
    {
        return view('results', ['search_results' => DB::table('ads')->paginate(5)]);
    }

    function display_by_category($category) {
        return view('results', ['search_results' => DB::table('ads')
            ->where('category_id', '=', "{$category}")->paginate(5)]);
    }

    function display_my_ads()
    {
        return view('results', ['search_results' => DB::table('ads')
            ->where('user_id', '=', Auth::user()->id)->paginate(5)]);
    }

    // search

    function search(Request $request)
    {

        $keyword = $request['keyword'];
        $category = $request['category'];
        $city = $request['city'];

        return view('results', ['search_results' => DB::table('ads')
            ->where('ad_header', 'LIKE', "%{$keyword}%")
            ->orWhere('description', 'LIKE', "%{$keyword}%")
            ->paginate(5)]);
    }

}
