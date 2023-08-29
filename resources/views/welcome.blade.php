@extends('layout/main')
@section('content')
<div class="App">

    <div class="top_section">
        <div class="content">
            <div class="images">
                <div class="slider_image">
                    @foreach ($sliders as $slider)
                        <div class="img_and_details_div">
                            <img src="{{ $slider->featured_image }}">
                            <div class="first-txt">
                                <div class="button">
                                    <button>game</button>
                                </div>
                                <div class="title">
                                    <h3>{{ $slider->title }}</h3>
                                </div>
                            </div>
                        </div>  
                    @endforeach
                </div>
            </div>


            <div class="left_right_arrows" style="display: none;">

                <div class="sliders left" onclick="side_slide(-1)">
                    <span class="fas fa-angle-left"></span>
                </div>
                <div class="sliders right" onclick="side_slide(1)">
                    <span class="fas fa-angle-right"></span>
                </div>

            </div>

        </div>

        <div class="btn_slides">
            <span onclick="btn_slide(1)"></span>
            <span onclick="btn_slide(2)"></span>
            <span onclick="btn_slide(3)"></span>
            <span onclick="btn_slide(4)"></span>
            <span onclick="btn_slide(5)"></span>
        </div>
    </div>


    <div class="all_category_div">
        <div class="popular_articals">

            <div class="heading_ul_button_div">
                <div class="heading">
                    <h2>Recent Articals</h2>
                </div>
                <div class="categories_btn">
                    <div class="heading_ul_div recent_artical">
                        <ul>
                            <li>all</li>
                            @foreach ($tagNames as $tagName)  
                                <li>{{ $tagName->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="View_all_btn recent_btn">
                        <a href="{{ url('api/viewAllpost/recentArtical') }}">    
                            <button>
                                View All
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card_main all_recent recent_data">
                    {{-- <div class="card">
                        <div class="img_div">
                            <img src="{{ asset('image/top.png') }}" alt="">
                        </div>

                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>Technology</button>
                            </div>
                            <h3>The Impact of Technology on the Workplace: How Technology is Changing</h3>
                        </div>

                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="{{ asset('image/user.png') }}" alt="">
                                </div>
                                <span>
                                    Tracey Wilson
                                </span>
                            </div>
                            <div class="date_div">
                                August 20, 2022
                            </div>
                        </div>
                    </div> --}}
            {{-- </div> --}}
            </div>
        </div>

        <div class="popular_articals">

            <div class="heading_ul_button_div">
                <div class="heading">
                    <h2>Popular Articals</h2>
                </div>
                <div class="categories_btn">
                    <div class="heading_ul_div popular_artical ">
                        <ul>
                            <li>all</li>
                            @foreach ($tagNames as $tagName)  
                                <li>{{ $tagName->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="View_all_btn">
                        <a href="{{ url('api/viewAllpost/popularArtical') }}">
                            <button>
                                View All
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                       </a>
                    </div>
                </div>
            </div>

            <div class="card_main all_popular post_data">
                    {{-- <div class="card">
                        <div class="img_div">
                            <img src="{{ asset('image/top.png') }}" alt="">
                        </div>

                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>Technology</button>
                            </div>
                            <h3>The Impact of Technology on the Workplace: How Technology is Changing</h3>
                        </div>

                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="{{ asset('image/user.png') }}" alt="">
                                </div>
                                <span>
                                    Tracey Wilson
                                </span>
                            </div>
                            <div class="date_div">
                                August 20, 2022
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>

        <div class="popular_articals ">

            <div class="heading_ul_button_div">
                <div class="heading">
                    <h2>All Articals</h2>
                </div>
                <div class="categories_btn">
                    <div class="heading_ul_div all_artical">
                        <ul>
                            <li>all</li>
                            @foreach ($tagNames as $tagName)  
                                <li>{{ $tagName->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="View_all_btn">
                       <a href="{{ url('api/viewAllpost/allArtical') }}">
                            <button>
                                View All
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                       </a>
                    </div>
                </div>
            </div>
            <div class="card_main all_post artical_data">
                    {{-- <div class="card">
                        <div class="img_div">
                            <img src="{{ asset('image/top.png') }}" alt="">
                        </div>

                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>Technology</button>
                            </div>
                            <h3>The Impact of Technology on the Workplace: How Technology is Changing</h3>
                        </div>

                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="{{ asset('image/user.png') }}" alt="">
                                </div>
                                <span>
                                    Tracey Wilson
                                </span>
                            </div>
                            <div class="date_div">
                                August 20, 2022
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>

    </div>
</div>
@endsection
<script src="{{ asset('js/script.js') }}" defer></script>