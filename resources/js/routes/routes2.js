
import Home from "../components/frontend/Home";
import SinglePost from "../components/frontend/SinglePost";
import PostBycategory from "../components/frontend/PostBycategory";

export const routes = [
     { path: '/', component: Home },
     { path: '/single-post/:slug', component: SinglePost },
     { path: '/postBycategory/:slug', component: PostBycategory },



]
