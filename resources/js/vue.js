import {createApp} from "vue/dist/vue.esm-bundler.js"

import ProductCarousel from "./Components/ProductCarousel.vue";
import ProductFilter from "./Components/ProductFilter.vue";

const app = createApp({});

app.component("product-carousel", ProductCarousel);
app.component("product-filter", ProductFilter);

app.mount("#fe-app");
