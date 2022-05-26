import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress} from '@inertiajs/progress';
import Layout from './Shared/Layout.vue';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


library.add(faUserSecret)

createInertiaApp({

  resolve: async name =>{ 
    
    let page = (await import(`./Pages/${name}`)).default;

    if(page.layout === undefined){

    page.layout = Layout;
    
    }

    return page;
    },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .component('Head', Head)
      .component('font-awesome-icon', FontAwesomeIcon)
      .mount(el)
  },


  title: title => `Zaiko - ${title}`


});

InertiaProgress.init();


