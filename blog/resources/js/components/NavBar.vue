<template>
  <nav
    class="navbar navbar-expand-lg navbar-dark bg-primary"
    style="    background-color: #45a6cc !important;"
  >
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    ></button>

    <div class="collapse navbar-collapse" style="color:black">
      <ul class="navbar-nav mr-auto" style="margin-left:5%;color:#ffffff">
        <li style="margin-left:5%;">
          <router-link :to="{ name: 'home' }" class="dropdown-item" style="    color: #04f344;">
            <i class="fas fa-futbol"></i> Web Truyện Online
          </router-link>
        </li>
        <li class="nav-item dropdown" style="margin-left:25%;">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            style="    color: #0006ff"
          >Thể Loại</a>
          <div
            class="dropdown-menu"
            aria-labelledby="navbarDropdown"
            style="background-color: #cef1ea;"
          >
            <a class="dropdown-item" href="#">Lịch Sử</a>
            <a class="dropdown-item" href="#">Ngôn Tình</a>
            <a class="dropdown-item" href="#">Viễn Tưởng</a>
            <a class="dropdown-item" href="#">Truyện Teen</a>
            <a class="dropdown-item" href="#">Trinh Thám</a>
            <a class="dropdown-item" href="#">Truyen Ma</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto" style="margin-left:1%">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
          style="width: 300px;"
        />

        <button
          class="btn btn-outline-success my-2 my-sm-0"
          style="color: #faff00;"
          type="submit"
        >Search</button>
      </ul>
      <ul class="navbar-nav auth" style="margin-right:7%
      ">
        <li v-if="admin" class="nav-item dropdown">
          <a
            class="nav-link dropdown"
            href="#"
            data-toggle="dropdown"
            style="    color: aliceblue;"
          >
            <i class="far fa-user"></i> Thành Viên
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <router-link :to="{ name: 'crudStories1' }" class="dropdown-item">Manage List Ltories</router-link>
          </div>
        </li>

        <li v-else class="nav-item dropdown">
          <a class="nav-link dropdown" href="#" data-toggle="dropdown">
            <i class="fal fa-user"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <router-link :to="{ name: 'register' }" class="dropdown-item">Register</router-link>
            <router-link :to="{ name: 'login' }" class="dropdown-item">Login</router-link>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</template>
<script>
export default {
  data() {
    return {
      admin: "as"
    };
  }
};
</script>

<style lang="css">
.home {
  margin-left: 8% !important;
  margin-right: 5% !important;
}
.search {
  margin-left: 10%;
}
.dropdown-item {
  color: rgb(243, 237, 237);
}
.bg-primary {
  background-color: red !important;
}
</style

