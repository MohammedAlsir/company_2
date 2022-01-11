@extends('layout-dashboard.main')
@section('main_title','تعديل البيانات الشخصية')
{{-- @section('users','active') --}}


@section('content')

  	<div class="tab-content">
        <div class="tab-pane active" id="tab_0">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل البيانات الشخصية
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="POST" action="{{route('profile.edit',$user->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">اسم المستخدم</label>
                                <div class="col-md-4">
                                    <input required type="text" name="name" value="{{$user->name}}" class="form-control input-circle" placeholder="اسم المستخدم">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label">البريد الالكتروني </label>
                                <div class="col-md-4">
                                    <input required type="email"  name="email" value="{{$user->email}}" class="form-control input-circle" placeholder="البريد الالكتروني ">
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 control-label">كلمة المرور</label>
                                <div class="col-md-4">
                                    <input  type="password"  name="password"  class="form-control input-circle" placeholder="*********">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">رقم الهاتف</label>
                                <div class="col-md-4">
                                    <input required type="text"  name="phone" value="{{$user->phone}}" class="form-control input-circle" placeholder="رقم الهاتف">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-4">
                                    <img style="width: 150px; height: 150px;" src="{{asset('uploads/users/'.$user->photo)}}" alt="لايوجد صورة حاليا" srcset="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">الصورة </label>
                                <div class="col-md-4">
                                    <input   value="{{$user->photo}}" type="file" name="photo" class="form-control input-circle" placeholder="">
                                </div>
                            </div>



                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-circle blue">تعديل </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>

    </div>
@endsection


