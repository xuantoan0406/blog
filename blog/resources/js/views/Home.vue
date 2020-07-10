<template>
  <div class="wrap-home">
    <div class="header">FULL LIST STORIES</div>
    <div class="content-stories">
      <div class="img-story" v-for="(prod) in listStories" :key="prod.id">
        <div class="img">
          <router-link :to="{ name: 'aStory', params: { IdStory: prod.id }}">
            <img :src="`/imgs/${prod.img}`" width="150px" height="200px" alt />
          </router-link>
        </div>
        <div class="name">{{prod.nameStory}}</div>
        <div class="chuong">Số Tập :{{prod.chap}}</div>
      </div>
    </div>
    <div class="pt">
      <paginate
        v-model="pageNum"
        :page-count="numberPage"
        :page-range="3"
        :margin-pages="2"
        :click-handler="clickCallback"
        :prev-text="'Prev'"
        :next-text="'Next'"
        :container-class="'pagination'"
        :page-class="'page-item'"
        :prev-class="'page-item'"
        :next-class="'page-item'"
        :page-link-class="'page-link-item'"
        :prev-link-class="'page-link-item'"
        :next-link-class="'page-link-item'"
        :active-class="'active-class'"
        :hide-prev-next="true"
      />
    </div>
    <div>{{category}}</div>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      listStoriesfull: [],
      listStories: [],
      pageNum: 1,

      numberPage: 2
    };
  },
  computed: {
    ...mapState(["category"])
  },

  mounted() {
    this.dataListStories();
  },
  methods: {
    clickCallback(pageNum) {
      axios.get("/api/listStory?page=" + pageNum).then(response => {
        this.listStoriesfull = response.data;
        this.listStories = this.listStoriesfull.data;
      });
      this.pageNum = Number(pageNum);
    },
    dataListStories() {
      if (this.category) {
        this.listStories = this.category;
      }
      axios
        .get("/api/listStory?page=" + this.pageNum)
        .then(response => {
          this.listStoriesfull = response.data;
          this.listStories = this.listStoriesfull.data;
          this.numberPage = this.listStoriesfull.last_page;
        })
        .catch(error => console.log("error"));
    }
  }
};
</script>

<style lang="scss">
.wrap-home {
  background-color: rgb(233, 219, 219);
  width: 92%;
  height: 1000px;
  margin: 2% 0 0 5%;
  .header {
    text-align: center;
    font-size: 30px;
    color: red;
    background-color: white;
    height: 60px;
  }
  .content-stories {
    height: 800px;
    .img-story {
      background-color: rgb(205, 219, 215);
      .img {
        margin-left: 50px;
        margin-top: 30px;
      }
      float: left;
      width: 250px;
      height: 350px;
      margin-left: 66px;
      margin-top: 20px;
      .name {
        margin-top: 10px;
        margin-left: 50px;
        width: 150px;
      }
      .chuong {
        margin-top: 10px;
        margin-left: 50px;
        width: 150px;
      }
    }
  }
  .pt {
    margin-bottom: 20px;
    .pagination {
      justify-content: center;
      display: flex;
      padding-left: 0;
      list-style: none;
      margin-top: 1rem;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
    }
    .page-item {
      color: #337ab7;
    }

    .page-link-item {
      position: relative;
      float: left;
      padding: 6px 12px;
      margin-left: -1px;
      line-height: 1.42857143;
      text-decoration: none;
      background-color: #fff;
      border: 1px solid #ddd;
    }
  }
}
</style>
