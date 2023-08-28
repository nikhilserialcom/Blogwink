@extends('layout/main')
@section('content')
<div class="outer_all_blog">
    <div class="sub_all_blog">
        <div class="upload_blog">
            <div class="sub_blog">
                <div class="technology_btn">
                    <button>
                        @foreach ($posts->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </button>
                </div>
                <div class="heading">
                    <h3>{{ $posts->title }}</h3>
                </div>
                <div class="user_detail_blog">
                    <div class="user_name_logo">
                        <div class="image">
                            @if ($posts->author)
                                <img src=" {{ $posts->author->avatar }}" alt="">     
                            @else
                                <img src=" {{ url('image/Image (2).svg') }}" alt="">     
                            @endif
                        </div>
                        <div class="name_user">
                            <p>{{ $posts->author->name }}</p>
                        </div>
                    </div>
                    <div class="date_time">
                        <p>{{ date('F j, Y',strtotime($posts->created_at)) }}</p>
                    </div>
                </div>

                <div class="outer_blog">
                    <div class="child_blog">
                        <div class="blog_image">
                            <img src="{{ $posts->featured_image }}" alt="">
                        </div>
                        <div class="blog_contain">
                               {!! $posts->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="recent_articles">
            <div class="heading">
                <h3>Recent Articles</h3>
            </div>
            @foreach ($recentPosts as $recentPost)
                @php
                    $tagName = implode('-',$recentPost->tags->pluck('name')->toArray());
                    $url = url("api/blog/{$tagName}/{$recentPost->slug}");
                @endphp
                <a href="{{ $url }}">
                    <div class="sub_articles">
                            <div class="article_img">
                                <img src="{{ $recentPost->featured_image }}" alt="">
                            </div>
                            <div class="text">
                                <p>
                                    @foreach ($recentPost->tags as $tag)
                                        {{ $tag->name }}
                                    @endforeach
                                </p>
                            </div>
                            <div class="title">
                               <h3>{{ $recentPost->title }}</h3>
                            </div>
                            <div class="user_detail">
                                <div class="user_name_pic">
                                    <div class="img">    
                                        @if ($recentPost->author)
                                            <img src=" {{ $recentPost->author->avatar }}" alt="">     
                                        @else
                                            <img src=" {{ url('image/Image (2).svg') }}" alt="">     
                                        @endif                                                                                                
                                    </div>
                                    <div class="name">
                                        <p>{{ $recentPost->author->name }}</p>
                                    </div>
                                </div>
                                <div class="date_time">
                                    <p>{{ date('F j, Y',strtotime($recentPost->created_at)) }}</p>
                                </div>
                            </div>
                    </div>
                </a>                    
            @endforeach
        </div>
    </div>
</div>
@endsection