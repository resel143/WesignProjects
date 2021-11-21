// check
document.getElementById("lana").innerHTML = "Latest News";

// popular post
const PopPost = [{url:"../images/post_img1.jpg",title:"1 देश"},{url:"../images/post_img1.jpg",title:"2 देश"},{url:"../images/post_img1.jpg",title:"3 देश"},{url:"../images/post_img1.jpg",title:"4 देश"}];
    document.getElementById("PopPost").innerHTML= PopPost.map(i => `
    <li>
          <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="${i.url}"> </a>
            <div class="media-body"> <a href="single_page.html" class="catg_title"> ${i.title}</a> </div>
          </div>
        </li>
    `).join("")

// latest news
const LateNews = [{url:"../images/post_img1.jpg",title:"1 देश"},{url:"../images/post_img1.jpg",title:"2 देश"},{url:"../images/post_img1.jpg",title:"3 देश"},{url:"../images/post_img1.jpg",title:"4 देश"}];
            document.getElementById("ticker01").innerHTML= LateNews.map(i => `
            <li><a href="#"><img src="${i.url}" alt="">${i.title}</a></li>
            `).join("")


// footer tags
// const tags = [{title:"Sports"},{title:"Fashion"},{title:"Business"},{title:"Photography"},{title:"Technology"},{title:"Games"},{title:"Life & Style"}];
// document.getElementById("tags").innerHTML= tags.map(i => `
//   <li><a href="#">${i.title}</a></li>
// `).join("")