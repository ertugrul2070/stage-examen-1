<?php

namespace App\Http\Controllers;

use App\Vasttag;
use App\Website;
use App\Zone;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VasttagsController extends Controller
{
    /**
     * Get all vasttags data
     */
    public function getVasttags()
    {

        $vasttags = Vasttag::all()->where('zone.website.deleted_at', '=', null);

        return view('admin.vasttags.overview', compact('vasttags'));
    }

    /**
     * Get all vasttags data with the same ID as the variable
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getVasttag($id)
    {
        $vasttag = Vasttag::find($id);

        return view('admin.vasttags.view', compact('vasttag'));
    }

    /**
     * Collecting all User data and sending it to the create page
     */
    public function storePageVasttags()
    {
        $zones = Zone::all()->where('deleted_at', '=', null);
        return view('admin.vasttags.create', compact('zones'));
    }

    /**
     * Store a newly created resource in database
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeVasttags(Request $request)
    {
        $request->validate([
            'provider_name' => 'required|unique:vasttags|max:255',
            'url' => 'required|unique:vasttags',
            'zone_id' => 'required',
        ]);
        $requestData = $request->except('_token', 'create');
        Vasttag::insert($requestData);

        return redirect()->route('vasttags')->with('message', 'Succesfully saved');
    }

    /**
     * Get all vasttags data with the same ID as the variable. And get all users
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updatePageVasttags($id)
    {
        $vasttag = Vasttag::find($id);
        $zones = Zone::all()->where('website.deleted_at', '=', null);

        return view('admin.vasttags.update', compact('vasttag', 'zones'));
    }

    /**
     * Update an existing resource in database
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateVasttags($id, Request $request)
    {
        $request->validate([
            'provider_name' => 'required|unique:vasttags,provider_name,'.$id.'|max:400',
            'url' => 'required|unique:vasttags,url,'.$id.'|max:400',
            'zone_id' => 'required',
        ]);
        $requestData = $request->except('_method','_token', 'update');
        Vasttag::whereId($id)->update($requestData);

        return redirect()->route('vasttags')->with('message', 'Succesfully saved');
    }

    /**
     * Delete all resource data with the same ID as the variable.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteVasttags($id)
    {
        Vasttag::destroy($id);

        return redirect()->route('vasttags')->with('message', 'Succesfully deleted');
    }
}
