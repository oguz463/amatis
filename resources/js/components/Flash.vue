<template>
  <div class="fixed bottom-0 right-0 m-24 px-8 py-4 bg-green-600 text-white rounded shadow-xl z-10" role="alert" v-show="show">
    <ul class="flex flex-col space-y-2">
      <li v-for="item in data">{{item}}</li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ['messages'],
  data(){
    return {
      data: [],
      show:false
    }
  },
  created(){
    if (this.messages) {
      this.flash(this.messages)
    }

    window.events.$on('flash', messages => {
      if (messages) {
        this.flash(messages)
      }
    });
  },
  methods: {
    flash(messages){
      this.data = messages;
      this.show = true;
      this.hide()
    },
    hide(){
      setTimeout(() => {
        this.show = false;
      }, 3000);
    }
  }
}
</script>
