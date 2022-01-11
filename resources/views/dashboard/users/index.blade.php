@extends('layout-dashboard.main')
@section('main_title','المستخدمين')
@section('users','active')
@section('users.index','active')


@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box green-haze">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>المستخدمين
							</div>

						</div>
						<div class="portlet-body">
                            @if ($users->count() > 0)
                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                    <tr>
                                        <th>
                                            الرقم
                                        </th>
                                         <th>
                                            الاسم
                                        </th>
                                        <th>
                                            البريد الالكتروني
                                        </th>
                                        <th>
                                            رقم الهاتف
                                        </th>
                                        <th>
                                            الصلاحيات
                                        </th>
                                        <th>
                                            الحالة
                                        </th>
                                        <th>
                                            الاعدادات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td style=" vertical-align: middle;">
                                                    {{$id++}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    {{$user->name}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    {{$user->email}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                {{$user->phone}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    {{$user->role}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    @if ($user->status == 1 )
                                                        نشط
                                                    @else
                                                        غير نشط
                                                    @endif

                                                </td>
                                                <td style=" vertical-align: middle;">

                                                    {{-- <a href="{{route('users.show',$user->id)}}" class="btn btn-icon-only ">
                                                    <i class="fa fa-user"></i>
                                                    </a> --}}

                                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form style="display: inline-block" action="{{route('users.destroy',[$user->id])}}" method="POST">
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
                                <p>لا يوجد مستخدمين حاليا</p>
                            @endif

						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

@endsection
