<template>
  <div class="wrap">
    <div>
      <nav-bar></nav-bar>
    </div>
    <div>
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
import NavBar from "../components/NavBar";
export default {
  components: { NavBar },
  data() {
    return {
      list_stories: ""
    };
  },
  mounted() {
    this.getStories();
  },
  methods: {
    getStories() {
      axios
        .post("api/listStory")
        .then(response => {
          this.list_stories = response.data;
        })
        .catch(error => console.log("loi"));
    }
  }
};
</script>


<style lang="scss">
.wrap {
  height: 100vh;
}
.bg-primary {
  background-color: #49a9eed1 !important ;
}
.mt-2,
.my-2 {
  color: black;
}
.mr-sm-2 {
  width: 300px;
}
.mr-auto {
  width: 300px;
}
.auth {
  height: 39px;
  width: 100px;
  align-items: center;
}
</style>
