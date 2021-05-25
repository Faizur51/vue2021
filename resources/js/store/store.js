export default {
    state: {
        categoryData:[],
        postData:[],
    },

  getters:{
      categories(state){
          return state.categoryData;
      },
      posts(state){
          return state.postData;
      }
  },

   actions:{
       getCategory(data){
       axios.get("get-category").then(function (response){
           //console.log(response.data.category)
           data.commit('ourcategories',response.data.category)
       }).catch(function (error){

       })
       },
       getPost(data){
           axios.get("get-post").then(function (response){
               //console.log(response.data.post)
               data.commit('ourposts',response.data.post)
           }).catch(function (error){

           })
       }
   },

    mutations: {
        ourcategories(state,result){
             state.categoryData=result
        },
        ourposts(state,result){
            state.postData=result
        }
    }

}
