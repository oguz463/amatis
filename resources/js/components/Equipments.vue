<script>
export default {
    data() {
        return {
          dataSet: false,
          items: false,
          totalPages: 0,
          search: '',
          sort: 'relevance'
        }
    },
    created() {
        this.fetch();
    },
    watch: {
      sort(){
        this.fetch();
      }
    },
    methods: {
        fetch(page) {
            axios.get(this.url(page)).then(this.refresh);
        },
        url(page) {
            if (!page) {
                let query = location.search.match(/page=(\d+)/);
                page = query ? query[1] : 1;
            }
            if(this.search === ''){
              return `/equipments/search?sort=${this.sort}&page=${page}`;
            }
            return `/equipments/search?sort=${this.sort}&q=${this.search}&page=${page}`;
        },
        refresh({ data }) {
            this.dataSet = data;
            this.items = data.data;
            this.totalPages = data.last_page;
        }
    }
};
</script>
