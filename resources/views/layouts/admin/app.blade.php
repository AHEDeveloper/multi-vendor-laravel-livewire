<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sales Admin | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="stylesheet" href="/fonts/css/fontiran.css">
    <link rel="stylesheet" href="/fonts/css/style.css">
    @include('layouts.admin.link')
</head>
<body class=" layout-boxed">

<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>


<div class="header-container container-xxl">
    <livewire:admin.layout.header/>
</div>

<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <livewire:admin.layout.sidebar/>


        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">





{{--                    <div class="row layout-top-spacing">--}}
{{--                        {{$slot}}--}}
{{--                    </div>--}}
                    {{$slot}}
                </div>

            </div>

        </div>


</div>

@include('layouts.admin.script')

</body>
</html>
