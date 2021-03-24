<template>
    <ul v-if="shouldPaginate" class="flex flex-wrap space-y-1 space-x-1">
        <li v-show="prevUrl">
            <a href="#" aria-label="Previous" class="block w-full h-full px-4 py-2 shadow" rel="prev" @click.prevent="page--">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li v-for="perPage in totalPages">
            <a href="#" aria-label="Previous" class="block w-full h-full px-4 py-2 shadow" rel="prev" :class="dataSet.current_page === perPage ? 'bg-gray-200' : ''" @click.prevent="page = perPage">
                <span aria-hidden="true">{{perPage}}</span>
            </a>
        </li>
        <li v-show="nextUrl">
            <a href="#" aria-label="Next" class="block w-full h-full px-4 py-2 shadow" rel="next" @click.prevent="page++">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['dataSet', 'totalPages'],
    data() {
        return {
            page: 1,
            prevUrl: false,
            nextUrl: false
        };
    },
    watch: {
        dataSet() {
            this.page = this.dataSet.current_page;
            this.prevUrl = this.dataSet.prev_page_url;
            this.nextUrl = this.dataSet.next_page_url;
        },
        page() {
            this.broadcast();
        }
    },
    computed: {
        shouldPaginate() {
            return !!this.prevUrl || !!this.nextUrl;
        }
    },
    methods: {
        broadcast() {
            this.$emit('changed', this.page);
        }
    }
};
</script>
