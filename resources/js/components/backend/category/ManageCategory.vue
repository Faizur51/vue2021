<template>
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width:100px">Sl No</th>
                        <th>Category Name</th>
                        <th>Create By</th>
                        <th>Status</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>4.</td>
                        <td>Fix and squish bugs</td>
                        <td>Fix and squish bugs</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>Fix and squish bugs</td>
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
}
</script>

<style scoped>

</style>
