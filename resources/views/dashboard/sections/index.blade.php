@extends('layout-dashboard.main')
@section('main_title','الاقسام')
@section('sections','active')
@section('sections.index','active')


@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box green-haze">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>الاقسام
							</div>

						</div>
						<div class="portlet-body">
                            @if ($sections->count() > 0)
                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                    <tr>
                                        <th>
                                            الرقم
                                        </th>
                                        <th style="width: 200px">
                                            الاسم
                                        </th>
                                        <th>
                                             نبذه عن القسم
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
                                        @foreach ($sections as $section)
                                            <tr >
                                                <td style=" vertical-align: middle;">
                                                    {{$id++}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    {{$section->name}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    {{$section->brief}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    <img style="width: 100px; height: 100px;" src="{{asset('uploads/sections/'.$section->photo)}}" alt="لايوجد صورة حاليا" srcset="">
                                                </td>

                                                <td style=" vertical-align: middle;">

                                                    {{-- <a href="{{route('sections.show',$section->id)}}" class="btn btn-icon-only ">
                                                    <i class="fa fa-section"></i>
                                                    </a> --}}

                                                    <a href="{{route('sections.edit',$section->id)}}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form style="display: inline-block" action="{{route('sections.destroy',[$section->id])}}" method="POST">
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
                                <p>لا يوجد اقسام حاليا</p>
                            @endif

						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

@endsection
