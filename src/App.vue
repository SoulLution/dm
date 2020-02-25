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

  	<div class="popup" v-if="popup">
	  	<div class="popup-bg" @click="type !== undefined ? popup = false : ''"></div>
	  	<div class="popup-content">
		  	<div class="popup-content-message" :class="{'success': type === true,'error': type === false,'await': type === undefined}">{{message}}</div>
		  	<div class="popup-content-button" @click="type !== undefined ? popup = false : ''">Закрыть</div>
	  	</div>
  	</div>

    <router-view @popupsend="popupMessage" />
    <v-footer  @popupsend="popupMessage" />
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
  		touch: 0,
  		type: undefined,
  		popup: false,
  		message: 'Ваш запрос обрабатывается, в ближайшее время с вами свяжется консультант.',
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
  mounted(){
		document.body.ontouchstart = e => {
			this.touch = e.touches[0].clientX
		}
		document.body.ontouchend = e => {
			let x = e.changedTouches[0].clientX, index = 0

      if(this.touch - x > (document.body.clientWidth/2))
        this.open = false
      else if(x -this.touch > (document.body.clientWidth/2))
        this.open = true

      this.touch = 0;
		}
	},
  methods:{
  	popupMessage(e){
  		this.type = e
  		if(e === false)
  			this.message = 'Ой! Что-то пошло не так, попробуйте повторить запрос позже.'
  		else if(e === true)
  			this.message = 'Ваш запрос обрабатывается, в ближайшее время с вами свяжется консультант.'
  		else
  			this.message = 'Пожалуйста, подождите, пока ваш запрос отправится.'
  		this.popup = true
  	},
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
		margin-top: 30px;
	}

	.popup{
		position: fixed;
		top: 0;
		left: 0;
		height: 100vh;
		width: 100vw;
		justify-content: center;
		align-items: center;
		z-index: 20;
  	&-bg{
  		position: absolute;
  		height: 100%;
  		width: 100%;
  		background-color: #00000080;
  	}
  	&-content{
  		border-radius: 10px;
  		background-color: $white;
  		width: 80%;
  		padding: 2.5%;
  		max-width: 400px;
	  	&-message{
	  		color: $main;
	  		font-weight: bold;
	  		font-size: 16px;
	  		line-height: 20px;
	  		margin-bottom: 5%;
	  		&.success{
	  			color: #00ca1c;
	  		}
	  		&.error{
	  			color: #ff2b2b;
	  		}
	  		&.await{
	  			color: #888888;
	  		}
	  	}
	  	&-button{
	  		color: $main;
	  		border: 1px solid $main;
	  		border-radius: 50px;
	  		cursor: pointer;
	  		width: auto;
	  		padding: 12px 32px;
	  	}
	  }
	}

  .navigation{
  	
  	position: fixed;
  	background-color: $main;
  	top: 0;
  	padding: 15px 24px;
  	flex-direction: row;
  	justify-content: flex-start;
  	z-index: 5;
  	&>.close{
  		display: none;
  	}
  	&-link{
  		margin-right: 30px;
  		font-weight: 500;
			font-size: 22px;
			line-height: 26px;
			cursor: pointer;
			width: auto;
	  	align-items: flex-start;
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
  	.main{
			margin-top: 0;
		}
  	.burger{
  		height: 50px;
  		width: 50px;
  		position: fixed;
  		z-index: 5;
  		top: 20px;
  		left: 16px;
  		cursor: pointer;
  		background-color: $main;
  		border-radius: 50%;
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
  		display: flex !important;
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
	  	padding-left: 16px;
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
