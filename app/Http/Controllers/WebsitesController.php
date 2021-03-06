<?php

namespace App\Http\Controllers;

use App\User;
use App\Website;
use App\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class WebsitesController extends Controller
{
    /**
     * Get all websites data
     */
    public function getWebsites()
    {
        $websites = Website::all()->where('deleted_at' , '=', null);
        return view('admin.websites.overview', compact('websites'));
    }

    /**
     * Get all websites data
     */
    public function getDWebsites()
    {
        $websites = Website::all()->where('deleted_at' , '=', !null);
        return view('admin.websites.deleted', compact('websites'));
    }

    /**
     * Get all website data with the same ID as the variable
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getWebsite($id)
    {
        $website = Website::find($id);
        return view('admin.websites.view', compact('website'));
    }

    /**
     * Collecting all User data and sending it to the create page
     */
    public function storePageWebsites()
    {
        $users = User::all();
        return view('admin.websites.create', compact('users'));
    }

    /**
     * Store a newly created resource in database
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeWebsites(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:websites|max:255',
            'url' => 'required|unique:websites',
            'user_id' => 'required',
            'active' => 'required',
        ]);

        $requestData = $request->except('_token', 'create');
        Website::insert($requestData);

        return redirect()->route('websites')->with('message', 'Succesfully saved');
    }

    /**
     * Get all website data with the same ID as the variable. And get all users
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updatePageWebsites($id)
    {
       $website = Website::find($id);
       $users = User::all();

        return view('admin.websites.update', compact('website', 'users'));
    }

    /**
     * Update an existing resource in database
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateWebsites($id, Request $request)
    {
        $requestData = $request->except('_method','_token', 'update');
        $request->validate([
            'name' => 'required|unique:websites,name,'.$id.'|max:400',
            'url' => 'required|unique:websites,url,'.$id.'|max:400',
            'user_id' => 'required',
            'active' => 'required',
        ]);
        Website::whereId($id)->update($requestData);

        return redirect()->route('websites')->with('message', 'Succesfully saved');
    }

    /**
     * Delete all resource data with the same ID as the variakble.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteWebsites($id)
    {
        Website::whereId($id)->update(['deleted_at' => Carbon::now()]);


        return redirect()->route('websites')->with('message', 'Succesfully deleted');
    }
    /**
     * Undo all resource data with the same ID as the variable.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function undoWebsites($id)
    {
        Website::whereId($id)->update(['deleted_at' => null]);

        return redirect()->route('dwebsites')->with('message', 'Succesfully deleted');
    }
}
