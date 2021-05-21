
import HomeComponent from "../components/backend/home/HomeComponent";
import ManageCategory from "../components/backend/category/ManageCategory";
import CreateCategory from "../components/backend/category/CreateCategory";

export const routes = [
     { path: '/home', component: HomeComponent },
     { path: '/categories', component: ManageCategory },
     { path: '/addCategory', component: CreateCategory },

]
