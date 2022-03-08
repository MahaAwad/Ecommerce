<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInfo;

class SiteInfoController extends Controller
{
    public function AllSiteinfo(){
        $result=SiteInfo::all();
        return $result;
    }


    public function GetSiteInfo(){

        $siteinfo = SiteInfo::find(1);
        return view('backend.siteinfo.siteinfo_update',compact('siteinfo'));

    } // End Method


    public function UpdateSiteInfo(Request $request){

        $siteinfo_id = $request->id;

        SiteInfo::findOrFail($siteinfo_id)->update([
            'about' => $request->about,
           
            'address' => $request->address,
          
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instegram_link' => $request->instegram_link,
            'copyright' => $request->copyright, 

        ]);


        $notification = array(
            'message' => 'SiteInfo Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method







}
