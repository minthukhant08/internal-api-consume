import home from './components/Home.vue';
import test from './components/Test.vue';
import card from './components/Home/Card.vue';
import usertable from './components/Table/usertable.vue';
export default[
  {path:'/alerts', component:home},
  {path:'/alerts1', component:test},
  {path:'/card', component:card},
  {path:'/usertable', component:usertable},
]
