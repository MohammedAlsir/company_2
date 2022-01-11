@extends('layout.main')
@section('title','خدماتنا')
@section('services','active')
@section('content')
 <!-- ======= Services Section ======= -->
    <section style="margin-top:120px !important "  id="services" class="services">
      <div class="container">

        @livewire('service-section')

      </div>
    </section><!-- End Services Section -->
@endsection


