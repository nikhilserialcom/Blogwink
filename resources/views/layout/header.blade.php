<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <link rel="shortcut icon" href="{{ asset('image/blogicon.png') }}" type="image/png">
    {{-- icon css --}}
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css') }}">
    <link href="{{ asset('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css') }}" rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css') }}" />
    {{-- app css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- app script --}}
    <script src="{{ asset('js/common.js') }}" defer></script>
    <title>Blog Website</title>
</head>

<body  class="all_contain">

    {{-- navbar start --}}
        <nav>
            <div class="inner_nav">
                <div class="logo_ul">
                    <i class="fa-solid fa-bars"></i>
                    <div class="logo">
                       <a href="{{ route('user.name') }}"><img src="" alt=""></a>
                    </div>
                    <ul>
                        <i class="fa-solid fa-xmark"></i>
                        <li><a href="{{ route('user.category') }}">Categories</a></li>
                        <li><a href="">Pages</a></li>
                        <li><a href="">About</a></li>
                    </ul>
                </div>

                <div class="search_lang_mode_div">

                    <div class="serach_div">
                        <div class="search_input_outer">
                            <input type="search" placeholder="Search" class="search">
                            <div class="search_icon_design search_btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <div class="search_box">
                                <div class="sub_box ">
                                    <div class="search_text search_result">
                                        <div class="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <span class="search_input_icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </div>

                    <div class="mode">
                        <div class="sun clicked">
                            <i class='bx bx-sun'></i>
                        </div>

                        <div class="moon">
                            <i class="fa-regular fa-moon dark"></i>
                        </div>
                    </div>

                </div>
        </nav>
    {{-- navbar end --}}