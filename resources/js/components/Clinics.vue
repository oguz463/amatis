<script>
import Clinic from './Clinic.vue';
import NewClinic from './NewClinic.vue';
export default {
    components: { Clinic, NewClinic },
    data() {
        return {
          dataSet: false,
          items: [],
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
              return `/clinics/search?sort=${this.sort}&page=${page}`;
            }
            return `/clinics/search?q=${this.search}&sort=${this.sort}&page=${page}`;
        },
        refresh({ data }) {
            this.dataSet = data;
            this.items = data.data;
            this.totalPages = data.last_page;
        },
        add(item) {
            this.items.unshift(item);
        },
        remove(index) {
            this.items.splice(index, 1);
        }
    }
};
</script>
