<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Post</h3>
                <router-link to='/addPost' class="card-title float-right btn btn-info btn-sm">Add Post</router-link>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            <div class="checkbox icheck-alizarin">
                                <input type="checkbox"  id="alizarin1" />
                                <label for="alizarin1"></label>
                            </div>
                        </th>
                        <th style="width:100px">Sl</th>
                        <th>Category Name</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th>Thumbnail</th>
                        <th>user</th>
                        <th>Status</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(posts,index) in post">
                        <td>
<!--                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" id="customCheckbox1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>-->

                            <div class="checkbox icheck-alizarin">
                                <input type="checkbox"  id="alizarin" />
                                <label for="alizarin"></label>
                            </div>

                        </td>
                        <td>{{++index}}</td>
                        <td>{{posts.category.name}}</td>
                        <td  class="text-capitalize">{{posts.title}}</td>

                        <td>{{posts.slug}}</td>
                        <td>{{posts.content | subString(20)}}</td>
                        <td><img :src="posts.image" alt="" style="width: 60px"></td>
                        <td>{{posts.user.name}}</td>
                        <td><span class="badge" :class="statusColor(posts.status)">{{statusName(posts.status)}}</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm" @click="removePost(posts.id)">Delete</button>
                            <router-link  :to="`/editPost/${posts.slug}`" class="btn btn-success btn-sm">Edit</router-link>

                        </td>
                    </tr>
                    <tr v-if="emptydata()">
                        <td colspan="10">
                            <h5 class="text-center text-danger">Data not Found</h5>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card -->
    </div>
</template>

<script>
export default {
    name: "ManageComponent",

    computed:{
        post(){
            return this.$store.getters.posts;
        }
    },

    mounted() {
        this.$store.dispatch('getPost')
    },
    methods:{
       statusName(status){
           let data={
               0:'inactive',
               1:'active'
           }
           return data[status];
       },
        statusColor(status){
           let data={
               0:'bg-danger',
               1:'bg-success'
           }
           return data[status];
        },
        removePost(id){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                  /*  Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )*/
                    axios.get('remove-post/'+id).then((response)=>{
                     toastr.info(response.data.post.name +' Category delete successfully.')
                     this.$store.dispatch('getPost')
                     }).catch((response)=>{

                    })

                }
            })

        },
        emptydata(){
           return (this.post.length <1)
        }
    }

}
</script>

<style scoped>

</style>
