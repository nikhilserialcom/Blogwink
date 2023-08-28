@extends('layout/main')
@section('content')
<div class="App">
    <div class="all_category_div">

        <div class="popular_articals">

            <div class="heading_ul_button_div">
                <div class="heading title">
                    <h2>{{ $title }}</h2>
                </div>
                <div class="categories_btn">
                    <div class="heading_ul_div ul_categaries demo_post">
                        <ul>
                            <li>all</li>
                            @foreach ($tagNames as $tagname)
                                <li>{{ $tagname->name }}</li>   
                            @endforeach
                            {{-- <li>Movie</li>
                            <li>Healthcare</li>
                            <li>Technology</li> 
                            <li>branding</li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card_main view_all_data">
                @foreach ($posts as $post)
                    @php
                        $tagName = implode('-',$post->tags->pluck('name')->toArray());
                        $url = url("api/blog/{$tagName}/{$post->slug}");
                    @endphp
                    <a href="{{ $url }}">
                        <div class="card">
                            <div class="img_div">
                                <img src="{{ $post->featured_image }}" alt="">
                            </div>
                            <div class="button_text_user_div">
                                <div class="btn_div">
                                    <button>
                                        @foreach ($post->tags as $tag)
                                            {{ $tag->name }}
                                        @endforeach
                                    </button>
                                </div>
                                <h3>{{ $post->title }}</h3>
                            </div>

                            <div class="users">
                                <div class="user_img_name_div">
                                    <div class="user_img_div">
                                        @if ($post->author)
                                            <img src=" {{ $post->author->avatar }}" alt="">     
                                        @else
                                            <img src=" {{ url('image/Image (2).svg') }}" alt="">     
                                        @endif    
                                    </div>
                                    <span>
                                        {{ $post->author->name }}
                                    </span>
                                </div>
                                <div class="date_div">
                                    {{ date('F j, Y',strtotime($post->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/viewAll.js') }}" defer></script>