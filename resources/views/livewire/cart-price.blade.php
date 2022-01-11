<div>
    <div class="row no-gutters">

        <div class="col-lg-2 box">
        </div>

        <div class="col-lg-8 box featured">
            @if (session('succss'))
                <h3>رقم الطلب </h3>
                <h4>    {{ session('rand')}}
                        <span class="mt-2 mb-2">الرجاء الاحتفاظ برقم الطلب للمتابعة الطلب به</span>
                </h4>
            @elseif(Cart::subtotal() > 0 )
                <h3>المجموع</h3>
                <h4>{{Cart::subtotal()}}<span>جنيه سوداني</span></h4>


                <table style="width: 100%">
                    @if($servicesone->count() > 0 )
                        <tr>
                            <td>#</td>
                            {{-- <td></td> --}}
                            <td>إلغاء</td>
                            <td>الخدمة</td>
                            <td>+ </td>
                            <td>الكمية </td>
                            <td>- </td>
                        </tr>
                    @endif
                    @foreach ($servicesone as $item)
                        <tr>
                            <td>{{$id++}}</td>
                            {{-- <td></td> --}}
                            <td>
                                <form style="display: inline-block;"  wire:submit.prevent="removeCar({{$item->id}})"  method="POST">
                                    @csrf
                                    <button  style="display: inline-block;" type="submit"  class=" cart"><span style="color: red">X</span></button>
                                </form>
                            </td>
                            <td>{{$item->name}}</td>
                            <td>
                                <form style="display: inline-block;"  wire:submit.prevent="plusToCar({{$item->id}} , {{$item->qty}})"  method="POST">
                                    @csrf
                                    <button  style="display: inline-block;" type="submit"  class=" cart"><span>+</span></button>
                                </form>
                            </td>
                            <td>
                                <input disabled style="display: inline-block; width: 50px; text-align: center" type="text" name="" value="{{$item->qty}}" id="">
                            </td>
                            <td>
                                <form style="display: inline-block;"  wire:submit.prevent="minToCar({{$item->id}} , {{$item->qty}})"  method="POST">
                                    @csrf
                                    <button  style="display: inline-block;" type="submit"  class=" cart"><span>-</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
                @if(Cart::subtotal() > 0 )
                    <a href="{{route('cart.request')}}" class="buy-btn mt-5">اطلب الان</a>
                @endif

            @else
                <h3>لايوجد خدمات حاليا</h3>
                <h4>اضف بعض الخدمات للسلة</h4>
            @endif

        </div>

        <div class="col-lg-2 box">
        </div>

    </div>
</div>
