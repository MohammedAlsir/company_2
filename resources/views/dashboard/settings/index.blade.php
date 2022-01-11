@extends('layout-dashboard.main')
@section('main_title','إعدادات الموقع الرئيسية')
@section('setting','active')
@section('setting.index','active')

@section('content')
  	<div class="tab-content">
        <div class="tab-pane active" id="tab_0">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>إعدادات الموقع الرئيسية
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="POST" action="{{route('setting.update',$settings->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">اسم الموقع</label>
                                <div class="col-md-4">
                                    <input required type="text" value="{{$settings->site_name}}" name="site_name" class="form-control input-circle" placeholder="اسم الموقع">
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 control-label">سعر الدولار اليوم</label>
                                <div class="col-md-4">
                                    <input required type="text" value="{{$settings->price_us}}" name="price_us" class="form-control input-circle" placeholder="سعر الدولار اليوم">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">موقع للشركة</label>
                                <div class="col-md-4">
                                    <input  type="text" value="{{$settings->location}}" name="location" class="form-control input-circle" placeholder="موقع للشركة">
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 control-label">البريد الالكتروني للموقع</label>
                                <div class="col-md-4">
                                    <input  type="email" value="{{$settings->email}}" name="email" class="form-control input-circle" placeholder="البريد الالكتروني">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">رقم الهاتف</label>
                                <div class="col-md-4">
                                    <input  type="text" value="{{$settings->phone}}" name="phone" class="form-control input-circle" placeholder="رقم الهاتف">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-4">
                                    <img style="width: 150px; height: 150px;" src="{{asset('uploads/logos/'.$settings->photo)}}" alt="لايوجد صورة حاليا" srcset="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">الشعار </label>
                                <div class="col-md-4">
                                    <input  type="file" name="photo" class="form-control input-circle" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">رابط الواتساب</label>
                                <div class="col-md-4">
                                    <input  type="text" value="{{$settings->whatsapp}}" name="whatsapp" class="form-control input-circle" placeholder="www.whatsapp.com/company_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">رابط الفيسبوك</label>
                                <div class="col-md-4">
                                    <input  type="text" value="{{$settings->facebook}}" name="facebook" class="form-control input-circle" placeholder="www.facebook.com/company_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">رابط لينكيدإن</label>
                                <div class="col-md-4">
                                    <input  type="text" value="{{$settings->linkdin}}" name="linkdin" class="form-control input-circle" placeholder="www.linkedin.com/company_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">رابط تويتر</label>
                                <div class="col-md-4">
                                    <input  type="text" value="{{$settings->twitter}}" name="twitter" class="form-control input-circle" placeholder="www.twitter.com/company_name">
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


