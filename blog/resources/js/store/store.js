import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    userName: "",
    category: ""
  },
  mutations: {
    showCategory(state, list) {
      state.category = list;
    },
    updateName(state, name) {
      state.userName = name;
    }
  },
  getters: {},

  actions: {
    updateName({ commit }, name) {
      commit("updateName", name);
    },
    showCategory({ commit }, list) {
      commit("showCategory", list);
    }
  },
  modules: {}
});
export default store;
