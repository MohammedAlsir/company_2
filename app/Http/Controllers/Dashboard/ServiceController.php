<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    private $uploadPath = "uploads/services/";

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
        $services = Service::orderBy('id', 'desc')->get();
        $id = 1;
        return view('dashboard.services.index', compact('services', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        return view('dashboard.services.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'        => 'required',
            'detils'        => 'required',
            'photo'        => 'mimes:png,jpeg,jpg,gif,svg',
            'brief'        => 'required',
            'price'        => 'required',
            'section_id'        => 'required',
        ));

        //Insert

        $service = new Service();

        // Start of Upload Files
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        if ($fileFinalName != "") {
            $service->photo = $fileFinalName;
        }
        $service->name = $request->name;
        $service->detils = $request->detils;
        $service->brief = $request->brief;
        $service->price = $request->price;
        $service->section_id = $request->section_id;

        $service->save();

        Session::flash('SUCCESS', 'تم اضافة الخدمة بنجاح');

        // redirect
        return redirect()->route('services.index');
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
        $service = service::find($id);
        $sections = Section::all();
        return view('dashboard.services.edit', compact('service', 'sections'));
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
        $this->validate($request, array(
            'name'        => 'required',
            'detils'        => 'required',
            'photo'        => 'mimes:png,jpeg,jpg,gif,svg',
            'brief'        => 'required',
            'price'        => 'required',
            'section_id'        => 'required',
        ));

        //Insert

        $service = Service::find($id);

        // Start of Upload Files
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            if ($service->$formFileName != "") {
                File::delete($this->uploadPath . $service->$formFileName);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $service->photo = $fileFinalName;
        }
        $service->name = $request->name;
        $service->detils = $request->detils;
        $service->brief = $request->brief;
        $service->price = $request->price;
        $service->section_id = $request->section_id;

        $service->save();

        Session::flash('SUCCESS', 'تم تعديل الخدمة بنجاح');

        // redirect
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        Session::flash('SUCCESS', 'تم حذف الخدمة بنجاح');

        // redirect
        return redirect()->route('services.index');
    }
}