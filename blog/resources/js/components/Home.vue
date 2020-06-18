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
  mounted() {},
  methods: {}
};
</script>


<style lang="scss">
.wrap {
  height: auto;
}
// .bg-primary {
//   background-color: #49a9eed1 !important ;
// }
// .mt-2,
// .my-2 {
//   color: black;
// }
// .mr-sm-2 {
//   width: 300px;
// }
// .mr-auto {
//   width: 300px;
// }
// .auth {
//   height: 39px;
//   width: 100px;
//   align-items: center;
// }
</style>
