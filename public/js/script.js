var Scheme = window.location.protocol;
var hostname = window.location.hostname;
var SchemeAndHttpHost = Scheme + '//' + hostname;

// console.log(SchemeAndHttpHost);

// console.log(popularUrl);

const popularUrl = "api/home/popular";
const articalurl = "api/home/artical";
const recenturl = "api/home/recent";
const blogUrl = "api/blog";

const popular_artical_ul_li = document.querySelectorAll('.popular_artical ul li');
const post_data = document.querySelector('.post_data');
const all_artical_ul_li = document.querySelectorAll('.all_artical ul li');
const artical_data = document.querySelector('.artical_data');
const recent_artical_ul_li = document.querySelectorAll('.recent_artical ul li');
const recent_data = document.querySelector('.recent_data');

// var li_tex;

// console.log(popular_artical_ul_li);

const allrecenturl = "api/home/allrecent";
const all_recent = document.querySelector('.all_recent');
var all_recent_data = () => {
    fetch(allrecenturl, {
        method: 'GET',
        headers: {
            'content-type': 'application/json; charset=UTF-8',
        }
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            all_recent.innerHTML = json.map(val => {
                const{title,featured_image,slug,created_at} = val;
                const author = val.author;
                let tag_name = val.tags[0].name;

                const parseDate = new Date(created_at);
                const formattedDate = new Intl.DateTimeFormat('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }).format(parseDate);
                return `
                <a href="${blogUrl}/${tag_name}/${slug}">
                    <div class="card">
                        <div class="img_div">
                            <img src="${featured_image}" alt="">
                        </div>
                        
                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>${tag_name}</button>
                            </div>
                            <h3>${title}</h3>
                        </div>
                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="${author.avatar}" alt="">
                                </div>
                                <span>
                                    ${author.name}
                                </span>
                            </div>
                            <div class="date_div">
                               ${formattedDate}
                            </div>
                        </div>
                    </div>
                </a>
                `;
            }).join('');
        })
}
all_recent_data();

recent_artical_ul_li[0].classList.add('active');

var remove_click_li_recent = () => {
    recent_artical_ul_li.forEach(element => {
        element.classList.remove('active');
    })
}

recent_artical_ul_li.forEach(element => {
    element.addEventListener('click', () => {
        remove_click_li_recent();
        element.classList.add('active');
        li_tex = element.textContent;
        recent_artical(li_tex);
    })
});

var recent_artical = (li_tex) => {
    fetch(recenturl, {
        method: 'POST',
        body: JSON.stringify({
            category: li_tex
        }),
        headers: {
            'content-type': 'application/json; charset=UTF-8',
        },
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);

            recent_data.innerHTML = json.map(val => {
                const{title,featured_image,slug,created_at} = val;
                const author = val.author;
                let tag_name = val.tags[0].name;
                const parseDate = new Date(created_at);
                const formattedDate = new Intl.DateTimeFormat('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }).format(parseDate);
                return `
                <a href="${blogUrl}/${tag_name}/${slug}">
                    <div class="card">
                        <div class="img_div">
                            <img src="${featured_image}" alt="">
                        </div>
                        
                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>${tag_name}</button>
                            </div>
                            <h3>${title}</h3>
                        </div>
                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="${author.avatar}" alt="">
                                </div>
                                <span>
                                   ${author.name}
                                </span>
                            </div>
                            <div class="date_div">
                               ${formattedDate}
                            </div>
                        </div>
                    </div>
                </a>
                `;
            }).join('')
        })
}

const AllpopularUrl = "api/home/allpopular";
const all_popular_data = document.querySelector('.all_popular');

var all_popular = () => {
    fetch(AllpopularUrl, {
        method: "GET",
        headers: {
            'content-type': 'application/json; charset=UTF-8',
        }
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            all_popular_data.innerHTML = json.map(val => {
                const{title,featured_image,slug,created_at} = val;
                const author = val.author;
                let tag_name = val.tags[0].name;

                const parseDate = new Date(created_at);
                const formattedDate = new Intl.DateTimeFormat('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }).format(parseDate);
                return `
                <a href="${blogUrl}/${tag_name}/${slug}">
                    <div class="card">
                        <div class="img_div">
                            <img src="${featured_image}" alt="">
                        </div>
                        
                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>${tag_name}</button>
                            </div>
                            <h3>${title}</h3>
                        </div>
                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="${author.avatar}" alt="">
                                </div>
                                <span>
                                    ${author.name}
                                </span>
                            </div>
                            <div class="date_div">
                               ${formattedDate}
                            </div>
                        </div>
                    </div>
                </a>
                `;
            }).join('');
        })
}

all_popular();

popular_artical_ul_li[0].classList.add('active');


var remove_click_li = () => {
    popular_artical_ul_li.forEach(element => {
        element.classList.remove('active');
    })
}

popular_artical_ul_li.forEach(element => {
    element.addEventListener('click', () => {
        remove_click_li();
        element.classList.add('active');
        li_text = element.textContent;
        // console.log(li_text);
        popular(li_text);
    })
});

var popular = (li_tex) => {
    fetch(popularUrl, {
        method: 'POST',
        body: JSON.stringify({
            category: li_tex
        }),
        headers: {
            'content-type': 'application/json; charset=UTF-8',
        },
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            post_data.innerHTML = json.map(val => {
                const{title,featured_image,slug,created_at} = val;
                const author = val.author;
                let tag_name = val.tags[0].name;

                const parseDate = new Date(created_at);
                const formattedDate = new Intl.DateTimeFormat('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }).format(parseDate);
                return `
                <a href="${blogUrl}/${tag_name}/${slug}">
                    <div class="card">
                        <div class="img_div">
                            <img src="${featured_image}" alt="">
                        </div>
                        
                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>${tag_name}</button>
                            </div>
                            <h3>${title}</h3>
                        </div>
                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="${author.avatar}" alt="">
                                </div>
                                <span>
                                    ${author.name}
                                </span>
                            </div>
                            <div class="date_div">
                               ${formattedDate}
                            </div>
                        </div>
                    </div>
                </a>
                `;
            }).join('');
        })
}

const Allposturl = "api/home/allpost";
const All_post_data = document.querySelector('.all_post');

var Allpost_data = () => {
    fetch(Allposturl, {
        method: "GET",
        headers: {
            'content-type': 'application/json; charset=UTF-8',
        }
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            All_post_data.innerHTML = json.map(val => {
                const{title,featured_image,slug,created_at} = val;
                const author = val.author;
                let tag_name = val.tags[0].name;

                const parseDate = new Date(created_at);
                const formattedDate = new Intl.DateTimeFormat('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }).format(parseDate);
                return `
                <a href="${blogUrl}/${tag_name}/${slug}">
                    <div class="card">
                        <div class="img_div">
                            <img src="${featured_image}" alt="">
                        </div>
                        
                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>${tag_name}</button>
                            </div>
                            <h3>${title}</h3>
                        </div>
                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="${author.avatar}" alt="">
                                </div>
                                <span>
                                    ${author.name}
                                </span>
                            </div>
                            <div class="date_div">
                               ${formattedDate}
                            </div>
                        </div>
                    </div>
                </a>
                `;
            }).join('');
        })
}
Allpost_data();

all_artical_ul_li[0].classList.add('active');

var remove_click_li_all = () => {
    all_artical_ul_li.forEach(element => {
        element.classList.remove('active');
    })
}

all_artical_ul_li.forEach(element => {
    element.addEventListener('click', () => {
        remove_click_li_all();
        element.classList.add('active');
        li_tex = element.textContent;
        all_artical(li_tex);
    })
})

var all_artical = (li_tex) => {
    fetch(articalurl, {
        method: 'POST',
        body: JSON.stringify({
            category: li_tex
        }),
        headers: {
            'content-type': 'application/json; charset=UTF-8',
        },
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            artical_data.innerHTML = json.map(val => {
                const{title,featured_image,slug,created_at} = val;
                const author = val.author;
                let tag_name = val.tags[0].name;

                const parseDate = new Date(created_at);
                const formattedDate = new Intl.DateTimeFormat('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }).format(parseDate);
                return `
                <a href="${blogUrl}/${tag_name}/${slug}">
                    <div class="card">
                        <div class="img_div">
                            <img src="${featured_image}" alt="">
                        </div>
                        
                        <div class="button_text_user_div">
                            <div class="btn_div">
                                <button>${tag_name}</button>
                            </div>
                            <h3>${title}</h3>
                        </div>
                        <div class="users">
                            <div class="user_img_name_div">
                                <div class="user_img_div">
                                    <img src="${author.avatar}" alt="">
                                </div>
                                <span>
                                    ${author.name}
                                </span>
                            </div>
                            <div class="date_div">
                               ${formattedDate}
                            </div>
                        </div>
                    </div>
                </a>
                `;
            }).join('')
        })
}

const slider = document.querySelectorAll('.btn_slides span');

var indexValue = 1;

setTimeout(() => {
    showImg(indexValue);
}, 700);

function btn_slide(e) {
    showImg(indexValue = e);
}

function side_slide(e) {
    showImg(indexValue += e);
}

function showImg(e) {
    var i;
    const img = document.querySelectorAll('.images .slider_image .img_and_details_div');


    if (e > img.length) {
        indexValue = 1;
    }

    if (e < 1) {
        indexValue = img.length;
    }

    for (i = 0; i < img.length; i++) {
        img[i].style.display = "none";
    }

    for (i = 0; i < slider.length; i++) {
        slider[i].style.background = "#fff";
    }

    img[indexValue - 1].style.display = "flex";
    slider[indexValue - 1].style.background = "#808080";

    clearInterval(interval);

    interval = setInterval(function () {
        showImg(indexValue += 1);
    }, 7000);
}

var interval = setInterval(function () {
    showImg(indexValue += 1);
}, 7000);
