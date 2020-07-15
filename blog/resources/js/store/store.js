import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    userName: "",
    category: "",
    search: ""
  },
  mutations: {
    showSearch(state, search) {
      state.search = search;
    },
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
    },
    showSearch({ commit }, search) {
      commit("showSearch", search);
    }
  },
  modules: {}
});
export default store;
