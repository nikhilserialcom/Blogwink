var Scheme = window.location.protocol;
var hostname = window.location.hostname;
var SchemeAndHttpHost = Scheme + '//' + hostname;

const blogUrl = "/api/blog";
// const allDataUrl = "/api/home";
const view_all_url = "/api/viewAllpost";
const demo_ul_li = document.querySelectorAll('.demo_post ul li');
const view_all_data = document.querySelector('.view_all_data');
const title = document.querySelector('.title h2');

// console.log(demo_ul_li);
// console.log(title.textContent);

demo_ul_li[0].classList.add('active');

var remove_demo = () => {
    demo_ul_li.forEach(element => {
        element.classList.remove('active');
    });
}

demo_ul_li.forEach(element => {
    element.addEventListener('click', () => {
        remove_demo();
        element.classList.add('active');
       li_text =  element.textContent
    //    console.log(li_text);
       view_post(li_text);
    })
})


var view_post = (li_text)=> {
    fetch(view_all_url,{
        method: "POST",
        body: JSON.stringify({
            status: title.textContent,
            categoryname: li_text,
        }),
        headers: {
            'content-type' : 'application/json; charset=UTF-8',
        },
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            view_all_data.innerHTML = json.map(val => {
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

// var all_data = (li_text) => {
//     fetch(allDataUrl,{
//         method: "POST",
//         body: JSON.stringify({
//             category : li_text
//         }),
//         headers: {
//             'content-type' : 'application/json; charset=UTF-8',
//         },
//     })
//         .then(response => response.json())
//         .then(json => {
//             // console.log(json);
//             view_all_data.innerHTML = json.map(val => {
//                 const{id,title,categoryname,postImage} = val;

//                 return `
//                 <div class="card">
//                     <div class="img_div">
//                         <img src="${postImage}" alt="">
//                     </div>

//                     <div class="button_text_user_div">
//                         <div class="btn_div">
//                             <button>${categoryname}</button>
//                         </div>
//                         <a href="${blogUrl}/${categoryname}/${id}"><h3>${title}</h3></a>
//                     </div>
//                 </div>
//                 `;
//             }).join('');
//         })
// }
