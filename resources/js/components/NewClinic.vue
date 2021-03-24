<script>
export default {
  data() {
      return {
          name: ''
      };
  },
  methods: {
    add() {
      axios
          .post('/clinics', { name: this.name })
          .catch(({response}) => {
              flash(response.data.errors.name);
          })
          .then(({ data }) => {
              this.name = "";
              flash("Added.");

              this.$emit("created", data);
          });
      }
  }
}
</script>
