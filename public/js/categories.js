var Scheme = window.location.protocol;
var hostname = window.location.hostname;
var SchemeAndHttpHost = Scheme + '//' + hostname;

let Categories = document.querySelectorAll(".Categories");
let icon_i = document.querySelectorAll(".icon i");
let title_text_p = document.querySelectorAll(".title_text p");
const categoryUrl = "api/categories";
// const categoryPosturl = "api/categoryPost";
const category_data = document.querySelector('.category_data'); 


var li_text;
function remove_btn_color() {
    Categories.forEach(function (remove_color) {
        remove_color.classList.remove("bg_color");
    });
}

Categories.forEach(function (item_btn) {
    item_btn.addEventListener("click", function (event) {
        remove_btn_color();
        item_btn.classList.add("bg_color");

    });
});


icon_i.forEach(function (Categories_icon) {
    Categories_icon.addEventListener("click", function (event) {
        Categories_icon.classList.add("color");
    });
});

var category = () => {
    fetch(categoryUrl,{
        method: "GET",
        headers: {
            'content-type' : 'application/json; charset=UTF-8',
        }
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            category_data.innerHTML = json.map(val => {
                const{name,icon} = val;
                return `
                <a href='${categoryPosturl}/${name}'>
                    <div class="Categories">
                    <div class="icon">
                        ${icon}
                    </div>
                        <div class="title_text">
                            <p>${name}</p>
                        </div>
                    </div>
                </a>
                `;
            }).join('');
        })
}

category();

// const sub_Categories = document.querySelector('.box_Categories');
// const title_text = document.querySelector('.title_text p');
// console.log(sub_Categories);
// sub_Categories.addEventListener('click',() => {
//     text =  title_text.textContent;
//     console.log(text);
// })

// var footer_category = () => {
//     fetch(categoryUrl,{
//         method: "GET",
//         headers: {
//             'content-type' : 'application/json; charset=UTF-8',
//         },
//     })
//         .then(response => response.json())
//         .then(json => {
//             footer_category_data.innerHTML = json.map(val => {
//                 const{categoryName} = val;
//                 return` 
//                         <li>${categoryName}</li>
//                 `;
//             }).join('');
//         })
// }

// footer_category();




