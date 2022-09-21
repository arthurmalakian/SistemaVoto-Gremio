// import * as Vue from 'vue'
import axios from 'axios'
// import VueAxios from 'vue-axios'

export const http = axios.create({
    baseURL: 'http://localhost/api/',
});