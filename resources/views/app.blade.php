<!-- include the site header -->
@include('layouts._header')

<!-- include the navigation -->
@include('layouts._nav')

<!-- content specific for the page the will inherit this master page -->
@yield('content')

<!-- sometimes we need to add specific script at the footer of the page that will
 inherit this master page -->
@yield('footer')

<!-- include the footer -->
@include('layouts._footer')
