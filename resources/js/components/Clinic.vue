<script>
export default {
    props: ['item'],
    data(){
      return {
        editing: false,
        id: this.item.id,
        name: this.item.name
      }
    },
    methods: {
      cancel(){
        this.name = this.item.name;
        this.editing = false;
      },
      update() {
        axios
            .patch("/clinic/edit/" + this.id, {
                name: this.name
            })
            .then(({data}) => {
              flash(data)
              this.editing = false;
            })
            .catch(({response}) => {
                flash(response.data.errors.name);
            });

      },
      destroy(){
        if(confirm("Delete?")){
          axios.delete("/clinic/edit/" + this.id)
            .then(({data}) => flash(data))
          this.$emit("deleted", this.id);
        }
      }
    }
}
</script>
