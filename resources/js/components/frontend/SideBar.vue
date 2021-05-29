<template>
<div>
    <div class="shop-sidebar-inner mb-30">
        <!-- categories filter start -->
        <div class="single-sidebar mb-45">
            <div class="sidebar-inner-title mb-25">
                <h3>Categories</h3>
            </div>
            <div class="sidebar-content-box">
                <div class="filter-attribute-container">
                    <ul>
                        <li v-for="category in categories">
                            <router-link :to="`/postBycategory/${category.slug}`">{{category.name}}(05)</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- categories filter end -->
        <!-- categories filter start -->
        <div class="single-sidebar mb-45">
            <div class="sidebar-inner-title mb-25">
                <h3>Recent post</h3>
            </div>
            <div class="sidebar-content-box">
                <div class="filter-attribute-container">
                    <ul>
                        <li><a class="active" href="#">blog image post</a></li>
                        <li><a href="#">Post with gallery</a></li>
                        <li><a href="#">Post with Audio</a></li>
                        <li><a href="#">Post with Video</a></li>
                        <li><a href="#">Maecenas ultricies</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- categories filter end -->
    </div>
    <!-- sidebar promote picture start -->
    <div class="single-sidebar mb-30">
        <div class="sidebar-thumb">
            <a href="#"><img src="assets/img/banner/img-static-sidebar.jpg" alt=""></a>
        </div>
    </div>
    <!-- sidebar promote picture end -->
</div>
</template>

<script>
export default {
    name: "SideBar",
    computed:{
        categories(){
            return this.$store.getters.categories;
        }
    },

    mounted() {
        this.$store.dispatch('getActivecategory')
    },

}
</script>

<style scoped>

</style>
