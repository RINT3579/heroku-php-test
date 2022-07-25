<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">
    <title>パスワード生成システム ver2.3</title>
    <script type="text/javascript" src="qrcode.min.js"></script>
  </head>
  <style>
    body{
      background: rgba(252,146,146,0.9);
      font-family: 'Courier New',san-serif;
      text-align: center;
      zoom:1.3;
    }
    .container{
      width: 320px;
      margin: 30px auto;
      clear:both;
    }
    .container2{
      width: 300px;
      margin: 30px auto;
      clear:both;
    }
    input[type="text"]{
      width: 300px;
      padding: 7px;
      border-radius: 3px;
      font-size: 24px;
      font-family: 'Courier New',san-serif;
      text-align: center;
    }
    #btn{
      color: rgb(134, 255, 134);
      background: #00aaff;
      padding :7px;
      border-radius 5px;
      box-shadow: 0 4px 0 #0088cc;
    }
    #btn:hover{
      opacity: 0.8;
    }
    fieldset{
      margin-top :40px;
      border: 1px dashed #aaa;
      border-radius: 5px;
      text-align: left;
    }
    legend{
      font-weight :bold;
      padding: 0 10px;
    }
    fieldset p {
      text-align: center;
    }

    input[type=checkbox] {
  transform: scale(1.8);
}
  </style>
  <body>
    <div class="container">
      <p><input type="text" id="view"></p>
      <!--<p><input type="text" id="msg"></p>-->
      <!--<p><input type="button" value="変換"id="button"></p>-->
      <p><div id="btn">パスワード生成ボタン</div>
      <fieldset>
        <legend>詳細設定</legend>
        <p>パスワードの長さ : <input type="number" id="slider" value="8" min="4" max="20"></p>
        <p>4~20桁のパスワードを生成します</p>
        <p>
          数字を含む :<input type="checkbox"id="num">
          記号を含む :<input type="checkbox"id="sym">
        </p>
      </fieldset>
    </div>
    <div class="container2" >
      <div id="qrcode"></div>
    </div>
    <script>
      (function () {
          'use strict';

          const elem = document.getElementById("btn");
          const slider = document.getElementById("slider");
          const label = document.getElementById("label");
          const btn = document.getElementById("btn");
          const view = document.getElementById("view");
          const num = document.getElementById("num");
          const sym = document.getElementById("sym");

          function qrParse(text) {
            const qrcode = new QRCode(document.getElementById("qrcode"), {
              text: text,
              width: 300,
              height: 300,
              colorDark : "#ffffff",
              colorLight : "#000000",
              correctLevel : QRCode.CorrectLevel.H
            });
          }
          
          function getPassword(){
             const seed_let = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
             const seed_num = '0123456789';
             const seed_sym = '!#$%&~*"';
             const error = 'upper 20';
             let seed;
             let pwd = '';
             let len = 0;

             if(slider.value < 4){
               slider.value = 4;
             }

             if(slider.value > 20){
               slider.value = 8;
             }

             if(slider.value <= 20){
               len = slider.value;
             }

             seed = seed_let;
             if(num.checked=== true ){
               seed+= seed_num;
             }
             if(sym.checked=== true ){
               seed+= seed_sym;
             }

            //for(const i = 0; i < len; i++){
              //pwd += seed[Math.floor(Math.random() * seed.length)];
            //}

            while (len--){
              pwd += seed[Math.floor(Math.random() * seed.length)];
            }


            view.value = pwd;
            qrParse(pwd);
          }


          slider.addEventListener("change",function(){
            label.innerHTML = this.value
          },false);

          btn.addEventListener("click",function(){
            const qrImage = document.querySelectorAll("img,canvas");

            qrImage.forEach(elm =>{
              elm.remove();
            })

            getPassword();
          },false);

          view.addEventListener("click",function(){
            this.select();
          },false);
          getPassword();
          })();
    </script>

  </body>
</html>
