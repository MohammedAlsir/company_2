<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    private $uploadPath = "uploads/logos/";

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::find(1);
        return view('dashboard.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settings = Setting::find($id);

        $this->validate($request, array(
            'site_name'        => 'required',
            'price_us'        => 'required',
            'photo'        => 'mimes:png,jpeg,jpg,gif,svg',
        ));

        //update


        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            if ($settings->$formFileName != "") {
                File::delete($this->uploadPath . $settings->$formFileName);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $settings->photo = $fileFinalName;
        }
        $settings->site_name = $request->site_name;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->price_us = $request->price_us;
        $settings->facebook = $request->facebook;
        $settings->whatsapp = $request->whatsapp;
        $settings->linkdin = $request->linkdin;
        $settings->twitter = $request->twitter;
        $settings->location = $request->location;

        $settings->save();

        Session::flash('SUCCESS', 'تم تعديل البيانات بنجاح ');

        // redirect
        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}