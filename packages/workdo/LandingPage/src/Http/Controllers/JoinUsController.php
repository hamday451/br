<?php

namespace Workdo\LandingPage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Workdo\LandingPage\Entities\LandingPageSetting;
use Workdo\LandingPage\Entities\JoinUs;


class JoinUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(\Auth::user()->type == 'super admin'){

            $join_us = JoinUs::get();
            return view('landing-page::landingpage.joinus', compact('join_us'));
        }else{
            return redirect()->back()->with('error', __('Permission Denied.'));

        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('landing-page::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {



        if($request->joinus_status){
            $joinus_status = 'on';
        }else{
            $joinus_status = 'off';
        }

        $data['joinus_status']= $joinus_status;
        $data['joinus_heading']= $request->joinus_heading;
        $data['joinus_description']= $request->joinus_description;


        foreach($data as $key => $value){
            LandingPageSetting::updateOrCreate(['name' =>  $key],['value' => $value]);
        }

        return redirect()->back()->with(['success'=> __('Setting update successfully')]);


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $join_us = JoinUs::find($id);
        return view('landing-page::landingpage.joinus', compact('join_us'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $join_us = JoinUs::find($id);
        return view('landing-page::landingpage.joinus', compact('join_us'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {


        $join = JoinUs::find($id);
        $join->delete();

        return redirect()->back()->with(['success'=> __('You are joined with our community')]);
    }


    public function joinUsUserStore(Request $request){

        $validator = \Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:join_us',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $join = new JoinUs;
        $join->email = $request->email;
        $join->save();

        return redirect()->back()->with(['success'=> __('You are joined with our community')]);
    }
}