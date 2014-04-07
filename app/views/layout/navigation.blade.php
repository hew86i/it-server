<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">- ОГЛАСНА ТАБЛА -</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL::Route('home') }}">Home</a></li>

		@if(Auth::check())
			<li><a href="{{ URL::Route('account-sign-out') }}">Sign out</a></li>
			<li><a href="{{ URL::Route('account-change-password') }}">Change Password</a></li>
		@else
			<li><a href="{{ URL::Route('account-sign-in') }}">Sign in</a></li>
			<li><a href="{{ URL::Route('account-create') }}">Create Account</a></li>
		@endif


      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>