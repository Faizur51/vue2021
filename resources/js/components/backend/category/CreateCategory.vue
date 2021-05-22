<template>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                        <router-link to='/categories' class="card-title float-right">Manage Category</router-link>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" @submit.prevent="addCategory">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Category Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" name="name" v-model='form.name' placeholder="Enter Category Name">
                                    <div v-if="form.errors.has('name')" class="text-danger" v-html="form.errors.get('name')" />
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="active" v-model="form.status" >
                                        <label class="custom-control-label" for="customRadioInline1">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="inactive" v-model="form.status">
                                        <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                                    </div>
                                    <div v-if="form.errors.has('status')" class="text-danger" v-html="form.errors.get('status')" />
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit"  class="btn btn-info">Add Category</button>
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
 methods:{
        addCategory:function () {
            let test=this
            this.form.post('/add-category')
            .then(function (data){
                /*Toast.fire({
                    icon: 'success',
                    title: 'Category Add successfully'
                })*/
                toastr.info('Category Add successfully.', 'Turtle Bay Resort', {timeOut: 5000,closeButton: true,positionClass: "toast-bottom-left"})
              //test.$router.push('/categories')
                test.form.name=null
                test.form.status=null

            }).catch(function (data){
                Toast.fire({
                    icon: 'warning',
                    title: 'Category Add Not successfully'
                })
            })
        }
 }

}
</script>

<style scoped>

</style>
