let div_insta_post = document.querySelector(".div-insta-post");

let cards = [
  {
    id: 0,
    title: "La mejor calidad para tus pies.",
    description: "Card 1 description",
    images: "public/img1.jpg",
  },
  {
    id: 1,
    title: "Card 2",
    description: "Card 2 description",
    images: "public/img2.jpg",
  },
  {
    id: 2,
    title: "Card 3",
    description: "Card 3 description",
    images: "public/img5.jpg",
  },
  {
    id: 3,
    title: "Card 4",
    description: "Card 4 description",
    images: "public/img1.jpg",
  },
  {
    id: 4,
    title: "Card 5",
    description: "Card 5 description",
    images: "public/img2.jpg",
  },
  {
    id: 5,
    title: "Card 6",
    description: "Card 6 description",
    images: "public/img5.jpg",
  },
];

cards.forEach((card) => {
  let div_card = document.createElement("div");
  div_card.classList.add("div-card");

  div_card.innerHTML = `
                  <img class="div-card-img" src="/peliShop_PHP/src/${card.images}" alt="${card.title}" />
                <div class="div-card-info">
                    <h5 class="div-card-title">${card.title}</h5>
                  <p class="div-card-description">
                    ${card.description}
                  </p>
                  <a href="#" class="div-card-readmore">
                    Read more
                    <svg
                      class="div-card-svg"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 14 10"
                    >
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9"
                      />
                    </svg>
                  </a>
                </div>
    `;
  div_insta_post.appendChild(div_card);
});

// Carrusel

const track = document.querySelector(".div-insta-post");
const items = Array.from(track.children);
const nextButton = document.querySelector(".right");
const prevButton = document.querySelector(".left");

let currentIndex = 0;

const updateCarousel = () => {
  const itemWidth = items[0].getBoundingClientRect().width;
  const newPosition = -443 * currentIndex;
  track.style.transform = `translateX(${newPosition}px)`;
};

nextButton.addEventListener("click", () => {
  if (currentIndex < items.length - 3) {
    currentIndex++;
  } else {
    currentIndex = 0;
  }
  updateCarousel();
});

prevButton.addEventListener("click", () => {
  if (currentIndex > 0) {
    currentIndex--;
  } else {
    currentIndex = items.length - 3;
  }
  updateCarousel();
});

setInterval(() => {
  if (currentIndex < items.length - 3) {
    currentIndex++;
  } else {
    currentIndex = 0;
  }
  updateCarousel();
}, 3000);

window.addEventListener("resize", updateCarousel);
