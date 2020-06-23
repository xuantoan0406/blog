<template>
  <div class="wrap-a-story">
    <div class="img">
      <img :src="`/imgs/${story.img}`" width="200px" height="300px" alt />
    </div>
    <div class="header-story">
      <div class="name">{{story.nameStory}}</div>
      <div class="read">
        <router-link :to="{ name: 'ReadStory', params: { IdStory: story.id }}">ĐỌC TRUYỆN</router-link>
      </div>
      <div class="gt">GIỚI THIỆU</div>
    </div>
    <div class="descriptionss">
      <div class="description">
        <i class="fas fa-pencil-ruler"></i>
        &nbsp &nbsp &nbsp
        <b>{{story.author}}</b>
      </div>
      <div class="description">
        <i class="fas fa-sort-numeric-up"></i>
        &nbsp &nbsp &nbsp
        <b>{{story.chap}}</b>
      </div>
      <div class="description">
        <i class="fas fa-thermometer-quarter"></i>
        &nbsp &nbsp &nbsp
        <b>{{story.status}}</b>
      </div>
      <div class="description">
        <i class="fas fa-paw"></i>
        &nbsp &nbsp &nbsp
        <b>{{story.catelogy}}</b>
      </div>
      <div class="description">
        <i class="fas fa-clock"></i>
        &nbsp &nbsp &nbsp
        <b>{{story.timeUpdate}}</b>
      </div>
    </div>
    <div class="contentt" v-html="story.review"></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      story: [],
      idStory: this.$route.params.IdStory
    };
  },
  mounted() {
    this.showStory();
  },
  methods: {
    showStory() {
      axios
        .get("/api/Story/" + this.idStory)
        .then(response => {
          this.story = response.data;
          console.log(response.data);
        })
        .catch(error => console.log("loi"));
    }
  }
};
</script>

<style lang="scss">
.wrap-a-story {
  width: 1200px;
  margin-left: 5%;
  margin-top: 3%;
  .img {
    float: left;
  }
  .header-story {
    .name {
      margin-top: 10px;
      font-size: 30px;
      color: red;
    }
    .read {
      font-size: 30px;
      margin-top: 20px;
    }
    .gt {
      font-size: 30px;
      margin-top: 50px;
    }
    float: left;
    text-align: center;
    margin-left: 100px;
    width: 900px;
    height: 300px;
    background-color: rgb(185, 240, 228);
  }
  .descriptionss {
    .description {
      font-size: 15px;
      margin-top: 10px;
      margin-left: 10px;
    }
    float: left;
    width: 200px;
    background-color: rgba(193, 241, 170, 0.863);
    margin-top: 20px;
  }
  .contentt {
    padding-left: 10px;
    background-color: rgb(229, 238, 238);
    font-size: 20px;
    margin-left: 100px;
    width: 900px;
    margin-top: 20px;
    float: left;
  }
}
</style>