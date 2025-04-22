// Imporimport './bootstrap';
import '../css/app.css';
import axios from 'lib/axios';
window.axios = axios;

// import axiosInstance from './lib/axios';
import { createApp } from 'vue';
import Test from './pages/Test.vue'; // ✅ Make sure path is correct


// Set CSRF token (required for Laravel)

window.axios = axios;

// axiosInstance.post('/your-route', { key: 'value' })
//     .then(res => console.log(res.data))
//     .catch(err => console.error(err));



// axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// axios.defaults.headers.common['X-CSRF-TOKEN'] =
//     document.querySelector('meta[name="csrf-token"]').getAttribute('content');



const app = createApp({}); // ✅ Create app first

app.component('test', Test); // ✅ Register component

app.mount('#app'); // ✅ Mount to div in Blade











// import './bootstrap';
// import '../css/app.css';
// import DeleteUser from './Components/DeleteUser.vue'

// import { createApp, h } from 'vue'
// import { createInertiaApp } from '@inertiajs/vue3'



// createInertiaApp({
//   resolve: name => {
//     const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
//     return pages[`./Pages/${name}.vue`]
//   },
//   setup({ el, App, props, plugin }) {
//     createApp({ render: () => h(App, props) })
//       .use(plugin)
//       .mount(el)
//   },
// })