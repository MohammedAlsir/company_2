@extends('layout-dashboard.main')
@section('main_title','الطلبات المعلقة')
@section('orders','active')
@section('orders.pending','active')


@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box green-haze">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i> الطلبات المعلقة
							</div>

						</div>
						<div class="portlet-body">
                            @if ($orders->count() > 0)
                                <table style="width: 100%" class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                    <tr>
                                        <th>
                                            الرقم
                                        </th>
                                        <th style="width: 200px">
                                            رقم الطلب
                                        </th>
                                        <th style="width: 200px">
                                            اسم الخدمة
                                        </th>
                                        <th style="width: 200px">
                                            الكمية
                                        </th>
                                        <th style="width: 250px">
                                            تاريخ الطلب
                                        </th>
                                        <th style="width: 70px">
                                             حالة الطلب
                                        </th>

                                        <th style="width: 150px">
                                            الاعدادات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="text-wrap">
                                                <td style=" vertical-align: middle;">
                                                    {{$id++}}
                                                </td>
                                                <td  style=" vertical-align: middle;">
                                                    {{$order->random_number}}
                                                </td>
                                                 <td  style=" vertical-align: middle;">
                                                    {{$order->name_service}}
                                                </td>
                                                 <td  style=" vertical-align: middle;">
                                                    {{$order->price_service}}
                                                </td>
                                                <td style=" vertical-align: middle;">
                                                    {{$order->created_at}}
                                                </td>
                                                 <td style=" vertical-align: middle;">
                                                    @if ($order->status == 2 )
                                                       مرفوض
                                                    @elseif($order->status == 1 )
                                                        مقبول
                                                    @else
                                                        معلق
                                                    @endif
                                                </td>



                                                <td style=" vertical-align: middle;">

                                                        <a href="{{route('accepted',$order->id)}}" class="btn btn-icon-only green">
                                                            قبول
                                                        </a>

                                                        <a href="{{route('rejected',$order->id)}}" class="btn btn-icon-only red">
                                                            رفض
                                                        </a>

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
