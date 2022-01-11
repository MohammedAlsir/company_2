@extends('layout.main')
@section('title','طلبك الحالي')
@section('orders','active')
@section('content')

 <section id="pricing" class="pricing">
    <div class="container">

        <div class="row no-gutters">

        <div class="col-lg-2 box">
        </div>

        <div class="col-lg-8 box featured">





                <table style="width: 100%">
                    <tr>
                        <td>رقم</td>
                        {{-- <td></td> --}}
                        <td>الخدمة</td>
                        <td>الكمية </td>
                        <td>السعر </td>
                        <td>حالة الطلب</td>
                    </tr>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{$id++}}</td>
                            {{-- <td><i class="bx bx-check"></i></td> --}}
                            <td>{{$item->name_service}}</td>
                            <td>{{$item->amount_service}}</td>
                            <td>{{$item->price_service}} </td>
                            <td>
                                @if ($item->status == 0 )
                                    <span style="color: blue">الطلب معلق</span>
                                @elseif($item->status == 1 )
                                    <span style="color: green">تم قبول الطلب</span>
                                @elseif($item->status == 2 )
                                    <span style="color: red">تم رفض الطلب</span>

                                @endif
                            </td>
                        </tr>
                    @endforeach


                </table>

                <h3 class="mt-4">المجموع</h3>
                <h4>{{$order[0]->total}}<span>جنيه سوداني</span></h4>


        </div>

        <div class="col-lg-2 box">
        </div>

    </div>

    </div>
</section><!-- End Pricing Section -->


@endsection


