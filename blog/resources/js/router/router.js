import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Register from "../views/auth/Register";
import Login from "../views/auth/Login";
import Home from "../views/Home";
import CrudStories from "../views/admin/CrudStory";
import UpStory from "../views/admin/Story";

export const router = new VueRouter({
  mode: "history",
  routes: [
    {
      path: "/login",
      name: "login",
      component: Login
    },
    {
      path: "/register",
      name: "register",
      component: Register
    },
    {
      path: "/",
      name: "home",
      component: Home
    },

    {
      path: "/admin/UpStory",
      redirect: "/admin/UpStory/1",
      name: "upStory1"
    },
    {
      path: "/admin/UpStory/:pageNum",
      name: "upStory",
      component: UpStory
    },
    {
      path: "/admin/crudStories",
      redirect: "/admin/crudStories/1",
      name: "crudStories1"
    },
    {
      path: "/admin/crudStories/:pageNumber",
      name: "crudStories",
      component: CrudStories
    }
  ]
});
