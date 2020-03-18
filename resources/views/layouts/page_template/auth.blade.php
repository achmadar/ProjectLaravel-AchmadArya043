<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@include('layouts.sidebar')
<div class="main-panel">
	@include('layouts.header')
    @yield('content')
    
</div>