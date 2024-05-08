<template>
    <div class="w-full pt-4">
        <div class="border border-solid border-primary/50">
            <div
                v-if="loading"
                class="h-96 flex justify-center items-center bg-[#f5f5f5]"
            >
                <looping-rhombuses-spinner
                    :animation-duration="4000"
                    :size="50"
                    color="#1E293B"
                />
            </div>
            <div v-else v-for="(filter, key) in filters">
                <div
                    v-if="filter.show === true"
                    @click="toggleFilter(key)"
                    class="bg-[#f5f5f5] flex justify-between font-ibarra px-3 py-4 items-center cursor-pointer"
                >
                    <h3 class="text-xl capitalize">
                        {{ key.replaceAll("_", " ") }}
                    </h3>
                    <svg
                        @click="toggleFilter(key)"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                        :class="
                            filter.isOpen
                                ? 'transform rotate-90'
                                : 'transform rotate-0'
                        "
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m8.25 4.5 7.5 7.5-7.5 7.5"
                        />
                    </svg>
                </div>
                <div v-if="filter.isOpen" class="ml-4">
                    <div
                        v-for="(status, key) in filter.filters"
                        class="font-ibarra my-4 flex gap-x-4 items-center"
                    >
                        <input
                            type="checkbox"
                            :name="key"
                            :id="key"
                            :value="status.selected"
                            v-model="status.selected"
                        />
                        <label :for="key" class="capitalize">{{
                            key.replaceAll("-", " ")
                        }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div
            @click="constructQuery"
            class="mt-5 text-xl cursor-pointer text-decoration-none text-center py-4 bg-primary font-ibarra text-white hover:text-primary hover:bg-white hover:text-bold border border-solid border-primary transition-all duration-200"
        >
            Apply Filters
        </div>
    </div>
</template>
<script>
import { LoopingRhombusesSpinner } from "epic-spinners";

export default {
    name: "ProductFilter",
    components: {
        LoopingRhombusesSpinner
    },
    props: {
        hideRange: {
            type: Boolean,
            default: false,
        },
        hideUnitType: {
            type: Boolean,
            default: false,
        },
        hideMaterial: {
            type: Boolean,
            default: false,
        },
        hideQuality: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            loading: true,
            filters: {
                unit_type: {
                    filters: {},
                    isOpen: false,
                    show: true,
                },
                range: {
                    filters: {},
                    isOpen: false,
                    show: true,
                },
                quality: {
                    filters: {
                        premium: { selected: false },
                        batchpainted: { selected: false },
                        restored: { selected: false },
                    },
                    isOpen: false,
                    show: true,
                },
                material: {
                    filters: {
                        plastic: { selected: false },
                        metal: { selected: false },
                        resin: { selected: false },
                        mixed: { selected: false },
                    },
                    isOpen: false,
                    show: true,
                },
            },
        };
    },
    mounted() {
        this.checkShow();
        this.rangeSlugs();
        this.unitTypeSlugs();
    },
    methods: {
        toggleFilter(key) {
            this.filters[key].isOpen = !this.filters[key].isOpen;
        },
        checkShow() {
            if (this.hideRange === true) {
                this.filters.range.show = false;
            }
            if (this.hideUnitType === true) {
                this.filters.unit_type.show = false;
            }
            if (this.hideMaterial === true) {
                this.filters.material.show = false;
            }
            if (this.hideQuality === true) {
                this.filters.quality.show = false;
            }
        },
        rangeSlugs() {
            try {
                axios
                    .get("/api/ranges")
                    .then((response) => {
                        this.filters.range.filters = response.data.reduce(
                            (acc, range) => {
                                acc[range] = { selected: false };
                                return acc;
                            },
                            {}
                        );
                    })
                    .then(() => {
                        this.setFiltersFromUrlParams();
                        this.loading = false;

                    });
            } catch (error) {
                console.error(error);
            }
        },
        unitTypeSlugs() {
            try {
                axios
                    .get("/api/unit-types")
                    .then((response) => {
                        this.filters.unit_type.filters = response.data.reduce(
                            (acc, unit_type) => {
                                acc[unit_type] = { selected: false };
                                return acc;
                            },
                            {}
                        );
                    })
                    .then(() => {
                        this.setFiltersFromUrlParams();
                        this.loading = false;

                    });
            } catch (error) {
                console.error(error);
            }
        },
        constructQuery() {
            const queryParams = {};

            for (const key in this.filters) {
                const filter = this.filters[key];
                const selectedFilters = Object.entries(filter.filters)
                    .filter(([_, status]) => status.selected)
                    .map(([key]) => key);

                if (selectedFilters.length > 0) {
                    queryParams[key] = selectedFilters;
                }
            }

            const queryString = new URLSearchParams(queryParams).toString();
            const url = `${window.location.pathname}?${queryString}`;
            window.location.href = `${url}`;
        },

        setFiltersFromUrlParams() {
            const urlParams = new URLSearchParams(window.location.search);
            for (const key in this.filters) {
                const filter = this.filters[key];
                const selectedFilters = urlParams.getAll(key);
                let keyArray = null;
                if (selectedFilters.length > 0) {
                    if (selectedFilters[0].includes(",")) {
                        this.filters[key].isOpen = true;
                        keyArray = selectedFilters[0].split(",");
                    } else {
                        this.filters[key].isOpen = true;
                        keyArray = selectedFilters;
                    }
                    keyArray.forEach((filterKey) => {
                        filter.filters[filterKey].selected = true;
                    });
                }
            }
        },
    },
};
</script>
<style></style>
