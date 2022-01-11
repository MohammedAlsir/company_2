@extends('layout.main')
@section('title','السلة ')
@section('buy','active')
@section('content')

 <section id="pricing" class="pricing">
    <div class="container">

    @livewire('cart-price')

    </div>
</section><!-- End Pricing Section -->


@endsection


