 <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();this.closest('form').submit();"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
  </form>




