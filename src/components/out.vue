<template>
  <div class="main">

    <!-- <div class="pagination">
      <div class="pagination-line"></div>
      <div class="pagination-circle" v-for="i in 8"></div>
    </div> -->

    <div class="header">
      <img class="header-bg" src="static/img/header_bg_2.png" style="display: none;">
      <div class="header-main">
        <img class="header-main-logo" src="static/img/logo.png">
        <div class="header-main-title">Почему эффективнее передать отдел продаж и маркетинга на аутсорсинг? </div>
        <div class="header-main-about"><img src="static/img/quotes.svg">Экономия бюджета, сил и времени. <img src="static/img/quotes.svg"></div>
        <div class="wave header-main-wave"><div v-for="i in 4"></div></div>
        <div class="header-main-name">Вы платите только за результат в виде сделок. </div>
      </div>


    </div>

    <div class="body">
      
      <div class="body-section">
	      <div class="body-section-row" :class="{'reverse': i % 2 !== 0}" v-for="(row, i) in data">
		      <img class="body-section-row-img" :src="'static/img/' + i + '_sec.svg'">

		      <div class="body-section-row-text">
            <div class="body-section-row-text-rows mob" v-for="val in row.values">
              <div class="body-section-row-text-rows-title">{{val.first}}<span>{{val.div_f}}</span></div>
            </div>
            <div class="body-section-row-text-rows mob" v-for="val in row.values">
              <div class="body-section-row-text-rows-abouter">
                <div v-for="prof in val.profs">{{prof}}</div>
              </div>
            </div>
			      <div class="body-section-row-text-rows" v-for="(val, j) in row.values">
				      <div class="body-section-row-text-rows-title">{{val.first}}<span>{{val.div_f}}</span></div>
				      <div class="body-section-row-text-rows-abouter first">
				      	<div v-for="prof in val.profs">{{prof}}</div>
				      </div>
              <div class="body-section-row-text-rows-abouter" :style="{ animationDirection: j % 2 === 0 ? 'reverse' : 'normal'}">
                <div v-for="j in 2"><div v-for="prof in val.profs">{{prof}}</div></div>
              </div>
			      </div>
		      	<div class="body-section-row-text-title" v-if="row.title">{{row.title.first}}<span>{{row.title.div_f}}</span>{{row.title.second}}<span>{{row.title.div_s}}</span></div>
		      	<div class="body-section-row-text-about" v-for="about in row.about" v-if="row.about">
		      		{{about.first}}<span :class="{'bold': about.caps}">{{about.div}}</span>{{about.second}}
		      	</div>
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
      	data: [
      		{ 
      			values: [
      				{
      					first: 'Зарплатный фонд',
      					div_f: '',
      					profs: ['аналитиков', 'программистов','графических дизайнеров','motion  дизайнеров','3DMAX дизайнеров','маркетологов','SMM специалистов','копирайтеров']
      				},
      				{
      					first: 'сотрудникам, которые',
      					div_f: '',
      					profs: ['видео операторов','монтажеров','администраторов социальных сетей','таргетологов','специалистов по контекстной рекламе','технических специалистов по АТС']
      				},
      				{
      					first: 'работают на',
      					div_f: 'ВАС,',
      					profs: ['менеджеров CRM системы','диспетчеров call centre','экспертов по продажам','рукодителей отделов продаж ','администраторов офиса и специалистов службы поддержки клиентов']
      				},
      				{
      					first: 'оплачиваем ',
      					div_f: 'МЫ:',
      					profs: []
      				}
      			]
      		},
      		{
      			values: [
      				{
      					first: 'Вы',
      					div_f: 'НЕ ',
      					profs: ['аренду офиса продаж','расходы на диджитал и офлайн рекламу','печать флаеров и каталогов','разработку журналов и визуальных','рекламных сообщений']
      				},
      				{
      					first: 'платите',
      					div_f: '',
      					profs: ['разработку журналов и визуальных ','рекламных сообщений','программы для ведения клиентов ','съемки видеорекламы','аренду билбордов','оформление строительства','много чего другого']
      				},
      				{
      					first: 'ежемесячно:',
      					div_f: '',
      					profs: []
      				}
      			]
      		},
      		{
      			title: {
      				first: 'Вы ',
      				div_f: ' фокусируетесь ',
      				second: 'на главном-',
      				div_s: ' строительстве. '
      			},
      			about: [
      				{ 
      					first: 'Мы передаем',
      					div: ' ВАМ ',
      					second: 'все данные, чтобы вы проектировали ликвидные'
      				},
      				{
      					first: 'планировочные решения, находим для',
      					div: ' ВАС ',
      					second: 'лучшие МАФы по цене и'
      				},
      				{
      					first: 'качеству и вместе с Вами разрабатываем идеальное КОТ.',
      					div: '',
      					second: ''
      				}
      			],
      			values: []      		
      		},
      		{
      			title: {
      				first: 'Также Вы ',
      				div_f: ' НЕ ',
      				second: 'проводите:',
      				div_s: ''
      			},
      			about: [
      				{
      					first: '',
      					div: 'ежедневные ',
      					second: 'пятиминутки с отделом продаж'
      				},
      				{
      					first: '',
      					div: 'ежедневные ',
      					second: 'собрания с руководителями отдела продаж'
      				},
      				{
      					first: '',
      					div: 'стратегические и тактические сессии ',
      					second: 'с департаментом развития и маркетинга'
      				},
      				{
      					first: '',
      					div: 'еженедельное ',
      					second: 'обучение сотрудников.'
      				}
      			],
      			values: []      		
      		},
      		{
      			title: {
      				first: '',
      				div_f: '',
      				second: '',
      				div_s: ''
      			},
      			about: [ 
      				{
      					first: '-',
      					div: 'НЕ ',
      					caps: true,
      					second: 'мотивируете каждый день всех сотрудников'
      				},
      				{
      					first: '-',
      					div: 'НЕ ',
      					caps: true,
      					second: 'помогаете им решить их проблемы '
      				},
      				{
      					first: '-',
      					div: 'НЕ ',
      					caps: true,
      					second: 'тратите время на '
      				},
      				{
      					first: '',
      					div: 'поиск-обучение-внедрение в команду-наставничество-курирование ',
      					second: 'новых сотрудников.'
      				}
      			],
      			values: []      		
      		},
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
    },
    methods: {
    }
  };
</script>

<style lang="scss" scoped>
  @import '@/assets/main.scss';
  .header{
    min-height: 100vh;
    justify-content: center;
    background-image: url('/static/img/header_bg_2.png');
    background-repeat: no-repeat !important;
    background-size: 100% 100% !important;
    background-attachment: fixed !important;
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
				font-size: 60px;
				line-height: 150%;
				margin: 15px 0;
				&>img{
          position: absolute;
          right: -60px; 
          height: 30px;
          top: -30px;
          &:first-child{
            top: 100%;
            right: 100%;
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
				font-size: 40px;
				line-height: 150%;
	    }
    }
  }

  .body{
    &-section{
      margin: 100px 0;
      
      &-row{
      	flex-direction: row;
      	padding: 0 72px 0 calc(104px + 15%);
      	margin: 5rem 182px;
        &.reverse{
          padding: 0 calc(104px + 15%) 0 72px;
         .body-section-row-img{
          left: unset;
          right: 72px;
         } 
        }
      	&-img{
      		width: 15%;
      		position: absolute;
      		left: 72px;
      	}
	      &-text{
		      &-rows{
		        align-items: flex-start;
            &.mob{
              display: none;
            }
			      &-title{
              display: block;
			      	align-items: flex-start;
              justify-content: flex-start;
							font-weight: 800;
							font-size: 100px;
							line-height: 150%;
			        -webkit-text-stroke: 1px $yellow;
			        color: transparent;
			        text-align: left;
			        flex-direction: row;
			        &>span{
			        	width: auto;
                overflow-wrap: wrap;
			        	color: $yellow;
			        	margin: 0 20px;
			        }
			      }
			      &-abouter{
			      	// width: calc(176px + 110%);
			      	margin-left: -182px;
			      	flex-direction: row;
							font-weight: 500;
							font-size: 37px;
							line-height: 150%;
              width: auto;
              max-width: unset;
							justify-content: space-between;
              animation: mover 17.5s linear infinite forwards;
              &.first{
                display: none;
                // position: absolute;
                // left: -250%;
                bottom: 0;
                // animation: mover 20s linear 10s infinite;
              }
              &>div{
                width: 100%;
                max-width: unset;
                flex-direction: row;
                align-items: flex-start;
                // margin-left: -450%; 
                // position: absolute;
                // animation: mover 20s linear infinite;
                  // left: -100%;
              }
			      	&>div>div{
                margin-right: 10px;
			      		width: auto;
                max-width: unset;
                text-align: left;
                white-space: nowrap;
			      	}
			      }
			    }
	      	&-title{
            display: block;
		        -webkit-text-stroke: 1px $yellow;
		        color: transparent;
		        flex-direction: row;
						font-weight: 800;
						font-size: 100px;
						line-height: 123px;
						width: auto;
						flex-wrap: wrap;
						text-align: left;
						justify-content: flex-start;
	      		margin-bottom: 30px;
		      	&>div{
		      		width: auto;
		      		margin: 0 15px; 
		      		color: $yellow;
		      	}
		      }
	      	&-about{
		        color: $white;
		        flex-direction: row;
						font-weight: 500;
						font-size: 32px;
						line-height: 200%;
						flex-wrap: wrap;
						text-align: left;
						justify-content: flex-start;
            display: block;
		      	&>span{
              text-align: left;
              justify-content: flex-start;
		      		width: auto;
		      		// margin: 8px; 
		      		color: $yellow;
	      			&.bold{
	      				font-size: 32px;
	      			}
	      		}
	      	}
	      }
      }
    }
  }

  @media screen and (max-width: 668px){
    .header{
      // height: auto;
      // margin-bottom: calc(35vw + 50px);
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
      &-row{
      	padding: 0 5% !important;
      	margin: unset;
      	margin-top: 25%;
      	&:first-child{
	      	margin-top: 5%;
      	}
	      &-img{
	      	width: 20%;
	      	top: 0;
	      	right: 5%;
	      	left: unset;
	      }
	      &-text{
	      	align-items: flex-start;
		      &-rows{
            display: none;
            &.mob{
              display: flex;
            }
			      &-title{
							font-size: 25px;
							line-height: 150%;
		      		align-items: flex-end;
		      		width: 90%;
			      }
			      &-abouter{
			      	flex-direction: column;
			      	margin-left: 16px;
			      	align-items: flex-start;
              animation: unset;
              &.first{
                display: none;
              }
			      	&>div{
                white-space: normal;
                font-size: 20px;
                text-align: left;
                justify-content: flex-start;
			      		&:before{
			      			content: "";
			      			position: absolute;
			      			width: 12px;
			      			height: 1px;
			      			background-color: $white;
                  top: 27px;
			      			left: -17.5px;
			      		}
			      	}
			      }
		      }
	      	&-title{
						font-size: 25px;
						line-height: 150%;
						width: 60%;	      		
	      		&>div{

	      		}
	      	}
	      	&-about{
            font-size: 17px;
	      		&>div{
	      			text-align: left;
	      			.bold{}
	      		}
	      	}
    		}
  		}
		}
  }

  @keyframes mover {
    from {transform: translateX(-50%)}
    to {transform: translateX(0%)}
  }
</style>
