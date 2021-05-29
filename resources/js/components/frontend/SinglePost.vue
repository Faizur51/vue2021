<template>
    <div class="col-lg-12 order-first">
        <div class="blog-wrapper-inner">
            <div class="single-blogg-item mb-30">
                <div class="blogg-thumb">
                    <a href="blog-details.html">
<!--                        <img :src="filelink(posts.image)" alt="">-->
                     <img :src="posts.image" alt="">
                    </a>
                </div>
                <div class="blogg-content">
                    <span class="post-date">{{ posts.created_at|time }}</span>
                    <h5>{{posts.title}}</h5>
                    <p v-html="posts.content"></p>
                    <div class="blogg-meta mb-30 mt-30">
                        <a href="#">0 comment</a>
                        / Tags:
                        <a href="#">Fashion</a>
                    </div>
                    <div class="blog-social-sharing mb-40">
                        <h3>Share this post</h3>
                        <ul class="mt-10">
                            <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" title="Facebook"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" title="Facebook"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" title="Facebook"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" title="Facebook"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="blogg-author-info">
                        <div class="author-thum">
                            <img src="assets/img/blog/author.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <h3>about the author:<a href="#">Admin</a> </h3>
                            <p>Suspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-comment-wrapper">
                <h3>leave a reply</h3>
                <p>Your email address will not be published. Required fields are marked *</p>
                <form action="#">
                    <div class="comment-post-box">
                        <div class="row">
                            <div class="col-12">
                                <label>comment</label>
                                <textarea name="commnet" placeholder="Write a comment"></textarea>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label>Name</label>
                                <input type="text" class="coment-field" placeholder="Name">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label>Email</label>
                                <input type="text" class="coment-field" placeholder="Email">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label>Website</label>
                                <input type="text" class="coment-field" placeholder="Website">
                            </div>
                            <div class="col-12">
                                <div class="coment-btn mt-20">
                                    <input class="btn btn-secondary" type="submit" name="submit" value="post comment">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data:function (){
        return {
            posts:null,
        }
    },
    mounted() {
        this.getPost();
    },

    methods:{
        getPost:function (){
            let test=this
            axios.get('/show-single-post/'+this.$route.params.slug).then(function (response){
                //console.log(response.data.post)
               test.posts= response.data.post
            }).catch(function (error){

            })
        },

        filelink:function (name){
            return 'assets/images/posts/'+name;
        },
    }
}
</script>

<style scoped>

</style>
