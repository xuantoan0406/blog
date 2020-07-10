import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Register from "../views/auth/Register";
import Login from "../views/auth/Login";
import Home from "../views/Home";
import CrudStories from "../views/admin/CrudStory";
import UpStory from "../views/admin/Story";
import aStory from "../views/user/AStory.vue";
import ChapStory from "../views/user/ChapStory.vue";
const router = new VueRouter({
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
      path: "/story/:IdStory",
      name: "aStory",
      component: aStory
    },
    {
      path: "/ReadStory/:IdStory",
      name: "ReadStory",
      component: ChapStory
    },
    {
      path: "/admin/UpStory/:IdStory",
      name: "upStory",
      component: UpStory,
      meta: { requiresAuth: true }
    },
    {
      path: "/admin/crudStories",
      redirect: "/admin/crudStories/1",
      name: "crudStories1",
      meta: { requiresAuth: true }
    },
    {
      path: "/admin/crudStories/:pageNumber",
      name: "crudStories",
      meta: { requiresAuth: true },
      component: CrudStories
    }
  ]
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!localStorage.getItem("token")) {
      next({
        path: "/login",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else {
    next(); // make sure to always call next()!
  }
});

export default router;
