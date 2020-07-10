<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
              <div class="col-md-6">
                <input id="email" type="text" class="form-control" v-model="user.email" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" v-model="user.password" />
              </div>
            </div>
            <div v-if="error" class="error">{{error}}</div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" @click="login">Login</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        email: "",
        password: ""
      },
      error: ""
    };
  },
  computed: {},
  mounted() {
    this.checkLogin();
  },

  methods: {
    checkLogin() {
      if (localStorage.getItem("userName")) this.$router.push("/");
    },
    login() {
      axios
        .post("api/login", {
          email: this.user.email,
          password: this.user.password
        })
        .then(response => {
          console.log(response.data);
          localStorage.setItem("token", response.data.user.api_token);
          localStorage.setItem("userId", response.data.user.id);
          localStorage.setItem("userEmail", response.data.user.email);
          localStorage.setItem("userName", response.data.user.name);
          this.$router.push("/");
          this.$store.dispatch("updateName", localStorage.getItem("userName"));
        })
        .catch(error => {
          this.error = "Tài khoản hoặc mật khẩu k đúng";
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.error {
  color: red;
  margin-left: 35%;
  margin-bottom: 3%;
}
</style>
