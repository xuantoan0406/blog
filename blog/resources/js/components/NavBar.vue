<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    ></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link :to="{ name: 'home' }" class="dropdown-item"
            ><i class="fas fa-truck"></i
          ></router-link>
        </li>
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            >Thể Loại</a
          >
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Lịch Sử</a>
            <a class="dropdown-item" href="#">Ngôn Tình</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Viễn Tưởng</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          Search
        </button>
      </ul>
      <ul class="navbar-nav auth">
        <li v-if="admin" class="nav-item dropdown">
          <a class="nav-link dropdown" href="#" data-toggle="dropdown">
            <img src="imgs/avt.jpg" alt="avt" height="35px" width="45px" />
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <router-link :to="{ name: 'upStory' }" class="dropdown-item"
              >Upload Story</router-link
            >
            <router-link :to="{ name: 'crudStories' }" class="dropdown-item"
              >Manage List Ltories</router-link
            >
          </div>
        </li>

        <li v-else class="nav-item dropdown">
          <a class="nav-link dropdown" href="#" data-toggle="dropdown">
            <img src="imgs/avt.jpg" alt="avt" height="35px" width="45px" />
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <router-link :to="{ name: 'register' }" class="dropdown-item"
              >Register</router-link
            >
            <router-link :to="{ name: 'login' }" class="dropdown-item"
              >Login</router-link
            >
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

<style lang="scss">
.mr-auto {
  margin-right: 10% !important;
  margin-left: 10% !important;
}</style
>>
