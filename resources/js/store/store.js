export default {
    state: {
        count: 45,
    },

  getters:{
      test(state){
          return state.count;
      }
  },

    mutations: {
        increment (state) {
            state.count++
        }
    }

}
