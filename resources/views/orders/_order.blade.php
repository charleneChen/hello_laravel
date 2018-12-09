<li id="order-{{ $order->id }}">
  <a href="{{ route('users.show', $user->id )}}">
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
  </a>
  <span class="user">
    <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a>
  </span>
  <span class="timestamp">
    {{ $order->created_at->diffForHumans() }}
  </span>
  <span class="content">{{ $order->num }}</span>

  @can('destroy', $order)
      <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger order-delete-btn">删除</button>
      </form>
  @endcan
</li>