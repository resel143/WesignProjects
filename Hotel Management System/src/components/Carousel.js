import React from "react";
import { Carousel } from "react-responsive-carousel";

export default () => (
  <Carousel autoPlay>
    <div>
      <img
        alt=""
        src="https://www.inlifehealthcare.com/wp-content/uploads/2016/02/Seafood-dish-wallpaper_4074.jpg"
      />
      <p className="legend">Dish 01</p>
    </div>
    <div>
      <img
        alt=""
        src="https://c.ndtvimg.com/2019-04/nb4agmks_chicken-wings-generic_625x300_26_April_19.jpg"
      />
      <p className="legend">Dish 2</p>
    </div>
    <div>
      <img
        alt=""
        src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimg1.cookinglight.timeinc.net%2Fsites%2Fdefault%2Ffiles%2Fstyles%2F4_3_horizontal_-_1200x900%2Fpublic%2Fimage%2F2016%2F09%2Fmain%2F1610p34-white-bean-vegetable-bowls-frizzled-eggs-1.jpg%3Fitok%3Dp_bNHGNB&q=85"
      />
      <p className="legend">Dish 3</p>
    </div>
    <div>
      <img
        alt=""
        src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimg1.cookinglight.timeinc.net%2Fsites%2Fdefault%2Ffiles%2Fstyles%2F4_3_horizontal_-_1200x900%2Fpublic%2F1542730855%2Favocado-black-bean-and-charred-tomato-bowl-detox-book-p28_0.jpg%3Fitok%3Dcg-HtykS"
      />
      <p className="legend">Dish 4</p>
    </div>
    <div>
      <img
        alt=""
        src="https://recipesofhome.com/wp-content/uploads/2020/06/veg-biryani-recipe-720x540.jpg"
      />
      <p className="legend">Dish 5</p>
    </div>
    <div>
      <img
        alt=""
        src="https://img-global.cpcdn.com/recipes/753c306bfa314b58/751x532cq70/veg-manchurian-gravy-recipe-main-photo.jpg"
      />
      <p className="legend">Dish 6</p>
    </div>
  </Carousel>
);
