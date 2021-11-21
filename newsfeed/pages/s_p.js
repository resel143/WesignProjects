

// latest news
const items = [{title: "My First News Item"},{title: "My Second News Item"},{title: "My Third News Item"},{title: "My Fourth News Item"},{title: "My Fifth News Item"},{title: "My Sixth News Item"},{title: "My Seventh News Item"}];
document.getElementById("ticker01").innerHTML= items.map(i => {return `<li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">${i.title}</a></li>`}).join("");


// post item
const values = [{hop:"My First Heading", aop:"Author of Post",category:"Category1, Category2",url:"../images/single_post_img.jpg", qop:"Quote of Post",cop:"Content of Post"}];
              const img = document.createElement("img");
              img.src = "../images/single_post_img.jpg";
              img.className="img-center";
              document.getElementById("iop").prepend(img);
              document.getElementById("cateop").innerHTML = values.map(i => `${i.category}`)
              document.getElementById("aop").innerHTML = values.map(i => `${i.aop}`);
              document.getElementById("hop").innerHTML = values.map(i => `${i.hop}`);
              document.getElementById("cop").innerHTML = values.map(i => `${i.cop}`);
              document.getElementById("qop").innerHTML = values.map(i => `${i.qop}`);
          
              
// Related Posts
const RelPost = [{url:"../images/post_img1.jpg",title:"1 Hello World"},
                {url:"../images/post_img1.jpg",title:"2 Hello World"},
                {url:"../images/post_img1.jpg",title:"3 Hello World"}];
        document.getElementById("rel").innerHTML = RelPost.map(i =>`
          <li><div class="media"> <a class="media-left" ref="single_page.html"> 
          <img src="${i.url}" alt=""> </a><div class="media-body"> 
            <a class="catg_title" href="single_page.html"> ${i.title}</a> </div>
            </div></li>
        `).join("");


// Popular Posts
const PopPost = [{url:"../images/post_img1.jpg",title:"1 Hello World"},
                {url:"../images/post_img1.jpg",title:"2 Hello World"},
                {url:"../images/post_img1.jpg",title:"3 Hello World"},
                {url:"../images/post_img1.jpg",title:"4 Hello World"}];
            document.getElementById("poppos").innerHTML = PopPost.map(i =>`
              <li>
                 <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="${i.url}"> </a>
                    <div class="media-body"> <a href="single_page.html" class="catg_title">${i.title}</a> </div>
                 </div>
              </li>
            `).join("");


// Different Categories
const divides = [{title:"Sports"},{title:"Fashion"},{title:"Business"},{title:"Photography"},{title:"Technology"},{title:"Games"},{title:"Life & Style"}];
document.getElementById("divid").innerHTML= divides.map(i => `
  <li class="cat-item"><a href="#">${i.title}</a></li>
`).join("");

// footer tags
const tags = [{title:"Sports"},{title:"Fashion"},{title:"Business"},{title:"Photography"},{title:"Technology"},{title:"Games"},{title:"Life & Style"}];
          document.getElementById("tags").innerHTML= tags.map(i => `
            <li><a href="#">${i.title}</a></li>
          `).join("")