@extends('layouts.default')
@section('titile', '订票')

@section('content')
<h1>订票</h1>
<div class="row">
    <div class="col-md-8">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
    </div>
    <aside class="col-md-4">
        <section class="order_form">
          @include('shared._order_form')
        </section>
    </aside>
</div>
@stop