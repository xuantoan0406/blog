<template>
  <div class="wrap">
    <div class="content">
      <img src="imgs/logo.png" width />
      <div class="form-login">
        <el-form :model="form" label-position="top" label-width="120px" size="small">
          <el-form-item label="User name">
            <el-input v-model="form.userName"></el-input>
          </el-form-item>
          <el-form-item label="Password">
            <el-input v-model="form.password" type="password"></el-input>
          </el-form-item>
          <el-checkbox v-model="form.save">Lưu mật khẩu</el-checkbox>
          <el-form-item>
            <el-row type="flex" justify="center">
              <el-button type="primary">Đăng nhập</el-button>
            </el-row>
          </el-form-item>
          <el-row type="flex" justify="center">
            <a href="javascript:;">Quên mật khẩu</a>
          </el-row>
          <el-row type="flex" justify="center">
            <a href="javascript:;">Get Domain mới</a>
          </el-row>
        </el-form>
        <el-row type="flex" justify="space-between" align="middle" class="support">
          <el-button type="text">Hỗ trợ</el-button>
          <el-button type="text">Điều khoản sử dụng</el-button>
        </el-row>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ExampleComponent",
  data() {
    return {
      form: {
        userName: "",
        password: "",
        save: false
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
<style lang="scss" scoped>
.wrap {
  background-color: #ffe67a;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  .content {
    width: 700px;
    height: 400px;
    img {
      width: 100%;
    }
    .form-login {
      width: 300px;
      margin: 0 auto;
      .support {
        margin-top: 30px;
      }
    }
  }
}
</style>
<style lang="scss">
.wrap {
  .el-form {
    .el-form-item {
      .el-form-item__label {
        margin-bottom: 0;
        padding-bottom: 0;
      }
    }
  }
}
</style>