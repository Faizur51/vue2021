<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Category</h3>
                <router-link to='/addCategory' class="card-title float-right btn btn-info btn-sm">Add Category</router-link>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" id="customCheckbox5">
                                <label for="customCheckbox5" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th style="width:100px">Sl No</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>user</th>
                        <th>Create At</th>
                        <th>Status</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(categories,index) in category">
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" id="customCheckbox1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td>{{++index}}</td>
                        <td  class="text-capitalize">{{categories.name}}</td>
                        <td>{{categories.slug}}</td>
                        <td>{{categories.user.name}}</td>
                        <td>{{categories.created_at |time}}</td>
                        <td><span class="badge" :class="statusColor(categories.status)">{{statusName(categories.status)}}</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm" @click="removeCategory(categories.id)">Delete</button>
                            <router-link  :to="`/editCategory/${categories.slug}`" class="btn btn-success btn-sm">Edit</router-link>

                        </td>
                    </tr>
                    <tr v-if="emptydata()">
                        <td colspan="8">
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
        category(){
            return this.$store.getters.categories;
        }
    },

    mounted() {
        this.$store.dispatch('getCategory')
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
        removeCategory(id){

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
                    axios.get('remove-category/'+id).then((response)=>{
                     toastr.info(response.data.category.name +' Category delete successfully.')
                     this.$store.dispatch('getCategory')
                     }).catch((response)=>{

                    })

                }
            })

        },
        emptydata(){
           return (this.category.length <1)
        }
    }

}
</script>

<style scoped>

</style>
