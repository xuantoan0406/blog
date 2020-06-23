<template>
  <div class="wrap-story">
    <!-- modal add chap-->

    <div
      class="modal fade"
      id="addModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addModal"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">UP NEW CHAP STORY</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-form-label">chap</label>
              <input type="text" class="form-control" v-model="story.chap" />
            </div>
            <div class="form-group">
              <label class="col-form-label">content</label>
              <textarea type="text" class="form-control" rows="10" v-model="story.content"></textarea>
            </div>
            <div class="form-group">
              <label class="col-form-label">timeUpdate</label>
              <input type="date" class="form-control" v-model="story.timeUpdate" />
            </div>
            <!-- </form> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" @click="addStory">Add</button>
          </div>
        </div>
      </div>
    </div>

    <!-- modal edit-->

    <div
      class="modal fade"
      id="editModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addModal"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">EDIT CHAP STORY</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <form> -->
            <div class="form-group">
              <label class="col-form-label">stories_id</label>
              <input type="text" class="form-control" v-model="rowEdit.stories_id" />
            </div>
            <div class="form-group">
              <label class="col-form-label">chap</label>
              <input type="text" class="form-control" v-model="rowEdit.chap" />
            </div>
            <div class="form-group">
              <label class="col-form-label">content</label>
              <textarea type="text" class="form-control" rows="10" v-model="rowEdit.content"></textarea>
            </div>
            <div class="form-group">
              <label class="col-form-label">timeUpdate</label>
              <input type="date" class="form-control" v-model="rowEdit.timeUpdate" />
            </div>
            <!-- </form> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button
              type="button"
              class="btn btn-primary"
              data-dismiss="modal"
              @click="editStory(indexRowSelect)"
            >Add</button>
          </div>
        </div>
      </div>
    </div>

    <!--        confirm delete-->
    <div
      id="deleteStatus"
      class="modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="deleteStatus"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Chap</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button
              type="button"
              class="btn btn-primary"
              data-dismiss="modal"
              @click="deleteStory(rowDelete, indexRowSelect)"
            >Delete</button>
          </div>
        </div>
      </div>
    </div>

    <div class="list-products">
      <div class="title">LIST CHAPS STORIES</div>
      <div class="product-table">
        <table class="table table-bordered">
          <thead class="t-head">
            <tr>
              <th>CHAP</th>
              <th>CONTENT</th>
              <th>TIME UPDATE</th>
              <th>
                <button data-toggle="modal" data-target="#addModal" class="btn btn-primary">add</button>
              </th>
            </tr>
          </thead>
          <tbody class="t-body">
            <tr v-for="(prod, index) in listChaps" :key="prod.id">
              <td>{{ prod.chap }}</td>
              <td class="content">{{ prod.content }}</td>
              <td>{{ prod.timeUpdate }}</td>
              <td>
                <button
                  class="btn btn-success"
                  data-toggle="modal"
                  data-target="#editModal"
                  @click="dataEdit(prod, index)"
                >edit</button>
                <button
                  @click="dataDelete(prod, index)"
                  class="btn btn-danger"
                  data-toggle="modal"
                  data-target="#deleteStatus"
                >delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

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
      listChapsFull: [],
      listChaps: [],
      story: {
        stories_id: Number(this.$route.params.IdStory),
        chap: "",
        content: "",
        timeUpdate: ""
      },
      pageNum: 1, // page so bao nhieu
      numberPage: 1, // so trang

      rowDelete: [],
      indexRowSelect: 1,

      rowEdit: [],

      file: []
    };
  },
  computed: {},
  mounted() {
    this.getListStories();
  },
  methods: {
    clickCallback(pageNum) {
      this.pageNum = Number(pageNum);
      axios
        .get("/api/UpStory/" + this.story.stories_id + "?page=" + pageNum)
        .then(response => {
          this.listChapsFull = response.data;
          this.listChaps = this.listChapsFull.data;
        });
    },

    getListStories() {
      axios
        .get("/api/UpStory/" + this.story.stories_id + "?page=" + this.pageNum)
        .then(response => {
          this.listChapsFull = response.data;
          this.listChaps = this.listChapsFull.data;
          this.numberPage = this.listChapsFull.last_page;
        })
        .catch(error => error.response.data);
    },

    dataDelete(prod, index) {
      this.rowDelete = prod;
      this.indexRowSelect = index;
      console.log(this.rowDelete);
    },
    deleteStory(prod, index) {
      axios
        .delete("/api/UpStory/" + prod.id)
        .then(response => {
          this.listChaps.splice(index, 1);
          console.log("ok");
        })
        .catch(error => console.log("error"));
    },

    dataEdit(row, index) {
      this.rowEdit = row;
      this.indexRowSelect = index;
    },

    addStory() {
      axios
        .post("/api/UpStory", this.story)
        .then(response => {
          this.listChaps.push(response.data);
        })
        .catch(error => console.log("loi"));
    },
    editStory(indexRowSelect) {
      axios
        .put("/api/UpStory/" + this.rowEdit.id, this.rowEdit)
        .then(response => {
          console.log("ok");
        })
        .catch(error => {
          console.log("loi");
        });
    }
  }
};
</script>

<style lang="scss">
.wrap-story {
  .overflow-auto {
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

    .active-class {
      color: red;
      background-color: #3f9ae5;
    }
  }
  .modal-header {
    background-color: rgb(221, 213, 224);
    color: #337ab7;
  }
  .modal-footer {
    background-color: rgb(221, 213, 224);
  }
  .title {
    text-align: center;
    font-size: 25px;
    color: red;
    margin: 2% 2% 2%;
  }
  .table-bordered {
    .t-head {
      background-color: lightblue;
      text-align: center;
    }
    .t-body {
      text-align: center;
      background-color: cornsilk;
      .content {
        width: 60%;
      }
    }
  }
  .product-table {
    width: 96%;
    margin-left: 2%;
  }
}
.col-form-label {
  color: rgb(11, 33, 226);
}
</style>
