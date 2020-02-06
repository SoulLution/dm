<template>
  <div class="footer">
    <div class="form">
      <div class="form-bg"></div>
      <div class="form-title">Получите консультацию у специалистов нашей компании</div>
      <div class="form-arrow"></div>
      <div class="form-content">
        <img class="form-content-bg" src="/static/img/form.png">
        <label for="i4" class="form-content-input" :class="{ 'active': form0 || modal0 }"><div>Как вас зовут?</div> <input v-model="modal0" id="i4" @focus="changeForm(0)" @blur="changeForm(0)" type="text"></label>
        <label for="i5" class="form-content-input" :class="{ 'active': form1 || modal1 }"><div>Ваш номер телефона</div> <input v-model="modal1" id="i5" @focus="changeForm(1)" @blur="changeForm(1)" type="text"></label>
        <div class="button form-content-button">
          <div class="button-bg"></div>
          <div class="button-title">Получить консультацию</div>
        </div>
      </div>
      
    </div>

    <div class="footer-phone">8 777 777 77 77 </div>
    <div class="footer-mail">@dm-development.kz</div>
    <div class="footer-address">
      <img src="/static/img/address.svg">
      <div>Здесь будет адрес</div>
    </div>
    <div class="footer-coopyright">Copyright @dm.kz</div>
  </div>
</template>
<script>
	export default{
		data(){
			return {
				form0: false,
        modal0: '',
        form1: false,
        modal1: '',
			}
		},
		methods: {
      changeForm(index){
        if(this['form'+index]) 
          this['form'+index] = false
        else
          this['form'+index] = true
      },
		}
	}

</script>

<style lang="scss">
	@import '@/assets/main.scss';
  .footer{
    background-color: $footer;
    padding: 50px 0 25px;
    overflow: hidden;
    z-index: 0;
    .form-bg:before{
      background-color: $footer;
    }
    &-phone{
      cursor: pointer;
      font-size: 50px;
      line-height: 150%;
      text-align: center;
      text-decoration-line: underline;
    }
    &-mail{
      cursor: pointer;
      margin: 25px 0 12px;
      font-size: 18px;
      line-height: 150%;
    }
    &-address{
      cursor: pointer;
      flex-direction: row;
      width: auto;
      margin-bottom: 12px;
      &>img{
        position: absolute;
        left: -40%;
      }
      &>div{
        width: auto;
        font-size: 18px;
        line-height: 150%;
      }
    }
    &-coopyright{
      color: $black_03;
    }
  }

  @media screen and (max-width: 668px){
    .footer{
      padding-top: 75px;
      &-phone{
        font-size: 25px;
        line-height: 150%;
        text-decoration: none;
      }
    }
  }
</style>