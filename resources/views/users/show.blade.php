@extends('layouts.default')
@section('title', $user->name)

@section('content')
<div class="row">
  <div class="col-md-offset-2 col-md-8">
    <div class="col-md-12">
      <div class="col-md-offset-2 col-md-8">
        <section class="user_info">
          @include('shared._user_info', ['user' => $user])
        </section>
      </div>
    </div>
    <div class="col-md-12">
      @if (count($orders) > 0)
        <ol class="orders">
          @foreach ($orders as $order)
            @include('orders._order', ['user' => $user])
          @endforeach
        </ol>
        {!! $orders->render() !!}
      @endif
    </div>
  </div>
</div>
@stop