<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link type="image/png" href="img/iosclub-logo.png" rel="icon" />
  <title>SITCON x iOS Club 臺中定期聚</title>
  <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bodymovin/4.10.2/bodymovin_light.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.5/require.min.js"></script>
  <link href="//fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <style>
  * {
    font-family: GenJyuuGothic !important;
  }

  @@font-face {
    font-family: GenJyuuGothic;
    src: url('./fonts/GenJyuuGothic-Monospace-Bold.ttf');
  }
  </style>
</head>

<body>
  {{-- <a href="{{route('home')}}">go</a> --}}
  <div class="wrapper">
    <div class="panel">
      <div class="panel__content-col">
        <div class="panel__content">
          <div class="panel__text" style="text-align: left;">
            <h1 style="margin: 0;font-size: 1.5rem;">iOS Club 的</h1>
            <h6 style="margin: 0;font-size: 3.5rem;">第一次SITCON</h6>
            <h6 style="margin: 0;font-size: 2rem;">12/17 (日)逢甲大學</h6>
            <h6 style="margin: 0;font-size: 2rem;">商學 406</h6>
          </div>
        </div>
      </div>
      <div class="panel__img-col">
        <img src="./img/board.png" alt="" class="panel__img">
      </div>
    </div>
    <div class="button register" onclick="window.open('https://sitcon.kktix.cc/events/taichung-meeting-22', '_blank')"> 報名 </div>
    <div class="arrow-down btn1"></div>
  </div>
  <div class="wrapper content0">
    <div class="title white"> 當天議程 </div>
    <div class="panel panel_content1">
      <div class="pg pg_1" onclick="console.log('qwe')">
        <div class="icon icon_1"></div>
        <div class="desc_div">
          <h1 class="desc_title">阮揚洲</h1>
        </div>
        <div class="info">
          <div>
            <p>第一次上架 App 就搶下不分類總排行冠軍</p>
          </div>
        </div>
      </div>
      <div class="pg pg_2" onclick="console.log('qwe')">
        <div class="icon icon_2"></div>
        <div class="desc_div">
          <h1 class="desc_title">陳薇涵</h1>
        </div>
        <div class="info">
          <div>
            <p>ProgEdu 將 DevOps 概念導入</p>
          </div>
        </div>
      </div>
      <div class="pg pg_3" onclick="console.log('qwe')">
        <div class="icon icon_3"></div>
        <div class="desc_div">
          <h1 class="desc_title">謝忠穎</h1>
        </div>
        <div class="info">
          <div>
            <p>多人連線遊戲的美術設計與程式規劃</p>
          </div>
        </div>
      </div>
    </div>
    <div class="arrow-down btn2"></div>
  </div>
  <div class="wrapper content1 ">
    <div class="title "> <span class="blueviolet">小提醒</span> </div>
    <div class="panel panel_content2 zindex9999">
      <p class="p-m0 gift-content mt-2">當天將舉辦交換禮物，想參加的人可以帶價值 NT100 的禮物來交換哦，幹部們也提供一把 <span class="yellow">Ducky One2</span> 地平線，當作驚喜跟大家一起交換，不要錯過摟！！！</p>
    </div>
    <div class="gift">
      <div class="price"></div>
    </div>
  </div>
  <script>
  $(document).click(function(event) {
    var text = $(event.target).text();
  });
  var $body = $('html, body'),
    $panel = $('.panel'),
    $pContent = $('.panel__content'),
    $img = $('.panel__img-col'),
    $button = $('.btn1'),
    $section1 = $('.content1'),
    $button2 = $('.btn2');

  // var animation = bodymovin.loadAnimation({
  //   container: document.getElementById('bm'),
  //   renderer: 'svg',
  //   loop: true,
  //   autoplay: true,
  //   path: 'new.json'
  // })

  setTimeout(function() { window.scrollTo((0, 0), 1) });


  function initTilt() {
    TweenMax.set([$pContent, $img], { transformStyle: "preserve-3d" });

    $body.mousemove(function(e) {
      var sxPos = e.pageX / $panel.width() * 100 - 100;
      var syPos = e.pageY / $panel.height() * 100 - 100;
      TweenMax.to($pContent, 2, {
        rotationY: 0.03 * sxPos,
        rotationX: -0.03 * syPos,
        transformPerspective: 500,
        transformOrigin: "center center -400",
        ease: Expo.easeOut
      });
      TweenMax.to($img, 2, {
        rotationY: 0.03 * sxPos,
        rotationX: -0.03 * syPos,
        transformPerspective: 500,
        transformOrigin: "center center -200",
        ease: Expo.easeOut
      });
    });
  }

  function initTilt2() {
    window.addEventListener('deviceorientation', function(event) {
      var beta = event.beta;
      var gamma = event.gamma;

      var sxPos = event.gamma * 7.5 + 5 / $panel.width() * 100 - 100;
      var syPos = -(event.beta - 50) * 10 - 10 / $panel.height() * 100 - 100;
      TweenMax.to($pContent, 2, {
        rotationY: 0.03 * sxPos,
        rotationX: -0.03 * syPos,
        transformPerspective: 500,
        transformOrigin: "center center -400",
        ease: Expo.easeOut
      });
      TweenMax.to($img, 2, {
        rotationY: 0.03 * sxPos,
        rotationX: -0.03 * syPos,
        transformPerspective: 500,
        transformOrigin: "center center -200",
        ease: Expo.easeOut
      });
    }, false);
  }

  $button.on('click', function() {
    console.log('click');
    $body.animate({
      scrollTop: $('.content0').offset().top
    }, 500);
    return false;
  });

  $button2.on('click', function() {
    console.log('click');
    $body.animate({
      scrollTop: $('.content1').offset().top
    }, 500);
    return false;
  });


  function checkAnimation() {
    var $elem = $('.pg');
    if (isScrolledIntoView($elem)) {
      $elem.addClass('start');
    }
  }

  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
  }

  $(window).scroll(function() {
    checkAnimation();
  });

  initTilt2();
  initTilt();

  //console.clear();
  </script>
  <style>
  html {
    box-sizing: border-box;
  }

  *,
  *:before,
  *:after {
    box-sizing: inherit;
  }

  html,
  body {
    width: 100%;
    height: 100%;
    margin: 0;
  }



  body {
    background-color: white;
    color: #2e2e2e;
    font-size: 18px;
    font-feature-settings: "kern" 1, "liga" 1, "frac" 1, "lnum" 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  h1 {
    font-family: 'Varela Round';
  }

  p {
    font-family: 'Varela Round', sans-serif;
  }

  .arrow-down {
    border: solid white;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 10px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    cursor: pointer;
    bottom: 5%;
    position: absolute;
  }

  .button.register {
    bottom: 10%;
    position: absolute;

    border: 0;
    background-color: #FFD800;
  }

  @media all and (min-width: 320px) and (max-width: 480px) {
    .arrow-down {
      bottom: 17%;
    }

    .button.register {
      bottom: 25%;
    }
    h1 {
      font-size: 75px;
    }

    p {
      font-size: 17px;
      width: 70%;
    }
    .panel__content {
      top: 12% !important;
    }
    .panel {
      height: 350px !important;
      margin-top: -20% !important;
    }

    .button {
      margin-top: 10% !important;
      cursor: pointer;
    }

    .panel_content1 {
      flex-direction: column;
    }

    .desc_title {
      font-size: 30px !important;
    }

    .icon {
      width: 150px !important;
      height: 150px !important;
      flex-basis: 27%;
    }

    .pg {
      flex-direction: row !important;
      transition: 0.5s;
    }

    .title {
      padding-bottom: 100px;
      margin-top: -80px;
      font-size: 25px !important;
    }


    .title2 {
      margin-bottom: -100px;
    }
  }


  .title {
    font-size: 30px;
    /*padding-bottom: 1rem;*/
  }

  .blueviolet {
    background-color: blueviolet;
    color: white;
    padding: 5px 10px;
    border-radius: 7px;
  }

  .desc_div {
    padding-top: 20px;
  }


  .desc_title {
    font-size: 50px;
    margin: 0 auto;
    background-color: blueviolet;
    padding: 0px 8px;
    border-radius: 7px;
  }

  .question {
    width: 50%;
    height: 50%;
    margin: 0 auto;
  }


  .pg {
    color: white;
    height: 100%;
    width: 80%;
    flex-basis: 33%;
    text-align: center;
    padding: 3%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    opacity: 0;
    position: relative;
  }

  .pg .info {
    border-radius: 2%;
    padding: 10%;
    z-index: 555555;
    position: absolute;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: all 0.5s;
    text-align: center;
  }

  .pg:hover .info {
    opacity: 1;
    background-color: rgba(0, 0, 0, 0.7);
  }

  .pg .info div {
    width: 100%;
    height: 100%;
    position: relative;
  }

  .pg .info div p {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    margin: auto 0;
    width: 100%;
    font-size: 2.5rem;
  }

  @media all and (max-width: 480px) {
    .pg .info div p {
      font-size: 1.2rem;
    }
  }

  .start {
    animation: fadeIn 1;
    animation-fill-mode: forwards;
    animation-duration: 1.5s;
  }

  .pg_1 {
    animation-delay: 0.6s;
  }

  .pg_2 {
    animation-delay: 1.4s;
  }

  .pg_3 {
    animation-delay: 2.2s;
  }


  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-35px);
    }

    to {
      opacity: 1;
      transform: translateY(0px);
    }
  }

  @keyframes jump {
    0% {
      bottom: 100%;
    }
    45% {
      bottom: 101%;
    }
    55% {
      bottom: 98%;
    }
    100% {
      bottom: 99%;
    }
  }


  .icon {
    margin: 0 auto;
    margin-top: 5%;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
  }

  .icon_1 {
    background-image: url('./img/01.png');
  }

  .icon_2 {
    background-image: url('./img/02.png');
  }

  .icon_3 {
    background-image: url('./img/03.png');
  }

  .desc {

    text-align: center;
    margin: 0 auto;
  }

  .title {
    font-size: 35px;
    /*align-items: row;*/
    display: flex;
  }

  .button,
  .button:focus {
    margin-top: 18%;
    width: 130px;
    height: 50px;
    border-radius: 6px;
    border: 1.4px solid #2e2e2e;
    text-align: center;
    vertical-align: middle;
    line-height: 50px;
    /* the same as your div height */
    transition: 0.5s;
    cursor: pointer;
    animation: black 1s infinite;
    background-color: black;
    color: white;
  }

  .button:hover {
    background-color: white;
    color: black;
  }

  .wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 100%;
    height: 100vh;
    padding: 5vh 5%;
    overflow: hidden;
    background-color: blueviolet;
    position: relative;
  }

  .wrapper.content0 {
    background-color: #FFD800;
  }

  .wrapper.content1 {
    background-color: hotpink;
    align-items: left;
    position: relative;
  }

  .yellow {
    color: #FFD800;
  }

  .white {
    color: white;
  }

  .p-m0 {
    margin: 0;
    display: inline-block;
    width: 80%;
    font-size: 3rem;
  }

  .mt-2 {
    margin-top: 2rem !important;
  }

  .panel {
    position: relative;
    align-items: center;
    justify-content: center;
    display: flex;
    width: 100%;
    max-width: 1200px;
    height: 466px;
    user-select: none;
    margin-top: 0%;
  }

  .panel_content2 {
    display: block;
    text-align: left;
  }


  .panel__content-col {
    flex-basis: 25%;
  }

  .panel__content {
    position: absolute;
    top: 26%;
    left: 10%;
    z-index: 2;
    width: 100%;
  }



  .panel__text {
    display: inline-block;
    text-align: right;
    color: white;
  }

  .panel__img-col {
    flex-basis: 75%;
    /*box-shadow: 0px 20px 100.28px 8.72px rgba(0, 0, 0, 0.35);*/
  }


  .panel__title {
    margin: 0;
    text-align: left;
    line-height: 110px;
    font-size: 96px;
  }

  .panel__addr {
    text-align: left;
    background-color: #2e2e2e;
    color: white;
    padding: 8px;
    position: relative;
    display: flex;
    margin: 30px 0 0;
    justify-content: flex-end;
  }

  .panel__line {
    width: 64%;
    height: 3px;
    margin: 24px 0 0 36%;
    background-color: #fff;
  }

  .panel__img-col {
    width: 100%;
  }

  .panel__img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .gift {
    position: absolute;
    right: 5%;
    top: 55%;
    /*background-color: red;*/
    width: 30%;
    padding-top: 30%;
    background-image: url('./img/gift.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    z-index: 0;
  }

  .price {
    position: absolute;
    width: 60%;
    padding-top: 60%;
    transform: translateX(-50%);
    left: 50%;
    background-image: url('./img/100.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    animation: jump 1s infinite;
  }

  .gift-content {
    font-size: 3rem;
    color: white;
  }

  @media all and (max-width: 480px) {

    .gift-content.mt-2 {
      margin-top: 0 !important;
    }
    .gift {
      width: 70%;
      padding-top: 70%;
      left: 35%;
      top: 70%;
    }
    .price {
      margin-top: 50%;
      padding-top: 60%;
    }
    .gift-content {
      font-size: 1.2rem;
    }
  }

  .zindex9999 {
    z-index: 9999;
  }
  </style>
</body>