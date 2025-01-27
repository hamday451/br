<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\ShippingMethod;
use App\Models\ShippingZone;
use App\Models\State;
use Illuminate\Http\Request;
use App\DataTables\ShippingZoneDataTable;
use App\DataTables\ShippingMethodDataTable;

class ShippingZoneController extends Controller
{
    public function index(ShippingZoneDataTable $dataTable)
    {
        if (auth()->user() && auth()->user()->isAbleTo('Manage Shipping Zone')) {
            $shippingZones = ShippingZone::where('theme_id', APP_THEME())->where('store_id', getCurrentStore())->get();
            $shipping_method = [];
            foreach ($shippingZones as $key => $value) {
                if (! empty($value->shipping_method)) {
                    $data = explode(',', $value->shipping_method);
                    $shipping_method = ShippingMethod::whereIn('id', $data)->get()->pluck('method_name')->toArray();
                }
            }

            if (! empty($shipping_method)) {
                $shipping_method = implode(',', $shipping_method);
            }
            return  $dataTable->render('shippingzone.index', compact('shippingZones', 'shipping_method'));

        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country_option = Country::orderBy('name', 'ASC')->pluck('name', 'id')->prepend('Select Country', 0);

        return view('shippingzone.create', compact('country_option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->country_id == 0) {
            $request->merge(['country_id' => null]);

        }
        if ($request->state_id == 0) {
            $request->merge(['state_id' => null]);
        }
        if (auth()->user() && auth()->user()->isAbleTo('Create Shipping Zone')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'zone_name' => 'required',
                    'country_id' => 'nullable',
                    'state_id' => 'nullable',
                    'shipping_method' => 'required',
                ]

            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $shippingZones = ShippingZone::create(
                [
                    'zone_name' => $request->zone_name,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'shipping_method' => implode(',', $request->shipping_method),
                    'theme_id' => APP_THEME(),
                    'store_id' => getCurrentStore(),
                ]
            );

            foreach ($request->shipping_method as $shippingMethods) {
                $shippingMethods = ShippingMethod::create(
                    [
                        'zone_id' => $shippingZones->id,
                        'method_name' => $shippingMethods,
                        'theme_id' => APP_THEME(),
                        'store_id' => getCurrentStore(),
                    ]
                );
            }

            $shippingMethods->save();
            $shippingZones->save();

            return redirect()->back()->with('success', __('Shipping successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ShippingMethodDataTable $dataTable)
    {
        if (auth()->user() && auth()->user()->isAbleTo('Show Shipping Zone')) {
            $shippingZones = ShippingZone::find($id);
            $shippingMethods = ShippingMethod::where('zone_id', $id)->where('theme_id', APP_THEME())->where('store_id', getCurrentStore())->get();
            $dataTable->setZoneId($id);
            return $dataTable->render('shipping_method.index', compact('shippingZones', 'shippingMethods'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shippingzone = ShippingZone::find($id);

        $zone_selected = explode(',', $shippingzone->shipping_method);

        $country_option = Country::orderBy('name', 'ASC')->pluck('name', 'id')->prepend('Select Country', 0);
        $state_option = State::orderBy('name', 'ASC')->pluck('name', 'id')->prepend('Select State', 0);
        $ShippingMethod = ShippingMethod::where('theme_id', APP_THEME())->where('store_id', getCurrentStore())->get()->pluck('method_name', 'id');

        return view('shippingzone.edit', compact('shippingzone', 'country_option', 'state_option', 'ShippingMethod', 'zone_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->country_id == 0) {
            $request->merge(['country_id' => null]);

        }
        if ($request->state_id == 0) {
            $request->merge(['state_id' => null]);
        }

        if (auth()->user() && auth()->user()->isAbleTo('Edit Shipping Zone')) {
            $ShippingZone = ShippingZone::find($id);
            $ShippingZone->zone_name = $request->zone_name;
            $ShippingZone->country_id = $request->country_id;
            $ShippingZone->state_id = $request->state_id;
            $shipping_method = implode(',', $request->shipping_method);
            $ShippingZone->shipping_method = $shipping_method;
            $ShippingZone->theme_id = APP_THEME();
            $ShippingZone->store_id = getCurrentStore();

            $shippingMethods = ShippingMethod::where('theme_id', APP_THEME())->where('store_id', getCurrentStore())->where('zone_id', $id)->get();
            $shippingMethods->each->delete();

            foreach ($request->shipping_method as $shippingMethods) {
                $shippingMethods = ShippingMethod::create(
                    [
                        'zone_id' => $ShippingZone->id,
                        'method_name' => $shippingMethods,
                        'theme_id' => APP_THEME(),
                        'store_id' => getCurrentStore(),
                    ]
                );

            }

            $ShippingZone->save();

            return redirect()->back()->with('success', __('ShippingZone successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (auth()->user() && auth()->user()->isAbleTo('Delete Shipping Zone')) {
            $ShippingZone = ShippingZone::find($id);
            $shippingMethods = ShippingMethod::where('zone_id', $id)->first();
            if (! empty($shippingMethods)) {
                $shippingMethods->delete();
            }
            $ShippingZone->delete();

            return redirect()->back()->with('success', 'ShippingZone successfully deleted.');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function states_list(Request $request)
    {
        $country_id = $request->country_id;
        $state_list = State::where('country_id', $country_id)->orderBy('name', 'ASC')->pluck('name', 'id')->prepend('Select State', 0)->toArray();

        return response()->json($state_list);

    }
}
