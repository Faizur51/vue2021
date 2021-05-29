<template>
    <div class="row">
        <div class="col-sm-6 col-lg-4" v-for="posts in post">
            <div class="single-blogg-item mb-30">
                <div class="blogg-thumb">
                    <router-link :to="`/single-post/${posts.slug}`">
                        <!--<img :src="filelink(posts.image)" alt="">-->
                        <img :src="posts.image" alt="">
                    </router-link>
                </div>
                <div class="blogg-content">
                    <span class="post-date">{{posts.created_at | time}}</span>
                    <h5> <router-link :to="`/single-post/${posts.slug}`">{{posts.title}}</router-link></h5>
                    <p v-html="truncate(posts.content,100,'.....')"></p>
                    <router-link :to="`/single-post/${posts.slug}`" class="btn btn-primary btn-sm">Read More  </router-link>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostBycategory",
    data:function (){
        return {
            post:[]
        }
    },
    //page or component load holei check kore
    mounted() {
        this.getPostbycategory();
    },
    //note:every time url and variable change holei ta check kore
    watch:{
        $route(){
            this.getPostbycategory();
        }
    },
   methods:{
       getPostbycategory:function (){
           let test=this
           axios.get('/get-post-by-category/'+this.$route.params.slug).then(function (response){
               //console.log(response.data.post)
                test.post=response.data.post
           }).catch(function (error){

           })
       },

       truncate:function(content,length,s){
           return content.substring(0, length) + s;
       }
   },


}
</script>

<style scoped>

</style>
