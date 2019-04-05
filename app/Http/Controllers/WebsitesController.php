<?php

namespace App\Http\Controllers;

use App\User;
use App\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class WebsitesController extends Controller
{
    public function getWebsites()
    {
        /**
         * Collecting all the webstites data and sending the variable to the view
         */

        $websites = Website::all();

        return view('admin.websites.overview', compact('websites'));
    }
    public function getWebsite($id)
    {
        /**
         * Retrieve the if from the form button and compare with website id from database and get all data from that row
         */

        $website = Website::find($id);

        return view('admin.websites.view', compact('website'));
    }

    public function storePageWebsites()
    {
        $users = User::all();
        /**
         * Collecting all User data and sending it to the create page
         */
        return view('admin.websites.create', compact('users'));
    }

    public function storeWebsites(Request $request)
    {
        $requestData = $request->except('_token', 'create');
        Website::insert($requestData);

        return redirect()->route('websites')->with('message', 'Succesfully saved');
    }

    public function updatePageWebsites($id)
    {
        /**
         * Collecting all User data and sending it to the create page
         */
       $website = Website::find($id);
       $users = User::all();

        return view('admin.websites.update', compact('website', 'users'));
    }

    public function updateWebsites($id, Request $request)
    {
        $requestData = $request->except('_method','_token', 'update');
        Website::whereId($id)->update($requestData);

        return redirect()->route('websites')->with('message', 'Succesfully saved');
    }

    public function deleteWebsites($id)
    {
        Website::destroy($id);

        return redirect()->route('websites')->with('message', 'Succesfully deleted');
    }
}
