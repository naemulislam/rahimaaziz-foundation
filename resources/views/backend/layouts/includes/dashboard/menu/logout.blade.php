@if (auth('admin')->user())
  <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();this.closest('form').submit();"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
  </form>

 @elseif (auth('accountant')->user())
 <form method="POST" action="{{ route('accountant.logout') }}">
  @csrf
  <a href="{{ route('accountant.logout') }}" onclick="event.preventDefault();this.closest('form').submit();"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
</form>

@elseif (auth('teacher')->user())
<form method="POST" action="{{ route('teacher.logout') }}">
  @csrf
  <a href="{{ route('teacher.logout') }}" onclick="event.preventDefault();this.closest('form').submit();"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
</form>

@elseif (auth('student')->user())

<form method="POST" action="{{ route('student.logout') }}">
  @csrf
  <a href="{{ route('student.logout') }}" onclick="event.preventDefault();this.closest('form').submit();"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
</form>

@elseif (auth('principle')->user())
<form method="POST" action="{{ route('principle.logout') }}">
  @csrf
  <a href="{{ route('principle.logout') }}" onclick="event.preventDefault();this.closest('form').submit();"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
</form>

@elseif (auth('hr')->user())
<form method="POST" action="{{ route('hr.logout') }}">
  @csrf
  <a href="{{ route('hr.logout') }}" onclick="event.preventDefault();this.closest('form').submit();"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
</form>

@elseif (auth()->user())
<form method="POST" action="{{ route('logout') }}">
  @csrf
  <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
</form>
@endif

