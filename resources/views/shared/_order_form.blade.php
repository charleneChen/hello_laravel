<form action="{{ route('orders.store') }}" method="POST" class="form-horizontal">
    @include('shared._errors')
    {{ csrf_field() }}
    <input type="hidden" name="authorization" value="{{JWTAuth::fromUser(Auth::user())}}">
    <input type="hidden" name="site_id" value="{{$site_id}}">

    <div class="form-group">
        <label class="col-md-3 control-label no-padding-l">推荐座位</label>
        <div class="col-md-9 no-padding-lr">
            <input type="hidden" id="ticket-number-input" name="number" value="">
            @for ($i = 1; $i <= $ticket_limit; $i++)
                <button type="button" class="btn btn-default ticket-number" data-number="{{$i}}">{{$i}}人</button>
            @endfor
        </div>
    </div>
    <div class="form-group ticket-info">
        <label class="col-md-3 control-label no-padding-l">座位</label>
        <div class="no-ticket col-md-9 no-padding-lr">
            <lable class="ticket-limit">一次最多选{{$ticket_limit}}个座位</lable>
        </div>
        <div class="has-ticket col-md-9 no-padding-lr hidden"></div>
        <input type="hidden" name="seat" value="">
    </div>

    <div class="form-group">
        <div class="col-md-offset-3 no-padding-l">
            <button type="submit" id="book-ticket" class="btn btn-primary" disabled="disabled">确定</button>
        </div>
    </div>
</form>