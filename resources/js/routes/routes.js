
import HomeComponent from "../components/backend/home/HomeComponent";
//category
import ManageCategory from "../components/backend/category/ManageCategory";
import CreateCategory from "../components/backend/category/CreateCategory";
import EditCategory from "../components/backend/category/EditCategory";

export const routes = [
     { path: '/home', component: HomeComponent },
    //category
     { path: '/categories', component: ManageCategory },
     { path: '/addCategory', component: CreateCategory },
     { path: '/editCategory/:slug', component: EditCategory },

]
