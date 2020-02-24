<template>
  <div class="main">

    <!-- <div class="pagination">
      <div class="pagination-line"></div>
      <div class="pagination-circle" v-for="i in 8"></div>
    </div> -->

    <div class="header">
      <img class="header-bg" src="static/img/header_bg_3.png">
      <div class="header-main">
        <img class="header-main-logo" src="static/img/logo.png">
        <div class="header-main-title">Консалтинг. Мы предоставляем все услуги для Застройщиков: </div>
        <div class="header-main-name">- от анализа «Что строить и где?»- нейминга нового ЖК и продвижения его выхода на рынок - до решения узких и специфических задач в виде внедрения автоматической системы  </div>
        <div class="header-main-about"><img src="static/img/quotes.svg">Динамического ценообразования .  <img src="static/img/quotes.svg"></div>
        <div class="wave header-main-wave"><div v-for="i in 4"></div></div>
      </div>
    </div>

    <div class="body">
      
      <div class="body-section">
	      <div class="body-section-row col">
          <img class="body-section-row-min_img" src="static/img/0_sec.svg">
          <div class="body-section-row-abouter">
            <div class="body-section-row-abouter-sentence" v-for="up in helpes.up"><div :class="{'bold': checkCaps(word)}" v-for="word in up">{{word}}</div></div>
          </div>
          <div class="body-section-row-title"><div>{{helpes.title.div}}</div>{{helpes.title.second}}</div>
          <div class="body-section-row-abouter">
            <div class="body-section-row-abouter-sentence" v-for="down in helpes.down"><div :class="{'bold': checkCaps(word)}" v-for="word in down">{{word}}</div></div>
          </div>
        </div>
      </div>


      <div class="body-section">
        <div class="body-section-title">Программа курса ДМ скул: </div>
        <div class="body-section-row programm" :class="{'reverse': i % 2 !== 0}" v-for="(program, i) in programs">
          <div class="body-section-row-about">
            <div class="body-section-row-about-quotes"><img src="static/img/quotes.svg">{{program.quote}}<img src="static/img/quotes.svg"></div>
            <div class="body-section-row-img mob"><img :src="'static/img/program_' + i + '.png'"></div>
            <div class="body-section-row-about-comment"><div v-for="com in program.comment">{{com}}</div></div>
          </div>
          <div class="body-section-row-img"><img :src="'static/img/program_' + i + '.png'"></div>
        </div>
      </div>

      <div class="body-section">
        <div class="body-section-title __yellow">
          <img class="body-section-title-img" src="static/img/gift.svg">
          <div>Бонус</div> урок: 
        </div>
        <div class="body-section-row text">
          <div class="plus_5" v-for="i in 5"></div>
          <div class="body-section-row-column"><div class="wave"><div v-for="i in 4"></div></div></div>
          <div class="body-section-row-column">
            <div class="body-section-row-column-line">
              <div class="plus"></div>
              <div class="body-section-row-column-line-text __yellow">Проверенные</div>
              <div class="body-section-row-column-line-text">экспресс-</div>
              <div class="body-section-row-column-line-text">техники</div>
              <div class="body-section-row-column-line-text">продаж</div>
            </div>
            <div class="body-section-row-column-line">
              <div class="plus"></div>
              <div class="body-section-row-column-line-text">Работа с</div>
              <div class="body-section-row-column-line-text">возражениями</div>
              <div class="body-section-row-column-line-text"> от</div>
              <div class="body-section-row-column-line-text __yellow">А</div>
              <div class="body-section-row-column-line-text">до</div>
              <div class="body-section-row-column-line-text __yellow">Я</div>
            </div>
            <div class="body-section-row-column-line">
              <div class="plus"></div>
              <div class="body-section-row-column-line-text">Работа с</div>
              <div class="body-section-row-column-line-text __yellow">CRM</div>
              <div class="body-section-row-column-line-text">системой</div>
            </div>
            <div class="body-section-row-column-line">
              <div class="plus"></div>
              <div class="body-section-row-column-line-text">Личный</div>
              <div class="body-section-row-column-line-text __yellow">бренд</div>
              <div class="body-section-row-column-line-text">эксперта</div>
              <div class="body-section-row-column-line-text">по</div>
              <div class="body-section-row-column-line-text">продаже</div>
              <div class="body-section-row-column-line-text"> недвижимости</div>
            </div>
          </div>
        </div>
        
      </div>

      <div class="body-section">
        <div class="body-section-row" :class="{'reverse': i % 2 !== 0}" v-for="(task, i) in tasks">
          <div class="body-section-row-first">
            <div class="body-section-row-first-title">{{task.title}}</div>
            <div class="body-section-row-first-about">{{task.about}}</div>
            <div class="more body-section-row-first-more" v-if="i === 0">
              <div class="more-bg"></div>
              <div class="more-name">ПЕРЕЙТИ НА САЙТ КОМПАНИИ</div>
              <img class="more-img" src="static/img/task_2.png">
            </div>
          </div>
          <div class="body-section-row-second"><div class="wave"><div v-for="i in 4"></div></div></div>
        </div>
      </div>

      <div class="body-section" v-if="false">
        <div class="body-section-title">НАМ НУЖНЫ СВЕЖИЕ КАДРЫ!</div>
        <div class="body-section-pre_title">Пройди обучение и получи работу в наших филиалах: </div>
        <img class="body-section-map" src="static/img/Map.png">
      </div>

      <div class="body-section" v-if="false">
        <div class="body-section-row student" :class="{'reverse': i % 2 !== 0}" v-for="(student, i) in students">
            <img class="body-section-row-img_student" :src="'static/img/student_' + i + '.png'">
            <div class="body-section-row-name">{{student}}</div>
          </div>
      </div>



    </div>

  </div>
</template>

<script>
  import Vue from "vue"
  // import map from "../../static/img/Map.png"
  export default {
    data: () => {
      return {
        data: 'dsa dsa dsa',
        students: ['Наши выпускники вчера', 'Наши сотрудники сегодня'],
        tasks: [
          {
            title: 'DM SCHOOL',
            about: '– это образовательный проект компании DM DEVELOPMENT. Эксклюзивного партнера Застройщиков РК по управлению маркетингом и продажами под ключ.'
          },
          {
            title: 'DM DEVELOPMENT',
            about: '– предоставляет на правах аутсорсинга полный цикл офиса продаж с сотрудниками для строительных компаний. '
          }
        ],
        programs: [
          {
            quote: '- Эксперт по продаже недвижимости – прежде всего Эксперт в строительстве.',
            comment: 'МЫ разберем основы, изучим каркас строительства, фасадную часть, инженерные характеристики и обсудим часто задаваемые технические вопросы клиентов. '
          },
          {
            quote: '- Первое касание - общение с клиентами по телефону.',
            comment: 'МЫ изучим конкретный алгоритм входящих и исходящих звонков, познакомимся с эффективными техниками закрытия клиентов и владения инициативой при разговоре. '
          },
          {
            quote: '- Первая встреча- самая важное звено в цепи.',
            comment: 'МЫ разберем идеальный скрипт первых переговоров, познакомимся с техниками выявления потребностей, научимся грамотно презентовать объект по дорожке продаж и эффективно завершать встречу.'
          },
          {
            quote: '- Экскурсия на стройке – идеальное место для продажи.',
            comment: 'МЫ разберемся с демо путем, узнаем куда вести клиента и  что показать для  идеального завершения встречи.'
          },
          {
            quote: '- Эксперт во всем.',
            comment: 'МЫ разберем типовые договоры купли-продажи,  ответим на часто задаваемые юридические вопросы клиентов и обсуди все финансовые продукты для удобства клиентов.'
          }
        ],

        helpes: {
          title: {
            div: 'МЫ',
            second: 'поможем: '
          },
          up: [    
            ['Продавать','БЫСТРЕЕ','И','БОЛЬШЕ'],
            ['ПРОДВИГАТЬ', 'лучше', 'и', 'ТОЧНО', 'В', 'ЦЕЛЬ'],
            ['ЗАЯВИТЬ',  'о', 'себе', 'и', 'своем', 'ЖК', 'в', 'КОРОТКИЕ', 'сроки'],
            ['УВЕЛИЧИТЬ',  'эффективность', 'отдела', 'продаж', 'за', '3', 'НЕДЕЛИ'],
            ['АВТОМАТИЗИРОВАТЬ', 'все', 'бизнес', 'процессы', 'в', 'отделах'],
            ['ПОСТРОИТЬ', 'call', 'centre', 'мечты']
          ],
          down: [
            ['НАБРАТЬ', 'команду', 'sales', 'manager', 'и'],
            ['ОБУЧИТЬ', 'их', 'ЭКСПЕРТНОСТИ', 'в', 'строительстве'],
            ['ОФОРМИТЬ', 'строительство', 'по', 'всем', 'канонам' ],
            ['ПРОЕКТИРОВАТЬ', ' только', 'ЛИКВИДНЫЕ', 'планировки', ],
            ['Вести', 'ГРАМОТНУЮ', 'политику', 'в', 'социальных', 'сетях'],
            ['Найти', 'ЛУЧШИЕ', 'решения', 'для', 'строительства', 'по', 'цене', 'и', 'качеству']
          ]
        }	
      }
    },
    beforeRouteEnter(from, to, next){
      window.scrollTo({
        top: 0,
      })
      next()
    },
    created(){
      for(let i = 0; i < this.programs.length; i++)
        this.programs[i].comment = this.splitString(this.programs[i].comment, ' ')
    },
    methods: {
      splitString(string, separator){
        let array = string.split(separator)
        return array
      },
      checkCaps(word){
        let char = word.charAt(word.length-1) 
        return char === char.toUpperCase()
      }
    }
  };
</script>

<style lang="scss" scoped>
  @import '@/assets/main.scss';
  .header{
    min-height: 100vh;
    justify-content: flex-start;
    max-height: 900px;
    z-index: 1;
    &-bg{
    	position: absolute;
    	width: 100%;
    	height: 100%;
    }
    &-main{
      z-index: 1;
      height: 65%;
      // background-color: $grey;
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
        -webkit-text-stroke: 1px $white;
        color: transparent;
      }
      &-about{
        width: auto;
        flex-direction: row;
        flex-wrap: wrap;
        font-weight: bold;
        font-size: 24px;
        line-height: 150%;
				&>img{
          position: absolute;
          right: -10px; 
          height: 10px;
          top: -7px;
          &:first-child{
            top: calc(100% + 5px);
            right: calc(100% + 7px);
            transform: rotate(180deg);
          }
        }
      }
      &-wave{
        margin-top: 2rem;
      }
	    &-name{
	    	margin-top: 15px;
	    	width: auto;
        font-weight: bold;
        font-size: 24px;
        line-height: 150%;
        width: auto;
        margin: 15px 10%;
	    }
    }
  }


  
  .body{
    z-index: 0;
    &-section{
      margin: 100px 0;
      left: 0;
        
        &-title{
          justify-content: flex-start;
          font-weight: 800;
          margin-left: 48px;
          font-size: 80px;
          line-height: 98px;
          -webkit-text-stroke: 1px $white;
          color: transparent;
          text-align: left;
          text-transform: lowercase;
          flex-direction: row;
          &-img{
            // margin-top: -40px;
          }
          &>div{
            width: auto;
            color: $white;
            margin: 0 20px;
          }
          &.__yellow{
            -webkit-text-stroke: 1px $yellow;
            &>div{
              text-transform: uppercase;
              color: $yellow;
            }
          }
        }
        &-pre_title{
          align-items: flex-start;
          padding-left: 3.33%;
          font-weight: bold;
          font-size: 30px;
          line-height: 150%;
        }
        &-map{
          margin-top: 78px;
          width: calc(100% - 10vw);
        }
        &-row{
          flex-direction: row;
          &.col{
              align-items: flex-start;
              flex-direction: column;
            }
          &.text{
            align-items: center;

            .plus_5{
              position: absolute;
              &:nth-child(1){
                left: -37.5%;
                top: 37.5%;
              }
              &:nth-child(2){
                left: -25%;
                top: 25%;
              }
              &:nth-child(3){
                left: -22.5%;
                top: 100%;
              }
              &:nth-child(4){
                left: 22%;
                top: 0;
              }
              &:nth-child(5){
                left: 35%;
                top: 30%;
              }
              &:after, &:before{
                content: "";
                width: 24px;
                height: 1px;
                background-color: $white;
                opacity: 0.5;
                position: absolute;
              }
              &:before{
                transform: rotate(90deg);
              }
            }
          }
          &.programm{
            margin: 150px 0 0;
            
          }
          &.reverse{
            flex-direction: row-reverse;
            .body-section-row-first{
              height: 300px;
            }
            .body-section-row-img{ 
              margin-left: 70px;
              margin-right: unset;
              &:after{
                left: 70px;
              }
            }
          }

          &-column{
            width: 50vw;
            height: 100%;
            &-line{
              flex-direction: row;
              flex-wrap: wrap;
              justify-content: flex-start;
              align-items: center;
              margin: 22px 0;
              &:nth-child(1){
                margin-left: -65%;
              }
              &:nth-child(2){
                margin-left: -35%;
              }
              &:nth-child(3){
                margin-left: -65%;
              }
              &:nth-child(4){
                margin-left: -5%;
              }
              .plus{
                top: 24px;
                &:after, &:before{
                  content: "";
                  width: 24px;
                  left: -29px;
                  height: 1px;
                  background-color: $yellow;
                  position: absolute;
                }
                &:before{
                  transform: rotate(90deg);
                }
              }
              &-text{
                flex-direction: row;
                width: auto;
                font-weight: 500;
                font-size: 24px;
                line-height: 200%;
                &.__yellow{
                  color: $yellow;
                  width: auto;
                  margin: 0 5px;
                }
              }
            }
          }
          &-min_img{
            width: 10%;
            position: absolute;
            left: 72px;
          }
          &-abouter{
            flex-direction: row;
            justify-content: space-between;
            &:nth-child(4){
              margin-left: -50%;
            }
            &-sentence{
              flex-direction: row;
              margin-left: 50px;
              font-weight: 500;
              font-size: 17px;
              line-height: 150%;
              &:first-child{
                margin-left: unset;
              }
              &>div{
                width: auto;
                margin-left: 5px;
                &:first-child{
                  margin-left: unset;
                }
              }
            }
          }
          &-title{
            margin-left: calc(10vw + 72px);
            justify-content: flex-start;
            font-weight: 800;
            font-size: 100px;
            line-height: 150%;
            -webkit-text-stroke: 1px $yellow;
            color: transparent;
            text-align: left;
            flex-direction: row;
            &>div{
              width: auto;
              color: $yellow;
              margin: 0 20px;
            }
          }
          &-about{
            padding: 35px 78px 5px 156px;
            align-items: flex-start;
            &:after{
              content: "";
              width: 100%;
              height: 100%;
              background-color: $black_02;
            }
            &-quotes{
              font-weight: 800;
              font-size: 24px;
              line-height: 150%;
              max-width: 90%;
              width: auto;
              text-align: left;
              padding: 0 5%;
              margin-bottom: 50px;
              &>img{
                position: absolute;
                right: -10%; 
                height: 30px;
                top: 0;
                &:first-child{
                  top: 30px;
                  right: 100%;
                  transform: rotate(180deg);
                }
              }
            }
            &-comment{
              font-weight: bold;
              font-size: 17px;
              line-height: 150%;
              flex-direction: row;
              width: 100%;
              text-align: left;
              flex-wrap: wrap;
              justify-content: flex-start;
              &>div{
                width: auto;
                margin-left: 5px;
                &:first-child{
                  color: $yellow;
                }
              }
            }
          }
          &-img{
            width: auto;
            height: auto;
            padding: 35px 0 5px;
            margin-right: 70px;
            &.mob{
              display: none;
            }
            &:after{
              content: "";
              width: 100%;
              height: 100%;
              position: absolute;
              background-color: $black_02;
              left: -70px;
            }
            &>img{

            }
          }
          &-first{
            margin: 0 5vw;
            align-items: flex-start;
            height: 500px;
            &-title{
              text-align: left;
              font-weight: 800;
              font-size: 50px;
              line-height: 61px;
              align-items: flex-start;
              margin-left: unset;
            }
            &-about{
              font-weight: bold;
              font-size: 18px;
              line-height: 22px;
              text-align: left;
              align-items: flex-start;
              margin: 50px 0;
              z-index: 1;
            }
            &-more{
              height: 60px;
              width: auto;
              z-index: 0;
              &>div{
                white-space: nowrap;
              }
              &>img{
                margin-top: -66%;
                z-index: -1;
              }
            }
          }
          &-second{

          }

          &-img_student{
            padding: 70px 35px;
            width: 50%;
            }
          &-name{
            padding: 35px;
            text-align: left;
            font-weight: bold;
            font-size: 50px;
            line-height: 60px;
            width: auto;
          }

        }
    }
  }

  @media screen and (max-width: 668px){
    .header{
      &:after{
        bottom: -35vw;
      }
      &-sides{
        bottom: -35vw;
      }
      &-main{
        &-name{
          font-size: 15px;
          line-height: 150%;
        }
        &-title{
          font-size: 32px;
          line-height: 39px;
        }
        &-about{
          font-size: 16px;
          line-height: 150%;
          &>img{
            height: 12px;
            right: -12px;
            top: -12px;
          }
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
      margin-bottom: 0;
      &-map{
        margin-top: 12px;
      }
      &-pre_title{
        font-size: 16px;
        line-height: 150%;
        text-align: left;
        margin-top: 35px;
      }
      &-title{
        font-size: 30px;
        line-height: 37px;
        width: 95%;
        margin-left: unset;
        margin-right: unset;
        margin-bottom: unset;
        flex-wrap: wrap;
        &>img{
          width: 30%;
        }
      }
      &-row{
        padding: 0 5%;
        margin: unset;
        margin-top: 25%;
        flex-direction: column;
        &:first-child{
          margin-top: 5%;
        }
        &.col{
          padding-top: 25%;
        }
        &.programm{
          flex-direction: column-reverse;
        }
        &.reverse{
          flex-direction: column;
          .body-section-row-img:after{
            left: 20%;
          }
        }
        &.student{
          flex-direction: row;
          &.reverse{
            flex-direction: row-reverse;
          }
        }
        &.text{
          align-items: flex-start;
          margin-left: 16px;
        }
        &-column{
          width: 100%;
          margin: 0 12px;
          .wave{
            position: absolute;
            bottom: -95px;
            right: 5%;
          }
          &-line{
            margin: unset !important;
            width: 100%;
            .plus{
              top: 16px;
            }
            &-text{
              font-size: 18px;
            }
          }
        }
        &-img_student{
          width: 60%;
          padding: 12px 0;
        }
        &-name{
          font-size: 15px;
          line-height: 18px;
          padding: 15px;
        }
        &-about{
          padding: unset;
          &-quotes{
            width: 100%;
            &>img{
              &:first-child{
                top: 100%;
                right: 85%;
              }
            }
          }
        }
        &-min_img{
          width: 20%;
          top: -12%;
          right: 5%;
          left: unset;
        }
        &-img{
          margin: 2.5% 0 15% !important;
          width: 100%;
          margin-bottom: 16px;
          display: none;
          &.mob{
            display: flex;
          }
          &:after{
            width: 80%;
            left: unset;
            margin-left: -5%;
          }
        }
        &-title{
          font-size: 25px;
          line-height: 150%;
          position: absolute;
          width: 60%;
          top: 0;
          left: 0;
          margin: unset;
        }
        &-abouter{
          flex-direction: column;
          margin-left: 16px !important;
          align-items: flex-start;
          justify-content: flex-start;
          &-sentence{
            align-items: flex-start;
            justify-content: flex-start;
            flex-wrap: wrap;
            margin: unset;
            &:before{
              content: "";
              position: absolute;
              width: 12px;
              height: 1px;
              background-color: $white;
              left: -18px;
              top: 11px;
            }
            &>div{
              &.bold{
                color: $yellow;
              }
            }
          }
        }
      }
    }
  }
</style>
