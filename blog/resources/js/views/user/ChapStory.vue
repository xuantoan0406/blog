<template>
  <div class="wrap-chap">
    <div class="content-story">
      <div class="header-chap">
        <b>CHƯƠNG {{ dataChap.chap }}</b>
      </div>
      <div class="content-chap" v-html="dataChap.content"></div>

      <div class="overflow-auto">
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
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      stories_id: Number(this.$route.params.IdStory),
      dataChapsFull: [],
      dataChap: [],
      pageNum: 1,
      numberPage: 1
    };
  },
  mounted() {
    this.readStory();
  },
  methods: {
    clickCallback(pageNum) {
      this.pageNum = Number(pageNum);
      axios
        .get("/api/UpStory/" + this.stories_id + "?page=" + pageNum)
        .then(response => {
          this.dataChapsFull = response.data;
          this.dataChap = this.dataChapsFull.data[0];
        });
    },

    readStory() {
      axios
        .get("/api/UpStory/" + this.stories_id + "?page=" + this.pageNum)
        .then(response => {
          this.dataChapsFull = response.data;
          this.dataChap = this.dataChapsFull.data[0];
          this.numberPage = this.dataChapsFull.last_page;
          console.log(this.dataChapsFull);
        })
        .catch(error => error.response.data);
    }
  }
};
</script>

<style lang="scss">
.wrap-chap {
  .content-story {
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
    .header-chap {
      text-align: center;
      font-size: 30px;
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .content-chap {
      margin-top: 20px;
    }
  }
  width: 80%;
  height: auto;
  font-size: 25px;
  margin-left: 10%;
}
</style>