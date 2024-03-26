<?php 
 $lang = 'en';
 if(isset($_SESSION["lang"])) {
  $lang = $_SESSION["lang"];
 }
$langTitle = changeTextLang($lang);
?>
<style>
@import url(https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap);
abbr,address,article,aside,audio,b,blockquote,body,canvas,caption,cite,code,dd,del,details,dfn,div,dl,dt,em,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,ins,kbd,label,legend,li,mark,menu,nav,object,ol,p,pre,q,samp,section,small,span,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,ul,var,video {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent
}

body {
  line-height: 1
}

article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
  display: block
}

nav ul {
  list-style: none
}

blockquote,q {
  quotes: none
}

blockquote:after,blockquote:before,q:after,q:before {
  content: "";
  content: none
}

a {
  margin: 0;
  padding: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent
}

ins {
  text-decoration: none
}

ins,mark {
  background-color: rgba(0,0,0,.3);
  color: #000
}

mark {
  font-style: italic;
  font-weight: 700
}

del {
  text-decoration: line-through
}

abbr[title],dfn[title] {
  border-bottom: 1px dotted;
  cursor: help
}

table {
  border-collapse: collapse;
  border-spacing: 0
}

hr {
  display: block;
  height: 1px;
  border: 0;
  border-top: 1px solid #ccc;
  margin: 1em 0;
  padding: 0
}

input,select {
  vertical-align: middle
}

body {
  background-color: #191919;
  color: #fff;
  font-family: Roboto,sans-serif;
  font-weight: 500;
  max-width: 100%;
  -webkit-overflow-scrolling: touch
}

html {
  overflow-x: hidden
}

*,:after,:before {
  -webkit-box-sizing: border-box;
  box-sizing: border-box
}

#last-page {
  height: 100vh
}

a {
  text-decoration: none
}

:root {
  --color-white: #fff;
  --color-black: #191919;
  --color-gray: #505050;
  --color-dark-gray: #323232;
  --color-dark-red: #5d0914;
  --color-gray-dk: #1a1a1a;
  --color-gray-lt: #6e6e6e;
  --color-gray-hlt: #e6e6e6;
  --color-gray-p: #f6f6f6;
  --color-green: #51c300;
  --color-red: #dc0914;
  --color-menu: #b00914;
  --color-yellow: #ffd600;
  --color-small-impact: #bebebe;
  --color-base: var(--color-white);
  --color-link: var(--color-green);
  --color-link-visited: none;
  --color-link-hover: none;
  --color-link-active: none;
  --color-success: none;
  --color-danger: none;
  --color-warning: var(--color-red);
  --color-info: var(--color-gray);
  --color-primary: var(--color-green);
  --color-secondary: none;
  --color-accent: none;
  --color-selected: var(--color-gray-p);
  --color-modal: rgba(0,0,0,0.3);
  --hover-opacity: 0.8;
  --already-read-opacity: 0.5;
  --color-text: var(--color-black);
  --color-text-outlined: var(--color-white);
  --color-tip: var(--color-gray-dk);
  --color-line: var(--color-gray-lt);
  --color-info-layer1: var(--color-gray-p);
  --color-info-layer2: var(--color-white);
  --color-header: var(--color-black);
  --color-card: var(--color-white);
  --color-card-header: var(--color-black);
  --font-size-xxs: none;
  --font-size-xs: 0.6rem;
  --font-size-s: 0.8rem;
  --font-size-m: 1rem;
  --font-size-l: 1.2rem;
  --font-size-xl: 1.4rem;
  --font-size-xxl: 1.6rem;
  --font-size-xxxl: 1.8rem;
  --font-size-xxxxl: 2rem;
  --font-weight-default: 400;
  --font-weight-bold: 700;
  --space: 0.5rem;
  --line-width: 1px;
  --line-style: solid;
  --radius: 2px;
  --border: var(--line-width) var(--line-style) var(--color-line);
  --icon-size: 6px;
  --hover-feedback-opacity: 0.7;
  --hover-animation-duration: 0.1s;
  --hover-animation-timing: ease-out;
  --hover-animation: var(--hover-animation-duration) var(--hover-animation-timing);
  --fade-animation-duration: 0.2s;
  --fade-animation-timing: linear;
  --fade-animation: var(--fade-animation-duration) var(--fade-animation-timing);
  --z-modal: 100;
  @custom-media --breakpoint-s (min-width: 768 px)
}

body {
  font-family: Roboto,Sans-Serif;
  height: 100%;
  min-height: 100%
}

html {
  font-size: 14px
}

.styles-module_settingBtn_2xojh {
  margin-left: 0;
  position: absolute;
  top: 5px;
  right: 0;
  z-index: 888;
}

.styles-module_hamburger_22tm_ {
  display: none
}

@media (max-width: 1260px) {
  .styles-module_searchForm_rhCn- {
      margin-left:auto;
      width: auto
  }

  .styles-module_navigation_YdAIm {
      margin-left: calc(var(--space)*1);
      letter-spacing: .1rem
  }

  .styles-module_header_2_n3A {
      padding: 0 calc(var(--space)*4) 0 calc(var(--space)*2)
  }

  .styles-module_header_2_n3A a div {
      width: 105px;
      margin-top: -20px
  }
}

.styles-module_hamburger_12E6I {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  cursor: pointer
}

.styles-module_border_QuRbe {
  display: block;
  width: 100%;
  height: .2em;
  margin: 2px;
  background: var(--color-white);
  border-radius: 3px
}

.styles-module_hamburger_12E6I:hover {
  opacity: var(--hover-opacity)
}

.styles-module_burger_GAL-M {
  position: absolute;
  -webkit-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);
  height: 24px;
  width: 26px
}

.styles-module_burger_GAL-M:hover {
  cursor: pointer
}

.styles-module_burger_GAL-M span {
  background: -webkit-gradient(linear,right top,left top,from(#fff),to(hsla(0,0%,100%,.6)));
  background: linear-gradient(270deg,#fff,hsla(0,0%,100%,.6));
  -webkit-transform: translateY(-50%) rotate(0deg);
  transform: translateY(-50%) rotate(0deg);
  position: absolute;
  width: 100%;
  height: 4px;
  -webkit-transition: top .1s ease .3s,background .8s ease .3s,-webkit-transform .3s ease;
  transition: top .1s ease .3s,background .8s ease .3s,-webkit-transform .3s ease;
  transition: top .1s ease .3s,transform .3s ease,background .8s ease .3s;
  transition: top .1s ease .3s,transform .3s ease,background .8s ease .3s,-webkit-transform .3s ease;
  border-radius: 2px
}

.styles-module_burger_GAL-M.styles-module_clicked_2bsio {
  position: fixed;
  top: 45px;
  left: 30px
}

.styles-module_burger_GAL-M.styles-module_clicked_2bsio span {
  -webkit-transition: top .1s ease,background .8s ease,-webkit-transform .3s ease .1s;
  transition: top .1s ease,background .8s ease,-webkit-transform .3s ease .1s;
  transition: top .1s ease,transform .3s ease .1s,background .8s ease;
  transition: top .1s ease,transform .3s ease .1s,background .8s ease,-webkit-transform .3s ease .1s;
  background: -webkit-gradient(linear,right top,left top,from(#dc0914),to(rgba(220,9,20,.6)));
  background: linear-gradient(270deg,#dc0914,rgba(220,9,20,.6))
}

.styles-module_burger_GAL-M span:first-child {
  top: 4px
}

.styles-module_burger_GAL-M span:nth-child(2) {
  top: 12px
}

.styles-module_burger_GAL-M span:nth-child(3) {
  top: 20px
}

.styles-module_burger_GAL-M.styles-module_clicked_2bsio span:first-child {
  top: 50%;
  -webkit-transform: translateY(-50%) rotate(315deg);
  transform: translateY(-50%) rotate(315deg)
}

.styles-module_burger_GAL-M.styles-module_clicked_2bsio span:nth-child(2) {
  -webkit-transform: translateY(-50%) rotate(405deg);
  transform: translateY(-50%) rotate(405deg);
  opacity: 0
}

.styles-module_burger_GAL-M.styles-module_clicked_2bsio span:nth-child(3) {
  top: 50%;
  -webkit-transform: translateY(-50%) rotate(405deg);
  transform: translateY(-50%) rotate(405deg)
}

.styles-module_label_3C1G0 {
  margin-right: .5rem;
  color: var(--color-white);
  cursor: pointer
}

.styles-module_wrapper_HMi7g {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  height: 1.5rem
}

.styles-module_disabled_2TdUA {
  opacity: var(--hover-opacity)
}

.styles-module_disabled_2TdUA span {
  color: var(--color-yellow)!important
}

.styles-module_input_1_xZD {
  display: none
}

.styles-module_radio_311JI {
  display: block;
  position: relative;
  width: 1.2rem;
  height: 1.2rem;
  border: .2rem solid var(--color-white);
  border-radius: 50%;
  cursor: pointer;
  z-index: 1
}

.styles-module_radio_311JI:before {
  content: "";
  width: 500px;
  height: 40px;
  display: none;
  position: relative;
  top: 0;
  left: 200px;
  margin-left: -500px;
  background: -webkit-gradient(linear,left top,right top,from(rgba(255,214,0,0)),to(#ffd600));
  background: linear-gradient(90deg,rgba(255,214,0,0),#ffd600);
  z-index: 0
}

.styles-module_input_1_xZD:checked~.styles-module_radio_311JI {
  border: .4rem solid var(--color-white);
  z-index: 1
}

.styles-module_input_1_xZD:checked~.styles-module_radio_311JI:before {
  display: block
}

@media (max-width: 768px) {
  .styles-module_radio_311JI:before {
      height:35px;
      width: 600px;
      left: 300px;
      margin-left: -600px
  }
}

@media (max-width: 460px) {
  .styles-module_radio_311JI:before {
      height:45px;
      width: 500px;
      left: 200px;
      margin-left: -500px
  }
}

.styles-module_input_3SzMJ {
  display: none
}

.styles-module_input_3SzMJ:disabled+.styles-module_checkbox_2pXpO {
  opacity: var(--hover-opacity)
}

.styles-module_checkbox_2pXpO {
  display: inline-block;
  width: 1.2rem;
  height: 1.2rem;
  border: .2rem solid var(--color-white);
  border-radius: 4px;
  position: relative;
  cursor: pointer
}

.styles-module_input_3SzMJ:checked+.styles-module_checkbox_2pXpO:before {
  content: "";
  display: block;
  position: absolute;
  top: -.3rem;
  left: .15rem;
  width: .6rem;
  height: 1rem;
  -webkit-transform: rotate(40deg);
  transform: rotate(40deg);
  border-bottom: 3px solid var(--color-white);
  border-right: 3px solid var(--color-white)
}

input+label {
  position: relative;
  z-index: 999
}

.styles-module_text_2gkQu {
  color: var(--color-yellow);
  font-weight: 400;
  font-size: 10px;
  text-transform: uppercase;
  letter-spacing: .1rem;
  width: 100px;
  margin: -10px 0 0 auto;
  text-align: center;
  line-height: 1rem;
  padding: 8px 15px 5px 15px;
  border-bottom: 1px solid hsla(0,0%,100%,.2);
  height: 45px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center
}

.styles-module_itemArea_1XSVI:first-child .styles-module_text_2gkQu {
  background-color: rgba(0,0,0,.5)
}

.styles-module_itemArea_1XSVI:first-child .styles-module_item_3w45u div {
  background-color: rgba(0,0,0,.3)
}

.styles-module_items_2sfN5 {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-transform-origin: right;
  transform-origin: right;
  letter-spacing: .05rem;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column
}

.styles-module_itemArea_1XSVI {
  padding: 0
}

.styles-module_item_3w45u {
  -ms-flex-item-align: end;
  align-self: flex-end;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  height: 40px;
  width: 100%;
  -webkit-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end
}

.styles-module_item_3w45u:after {
  content: "";
  display: none;
  position: relative
}

.styles-module_itemArea_1XSVI:first-child .styles-module_item_3w45u:hover:after {
  width: 500px;
  height: 100%;
  display: block;
  position: relative;
  top: 0;
  left: 200px;
  margin-left: -500px;
  background: -webkit-gradient(linear,left top,right top,from(transparent),color-stop(50%,rgba(0,0,0,.2)));
  background: linear-gradient(90deg,transparent,rgba(0,0,0,.2) 50%);
  z-index: 0;
  pointer-events: none
}

.styles-module_itemArea_1XSVI:first-child .styles-module_item_3w45u div label:after {
  content: "";
  height: 40px;
  width: 100px;
  position: absolute;
  margin-left: -47px
}

.styles-module_itemArea_1XSVI:last-child .styles-module_items_2sfN5 .styles-module_item_3w45u label {
  -webkit-box-ordinal-group: 3;
  -ms-flex-order: 2;
  order: 2
}

.styles-module_itemArea_1XSVI:last-child .styles-module_items_2sfN5 .styles-module_item_3w45u div label {
  -webkit-box-ordinal-group: 2;
  -ms-flex-order: 1;
  order: 1;
  width: 1.5rem;
  height: 1.5rem
}

.styles-module_itemArea_1XSVI:last-child .styles-module_items_2sfN5 .styles-module_item_3w45u div label:before {
  top: -.1rem;
  left: .3rem;
  width: .6rem;
  height: 1.1rem
}

.styles-module_itemArea_1XSVI:last-child .styles-module_items_2sfN5 .styles-module_item_3w45u label span {
  color: var(--color-white);
  font-weight: 400;
  font-size: 9px;
  text-transform: uppercase;
  letter-spacing: .075rem;
  background-color: rgba(0,0,0,.85);
  padding: 5px 0 5px 10px;
  text-align: left;
  width: 75px;
  border-radius: 10px 0 0 10px;
  display: inline-block
}

.styles-module_itemArea_1XSVI:last-child .styles-module_items_2sfN5 .styles-module_item_3w45u div {
  width: 40px;
  margin-left: 5px
}

.styles-module_itemArea_1XSVI:last-child .styles-module_text_2gkQu {
  width: 120px
}

.styles-module_item_3w45u:hover {
  background: -webkit-gradient(linear,left top,right top,from(transparent),color-stop(50%,rgba(0,0,0,.2)));
  background: linear-gradient(90deg,transparent,rgba(0,0,0,.2) 50%)
}

.styles-module_item_3w45u label {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-item-align: stretch;
  align-self: stretch;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin: 0;
  z-index: 3
}

.styles-module_item_3w45u label p {
  font-size: var(--font-size-m);
  text-transform: uppercase
}

.styles-module_item_3w45u div {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-item-align: stretch;
  align-self: stretch;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  width: 100px
}

.styles-module_item_3w45u div label {
  margin: 0 auto;
  -ms-flex-item-align: center;
  align-self: center
}

.styles-module_message_SR0HP {
  font-size: var(--font-size-s) padding var(--space)
}

@media (max-width: 768px) {
  .styles-module_text_2gkQu {
      margin:0 0 0 auto;
      font-size: 9px;
      line-height: .9rem;
      width: 150px;
      padding: 6px 5px 5px 5px
  }

  .styles-module_itemArea_1XSVI:last-child .styles-module_text_2gkQu {
      width: 150px
  }

  .styles-module_item_3w45u {
      height: 35px
  }

  .styles-module_item_3w45u div {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      width: 150px;
      margin-left: 10px
  }

  .styles-module_itemArea_1XSVI:first-child .styles-module_item_3w45u div label:after {
      width: 90px
  }

  .styles-module_itemArea_1XSVI:last-child .styles-module_items_2sfN5 .styles-module_item_3w45u label span {
      font-size: 8px;
      padding: 5px 0 5px 7px;
      width: 60px
  }

  .styles-module_itemArea_1XSVI:last-child .styles-module_items_2sfN5 .styles-module_item_3w45u div {
      width: 35px;
      margin-left: 5px
  }

  .styles-module_itemArea_1XSVI:last-child .styles-module_items_2sfN5 .styles-module_item_3w45u div label {
      -webkit-transform: scale(.9);
      transform: scale(.9);
      -webkit-transform-origin: center;
      transform-origin: center
  }

  .styles-module_item_3w45u label p {
      font-size: var(--font-size-s)
  }
}

@media (max-width: 460px) {
  .styles-module_text_2gkQu {
      width:90px;
      padding: 12px 5px 10px 5px
  }

  .styles-module_item_3w45u {
      height: 45px
  }

  .styles-module_item_3w45u div {
      width: 90px;
      margin-left: 5px
  }

  .styles-module_itemArea_1XSVI:last-child .styles-module_text_2gkQu {
      width: 100px
  }
}

.styles-module_container_Du5fK {
  padding: 20px 0 0 0
}

.styles-module_divider_3mhyE {
  margin: calc(var(--space)) 0
}

.styles-module_languageWrap_2PNos {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end
}

.styles-module_divider_84j1N {
  width: 100%;
  margin-bottom: 10px;
  height: 1px;
  opacity: .3;
  background: #fff;
  background: -webkit-gradient(linear,left top,right top,from(hsla(0,0%,100%,0)),color-stop(80%,hsla(0,0%,100%,.8)));
  background: linear-gradient(90deg,hsla(0,0%,100%,0),hsla(0,0%,100%,.8) 80%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff",endColorstr="#ffffff",GradientType=1)
}

@media (max-width: 768px) {
  .styles-module_divider_84j1N {
      margin:0
  }
}

.styles-module_wrapper_2fJBn {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding: 0;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  text-align: right;
  overflow: hidden
}

.styles-module_item_1b7tA {
  padding: 0 30px 0 0;
  opacity: 1;
  text-align: right
}

.styles-module_item_1b7tA p {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end
}

.styles-module_main_3Z8cE {
  margin: 0;
  font-size: var(--font-size-m);
  text-transform: uppercase;
  letter-spacing: .05rem
}

.styles-module_divider_2Wjtk {
  margin: 0;
  padding: 0;
  height: 1px;
  -webkit-box-flex: 2;
  -ms-flex: 2;
  flex: 2
}

.styles-module_languageSetting_2zO6P {
  color: var(--color-yellow);
  font-weight: 400;
  padding: 15px 20px 10px 0;
  margin-bottom: -10px;
  font-size: var(--font-size-s);
  text-align: right
}

.styles-module_languageSettingContainer_2yrsA {
  padding: 0 0 15px 0
}

.styles-module_menuHeader_3Cf4k {
  -webkit-box-flex: 4;
  -ms-flex: 4;
  flex: 4;
  width: 100%
}

.styles-module_menuHeader_3Cf4k a {
  width: auto;
  text-align: right
}

.styles-module_menuMiddle_2JxB7 {
  -webkit-box-flex: 10;
  -ms-flex: 10;
  flex: 10;
  margin-top: 0;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  border-top: 1px solid hsla(0,0%,100%,.1);
  border-bottom: 1px solid hsla(0,0%,100%,.1);
  width: 100%;
  -webkit-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start
}

.styles-module_menuFooter_aLPo1 {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  font-size: var(--font-size-s);
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  padding: 0 0 10px 15px;
  background: rgba(0,0,0,.5);
  height: 100%;
  width: 100%
}

.styles-module_menuFooter_aLPo1 .styles-module_item_1b7tA {
  padding: 0;
  text-align: center;
  -webkit-box-flex: 1;
  -ms-flex: 1 0 33%;
  flex: 1 0 33%;
  -ms-flex-item-align: center;
  align-self: center
}

.styles-module_menuFooter_aLPo1 .styles-module_item_1b7tA p {
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  height: auto;
  padding: 10px 0
}

@media (max-width: 768px) {
  .styles-module_menuHeader_3Cf4k a {
      margin-top:20px
  }

  .styles-module_item_1b7tA {
      padding: 0 25px 0 0
  }
}

@media (max-width: 460px) {
  .styles-module_menuHeader_3Cf4k a {
      margin-top:0;
      width: 100%
  }

  .styles-module_menuMiddle_2JxB7 {
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      margin-top: 10px
  }
}

.styles-module_setting_6Uurn {
  position: absolute;
  top: 5px;
  right: 0;
  z-index: 3;
  width: 500px;
  text-align: right;
  background: #5d0914;
  background: -webkit-gradient(linear,right top,left top,color-stop(60%,#5d0914),to(rgba(93,9,20,0)));
  background: linear-gradient(270deg,#5d0914 60%,rgba(93,9,20,0));
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#5d0914",endColorstr="#5d0914",GradientType=1)
}

.styles-module_menuSP_1GO2v {
  display: none
}

@media (max-width: 768px) {
  .styles-module_setting_6Uurn {
      z-index:4;
      overflow: hidden;
      top: 111px;
      -webkit-box-shadow: 0 25px 50px rgb(0 0 0);
      box-shadow: 0 25px 50px rgb(0 0 0);
      background: -webkit-gradient(linear,right top,left top,color-stop(65%,#5d0914),color-stop(150%,rgba(93,9,20,0)));
      background: linear-gradient(270deg,#5d0914 65%,rgba(93,9,20,0) 150%)
  }

  .styles-module_menuSP_1GO2v,.styles-module_setting_6Uurn {
      padding: 0;
      /* position: fixed; */
      width: 100%;
      -webkit-backdrop-filter: blur(3px);
      backdrop-filter: blur(3px)
  }

  .styles-module_menuSP_1GO2v {
      display: block;
      top: 0;
      right: 0;
      background: rgba(0,0,0,.8);
      border-top: 4px solid var(--color-red);
      height: 100%;
      z-index: 3
  }

  .styles-module_menu_23iWo {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      width: 100%;
      height: 100%;
      -webkit-box-align: end;
      -ms-flex-align: end;
      align-items: flex-end;
      margin-left: auto;
      padding: 0;
      background: #5d0914;
      background: -webkit-gradient(linear,right top,left top,color-stop(20%,#5d0914),to(rgba(93,9,20,0)));
      background: linear-gradient(270deg,#5d0914 20%,rgba(93,9,20,0));
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#5d0914",endColorstr="#5d0914",GradientType=1);
      overflow: auto
  }
}

@media (max-width: 460px) {
  .styles-module_setting_6Uurn {
      top:111px /* normal 75 */
  }
}

.styles-module_container_kWnuS {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex
}

.styles-module_settingBtn_2xojh {
    margin-left: 0;
    position: absolute;
    top: 5px;
    right: 0;
    z-index: 888;
}
@media (max-width: 768px) {
    .styles-module_header_2_n3A {
        padding:0
    }

    .styles-module_header_2_n3A a div {
        text-align: center;
        margin: 0 auto
    }

    .styles-module_header_2_n3A a {
        width: 100%;
        text-align: center;
        margin: 0 20%
    }

    .styles-module_navigation_YdAIm,.styles-module_settingBtn_2xojh {
        display: block;
        top: 75px;
    }

    .styles-module_searchForm_rhCn- {
        margin-right: 20px
    }

    .styles-module_hamburger_22tm_ {
        margin: 0;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding: 30px 10px 0 30px;
        z-index: 4
    }

    .styles-module_hamburger_22tm_ img {
        height: 24px
    }

    .styles-module_modal_3F4WT {
        display: none
    }

    .styles-module_menu_3I6fb {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex
    }
}

.styles-module_languageSettingBtn_1MrGF {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    color: var(--color-white);
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    cursor: pointer;
    background: #5d0914;
    background: -webkit-gradient(linear,right top,left top,from(#5d0914),color-stop(100%,rgba(93,9,20,0)),to(#5d0914));
    background: linear-gradient(270deg,#5d0914,rgba(93,9,20,0) 100%,#5d0914 0);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#5d0914",endColorstr="#5d0914",GradientType=1);
    height: 25px;
    width: 350px;
    z-index: 4;
    -webkit-transition: all .1s;
    transition: all .1s
}
.styles-module_languageSettingBtn_1MrGF:hover {
    color: var(--color-yellow);
    -webkit-transition: all .1s;
    transition: all .1s
}

.styles-module_languageSettingBtn_1MrGF:hover .styles-module_triangle_7ngq6 {
    background-color: rgba(0,0,0,.8);
    padding: 5px 10px 0 10px
}

.styles-module_languageSettingBtn_1MrGF:hover .styles-module_text_NZjpR span {
    background-color: rgba(0,0,0,.8);
    color: var(--color-yellow);
    -webkit-transition: all .1s;
    transition: all .1s
}

.styles-module_languageSettingBtn_1MrGF:hover small {
    color: var(--color-white);
    -webkit-transition: all .1s;
    transition: all .1s
}

.styles-module_triangle_7ngq6 {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    z-index: 4;
    background-color: rgba(0,0,0,.5);
    margin: 0;
    -ms-flex-item-align: stretch;
    align-self: stretch;
    padding: 3px 10px 0 10px
}

.styles-module_triangle_7ngq6:after {
    content: "";
    display: inline-block;
    width: 0;
    height: 0;
    border-left: var(--icon-size) solid transparent;
    border-right: var(--icon-size) solid transparent;
    border-top: var(--icon-size) solid var(--color-white);
    padding-bottom: calc(var(--icon-size)/2);
    z-index: 4;
    -ms-flex-item-align: center;
    align-self: center
}

.styles-module_languageSettingBtn_1MrGF:hover .styles-module_triangle_7ngq6:after {
    border-top: var(--icon-size) solid var(--color-yellow);
    position: relative
}

.styles-module_text_NZjpR {
    font-size: 9px;
    color: var(--color-small-impact);
    letter-spacing: .1rem;
    font-weight: 500;
    text-align: right;
    z-index: 4;
    -ms-flex-item-align: stretch;
    align-self: stretch;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex
}

.styles-module_text_NZjpR span {
    font-size: 13px;
    color: var(--color-white);
    letter-spacing: 0;
    background-color: rgba(0,0,0,.5);
    margin: 0 0 0 5px;
    border-right: 1px solid hsla(0,0%,100%,.1)
}

.styles-module_text_NZjpR span,small {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-item-align: stretch;
    align-self: stretch;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-transition: all .1s;
    transition: all .1s
}

small {
    color: var(--color-small-impact);
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .05rem;
    padding: 0 2px;
    z-index: 4
}

.styles-module_text_NZjpR span b {
    font-weight: 500;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding: 0 10px
}

.short-keyword {
  display: inline-block;
  position: absolute;
  left: 0px;
  display: none;
  text-transform: uppercase;
}

@media (max-width: 768px) {
    .styles-module_languageSettingBtn_1MrGF {
        height:35px
    }

    .styles-module_text_NZjpR span {
        border: 0;
        margin: 0 0 0 20px
    }

    .styles-module_text_NZjpR span b {
        padding: 0 15px 0 25px
    }

    .styles-module_languageSettingBtn_1MrGF:hover .styles-module_triangle_7ngq6,.styles-module_triangle_7ngq6 {
        padding: 3px 20px 0 10px
    }
    .short-keyword {
      display: block;
    }
}

@media (max-width: 460px) {
    .styles-module_languageSettingBtn_1MrGF {
        height:35px /* normal 75 */
    }
}

.styles-module_header_2_n3A {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    background-color: var(--color-red);
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 0 calc(var(--space)*4);
    background: #dc0914;
    background: -webkit-gradient(linear,left top,left bottom,from(rgba(220,9,20,.5)),color-stop(6%,#dc0914),color-stop(6%,rgba(0,0,0,.8)),to(rgba(220,9,20,0)));
    background: linear-gradient(180deg,rgba(220,9,20,.5),#dc0914 6%,rgba(0,0,0,.8) 0,rgba(220,9,20,0));
    -webkit-transition: all .3s;
    transition: all .3s;
    max-height: 82px
}

.styles-module_header_2_n3A:hover {
    background: #dc0914;
    background: -webkit-gradient(linear,left top,left bottom,from(rgba(220,9,20,.7)),color-stop(6%,#dc0914),color-stop(6%,#000),to(rgba(220,9,20,0)));
    background: linear-gradient(180deg,rgba(220,9,20,.7),#dc0914 6%,#000 0,rgba(220,9,20,0));
    -webkit-transition: all .3s;
    transition: all .3s
}

.styles-module_header_2_n3A a div {
    width: 150px;
    position: relative;
    top: 15px;
    z-index: 2
}

.styles-module_header_2_n3A a div:after {
    content: "";
    background: url(../img/web_logo_190118_light-luffy.bcf5fcca.png) no-repeat;
    background-size: cover;
    width: 100%;
    height: 100%;
    position: absolute;
    display: inline-block;
    left: 0;
    top: 0;
    -webkit-transform-origin: 30% 70%;
    transform-origin: 30% 70%;
    will-change: transform;
    pointer-events: none;
    -webkit-animation: styles-module_gomuback_20yQg .2s both;
    animation: styles-module_gomuback_20yQg .2s both
}

.styles-module_header_2_n3A a:hover div:after {
    -webkit-animation: styles-module_gomugomu_2sF1H 1s both;
    animation: styles-module_gomugomu_2sF1H 1s both
}

@-webkit-keyframes styles-module_gomugomu_2sF1H {
    0% {
        -webkit-transform: skew(0deg,0deg);
        transform: skew(0deg,0deg)
    }

    40% {
        -webkit-transform: skew(-10deg,-10deg) scale(1);
        transform: skew(-10deg,-10deg) scale(1)
    }

    50% {
        -webkit-transform: skew(25deg,25deg) scale(1.75);
        transform: skew(25deg,25deg) scale(1.75)
    }

    65% {
        -webkit-transform: scale(1.2) skew(-5deg,-5deg);
        transform: scale(1.2) skew(-5deg,-5deg)
    }

    75% {
        -webkit-transform: scale(1.2) skew(5deg,5deg);
        transform: scale(1.2) skew(5deg,5deg)
    }

    to {
        -webkit-transform: scale(1.2) skew(0deg,0deg);
        transform: scale(1.2) skew(0deg,0deg)
    }
}

@keyframes styles-module_gomugomu_2sF1H {
    0% {
        -webkit-transform: skew(0deg,0deg);
        transform: skew(0deg,0deg)
    }

    40% {
        -webkit-transform: skew(-10deg,-10deg) scale(1);
        transform: skew(-10deg,-10deg) scale(1)
    }

    50% {
        -webkit-transform: skew(25deg,25deg) scale(1.75);
        transform: skew(25deg,25deg) scale(1.75)
    }

    65% {
        -webkit-transform: scale(1.2) skew(-5deg,-5deg);
        transform: scale(1.2) skew(-5deg,-5deg)
    }

    75% {
        -webkit-transform: scale(1.2) skew(5deg,5deg);
        transform: scale(1.2) skew(5deg,5deg)
    }

    to {
        -webkit-transform: scale(1.2) skew(0deg,0deg);
        transform: scale(1.2) skew(0deg,0deg)
    }
}

@-webkit-keyframes styles-module_gomuback_20yQg {
    0% {
        -webkit-transform: scale(1.2);
        transform: scale(1.2)
    }

    to {
        -webkit-transform: scale(1);
        transform: scale(1)
    }
}

@keyframes styles-module_gomuback_20yQg {
    0% {
        -webkit-transform: scale(1.2);
        transform: scale(1.2)
    }

    to {
        -webkit-transform: scale(1);
        transform: scale(1)
    }
}

</style>  

<div class="styles-module_settingBtn_2xojh">
   <div class="styles-module_languageSettingBtn_1MrGF">
      <span class="short-keyword"><span style="font-size: 5px; color: #fff;">Keyword:</span> Shueisha TV </span>
      <p class="styles-module_text_NZjpR" _size="s">LANGUAGE: <span><b><?php echo $langTitle ?></b></span></p>
      <span class="styles-module_triangle_7ngq6"></span>
   </div>
</div>
<div class="styles-module_container_Du5fK styles-module_setting_6Uurn" style="display: none;">
   <div class="styles-module_divider_84j1N styles-module_divider_3mhyE"></div>
   <div class="styles-module_languageWrap_2PNos">
      <div class="styles-module_itemArea_1XSVI">
         <h3 class="styles-module_text_2gkQu" _size="l">Service Language</h3>
         <div class="styles-module_items_2sfN5">
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="en">
               <label for="315ff4c2-en" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">English&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-en" checked="checked"><input <?php echo ($lang === 'en') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-en" class="styles-module_input_1_xZD"><label for="315ff4c2-en" class="styles-module_radio_311JI"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="jp">
               <label for="315ff4c2-jp" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">日本語&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-jp"><input <?php echo ($lang === 'jp') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-jp" class="styles-module_input_1_xZD"><label for="315ff4c2-jp" class="styles-module_radio_311JI"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="es">
               <label for="315ff4c2-es" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">Español&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-es"><input <?php echo ($lang === 'es') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-es" class="styles-module_input_1_xZD"><label for="315ff4c2-es" class="styles-module_radio_311JI"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="th">
               <label for="315ff4c2-th" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">ภาษาไทย&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-th"><input <?php echo ($lang === 'th') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-th" class="styles-module_input_1_xZD"><label for="315ff4c2-th" class="styles-module_radio_311JI"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="br">
               <label for="315ff4c2-br" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">Português (BR)&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-br"><input <?php echo ($lang === 'br') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-br" class="styles-module_input_1_xZD"><label for="315ff4c2-br" class="styles-module_radio_311JI"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="ind">
               <label for="315ff4c2-ind" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">Bahasa (IND)&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-ind"><input <?php echo ($lang === 'ind') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-ind" class="styles-module_input_1_xZD"><label for="315ff4c2-ind" class="styles-module_radio_311JI"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="ru">
               <label for="315ff4c2-ru" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">Русский&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-ru"><input <?php echo ($lang === 'ru') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-ru" class="styles-module_input_1_xZD"><label for="315ff4c2-ru" class="styles-module_radio_311JI"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="fr">
               <label for="315ff4c2-fr" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">Français&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-fr"><input <?php echo ($lang === 'fr') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-fr" class="styles-module_input_1_xZD"><label for="315ff4c2-fr" class="styles-module_radio_311JI"></label></div>
            </div>
            <!-- <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="de">
               <label for="315ff4c2-de" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">Deutsch&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-de"><input <?php echo ($lang === 'de') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-de" class="styles-module_input_1_xZD"><label for="315ff4c2-de" class="styles-module_radio_311JI"></label></div>
            </div> -->
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u lang_item" name="315ff4c2" domid="vn">
               <label for="315ff4c2-vn" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF">Tiếng Việt&nbsp;&nbsp;</p>
               </label>
               <div name="315ff4c2" domid="315ff4c2-vn"><input <?php echo ($lang === 'vn') ? 'checked="checked"' : ''; ?> type="radio" name="315ff4c2" id="315ff4c2-vn" class="styles-module_input_1_xZD"><label for="315ff4c2-vn" class="styles-module_radio_311JI"></label></div>
            </div>
         </div>
      </div>
      <div class="styles-module_itemArea_1XSVI">
         <h3 class="styles-module_text_2gkQu" _size="l">Show Content</h3>
         <div class="styles-module_items_2sfN5">
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="en" checked="checked" disabled="disabled">
               <label for="contents-en" class="styles-module_label_3C1G0 styles-module_disabled_2TdUA">
                  <p class="styles-module_l_2xDvF"><span>254 Series</span></p>
               </label>
               <div name="contents" domid="contents-en" checked="checked" disabled="disabled"><input <?php echo ($lang === 'en') ? 'checked="checked"' : ''; ?> type="checkbox" disabled="disabled" name="contents" id="contents-en" class="styles-module_input_3SzMJ"><label for="contents-en" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="jp">
               <label for="contents-jp" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>88 Series</span></p>
               </label>
               <div name="contents" domid="contents-jp"><input <?php echo ($lang === 'jp') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-jp" class="styles-module_input_3SzMJ"><label for="contents-jp" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="es">
               <label for="contents-es" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>108 Series</span></p>
               </label>
               <div name="contents" domid="contents-es"><input <?php echo ($lang === 'es') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-es" class="styles-module_input_3SzMJ"><label for="contents-es" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="th">
               <label for="contents-th" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>32 Series</span></p>
               </label>
               <div name="contents" domid="contents-th"><input <?php echo ($lang === 'th') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-th" class="styles-module_input_3SzMJ"><label for="contents-th" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="br">
               <label for="contents-br" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>6 Series</span></p>
               </label>
               <div name="contents" domid="contents-br"><input <?php echo ($lang === 'br') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-br" class="styles-module_input_3SzMJ"><label for="contents-br" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="ind">
               <label for="contents-ind" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>8 Series</span></p>
               </label>
               <div name="contents" domid="contents-ind"><input <?php echo ($lang === 'ind') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-ind" class="styles-module_input_3SzMJ"><label for="contents-ind" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="ru">
               <label for="contents-ru" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>11 Series</span></p>
               </label>
               <div name="contents" domid="contents-ru"><input <?php echo ($lang === 'ru') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-ru" class="styles-module_input_3SzMJ"><label for="contents-ru" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="fr">
               <label for="contents-fr" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>17 Series</span></p>
               </label>
               <div name="contents" domid="contents-fr"><input <?php echo ($lang === 'fr') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-fr" class="styles-module_input_3SzMJ"><label for="contents-fr" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
            <!-- <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="de">
               <label for="contents-de" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>2 Series</span></p>
               </label>
               <div name="contents" domid="contents-de"><input <?php echo ($lang === 'de') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-de" class="styles-module_input_3SzMJ"><label for="contents-de" class="styles-module_checkbox_2pXpO"></label></div>
            </div> -->
            <div class="styles-module_wrapper_HMi7g styles-module_item_3w45u" name="contents" domid="vn">
               <label for="contents-vn" class="styles-module_label_3C1G0 ">
                  <p class="styles-module_l_2xDvF"><span>3 Series</span></p>
               </label>
               <div name="contents" domid="contents-vn"><input <?php echo ($lang === 'vn') ? 'checked="checked"' : ''; ?> type="checkbox" name="contents" id="contents-vn" class="styles-module_input_3SzMJ"><label for="contents-vn" class="styles-module_checkbox_2pXpO"></label></div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
  $(document).ready(function(){ 
    $('.styles-module_languageSettingBtn_1MrGF').on('click', function() {
      $('.styles-module_setting_6Uurn').toggle();
    })
    var lang = <?php echo json_encode($lang) ?>;
    $('.lang_item').on('click', function(e) {
      e.stopPropagation();
      let newLang = $(this).attr('domid');
      if(lang !== newLang) {
        lang = newLang;
        $.ajax({
	       url:'page/ajax/language/change.php',
	       type:'POST',
	       cache:false,
	       data:{'Lang': newLang},
	       success:function(kq){
	        console.log(kq);
          location.reload();
	       }
	      })
      }
    })

  });
</script>