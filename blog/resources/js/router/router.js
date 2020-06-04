import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Register from "../views/auth/Register";
import Login from "../views/auth/Login";

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
    }
  ]
});
