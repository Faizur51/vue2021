
import HomeComponent from "../components/backend/home/HomeComponent";
//category
import ManageCategory from "../components/backend/category/ManageCategory";
import CreateCategory from "../components/backend/category/CreateCategory";
import EditCategory from "../components/backend/category/EditCategory";
//post
import ManagePost from "../components/backend/post/ManagePost";
import CreatePost from "../components/backend/post/CreatePost";
import EditPost from "../components/backend/post/EditPost";
export const routes = [
     { path: '/home', component: HomeComponent },
    //category
     { path: '/categories', component: ManageCategory },
     { path: '/addCategory', component: CreateCategory },
     { path: '/editCategory/:slug', component: EditCategory },

    //post
    { path: '/posts', component: ManagePost },
    { path: '/addPost', component: CreatePost },
    { path: '/editPost/:slug', component: EditPost },

]
