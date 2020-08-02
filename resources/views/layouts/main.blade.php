
<html lang="en">
   @include('layouts.partials._head');
  <body>
    @include('layouts.partials._navigation');
 
<div class="container-fluid">
  <div class="row">
   @include('layouts.partials._sidebare');
   
   @yield('content')
  </div>
</div>
@include('layouts.partials._scripts');
</body>
</html>
