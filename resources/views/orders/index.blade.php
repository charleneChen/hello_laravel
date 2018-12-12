@extends('layouts.default')
@section('title', '所有订单')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <h1>所有订单</h1>
  <ul class="orders">
    @foreach ($orders as $order)
        @include('orders._order', ['user' => $order->user])
    @endforeach
  </ul>

  {!! $orders->render() !!}
</div>
@stop