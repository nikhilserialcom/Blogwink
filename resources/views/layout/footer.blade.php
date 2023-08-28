<footer>
    <div class="main_footer">
        <div class="logo_detail_div">
            <div class="footer_img_logo_div">
            <a href="{{ route('user.name') }}"><img src="{{ url('image/logo.png') }}" alt=""></a>
            </div>
            <p>
                Did you come here for something in particular or just general Riker.
            </p>
        </div>

        <div class="bloag_categ_quick_link_outer_div">
            <div class="bloags_category_div ">
                <h4>Blogs</h4>
                <ul>
                    <a href="{{ url('api/categoryPost/Anime') }}"><li>Anime</li></a>
                    <a href="{{ url('api/categoryPost/Game') }}"><li>Game</li></a>
                    <a href="{{ url('api/categoryPost/MovieS') }}"><li>Movie</li></a>
                    <a href="{{ url('api/categoryPost/Healthcare') }}"><li>Healthcare</li></a>
                    <a href="{{ url('api/categoryPost/Food') }}"><li>Food</li></a>
                </ul>
            </div>

            <div class="quick_links_div">
                <h4>Quick links</h4>
                <ul>
                    <li>FAQ</li>
                    <li>Terms & conditions</li>
                    <li>Support</li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>

        <div class="subscriibe_followlink_div">

            {{-- <div class="subscribe_label_input_div">
                <h4>Subscribe for newsletter</h4>
                <div class="subscribe_label_input_button_div">
                    <input type="email" placeholder="Your Email">
                    <button>Subscribe</button>
                </div>
            </div> --}}

            <div class="social_media_lable_icon_div ">
                <h4>Follow On:</h4>
                <div class="social_media_icon_div social_icon">
                    <div class="icon_div active">
                        <i class="fa-brands fa-twitter"></i>
                    </div>

                    <div class="icon_div">
                        <i class="fa-brands fa-facebook-f"></i>
                    </div>

                    <div class="icon_div">
                        <i class="fa-brands fa-pinterest"></i>
                    </div>

                    <div class="icon_div">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
</div>

</body>

</html>