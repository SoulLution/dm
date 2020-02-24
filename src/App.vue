<template>
  <div id="app">
  	<div class="burger" @click="open = true">
  		<div></div>
  	</div>
  	<div class="navigation" :class="{'open': open}" @click="open = false">
  	<div class="close" @click="open = false"></div>
	  	<router-link :to="child.path" class="navigation-link" :class="{'active': $router.history.current.fullPath === child.path}" v-for="child in data">
		  	{{child.name}}
		  </router-link>
		  <div class="navigation-link nope" @click="goDown()">Оставить заявку</div>
  	</div>
    <router-view/>
    <v-footer />
  </div>
</template>

<script>
  import vFooter from '@/components/footer.vue'
export default {
  name: 'App',
  components: { vFooter },
  data(){
  	return{
  		open: false,
  		data:[
  			{
  				name: 'Главная',
  				path: '/'
  			},
  			{
  				name: 'Аутсорсинг',
  				path: '/outsource'
  			},
  			{
  				name: 'Консалтинг',
  				path: '/consalting'
  			},
  		]
  	}
  },
  methods:{
  	goDown(){
  		window.scrollTo({
        top: document.scrollingElement.clientHeight + document.scrollingElement.scrollHeight,
        behavior: 'smooth'
      });
  	}
  }
}
</script>

<style lang="scss">
  @import '@/assets/main.scss';
	.main{
		z-index: 1;	
	}
  .navigation{
  	position: fixed;
  	top: 50px;
  	left: 50px;
  	width: auto;
  	flex-direction: row;
  	z-index: 5;
  	&-link{
  		margin: 0 15px;
  		font-weight: 500;
			font-size: 22px;
			line-height: 26px;
			cursor: pointer;
			&.nope{
				display: none;
			}
  		&.active{
  			font-weight: 800;
  			color: $yellow;
  		}
  	}
  }
  @media screen and (max-width: 668px){
  	.burger{
  		height: 50px;
  		width: 50px;
  		position: fixed;
  		z-index: 5;
  		top: 20px;
  		left: 16px;
  		cursor: pointer;
  	}
  	.burger>div, .burger>div:after, .burger>div:before{
  		content: "";
  		height: 2px;
  		width: 24px;
  		background-color: $white;
  	}
  	.burger>div:after{
  		position: absolute;
			left: 0 !important;
			top: -8px !important;
		}
		.burger>div:before{
			position: absolute;
			left: 0 !important;
			top: 8px !important;
		}
  	.close{
  		position: absolute;
  		top: 20px;
  		right: 24px;
  		width: auto;
  		cursor: pointer;
  		&:after, &:before{
  			content: "";
  			height: 2px;
  			width: 24px;
  			position: absolute;
  			background-color: #80868B;
  		}
  		&:after{
  			transform: rotate(45deg);
  		}
  		&:before{
  			transform: rotate(-45deg);
  		}
  	}
  	.navigation{
	  	top: 0;
	  	width: 80%;
	  	left: -100%;
	  	transition: 0.3s;
	  	height: 100vh;
	  	background-color: $white;
	  	flex-direction: column;
	  	padding-top: 74px;
	  	justify-content: flex-start;
	  	&.open{
		  	left: 0;
	  	}
	  	&-link{
	  		align-items: flex-start;
	  		margin: unset;
	  		width: 100%;
	  		padding: 16px;
	  		color: $black;
				&.nope{
					display: flex;
				}
	  	}
	  }
  }
</style>
