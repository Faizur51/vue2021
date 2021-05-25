<template>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-3">
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
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Post Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" name="name" v-model='form.name' placeholder="Enter Post Title Name">
                                    <div v-if="form.errors.has('name')" class="text-danger" v-html="form.errors.get('name')" />
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="status" class="custom-control-input custom-control-input-success custom-control-input-outline" value=1 v-model="form.status" >
                                        <label class="custom-control-label" for="customRadioInline1">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="status" class="custom-control-input custom-control-input-danger custom-control-input-outline" value=0 v-model="form.status">
                                        <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                                    </div>
                                    <div v-if="form.errors.has('status')" class="text-danger" v-html="form.errors.get('status')" />
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit"  class="btn btn-info">Update Category</button>
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
export default {
    name: "CreateCategory",
   data:function (){
        return {
            form:new Form({
                 name:null,
                 status:null,

            })

        }
   },

    mounted() {
        this.getCategory();
    },
    methods:{
        updateCategory:function () {
            let test=this
            this.form.post('/update-category/'+this.$route.params.slug)
            .then(function (response){
                /*Toast.fire({
                    icon: 'success',
                    title: 'Category Add successfully'
                })*/
              /*console.log(response.data.category.name)*/
                toastr.info(response.data.category.name +' Category  has been Update successfully.')
                test.$router.push('/categories')

            }).catch(function (data){
                Toast.fire({
                    icon: 'warning',
                    title: 'Category Add Not successfully'
                })
            })
        },

     getCategory:function (){
       let test=this
        axios.get('/edit-category/'+this.$route.params.slug).then(function (response){
            //console.log(response.data.category)
            test.form.fill(response.data.category)
        }).catch(function (error){

        })
     }
 }

}
</script>

<style scoped>

</style>
