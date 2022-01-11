<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    private $uploadPath = "uploads/sections/";


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
        $sections = Section::orderBy('id', 'desc')->get();
        $id = 1;
        return view('dashboard.sections.index', compact('sections', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sections.create');
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
        ));

        //Insert

        $section = new Section();

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
            $section->photo = $fileFinalName;
        }
        $section->name = $request->name;
        $section->detils = $request->detils;
        $section->brief = $request->brief;

        $section->save();

        Session::flash('SUCCESS', 'تم اضافة القسم بنجاح');

        // redirect
        return redirect()->route('sections.index');
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
        $section = Section::find($id);
        return view('dashboard.sections.edit', compact('section'));
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
        ));

        //Insert

        $section =  Section::find($id);

        // Start of Upload Files
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            if ($section->$formFileName != "") {
                File::delete($this->uploadPath . $section->$formFileName);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $section->photo = $fileFinalName;
        }
        $section->name = $request->name;
        $section->detils = $request->detils;
        $section->brief = $request->brief;

        $section->save();

        Session::flash('SUCCESS', 'تم تعديل بيانات القسم بنجاح');

        // redirect
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();

        Session::flash('SUCCESS', 'تم حذف القسم بنجاح');

        // redirect
        return redirect()->route('sections.index');
    }
}
