<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    private $uploadPath = "uploads/users/";

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
        $users = User::where('id', '!=', 1)->orderBy('id', 'desc')->get();
        $id = 1;
        return view('dashboard.users.index', compact('users', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        return view('dashboard.users.create');
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
            'email'        => 'required|email|unique:users',
            'status'        => 'required',
            'photo'        => 'mimes:png,jpeg,jpg,gif,svg',
            'phone'        => 'required',
            'role'        => 'required',
        ));

        //Insert

        $user = new User();

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
            $user->photo = $fileFinalName;
        }
        $user->password = Hash::make('password');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->save();

        Session::flash('SUCCESS', 'تم اضافة المستخدم بنجاح');

        // redirect
        return redirect()->route('users.index');
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
        $user = User::find($id);
        return view('dashboard.users.edit', compact('user'));
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
        $user = User::find($id);

        $this->validate($request, array(
            'name'        => 'required',
            'email'        => Rule::unique('users')->ignore($user->id),
            // 'email'        => 'required|email|unique:users,email',

            'status'        => 'required',
            'photo'        => 'mimes:png,jpeg,jpg,gif,svg',
            'phone'        => 'required',
            'role'        => 'required',
        ));

        //update


        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            if ($user->$formFileName != "") {
                File::delete($this->uploadPath . $user->$formFileName);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $user->photo = $fileFinalName;
        }
        // $user->password = Hash::make('password');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->save();

        Session::flash('SUCCESS', 'تم تعديل بيانات المستخدم ');

        // redirect
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('SUCCESS', 'تم حذف المستخدم بنجاح');

        // redirect
        return redirect()->route('users.index');
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);
        return view('dashboard.profile.edit', compact('user'));
    }

    public function profile_edit(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, array(
            'name'        => 'required',
            'email'        => Rule::unique('users')->ignore($user->id),
            'photo'        => 'mimes:png,jpeg,jpg,gif,svg',
            'phone'        => 'required',
        ));


        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            if ($user->$formFileName != "") {
                File::delete($this->uploadPath . $user->$formFileName);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $user->photo = $fileFinalName;
        }

        if ($request->password != "") {
            $user->password = Hash::make($request->password);
        }
        // $user->password = Hash::make('password');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        Session::flash('SUCCESS', 'تم تعديل البيانات بنجاح ');

        // redirect
        if ($request->password != "") {
            // عدل الميثود هنا مهم جدا التعديل
            return redirect()->route('logout');
        }
        return redirect()->route('profile');
    }
}