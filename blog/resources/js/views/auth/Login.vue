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
      error: []
    };
  },
  computed: {},

  methods: {
    login() {
      axios
        .post("api/login", {
          email: this.user.email,
          password: this.user.password
        })
        .then(response => {
          if (response.data == true) {
            localStorage.setItem(
              "email",
              this.user.email,
              "password",
              this.user.password
            );
            this.$router.push("/");
          } else alert("login fall");
        })
        .catch(error => {
          console.log("fall");
        });
    }
  }
};
</script>

<style lang="scss" scoped></style>
