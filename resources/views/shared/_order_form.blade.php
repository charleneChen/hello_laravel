<form action="{{ route('orders.store') }}" method="POST">
  @include('shared._errors')
  {{ csrf_field() }}

    <div class="form-group">
        <label style="min-width:60px;">推荐座位</label>
        <input type="radio" id="number1" class="" name="number" value="1">
        <button type="button" class="btn btn-default">
            <span>1人</span>
        </button>
        <input type="radio" id="number2" class="hidden" name="number" value="2">
        <button type="button" class="btn btn-default">
            <span>2人</span>
        </button>
        <input type="radio" id="number3" class="hidden" name="number" value="3">
        <button type="button" class="btn btn-default">
            <span>3人</span>
        </button>
        <input type="radio" id="number4" class="hidden" name="number" value="4">
        <button type="button" class="btn btn-default">
            <span>4人</span>
        </button>
        <input type="radio" id="number5" class="hidden" name="number" value="5">
        <button type="button" class="btn btn-default">
            <span>5人</span>
        </button>
    </div>
    <div class="form-group hidden">
        <label style="min-width:60px;">座位号</label>
        <label>座位号</label>
    </div>

    <button type="button" class="btn btn-warning" disabled="disabled">请先选择座位</button>
    <button type="submit" class="btn btn-primary">确定</button>
</form>