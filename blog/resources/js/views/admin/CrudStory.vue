<template>
  <div class="wrap-story">
    <!-- modal add-->
    <div v-if="userName=='admin'">
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
              <h5 class="modal-title" id="addModalLabel">NEW STORY</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <form> -->
              <div class="form-group">
                <label for="name" class="col-form-label">Name Story</label>
                <input type="text" class="form-control" id="name" v-model="story.nameStory" />
              </div>
              <div class="form-group">
                <label class="col-form-label">Review</label>
                <textarea type="text" class="form-control" rows="10" v-model="story.review"></textarea>
              </div>
              <div class="form-group">
                <label class="col-form-label">author</label>
                <input type="text" class="form-control" v-model="story.author" />
              </div>
              <div class="form-group">
                <label class="col-form-label">chap</label>
                <input type="text" class="form-control" v-model="story.chap" />
              </div>
              <div class="form-group">
                <label for="status" class="col-form-label">Choose category:</label>
                <select id="status" v-model="story.status">
                  <option value="chua hoan thanh">chưa xong</option>
                  <option value="hoan thanh">xong</option>
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">timeUpdate</label>
                <input type="date" class="form-control" v-model="story.timeUpdate" />
              </div>
              <div class="form-group">
                <label for="category" class="col-form-label">Choose category:</label>
                <select id="category" v-model="story.catelogy">
                  <option value="Ma">Truyện Ma</option>
                  <option value="Trinh Tham">Truyện Trinh Thám</option>
                  <option value="Lich Su">Lịch Sử</option>
                  <option value="Vien Tuong">Viễn Tưởng</option>
                  <option value="Ngon Tinh">Ngôn Tình</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload Img</span>
                </div>
                <div class="custom-file">
                  <input
                    type="file"
                    class="custom-file-input"
                    id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01"
                    @change="handleUploadFile"
                  />
                  <label class="custom-file-label" for="inputGroupFile01">{{file.name}}</label>
                </div>
              </div>
              <!-- </form> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button
                type="submit"
                class="btn btn-primary"
                data-dismiss="modal"
                @click="addStory"
              >Add</button>
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
              <h5 class="modal-title" id="addModalLabel">EDIT STORY</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label class="col-form-label">Name Story</label>
                <input type="text" class="form-control" v-model="rowEdit.nameStory" />
              </div>
              <div class="form-group">
                <label class="col-form-label">author</label>
                <input type="text" class="form-control" v-model="rowEdit.author" />
              </div>
              <div class="form-group">
                <label class="col-form-label">Number chap</label>
                <input type="text" class="form-control" v-model="rowEdit.chap" />
              </div>

              <div class="form-group">
                <label class="col-form-label">Review Story</label>
                <textarea type="text" class="form-control" rows="5" v-model="rowEdit.review"></textarea>
              </div>
              <div class="form-group">
                <label for="status" class="col-form-label">Status :</label>
                <select id="status" v-model="rowEdit.status">
                  <option value="chua hoan thanh">chưa xong</option>
                  <option value="hoan thanh">xong</option>
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">timeUpdate</label>
                <input type="date" class="form-control" v-model="rowEdit.timeUpdate" />
              </div>
              <div class="form-group">
                <label for="category">Choose category:</label>
                <select id="category" v-model="rowEdit.catelogy">
                  <option value="Ma">Truyện Ma</option>
                  <option value="Trinh Tham">Truyện Trinh Thám</option>
                  <option value="Lich Su">Lịch Sử</option>
                  <option value="Vien Tuong">Viễn Tưởng</option>
                  <option value="Ngon Tinh">Ngôn Tình</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button
                type="button"
                class="btn btn-primary"
                data-dismiss="modal"
                @click="editStory(indexRowSelect)"
              >Edit</button>
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
              <h5 class="modal-title">Delete Status</h5>
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
        <div class="title">LIST STORIES</div>
        <div class="product-table">
          <table class="table table-bordered">
            <thead class="t-head">
              <tr>
                <th>ID</th>
                <th>NAME STORY</th>
                <th>AUTHOR</th>
                <th>CATELOOGY</th>
                <th>CHAPS</th>
                <th>STATUS</th>
                <th>IMG</th>
                <th>TIME UPDATE</th>
                <th>
                  <button data-toggle="modal" data-target="#addModal" class="btn btn-primary">add</button>
                </th>
              </tr>
            </thead>
            <tbody class="t-body">
              <tr v-for="(prod, index) in listStories" :key="prod.id">
                <td>{{ prod.id }}</td>
                <td>
                  <router-link
                    :to="{ name: 'upStory' ,params: { IdStory: prod.id } }"
                  >{{ prod.nameStory }}</router-link>
                </td>
                <td>{{ prod.author }}</td>
                <td>{{ prod.catelogy }}</td>
                <td>{{ prod.chap }}</td>
                <td>{{ prod.status }}</td>
                <td>
                  <img :src="`/imgs/${prod.img}`" height="100px" alt />
                </td>
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      listStoriesFull: [],
      listStories: [],
      story: {
        nameStory: "",
        author: "",
        chap: "",
        status: "",
        timeUpdate: "",
        catelogy: "",
        review: "",
        img: ""
      },
      userName: localStorage.getItem("userName"),
      pageNumber: Number(this.$route.params.pageNumber), // page so bao nhieu
      pageNum: Number(this.$route.params.pageNumber),
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
      axios.get("/api/Story?page=" + pageNum).then(response => {
        this.listStoriesFull = response.data;
        this.listStories = this.listStoriesFull.data;
      });

      this.$router.push("/admin/crudStories/" + pageNum);
      this.pageNumber = Number(pageNum);
    },

    getListStories() {
      axios
        .get("/api/Story?page=" + this.pageNum)
        .then(response => {
          this.listStoriesFull = response.data;
          this.listStories = this.listStoriesFull.data;
          this.numberPage = this.listStoriesFull.last_page;
        })
        .catch(error => error.response.data);
    },

    dataDelete(prod, index) {
      this.rowDelete = prod;
      this.indexRowSelect = index;
    },
    deleteStory(prod, index) {
      axios
        .delete("/api/Story/" + prod.id)
        .then(response => {
          this.listStories.splice(index, 1);
        })
        .catch(error => console.log("error"));
    },

    dataEdit(row, index) {
      this.rowEdit = row;
      this.indexRowSelect = index;
    },

    handleUploadFile(e) {
      this.file = e.target.files[0];
    },
    addStory() {
      let formData = new FormData();
      formData.append("file", this.file);
      for (var key in this.story) {
        formData.append(key, this.story[key]);
      }
      axios
        .post("/api/Story", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          console.log(response.data);
          this.listStories.push(response.data);
        });
    },
    editStory(indexRowSelect) {
      axios
        .put("/api/Story/" + this.rowEdit.id, this.rowEdit)
        .then(response => {
          console.log("ok");
        })
        .catch(error => {
          console.log("loi");
        });

      // .put("/api/Story/" + this.rowEdit.id, this.rowEdit)
      // .then(response => {
      //   console.log(response.data);
      // this.rowEdit = response.data;
      // this.rowEdit = this.rowEdit.data;
      // this.listStories[indexRowSelect] = this.rowEdit;
      // $("#editStory").modal("hide");
      // })
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
    }
  }
  .product-table {
    width: 96%;
    margin-left: 2%;
  }
}
</style>
