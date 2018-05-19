<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._header')
</head>

<body>

@include('partials._nav')

<div class="container">
@include('partials._messages')
    @yield('content')


</div>
<hr style="  width: 1145px;  float: center;">
<!-- end of .container -->

</body>

</html>