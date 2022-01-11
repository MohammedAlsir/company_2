<div>
    <div class="row">

            @foreach ($services as $item)
                <div id="{{$item->id}}" class="col-12 col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 mb-2">
                    <div style="width: 100%" class="icon-box">
                        <div style="width:100%; height:200px" class="icon mb-2">
                            <img style="width:100%; height:200px" src="{{asset('uploads/services/'.$item->photo)}}" alt="" srcset="">
                        </div>
                        <h4 class="d-inline-block"><a>{{$item->name}}</a></h4>
                        <p class="d-inline-block"> - {{$item->section->name}}</p>
                        <p>{{$item->brief}}</p>

                        <div class="mt-2" style="font-weight: bold">
                            <p>السعر</p>
                            <p>  {{$item->price}}   </p>
                            <p> جنيه سوداني</p>
                        </div>

                        <form wire:submit.prevent="addToCart({{$item->id}})" action="{{route('cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="service_id" value="{{$item->id}}">
                            <input wire:model="quantity.{{$item->id}}" type="number"  min="1" value="1">

                                @if ($cart->where('id',$item->id)->count())
                                    <div style="width: 150px" class="icon mt-3 upper-order">
                                        <button disabled type="submit" href="" class="btn-order text-bold">تم الاضافة للسلة</button>
                                    </div>

                                @else
                                    <div class="icon mt-3 upper-order">
                                        <button type="submit" href="" class="btn-order text-bold">اضف للسلة</button>
                                    </div>
                                @endif

                        </form>
                    </div>
                </div>
            @endforeach

        </div>
</div>
