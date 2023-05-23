<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('template.head')
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('template.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
                @include('template.topbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-0 text-gray-800">@yield('content-title')</h1>
                    @yield('content')
                </div>
            </div>
           
            <!-- End of Main Content -->

            @include('template.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('template.script')

</body>

</html>