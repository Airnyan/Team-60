
const products = [
  {
    id: 1,
    name: "Oversized Logo Tee",
    slug: "Oversized Logo Tee",
    price: 35,
    category: "T shirts",
    sizes: ["S", "M", "L", "XL"],
    colors: ["White", "Neutral"],
    isNew: true,
    image:
      "https://images.pexels.com/photos/955870/pexels-photo-955870.jpeg?auto=compress&cs=tinysrgb&w=800"
  },
  {
    id: 2,
    name: "Noir Street Hoodie",
    slug: "Noir Street Hoodie",
    price: 65,
    category: "Hoodies",
    sizes: ["M", "L", "XL"],
    colors: ["Black"],
    isNew: true,
    image:
      "https://images.pexels.com/photos/6311579/pexels-photo-6311579.jpeg?auto=compress&cs=tinysrgb&w=800"
  },
  {
    id: 3,
    name: "Sandstone Tracksuit",
    slug: "Sandstone Tracksuit",
    price: 110,
    category: "Tracksuits",
    sizes: ["S", "M", "L"],
    colors: ["Neutral"],
    isNew: false,
    image:
      "https://images.pexels.com/photos/7671165/pexels-photo-7671165.jpeg?auto=compress&cs=tinysrgb&w=800"
  },
  {
    id: 4,
    name: "Washed Denim Cap",
    slug: "Washed Denim Cap",
    price: 28,
    category: "Caps",
    sizes: [],
    colors: ["Denim"],
    isNew: true,
    image:
      "https://images.pexels.com/photos/6311651/pexels-photo-6311651.jpeg?auto=compress&cs=tinysrgb&w=800"
  },
  {
    id: 5,
    name: "Minimalist Wool Hat",
    slug: "Minimalist Wool Hat",
    price: 40,
    category: "Hats",
    sizes: [],
    colors: ["Neutral", "Black"],
    isNew: false,
    image:
      "https://images.pexels.com/photos/3738085/pexels-photo-3738085.jpeg?auto=compress&cs=tinysrgb&w=800"
  },
  {
    id: 6,
    name: "Monochrome Wall Poster",
    slug: "Monochrome Wall Poster",
    price: 22,
    category: "Posters",
    sizes: [],
    colors: ["Black", "White"],
    isNew: true,
    image:
      "https://images.pexels.com/photos/102129/pexels-photo-102129.jpeg?auto=compress&cs=tinysrgb&w=800"
  },
  {
    id: 7,
    name: "Sticker Pack – Essentials",
    slug: "Sticker Pack Essentials",
    price: 12,
    category: "Stickers",
    sizes: [],
    colors: ["Neutral"],
    isNew: true,
    image:
      "https://images.pexels.com/photos/1404220/pexels-photo-1404220.jpeg?auto=compress&cs=tinysrgb&w=800"
  },
  {
    id: 8,
    name: "Matte Black Sun Glasses",
    slug: "Matte Black Sunglasses",
    price: 55,
    category: "Sun glasses",
    sizes: [],
    colors: ["Black"],
    isNew: false,
    image:
      "https://images.pexels.com/photos/46710/pexels-photo-46710.jpeg?auto=compress&cs=tinysrgb&w=800"
  },
  {
    id: 9,
    name: "Everyday Essentials Tee",
    slug: "Everyday Essentials Tee",
    price: 30,
    category: "T shirts",
    sizes: ["XS", "S", "M"],
    colors: ["White"],
    isNew: false,
    image:
      "https://images.pexels.com/photos/10026491/pexels-photo-10026491.jpeg?auto=compress&cs=tinysrgb&w=800"
  }
];

const state = {
  search: "",
  categories: new Set(),
  maxPrice: 500,
  size: null,
  color: null
};

const productsGrid = document.getElementById("productsGrid");
const searchInput = document.getElementById("searchInput");
const priceRange = document.getElementById("priceRange");
const priceValue = document.getElementById("priceValue");
const clearAllButton = document.getElementById("clearAll");
const noResults = document.getElementById("noResults");

function renderProducts() {
  productsGrid.innerHTML = "";

  const filtered = products.filter((product) => {

    if (state.search) {
      const term = state.search.toLowerCase();
      const matchesName =
        product.name.toLowerCase().includes(term) ||
        (product.slug && product.slug.toLowerCase().includes(term));
      if (!matchesName) return false;
    }


    if (state.categories.size > 0 && !state.categories.has(product.category)) {
      return false;
    }


    if (product.price > state.maxPrice) {
      return false;
    }


    if (state.size && product.sizes.length > 0) {
      if (!product.sizes.includes(state.size)) return false;
    } else if (state.size && product.sizes.length === 0) {
      return false;
    }


    if (state.color && !product.colors.includes(state.color)) {
      return false;
    }

    return true;
  });

  if (filtered.length === 0) {
    noResults.hidden = false;
    return;
  }

  noResults.hidden = true;

  filtered.forEach((product) => {
    const card = document.createElement("article");
    card.className = "product-card";

    const media = document.createElement("div");
    media.className = "product-media";

    const img = document.createElement("img");
    img.src = product.image;
    img.alt = product.name;

    media.appendChild(img);

    if (product.isNew) {
      const badge = document.createElement("div");
      badge.className = "badge";
      badge.textContent = "NEW ARRIVAL";
      media.appendChild(badge);
    }

    const info = document.createElement("div");
    info.className = "product-info";

    const name = document.createElement("p");
    name.className = "product-name";
    name.textContent = product.name;

    const price = document.createElement("p");
    price.className = "product-price";
    price.textContent = `£${product.price.toFixed(2)}`; 

    info.appendChild(name);
    info.appendChild(price);

    card.appendChild(media);
    card.appendChild(info);
    productsGrid.appendChild(card);
  });
}


searchInput.addEventListener("input", (e) => {
  state.search = e.target.value.trim();
  renderProducts();
});

priceRange.addEventListener("input", (e) => {
  state.maxPrice = Number(e.target.value);
  priceValue.textContent = `£${state.maxPrice}`; 
  renderProducts();
});


document.querySelectorAll(".category-filter").forEach((checkbox) => {
  checkbox.addEventListener("change", (e) => {
    const value = e.target.value;
    if (e.target.checked) {
      state.categories.add(value);
    } else {
      state.categories.delete(value);
    }
    renderProducts();
  });
});


document.querySelectorAll(".size-pill").forEach((pill) => {
  pill.addEventListener("click", () => {
    const size = pill.dataset.size;

    if (state.size === size) {
      state.size = null;
      pill.classList.remove("is-active");
    } else {
      state.size = size;
      document
        .querySelectorAll(".size-pill")
        .forEach((p) => p.classList.remove("is-active"));
      pill.classList.add("is-active");
    }
    renderProducts();
  });
});


document.querySelectorAll(".color-pill").forEach((pill) => {
  pill.addEventListener("click", () => {
    const color = pill.dataset.color;

    if (state.color === color) {
      state.color = null;
      pill.classList.remove("is-active");
    } else {
      state.color = color;
      document
        .querySelectorAll(".color-pill")
        .forEach((p) => p.classList.remove("is-active"));
      pill.classList.add("is-active");
    }
    renderProducts();
  });
});


clearAllButton.addEventListener("click", () => {
  state.search = "";
  state.categories.clear();
  state.maxPrice = 500;
  state.size = null;
  state.color = null;

  searchInput.value = "";
  priceRange.value = 500;
  priceValue.textContent = "£500"; 

  document.querySelectorAll(".category-filter").forEach((cb) => {
    cb.checked = false;
  });

  document
    .querySelectorAll(".size-pill")
    .forEach((pill) => pill.classList.remove("is-active"));

  document
    .querySelectorAll(".color-pill")
    .forEach((pill) => pill.classList.remove("is-active"));

  renderProducts();
});


document.querySelectorAll(".filter-toggle").forEach((btn) => {
  btn.addEventListener("click", () => {
    const group = btn.closest(".filter-group");
    group.classList.toggle("is-collapsed");
  });
});

renderProducts();
