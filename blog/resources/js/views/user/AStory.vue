<template>
  <div class="wrap-story">
    <div class="img">
      <img :src="`/imgs/${story.img}`" width="200px" height="300px" alt />
    </div>
    <div class="name">
      <div>{{story.nameStory}}</div>
      <div>Đọc Truyện</div>
      <div>Giới Thiệu</div>
    </div>
    <div class="descriptions">
      <div class="description">author :{{story.author}}</div>
      <div class="description">số chương :{{story.chap}}</div>
      <div class="description">status :{{story.status}}</div>
      <div class="description">catelogy :{{story.catelogy}}</div>
      <div class="description">timeUpdate :{{story.timeUpdate}}</div>
    </div>
    <div class="content">dsadsad</div>
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
      console.log(this.idStory);
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
.wrap-story {
  width: 900px;
  margin-left: 5%;
  margin-top: 3%;
  background-color: rgb(28, 206, 206);
  .img {
    float: left;
  }
  .name {
    float: left;
    text-align: center;
    margin-left: 100px;
    width: 600px;
    height: 300px;
    background-color: burlywood;
  }
  .descriptions {
    float: left;
    width: 260px;
    background-color: cornflowerblue;
    margin-top: 20px;
  }
  .content {
    background-color: cyan;
    margin-left: 40px;
    width: 600px;
    margin-top: 20px;
    float: left;
  }
}
</style>