export default {
    state: {
        categoryData:[],
    },

  getters:{
      categories(state){
          return state.categoryData;
      }
  },

   actions:{
       getCategory(data){
       axios.get("get-category").then(function (response){
           //console.log(response.data.category)
           data.commit('ourcategories',response.data.category)
       }).catch(function (error){

       })
       }
   },

    mutations: {
        ourcategories(state,result){
             state.categoryData=result
        }
    }

}
