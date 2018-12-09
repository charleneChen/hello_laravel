@extends('layouts.default')

@section('content')
  <div class="jumbotron">
    <h1>晚会订票系统</h1>
    <p class="lead">
      公司晚会将于 2019-01-29 18:00 广州体育场举办。
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('orders.create') }}" role="button">现在订票</a>
    </p>
  </div>
@stop