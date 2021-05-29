<template>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Post</h3>
                        {{this.$route.params.slug}}
                        <router-link to='/posts' class="card-title float-right">Manage Post</router-link>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" @submit.prevent="updatePost">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select name="category_id" id="" class="form-control" v-model="form.category_id">
                                        <option value="">Select Category</option>
                                        <option :value="category.id" v-for="category in categories">{{category.name}}</option>

                                    </select>
                                    <div v-if="form.errors.has('category_id')" class="text-danger" v-html="form.errors.get('category_id')" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Post Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" name="title" v-model='form.title' placeholder="Enter Post Title">
                                    <div v-if="form.errors.has('title')" class="text-danger" v-html="form.errors.get('title')" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
                                    <div v-if="form.errors.has('content')" class="text-danger" v-html="form.errors.get('content')" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" @change="onChange($event)">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <img :src="filelink(form.image)" alt="" style="width: 80px;height: 80px">
                                    <div v-if="form.errors.has('image')" class="text-danger" v-html="form.errors.get('image')" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="radio icheck-alizarin custom-control-inline">
                                        <input type="radio" id="alizarin1" name="status" value=1 v-model="form.status">
                                        <label for="alizarin1">Active</label>
                                    </div>
                                    <div class="radio icheck-alizarin custom-control-inline">
                                        <input type="radio" id="alizarin2" name="status" value=0 v-model="form.status">
                                        <label for="alizarin2">Inactive</label>
                                    </div>

                                    <div v-if="form.errors.has('status')" class="text-danger" v-html="form.errors.get('status')" />
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit"  class="btn btn-info">Update Post</button>
                            <button type="reset" class="btn btn-default float-right">Reset</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
    name: "EditPost",
   data:function (){
        return {
            form:new Form({
                category_id:'',
                title:null,
                content:null,
                image:null,
                status:null,

            }),
            editor: ClassicEditor,
            editorData: '<p>Content of the editor.</p>',
            editorConfig: {
                // The configuration of the editor.
            }

        }
   },

    computed:{
        categories(){
            return this.$store.getters.categories;
        }
    },

    mounted() {
        this.$store.dispatch('getActivecategory')
        this.getPost();
    },

    methods:{
        updatePost:function () {
            let test=this
            this.form.post('/update-post/'+this.$route.params.slug)
            .then(function (response){
                /*Toast.fire({
                    icon: 'success',
                    title: 'Category Add successfully'
                })*/
              /*console.log(response.data.post.title)*/
                toastr.info(response.data.post.title +' Post  has been Update successfully.')
                test.$router.push('/posts')

            }).catch(function (data){
                Toast.fire({
                    icon: 'warning',
                    title: 'Post Add Not successfully'
                })
            })
        },

     getPost:function (){
       let test=this
        axios.get('/edit-post/'+this.$route.params.slug).then(function (response){
            //console.log(response.data.post)
            test.form.fill(response.data.post)
        }).catch(function (error){

        })
     },
        filelink:function (name){
            if(name!= null && name.length<256){
                return 'assets/images/posts/'+name;
            }else{
                return this.form.image
            }
        },

        //image preview
        onChange:function (e){
            let file = e.target.files[0];
            let reader =new FileReader();
            let test=this
            reader.onload=function (e){
                test.form.image=e.target.result
            }
            reader.readAsDataURL(file);
        }


 }

}
</script>

<style scoped>

</style>
