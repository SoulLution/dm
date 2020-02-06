import Vue from 'vue'
import Router from 'vue-router'
import index from '@/components/index'
import out from '@/components/out'
import consalting from '@/components/consalting'

Vue.use(Router)

export default new Router({
	mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: index
    },
    {
      path: '/outsource',
      name: 'out',
      component: out
    },
    {
      path: '/consalting',
      name: 'consalting',
      component: consalting
    },
  ]
})
