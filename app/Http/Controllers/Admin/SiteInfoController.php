<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInfo;

class SiteInfoController extends Controller
{
    public function AllSiteinfo(){

        $result = SiteInfo::get();
        return $result;

    } // End Method



    public function GetSiteInfo(){

        $siteinfo = SiteInfo::find(1);
        return view('backend.siteinfo.siteinfo_update',compact('siteinfo'));

    } // End Method



    public function UpdateSiteInfo(Request $request){

        $siteinfo_id = $request->id;

        SiteInfo::findOrFail($siteinfo_id)->update([
            'about' => $request->about,
            'refund' => $request->refund,
            'parchase_guide' => $request->parchase_guide,
            'privacy' => $request->privacy,
            'address' => $request->address,
            'android_app_link' => $request->android_app_link,
            'ios_app_link' => $request->ios_app_link,
            'facbook_link' => $request->facbook_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
            'copyright_text' => $request->copyright_text, 

        ]);


        $notification = array(
            'message' => 'SiteInfo Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method





}
  