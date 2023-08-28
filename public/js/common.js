var Scheme = window.location.protocol;
var hostname = window.location.hostname;
var SchemeAndHttpHost = Scheme + '//' + hostname;

const search_input_icon = document.querySelector('.search_input_icon');
const search_input_icon_i = document.querySelectorAll('.search_input_icon i');
const search_input_outer = document.querySelector('.search_input_outer');
const search_box =document.querySelector('.search_box');
const body = document.querySelector('body');
const sun = document.querySelector('.sun');
const moon = document.querySelector('.moon');
// const social_icon = document.querySelectorAll('.social_icon .icon_div');

// console.log(social_icon);

const serach_url = "api/search";
const search_page = "api/search-result";
// const blog_url = "api/blog";
// const category_post = "api/categoryPost";
const search_input = document.querySelector('.search');
const search_result =document.querySelector('.search_result .text');
const search_btn = document.querySelector('.search_btn');

var search_data;

let fa_bars = document.querySelector('.fa-bars');
let fa_xmark = document.querySelector('.fa-xmark');
let inner_nav = document.querySelector(' nav .inner_nav .logo_ul ul');

fa_bars.onclick = function () {
    inner_nav.classList.add('nav_ul_active');
    search_input_outer.classList.remove('hidden');
}

fa_xmark.onclick = function () {
    inner_nav.classList.remove('nav_ul_active');

}
search_input_icon.onclick = () => {
    search_input_outer.classList.toggle('hidden');
    if (search_input_outer.classList.contains('hidden')) {
        search_input_icon_i[0].style.display = 'none';
        search_input_icon_i[1].style.display = 'flex';
    } else {
        search_input_icon_i[0].style.display = 'flex';
        search_input_icon_i[1].style.display = 'none';
    }
}

let func_for_dark_mode = () => {
    localStorage.setItem('theme', 'dark');
    body.classList.add('dark');
    sun.classList.remove('clicked');
    moon.classList.add('clicked');
};
let func_for_light_mode = () => {
    localStorage.setItem('theme', 'light');
    body.classList.remove('dark');
    moon.classList.remove('clicked');
    sun.classList.add('clicked');
};
if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark');
    sun.classList.remove('clicked');
    moon.classList.add('clicked');
} else {
    body.classList.remove('dark');
    moon.classList.remove('clicked');
    sun.classList.add('clicked');
}
sun.addEventListener('click', func_for_light_mode);
moon.addEventListener('click', func_for_dark_mode);



var search = (search_value) => {
    fetch(serach_url,{
        method : "POST",
        body : JSON.stringify({
            search: search_value,
        }),
        headers : {
            'Content-type': 'application/json; charset=UTF-8',
        },
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            search_result.innerHTML = json.map(val => {
                const {title} = val;

                return `
                    <a href="${search_page}/${title}">
                        <p>${title}</p>
                    </a>
                `;
            }).join('');

        })
}

search_input.addEventListener('input',() => {
    var search_value = search_input.value;
    if (search_value) {
        search_box.classList.add("active");
    } else {
        search_box.classList.remove("active");
    }
    search(search_value);
})

search_btn.addEventListener('click', () => {
    search_data = search_input.value;
    if(search_data.trim() === '')
    {
        window.location.href = window.location.href;
    }
    else
    {
        search_box.classList.remove("active");
        search_input_outer.classList.toggle('hidden');
        if (search_input_outer.classList.contains('hidden')) {
            search_input_icon_i[0].style.display = 'none';
            search_input_icon_i[1].style.display = 'flex';
        } else {
            search_input_icon_i[0].style.display = 'flex';
            search_input_icon_i[1].style.display = 'none';
        }
        window.location.href = search_page + `/${search_data}`;
        search_input.value = '';
    }
})
// const footer_category_url = "api/footerCategory";
// const categoryPosturl = "api/categoryPost";
// const sub_Categories = document.querySelector('.footer_categories ul');
// console.log(sub_Categories);

// var footer_category = () => {
//     fetch(footer_category_url,{
//         method: "GET",
//         headers: {
//             'Content-type': 'application/json; charset=UTF-8',
//         },
//     })
//         .then(response => response.json())
//         .then(json => {
//             console.log(json);
//             sub_Categories.innerHTML = json.map(val => {
//                 const{name} = val;

//                 return `
//                     <a href="${categoryPosturl}/${name}"><li>${name}</li></a>
//                 `;
//             }).join('');
//         })
// }

// footer_category();

// social_icon[0].classList.add("active");

// var remove_click_div = () => {
//     social_icon.forEach(element => {
//         element.classList.remove("active");
//     });
// }

// social_icon.forEach(element => {
//     element.addEventListener('click', () => {
//         remove_click_div();
//     })
// });