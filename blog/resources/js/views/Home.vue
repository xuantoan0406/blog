<template>
  <div class="wrap-home">
    <div class="header">FULL LIST STORIES</div>
    <div class="content-stories">
      <div class="img-story" v-for="(prod) in listStories" :key="prod.id">
        <div>
          <router-link :to="{ name: 'aStory', params: { IdStory: prod.id }}">
            <img :src="`/imgs/${prod.img}`" width="100%" height="100px" alt />
          </router-link>
        </div>
        <div>{{prod.nameStory}}</div>
        <div>số chương :{{prod.chap}}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listStoriesfull: [],
      listStories: []
    };
  },
  mounted() {
    this.dataListStories();
  },
  methods: {
    dataListStories() {
      axios
        .get("/api/listStory")
        .then(response => {
          // console.log(response.data);
          this.listStoriesfull = response.data;
          this.listStories = this.listStoriesfull.data;
          console.log(this.listStoriesfull);
        })
        .catch(error => console.log("error"));
    }
  }
};
</script>

<style lang="scss">
.wrap-home {
  background-color: aquamarine;
  width: 90%;
  margin: 2% 0 0 5%;
  .header {
    text-align: center;
  }
  .content-stories {
    .img-story {
      float: left;
      width: 120px;
      height: 150px;
      margin-left: 20px;
      margin-top: 20px;
    }
  }
}
</style>
