@extends('layout-dashboard.main')
@section('main_title','الخدمات')
@section('services','active')
@section('services.index','active')


@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box green-haze">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>الخدمات
							</div>

						</div>
						<div class="portlet-body">
                            @if ($services->count() > 0)
                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                    <tr>
                                        <th>
                                            الرقم
                                        </th>
                                        <th style="width: 200px">
                                            الاسم
                                        </th>
                                        <th style="width: 250px">
                                             نبذه عن الخدمة
                                        </th>
                                        <th style="width: 200px">
                                             القسم
                                        </th>
                                        <th style="width: 90px">
                                             السعر
                                        </th>
                                        <th style="width: 115px">
                                             الصورة
                                        </th>
                                        <th style="width: 115px">
                                            الاعدادات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr class="text-wrap">
                                                <td style=" vertical-align: middle;">
                                                    {{$id++}}
                                                </td>
                                                <td  style=" vertical-align: middle;">
                                                    {{$service->name}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    {{$service->brief}}
                                                </td>
                                                 <td style=" vertical-align: middle;">
                                                    {{$service->section->name}}
                                                </td>
                                                 <td style=" vertical-align: middle;">
                                                    {{$service->price}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    <img style="width: 100px; height: 100px;" src="{{asset('uploads/services/'.$service->photo)}}" alt="لايوجد صورة حاليا" srcset="">
                                                </td>

                                                <td style=" vertical-align: middle;">

                                                    {{-- <a href="{{route('services.show',$service->id)}}" class="btn btn-icon-only ">
                                                    <i class="fa fa-service"></i>
                                                    </a> --}}

                                                    <a href="{{route('services.edit',$service->id)}}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form style="display: inline-block" action="{{route('services.destroy',[$service->id])}}" method="POST">
                                                                {{ csrf_field()}}
                                                                {{ method_field('delete') }}



                                                        <button  type="submit" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill red">
                                                                    <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p>لا يوجد خدمات حاليا</p>
                            @endif

						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

@endsection
