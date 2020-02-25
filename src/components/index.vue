<template>
  <div class="main">

    <div class="pagination">
      <div class="pagination-line" :style="{maxHeight: ((100 / 7) * (page - 1))  + '%'}"></div>
      <div class="pagination-circle" :class="{'active': page >= i }" v-for="i in 8" @click="comeToElem('section-' + i, undefined, i===2 ? true : false)"></div>
    </div>

    <div class="header" ref="section-1">
      <div class="header-main">
        <img class="header-main-logo" src="static/img/logo.png">
        <div class="header-main-title">ВЫ строите, МЫ продвигаем и продаем. </div>
        <div class="header-main-about">Мы находимся в <div>Алматы</div>, но работаем по всему Казахстану <div>удаленно,</div> или выезжая к клиенту в другой город. </div>
        <div class="wave header-main-wave"><div v-for="i in 4"></div></div>

      </div>
      <div class="header-sides"></div>


    </div>

    <div class="body">
      
      <form class="form"ref="section-2" @submint.prevent="sendEmail">
        <div class="form-bg"></div>
        <div class="form-title">Получите консультацию у специалистов нашей компании</div>
        <div class="form-arrow"></div>
        <div class="form-content">
          <img class="form-content-bg" src="static/img/form.png">
          <label for="i0" class="form-content-input" :class="{ 'active': form0 || modal0 }"><div>Как вас зовут?</div> <input autocomplete="off" required v-model="modal0" id="i0" @focus="changeForm(0)" @blur="changeForm(0)" type="text"></label>
          <label for="i1" class="form-content-input" :class="{ 'active': form1 || modal1 }"><div>Ваш номер телефона</div> <input autocomplete="off" required v-model="modal1" id="i1" @focus="changeForm(1)" @blur="changeForm(1)" type="text"></label>
          <label for="submit-0" class="button form-content-button">
            <div class="button-bg"></div>
            <input type="submit" id="submit-0" class="button-title" value="Получить консультацию" @click="sendEmail">
          </label>
        </div>
        
      </form>

      <div class="body-section" ref="section-3">
        <div class="body-section-title">какие  задачи мы решаем?</div>

        <div class="body-section-row" :class="{'reverse': i % 2 !== 0}" v-for="(task, i) in tasks">
          <div class="body-section-row-first">
            <div class="body-section-row-first-title">{{task.title}}</div>
            <div class="body-section-row-first-about">{{task.about}}</div>
            <router-link :to="task.link" class="more body-section-row-first-more">
              <div class="more-bg"></div>
              <div class="more-name">Подробнее</div>
              <img class="more-img" :src="'static/img/task_' + i + '.png'">
            </router-link>
            
          </div>
          <div class="body-section-row-second"><div class="wave"><div v-for="i in 4"></div></div></div>
          
        </div>
        
      </div>

      <div class="body-section" ref="section-4">
        <div class="body-section-title">СЕЙЧАС МЫ ПРОДВИГАЕМ И ПРОДАЕМ</div>
          <div class="body-section-row sale" :class="{'reverse': i % 2 !== 0}" v-for="(sale, i) in sales">
            <div class="body-section-row-img" :style="{backgroundImage: 'url(/static/img/image_' + i + '.png)'}"></div>
            <img class="body-section-row-img" :src="'static/img/sale_' + i + '.png'" style="display: none">
            <img class="body-section-row-img mob" :src="'static/img/image_' + i + '.png'">
            <div class="body-section-row-name">{{sale}}</div>

          </div>
      </div>

      <div class="body-section" ref="section-5">

        <div class="body-section-title">Почему эффективнее передать отдел продаж и маркетинга на аутсорсинг?</div>
        <div class="body-section-row">
          <div class="body-section-row-name quote"><img src="static/img/quotes.svg">- Экономия бюджета, сил и времени.<img src="static/img/quotes.svg"></div>
        </div>

      </div>

      <form class="form" @submint.prevent="sendEmail">
        <div class="form-bg"></div>
        <div class="form-title">Получите консультацию у специалистов нашей компании</div>
        <div class="form-arrow"></div>
        <div class="form-content">
          <img class="form-content-bg" src="static/img/form.png">
          <label for="i2" class="form-content-input" :class="{ 'active': form0 || modal0 }"><div>Как вас зовут?</div> <input autocomplete="off" v-model="modal0" id="i2" @focus="changeForm(0)" @blur="changeForm(0)" type="text"></label>
          <label for="i3" class="form-content-input" :class="{ 'active': form1 || modal1 }"><div>Ваш номер телефона</div> <input autocomplete="off" v-model="modal1" id="i3" @focus="changeForm(1)" @blur="changeForm(1)" type="text"></label>
          <label for="submit-1" class="button form-content-button">
            <div class="button-bg"></div>
            <input type="submit" id="submit-1" class="button-title" value="Получить консультацию" @click="sendEmail">
          </label>
        </div>
        
      </form>

      <div class="body-section" ref="section-6">

        <div class="body-section-title">МЫ ГОРДИМСЯ СВОЕЙ РАБОТОЙ </div>
          <div class="body-section-row work" :class="{'reverse': i % 2 !== 0, 'h500': i === 1}" v-for="(work, i) in works">
            <img class="body-section-row-bg" :src="'static/img/work_' + i + '.png'" v-if="i !== 1">
            <div class="body-section-row-yellow">
              <div class="body-section-row-yellow-title">{{work.title}}</div>
            <img class="body-section-row-bg" :src="'static/img/work_' + i + '.png'" v-if="i === 1">
              <div class="body-section-row-yellow-about">{{work.about}}</div>
            </div>
            <img class="body-section-row-nasa_img" src="static/img/nasa_bg.svg" v-if="work.nasa">
            <div class="body-section-row-nasa" v-if="work.nasa">
              <img class="body-section-row-nasa-img" src="static/img/NASA.png">
              <div class="body-section-row-nasa-title">{{work.nasa}}</div>
            </div>
          </div>
      </div>

      <div class="body-section" ref="section-7">
        <div class="body-section-title __reverse">ОТЗЫВЫ</div>
        <div class="body-section-row">
          <div class="body-section-row-figure"></div>
          <div class="slider body-section-row-slider">
            <div class="slider-slide" :class="checkSliderClass(i)" @click="nextSlide(checkSliderType(i))"v-for="(comment, i) in comments">
              <div class="slider-slide-text"><img src="static/img/quotes.svg">
                <div>{{comment.text}}</div>
                <img src="static/img/quotes.svg"></div>
              <div class="slider-slide-author">
                <div class="slider-slide-author-ava"><img :src="comment.img"></div>
                <div class="slider-slide-author-info">
                  <div class="slider-slide-author-name">- {{comment.name}} </div>
                  <div class="slider-slide-author-about">{{comment.who}}</div>
                </div>
              </div>
            </div>
            <div class="slider-buttons">
              <div class="slider-buttons-button" @click="nextSlide(-1)">
                <div class="slider-buttons-button-bg"></div>
                <div class="slider-buttons-button-side"></div>
              </div>
              <div class="slider-buttons-button" @click="nextSlide(1)">
                <div class="slider-buttons-button-bg"></div>
                <div class="slider-buttons-button-side"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="body-section" ref="section-8">

        <div class="body-section-title __shadow">как мы работаем?</div>
        <div class="body-section-title __original">как мы работаем?</div>
        <div class="body-section-row quest" v-for="quest in question">
          <div class="body-section-row-triangle"></div>
          <div class="body-section-row-info">
            {{quest.first}}
            <div>
              <div></div>
              <div>{{quest.div}}</div>
            </div>
            {{quest.second}}
          </div>
        </div>

      </div>

    </div>


  </div>
</template>

<script>
  import Vue from "vue";
  export default {
    data: () => {
      return {
        select_index: null,
        select_focus: false,
        current_slide: 1,
        select: ['Крякозябра','Бронтозябра','Синий','Ну ты понял суть:)'],
        form0: false,
        form1: false,
        modal0: '',
        modal1: '',
        page: 1,
        top: 0,
        comments: [
          {
            img: '',
            text: 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            name: 'Каирбулат Жангалиев',
            who: 'Генеральный директор строительной компании «Integrated Solutions Group»'
          },
          {
            img: '',
            text: 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            name: 'Каирбулат Жангалиев',
            who: 'Генеральный директор строительной компании «Integrated Solutions Group»'
          },
          {
            img: '',
            text: 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            name: 'Каирбулат Жангалиев',
            who: 'Генеральный директор строительной компании «Integrated Solutions Group»'
          },
          {
            img: '',
            text: 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            name: 'Каирбулат Жангалиев',
            who: 'Генеральный директор строительной компании «Integrated Solutions Group»'
          },
          {
            img: '',
            text: 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            name: 'Каирбулат Жангалиев',
            who: 'Генеральный директор строительной компании «Integrated Solutions Group»'
          },
          {
            img: '',
            text: 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            name: 'Каирбулат Жангалиев',
            who: 'Генеральный директор строительной компании «Integrated Solutions Group»'
          },
          {
            img: '',
            text: 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            name: 'Каирбулат Жангалиев',
            who: 'Генеральный директор строительной компании «Integrated Solutions Group»'
          },
          {
            img: '',
            text: 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            name: 'Каирбулат Жангалиев',
            who: 'Генеральный директор строительной компании «Integrated Solutions Group»'
          },
        ],
        tasks: [
          {
            title: 'Аутсорсинг',
            about: '- Берем на себя под ключ аналитику перед строительством, продвижение и продажу объектов жилой и коммерческой недвижимости',
            link: '/outsource'
          },
          {
            title: 'Консалтинг',
            about: '- Повышаем эффективность работы отделов  продаж и маркетинга застройщиков: аудит, обучение, реинжиниринг с внедрением цифровых технологий',
            link: '/consalting'
          },
        ],
        sales: ['ЖК «MAEK KUAT RESIDENCE»','ЖК «JULDYZ PALACE»','ЖК «ISLI ROSE»','ЖК «JULDYZ 2 »','ЖК « JAYIK RIVERSIDE» '],
        works: [
          {
            title: 'Более 36 000 м2 продали',
            about: 'Это площадь Республики Гаити, населением в 10 000 человек '
          },
          {
            title: 'Заключили сделок на 4,8 млрд тенге/год',
            about: 'За столько же, на аукционе  продали картину Рембранта с его отпечатками пальцев ',
            nasa: 'Столько же стоит Скафандр астронавтов НАСА'
          },
          {
            title: 'За 1,5 года выросли в 300 раз',
            about: 'В то время как мозг человека за 7 миллионов лет в процессе эволюции вырос всего в пять раз, с 300 до 13 500 кубических сантиметров. '
          }
        ],
        question: [
          {
            first: 'Вы',
            div: 'оставляете заявку,',
            second: 'либо звоните сами'
          },
          {
            first: '',
            div: 'Вам перезвонит',
            second: 'наш специалист, ответит на ваши вопросы и обозначит дату и время   разговора с руководством компании.'
          },
          {
            first: 'В назначенный срок',
            div: 'выходим на связь',
            second: 'онлайн, либо вылетаем к вам для личной встречи'

          },
          {
            first: '',
            div: 'Отвечаем на ваши вопросы,',
            second: 'показываем свои кейсы,  технологии и собственные наработки.'

          },
          {
            first: 'При заинтересованности в сотрудничестве,',
            div: 'проводим аудит',
            second: 'вашей компании для дальнейшей работы.'

          },
          {
            first: '',
            div: 'Готовим для вас ',
            second: 'коммерческое предложение'

          },
          {
            first: '',
            div: 'Согласовываем',
            second: 'и подписываем Договор'

          },
          {
            first: 'Мы',
            div: 'приступаем к своей работе',
            second: ''

          }
        ]
      }
    },
    beforeRouteEnter(from, to, next){
      window.scrollTo({
        top: 0,
      })
      next()
    },
    created(){
      window.onscroll = () => {
        let height = document.scrollingElement.clientHeight
        for(let i = 8; i > 0 ; i--)
          if(this.$refs['section-'+i]){
            let top = this.$refs['section-'+i].getBoundingClientRect().top
            let elem = top
            if(elem <= 0){
              this.page = i;
              this.top = height + document.scrollingElement.scrollTop;
              this.top = (this.top / height - 1) * 100
              break;
            }
            if(i === 1) this.top = -1;
          }
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
       },
      toFormData(obj){
        let formData = new FormData();
        for(let key in obj) {
            formData.append(key, obj[key]);
        }
        return formData;
      },
      nextSlide(index){
        this.current_slide += index;
        if(this.current_slide > this.comments.length-1) this.current_slide = 1
        if(this.current_slide < 1) this.current_slide = this.comments.length-1
      },
      checkSliderType(index){
        let type

        type = this.current_slide - 1

        if( type <= 0 ) type += this.comments.length-1
        if(index === type)
          type = -1
        else{
          for(let i = 1; i < 4; i++){
            type = this.current_slide + i
            if( type > this.comments.length-1 ) type -= this.comments.length-1
            if(index === type){
              type = i
              break;
            }else
              type = 4
          }
          if(this.current_slide === index) type = 0
        }

        return type
      },
      checkSliderClass(index){
        let end, type

        type = this.current_slide - 1
        if( type <= 0 ) type += this.comments.length-1
        if(index === type)
          type = 0
        else{
          for(let i = 1; i < 4; i++){
            type = this.current_slide + i
            if( type > this.comments.length-1 ) type -= this.comments.length-1
            if(index === type){
              type = i
              break;
            }else
              type = 4
          }
          if(this.current_slide === index) type = 5
        }

        switch( type ){
          case 0: end = '__left-1'; break;
          case 1: end = '__right-1'; break; 
          case 2: end = '__right-2'; break; 
          case 3: end = '__right-3'; break; 
          case 4: end = '__behind'; break;
          case 5: end = ''; break; 
        }
        return end
      },
      changeSelect(index){
        this.select_index = index
        this.openSelect()
      },
      openSelect(){
        this.select_focus = !this.select_focus
      },
      comeToElem(ref, index){
        let top
        if(index || index === 0)
          top = this.$refs[ref][index].offsetTop
        else
          top = this.$refs[ref].offsetTop
        window.scrollTo({
          top: top + document.scrollingElement.clientHeight + (document.scrollingElement.clientHeight / 2.5),
          behavior: 'smooth'
        });
      },
      changeForm(index){
        if(this['form'+index]) 
          this['form'+index] = false
        else
          this['form'+index] = true
      },
    }
  };
</script>

<style lang="scss" scoped>
  @import '@/assets/main.scss';
  .header{
    z-index: 1;
    height: auto;
    margin-bottom: calc(35vw + 50px);
    &:after{
      content: "";
      position: absolute;
      bottom: -35vw;
      border-top: 35vw solid $grey;
      border-left: 100vw solid transparent;
      border-right: 100vw solid transparent;
      z-index: 0;
    }
    &-main{
      z-index: 1;
      // height: 65%;
      background-color: $grey;
      justify-content: space-between;
      padding-top: 50px;
      &-logo{
        // margin-bottom: 50px;
      }
      &-title{
        font-weight: bold;
        font-size: 60px;
        line-height: 150%;
        width: 90%;
      }
      &-about{
        font-weight: bold;
        font-size: 24px;
        line-height: 29px;
        width: 65%;
        flex-direction: row;
        flex-wrap: wrap;
        &>div{
          margin: 0 5px;
          width: auto;

            &:nth-child(1):after{
              transform: rotate(180deg);
              left: 25%;
              top: -4px;
              animation-delay: 0.9s;
            }
          &:after{
            content: "";
            position: absolute;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid $yellow;
            top: 24px;
            animation: triangle-shark 1.8s linear infinite;
          }
        }
      }
      &-wave{
        margin-top: 2rem;
      }
    }
    &-sides{
      position: absolute;
      right: 15vw;
      bottom: -30vw;
      width: 12.5vw;
      height: 12.5vw;
      border: 1px solid $white;
      border-radius: 2px;
      transform: rotate(45deg) skew(-15deg, -15deg);
      overflow: visible;
      z-index: 1;
      animation: sides-open 0.5s linear 1;
      &:after, &:before{
        position: absolute;
        content: "";
        width: 12.5vw;
        height: 12.5vw;
        border: 1px solid $white;
        border-radius: 2px;
        top: -45%;
        left: -45%;
        animation: sides-open-2 0.5s linear 1;
      }
      &:before{
        top: 45%;
        left: 45%;
        animation: sides-open-3 0.5s linear 1;
      }
    }
  }

  .body{
    z-index: 0;
    &-section{
      margin: 100px 0;
      &-title{
        align-items: flex-start;
        width: calc(100% - 48px);
        margin: 0 24px 100px 24px;
        font-weight: 800;
        font-size: 80px;
        line-height: 98px;
        text-align: left;
        text-transform: lowercase;
        color: transparent;
        -webkit-text-stroke: 1px $white;
        z-index: 1;
        &.__reverse{
          position: absolute;
          z-index: 1;
          color: $white;
          font-weight: 500;
          font-size: 50px;
          line-height: 59px;
          left: -50px;
          margin: unset;
          width: auto;
          transform: rotate(-90deg);
        }
        &.__shadow{
          position: absolute;
          top: -15px;
          left: -32px;
          opacity: 0.3;
        }
        &.__original{
          font-weight: 500;
          color: $white;
          line-height: 94px;
        }
      }
      &-row{
        z-index: 0;
        flex-direction: row;
        &.reverse{
          flex-direction: row-reverse;
        }
        &.h500{
          padding: 250px 50px 150px;
          margin: 0 96px 0px !important; 
          flex-direction: column;
          align-items: flex-end;
        }
        &.work{
          width: calc(100% - 150px);
          margin: 50px 96px 0;
          justify-content: flex-start;          
        }
        &-first{
          height: 500px;
          margin: 0 5vw;
          &-title{
            font-weight: 800;
            font-size: 50px;
            line-height: 61px;
            align-items: flex-start;
            margin-left: 15vw;
          }
          &-about{
            font-weight: bold;
            font-size: 18px;
            line-height: 22px;
            text-align: left;
            align-items: flex-start;
            margin: 50px 0;
          }
          &-more{
            height: 60px;
            width: auto;
          }
        }
        &-second{

        }
        &-img{
          margin: 3rem 1rem;
          height: 10rem;
          max-width: 50%;
          background-repeat: no-repeat !important;
          background-size: 100% 100% !important;
          background-attachment: fixed !important;
          &.mob{
            display: none;
          }
        }
        &-name{
          padding: 0 65px;
          text-align: left;
          font-weight: bold;
          // font-size: 50px;
          font-size: 3.5rem;
          line-height: 60px;
          width: auto;

          &>img{
            position: absolute;
            right: 0; 
            height: 58px;
            top: -100%;
            &:first-child{
              top: 100%;
              right: 100%;
              transform: rotate(180deg);
            }
          }
        }
        &-bg{

        }
        &:nth-child(2){
          .body-section-row-bg{
            position: absolute;
            left: 0;
          }
          .body-section-row-yellow{
            margin-top: 6%;
            max-width: 370px;
          }
        }
        &-yellow{
          width: 40%;
          margin-left: 32px;
          &:nth-child(1){
            margin-top: -3%;
            margin-right: 12.5%;
          }
          &-title{
            color: $yellow;
            font-weight: 500;
            font-size: 40px;
            line-height: 47px;
            margin-bottom: 24px;
            align-items: flex-start;
            text-align: left;
          }
          &-about{
            color: $yellow;
            font-weight: 500;
            font-size: 18px;
            line-height: 150%;
            align-items: flex-start;
            text-align: left;
          }
        }
        &-nasa_img{
          position: absolute;
          width: 70%;
        }
        &-nasa{
          // position: absolute;
          margin-right: -25px;
          width: auto;
          &-img{
            margin-right: -40%;
          }
          &-title{
            color: $yellow;
            font-weight: 500;
            font-size: 18px;
            line-height: 21px;
            width: 90%;
            align-items: flex-start;
            text-align: left;
          }
        }
        &-figure{
          overflow: hidden;
          height: 370px;
          width: 100%;
          top: -25%;
          position: absolute;
          z-index: 0;
          &:before{
            content: "";  
            position: absolute;
            right: -1px;
            border: 1px solid $white;
            width: 88%;
            height: calc(100% - 2px);
          }
          &:after{
            content: "";
            height: 100vw;
            width: 100vw;
            transform: rotate(135deg);
            position: absolute;
            left: -78vw;
            border-top: 1px solid $white;
            border-left: 1px solid $white;
            background-color: $main;
          }
        }
        &-slider{

        }
        &-triangle{
          border-left: 25px solid $yellow;
          border-top: 25px solid transparent;
          border-bottom: 25px solid transparent;
          width: auto;
          position: absolute;
          left: 45px;
          top: 12px;
        }
        &-info{
          margin: 16px 6px 16px 90px; 
          align-items: flex-start;
          text-align: left;
          font-weight: 500;
          font-size: 24px;
          line-height: 150%;
          flex-direction: row;
          justify-content: flex-start;
          flex-wrap: wrap;
          // display: block;
          float: left;
          &>div{
            display: block;
            // float: left;
            margin: 0 5px;
            width: auto;
            &>div:first-child{
              position: absolute;
              bottom: -5%;
              left: -5px;
              width: 100%;
              height: 25%;
              background-color: $black;
              z-index: 0;
            }
            &>div{
              z-index: 1;
            }
          }
        }
      }
    }
  }

  @media screen and (max-width: 668px){
    .header{
      height: auto;
      margin-bottom: calc(35vw + 50px);
      &:after{
        bottom: -35vw;
      }
      &-sides{
        bottom: -35vw;
      }
      &-main{
        &-title{
          font-size: 32px;
          line-height: 39px;
        }
        &-about{
          font-size: 16px;
          line-height: 150%;
          &>div{
            &:first-child:after{
                top: -4px;
              }
            &:after{
              border-left: 8px solid transparent;
              border-right: 8px solid transparent;
              border-bottom: 8px solid #ECDF68;
              top: 85%;
              
            }
          }
        }
      }
    }

    .body-section{
      &-title{
        font-size: 30px;
        line-height: 37px;
        width: 95%;
        margin-left: unset;
        margin-right: unset;
        margin-bottom: unset;
        &.__shadow{
          left: 5px;
          margin-top: 32px;
        }
        &.__reverse{
          position: relative;
          transform: unset;
          left: -25%;
        }
      }
      &-row.reverse{
        &.sale{
          flex-direction: row-reverse !important;
        }
      }
      &-row, &-row.reverse{
        flex-direction: column;
        &:nth-child(2) .body-section-row-bg{
          left: unset;
        }
        &.sale{
          flex-direction: row;
          margin: 25px 0;
        }
        &.work{
          margin: unset;
          margin-top: 50px !important;
          width: 90%;
          &:nth-child(4){
            margin: 25% 0 !important; 
            flex-direction: row;
            flex-wrap: wrap;
            .body-section-row-yellow{
              &-title{
                margin-top: -20%;
              }
              &-about{
                top: -5vh;
                margin-left: 33%;
                width: 35%;
              }
            }
            .body-section-row-bg{
              position: absolute;
            }
          }
        }
        &.quest{
          align-items: flex-start;
        }
        &-triangle{
          border-left: 12px solid #ECDF68;
          border-top: 12px solid transparent;
          border-bottom: 12px solid transparent;
          left: 12px;
          top: 14px;
        }
        &-info{
          font-size: 15px;
          line-height: 150%;
          margin: 16px 16px 16px 32px;
          width: auto;
        }
        &-figure:after{
          left: -50%;
        }
        &.h500{
          padding: unset;
        }
        &-bg{
          // height: 100%;
          width: 50%;
        }
        &-nasa_img{
          width: 100%;
          height: 100%;
          bottom: 0;
          z-index: 0;
        }
        &-nasa{
          flex-direction: row;
          width: 75%;
          &-img{
            width: 40%;
            margin-right: unset;
          }
          &-title{
            font-size: 15px;
            line-height: 18px;
          }
        }
        &-yellow{
          width: 100%;
          margin-right: unset !important;
          flex-wrap: wrap;
          &:nth-child(1){
            margin-top: 16px;
            flex-direction: row;
            justify-content: flex-end;
            .body-section-row-bg, .body-section-row-yellow-about{
              width: 75%;
            }
          }
          &-title{
            font-size: 25px;
            line-height: 29px;
            margin-bottom: 54px;
            width: 90%;
          }
          &-about{
            width: 75%;
            font-size: 15px;
            line-height: 150%;
          }
        }
        &-img{
          width: 50%;
          padding: 16px;
          display: none;
          &.mob{
            height: auto;
            padding: 1rem;
            margin: unset;
            display: flex;
          }
        }
        &-name{
          font-size: 20px;
          line-height: 24px;
          padding: 0 5px;
          &.quote{
            margin-top: 66px;
            text-align: center;
            width: 90%;
            font-size: 30px;
            line-height: 150%;
          }
          &>img{
            height: 12px;
            top: 0;
            &:first-child{
              left: 0;
              top: 80%;
            }
          }
        }
        &-first{
          &-title{
            font-size: 20px;
            line-height: 25px;
          }
          &-about{
            font-size: 16px;
            line-height: 19px;
            width: 80%;
          }
        }
      }
    }
  }

  @keyframes sides-open{
    0%{transform: rotate(0deg) skew(0, 0) scale(0.5);} 
    // 50%{transform: rotate(45deg) skew(-15deg, -15deg);}
    100%{transform: rotate(45deg) skew(-15deg, -15deg) scale(1);}
  }
  @keyframes sides-open-2{
    0%{top: 0; left: 0;} 
    // 50%{transform: rotate(45deg) skew(-15deg, -15deg);}
    100%{left: -45%; top: -45%;}
  }

  @keyframes sides-open-3{
    0%{top: 0; left: 0;} 
    // 50%{transform: rotate(45deg) skew(-15deg, -15deg);}
    100%{left: 45%; top: 45%;}
  }

  @keyframes triangle-shark{
    0%{margin-top: -4px} 
    50%{margin-top: 4px}
    100%{margin-top: -4px}
  }
</style>
