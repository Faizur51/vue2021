<template>
  <div class="row">
      <div class="col-sm-6 col-lg-4" v-for="posts in post.data">
            <div class="single-blogg-item mb-30">
                <div class="blogg-thumb">
                    <router-link :to="`/single-post/${posts.slug}`">
                        <img :src="posts.image" alt="">
                    </router-link>
                </div>
                <div class="blogg-content">
                    <span class="post-date">{{posts.created_at | time}}</span>
                    <h5> <router-link :to="`/single-post/${posts.slug}`">{{posts.title}}</router-link></h5>
                    <p v-html="truncate(posts.content,100,'....')"></p>
                    <router-link :to="`/single-post/${posts.slug}`" class="btn btn-primary btn-sm">Read More  </router-link>
                </div>
            </div>
      </div>
      <pagination :data="post" @pagination-change-page="getResults"></pagination>
  </div>

</template>

<script>
export default {
    name: "Home",

    data(){
        return {
            post: {},
        }
    },

    mounted() {
        //note:store2.js->actions->getPost then url:get-frontsite-post
        //this.$store.dispatch('getPost')
        this.getResults();
    },

    methods:{
        getResults(page = 1) {
            axios.get('get-frontsite-post?page=' + page)
                .then(response => {
                    this.post = response.data;
                });
        },

        filelink:function (name){
            return 'assets/images/posts/'+name;
        },

        truncate:function(content,length,s){
            return content.substring(0, length) + s;
        }
    }

}
</script>

<style scoped>

</style>
