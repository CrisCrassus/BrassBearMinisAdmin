import {createApp} from "vue"

import ProductCarousel from "./Components/ProductCarousel.vue";
import ProductFilter from "./Components/ProductFilter.vue";

app.component("product-carousel", ProductCarousel);
app.component("product-filter", ProductFilter);

app.mount("#app");
