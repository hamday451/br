<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use App\Models\Store;
use App\Models\Addon;
use Illuminate\Http\Request;
use ZipArchive;
use File;

class AddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user() && auth()->user()->type == 'super admin')
        {
            $addon_themes = Addon::get();
            $theme = Utility::BuyMoreTheme();
            return view('addon.index',compact('theme','addon_themes'));
        } else {
            return redirect()->back()->with('error',__('Permission Denied.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addon.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme = Addon::where('theme_id',$id)->first();
        $theme->delete();
        File::deleteDirectory('themes/'.$id);
        return redirect()->back()->with('success', __('Theme Deleted Successfully!'));
    }

    public function ThemeInstall(Request $request)
    {

        $zip = new ZipArchive;
        try {
            $res = $zip->open($request->file);
        } catch (\Exception $e) {
            return Utility::error(['message' => $e->getMessage()]);
        }
        if ($res === TRUE)
        {
            $zip->extractTo('themes/');
            $zip->close();

            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $Addon               = new Addon();
            $Addon->theme_id     = $filename;
            $Addon->status       = '1';
            $Addon->save();

            $return['status'] = 'success';
            $return['message'] = __('Install successfully.');
            return response()->json($return);
        } else {
            $return['status'] = 'error';
            $return['message'] = __('oops something went wrong!!');
            return response()->json($return);
        }
        $return['status'] = 'error';
        $return['message'] = __('oops something went wrong!!');
        return response()->json($return);
    }

    public function ThemeEnable(Request $request)
    {
        $theme = Addon::where('theme_id',$request->name)->first();
        if(!empty($theme))
        {
            if($theme->status == '0')
            {
                $theme->status = '1';
                $theme->save();
                return redirect()->back()->with('success', __('Theme Enable Successfully!'));
            }
            else
            {
                $theme->status = '0';
                $theme->save();
                return redirect()->back()->with('success', __('Theme Disable Successfully!'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('oops something wren wrong!'));
        }

    }

    public function AddonApps(Request $request)
    {
        if(auth()->user() && auth()->user()->type == 'super admin')
        {
            $apps = Utility::BuyMoreTheme();
    
            return view('addon.apps',compact('apps'));
        }
        else
        {
            return redirect()->back()->with('error',__('Permission Denied.'));
        }
    }
}
