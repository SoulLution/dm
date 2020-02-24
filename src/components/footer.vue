<template>
  <div class="footer">
    <form class="form" @submint.prevent="sendEmail">
      <div class="form-bg"></div>
      <div class="form-title">Получите консультацию у специалистов нашей компании</div>
      <div class="form-arrow"></div>
      <div class="form-content">
        <img class="form-content-bg" src="static/img/form.png">
        <label for="i4" class="form-content-input" :class="{ 'active': form0 || modal0 }"><div>Как вас зовут?</div> <input autocomplete="off" required v-model="modal0" id="i4" @focus="changeForm(0)" @blur="changeForm(0)" type="text"></label>
        <label for="i5" class="form-content-input" :class="{ 'active': form1 || modal1 }"><div>Ваш номер телефона</div> <input autocomplete="off" required v-model="modal1" id="i5" @focus="changeForm(1)" @blur="changeForm(1)" type="text"></label>
        <label for="submit-footer" class="button form-content-button">
          <div class="button-bg"></div>
          <input type="submit" id="submit-footer" class="button-title" value="Получить консультацию" @click="sendEmail">
        </label>
      </div>
      
    </form>

    <a href="tel:87070000092" class="footer-phone">8 707 000 00 92 </a>
    <a href="mailto:help@dm-development.kz" class="footer-mail">help@dm-development.kz</a>
    <div class="footer-address">
      <img src="static/img/address.svg">
      <a href="geo:43.2593064,76.9297241,15">г. Алматы, Достык 97 Б, 278 офис</a>
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
      sendEmail(e){
        e.preventDefault();
        let data = {
          name: this.modal0,
          phone: this.modal1,
          _replyto: 'help@dm-development.kz'
        }
        // data = this.toFormData(data);
        this.$emit('popupsend', undefined)
        this.$axios
         .post(
              "https://formspree.io/mzbgbolj",
              data
         )
         .then(res => {
             this.modal0 = ''
             this.modal1 = ''
             this.$emit('popupsend', true)
         })
         .catch(err => {
            this.$emit('popupsend', false)
         })
         return false
      },
      toFormData(obj) {
        let formData = new FormData();
        for(let key in obj) {
            formData.append(key, obj[key]);
        }
        return formData;
      },
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
        left: -20%;
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