@extends('layout-dashboard.main')
@section('main_title','إضافة مستخدم جديد')
@section('users','active')
@section('users.create','active')

@section('content')
  	<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>إضافة مستخدم جديد
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form method="POST" action="{{route('users.store')}}" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            @csrf
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">اسم المستخدم</label>
													<div class="col-md-4">
														<input required type="text" name="name" class="form-control input-circle" placeholder="اسم المستخدم">
													</div>
												</div>

                                                <div class="form-group">
													<label class="col-md-3 control-label">البريد الالكتروني </label>
													<div class="col-md-4">
														<input required type="email"  name="email" class="form-control input-circle" placeholder="البريد الالكتروني ">
													</div>
												</div>

                                                <div class="form-group">
													<label class="col-md-3 control-label">رقم الهاتف</label>
													<div class="col-md-4">
														<input required type="text"  name="phone" class="form-control input-circle" placeholder="رقم الهاتف">
													</div>
												</div>

                                                <div class="form-group">
													<label class="col-md-3 control-label">الصلاحيات</label>
													<div class="col-md-4">
														 <select required class="form-control input-circle" name="role" id="">
                                                            <option value="مشرف">مشرف</option>
                                                            <option value="مدير">مدير</option>
                                                        </select>
													</div>
												</div>


                                                <div class="form-group">
													<label class="col-md-3 control-label">الصورة </label>
													<div class="col-md-4">
														<input  type="file" name="photo" class="form-control input-circle" placeholder="">
													</div>
												</div>

                                                <div class="form-group">
													<label class="col-md-3 control-label">الحالة</label>
													<div class="col-md-4">

                                                            <input required style="margin: 0px; margin-right: -8px;" type="radio" value="1"  name="status" >
                                                            <label>نشط</label><br>

                                                            <input required style="margin: 0px; margin-right: -8px;" type="radio" value="0"  name="status" >
                                                            <label>غير نشط</label><br>

													</div>
												</div>

											</div>

											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" class="btn btn-circle blue">إضافة </button>
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


