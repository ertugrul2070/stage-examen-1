<?php

namespace App\Http\Controllers;

use App\Website;
use App\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ZonesController extends Controller
{
    /**
     * Get all zones data
     */
    public function getZones()
    {
        $zones = Zone::all()->where('website.deleted_at', '=', null);
        return view('admin.zones.overview', compact('zones'));
    }

    /**
     * Get all zones data with the same ID as the variable
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getZone($id)
    {
        $zone = Zone::find($id);

        return view('admin.zones.view', compact('zone'));
    }

    /**
     * Collecting all User data and sending it to the create page
     */
    public function storePageZones()
    {
        $websites = Website::all()->where('deleted_at', '=', null);
        return view('admin.zones.create', compact('websites'));
    }

    /**
     * Store a newly created recourse in database
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeZones(Request $request)
    {
        $request->validate([
            'div_tag' => 'required|max:255',
            'website_id' => 'required',
        ]);

        $requestData = $request->except('_token', 'create');
        Zone::insert($requestData);

        return redirect()->route('zones')->with('message', 'Succesfully saved');
    }

    /**
     * Get all zones data with the same ID as the variable. And get all users
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updatePageZones($id)
    {
        $zone = Zone::find($id);
        $websites = Website::all()->where('deleted_at', '=', null);

        return view('admin.zones.update', compact('zone', 'websites'));
    }

    /**
     * Update an existing recourse in database
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateZones($id, Request $request)
    {
        $request->validate([
            'div_tag' => 'required|max:255',
            'website_id' => 'required',
        ]);
        $requestData = $request->except('_method','_token', 'update');
        Zone::whereId($id)->update($requestData);

        return redirect()->route('zones')->with('message', 'Succesfully saved');
    }

    /**
     * Delete all recourse data with the same ID as the variable.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteZones($id)
    {
        Zone::destroy($id);

        return redirect()->route('zones')->with('message', 'Succesfully deleted');
    }
}
