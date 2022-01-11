@extends('layout-dashboard.main')
@section('main_title','تعديل بيانات القسم')
@section('sections','active')

@section('content')
  	<div class="tab-content">
        <div class="tab-pane active" id="tab_0">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل بيانات القسم
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="POST" action="{{route('sections.update',$section->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">اسم القسم</label>
                                <div class="col-md-4">
                                    <input required type="text" maxlength="255" value="{{$section->name}}" name="name" class="form-control input-circle" placeholder="اسم القسم">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">نبذه عن القسم </label>
                                <div class="col-md-4">
                                    <input required type="text" maxlength="255" value="{{$section->brief}}" name="brief" class="form-control input-circle" placeholder="نبذه عن القسم">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">التفاصيل </label>
                                <div class="col-md-4">
                                    <textarea required  name="detils" rows="5" class="form-control input-circle" placeholder="التفاصيل">{{$section->detils}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-4">
                                    <img style="width: 150px; height: 150px;" src="{{asset('uploads/sections/'.$section->photo)}}" alt="لايوجد صورة حاليا" srcset="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">الصورة </label>
                                <div class="col-md-4">
                                    <input  type="file" name="photo" class="form-control input-circle" placeholder="">
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


