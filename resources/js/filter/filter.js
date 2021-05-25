import moment from 'moment';
import Vue from 'vue'
Vue.filter('time',function (value){
    //return moment(value).format('MMMM Do YYYY, h:mm:ss a');
   //return  moment(value).add(10, 'days').calendar();
    return moment(value).format('lll');
})

Vue.filter('subString',function (content,length){
   return content.substring(0,length)
})
