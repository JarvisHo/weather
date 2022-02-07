import { createStore } from "vuex";
import auth from "./auth";
import actions from './actions'
import mutations from './mutations'
import getters from './getters'
import state from "./state";

export default createStore({
    state,
    mutations,
    actions,
    getters,
    modules: { auth },
});
