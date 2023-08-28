@extends('layout/main')
@section('content')
<div class="outer_all_Categories">
    <div class="heading">
        <h3>Categories</h3>
    </div>
    <div class="sub_Categories">
        <div class="box_Categories category_data">
            {{-- <div class="Categories">
                <div class="icon">
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="title_text">
                    <p>enviroment & nature</p>
                </div>
            </div> --}}
        </div>

    </div>
</div>
@endsection
<script src="{{ asset("js/categories.js") }}" defer></script>