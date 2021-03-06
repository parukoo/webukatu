import $ from "jquery";
import "../sass/style.scss";
import Vue from 'vue'
import "@babel/polyfill"
import 'es6-promise/auto'
import Vuelidate from 'vuelidate'
import Paginate from 'vuejs-paginate'
import objectFitImages from 'object-fit-images';

// headerメニュー
// =======================================
$('.js-header-btn').on('click', function(){
  let $this = $(this);
  let $body = $('body');
	if($this.hasClass('is-active')){
    $this.removeClass('is-active');
    $body.removeClass('is-fixed');
		$('.js-header-menu').removeClass('is-active');
	}else{
    $this.addClass('is-active');
    $body.addClass('is-fixed');
    $('.js-header-menu').addClass('is-active');
	}
});


// 画像ライブプレビュー
// =======================================
var $fileInput = $('.js-form-picFile');

$fileInput.on('change', function(e){
  var file = this.files[0],            // 2. files配列にファイルが入っている
  $img = $(this).siblings('.js-form-preview'), // 3. jQueryのsiblingsメソッドで兄弟のimgを取得
  fileReader = new FileReader();   // 4. ファイルを読み込むFileReaderオブジェクト

  // 5. 読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
  fileReader.onload = function(event) {
  // 読み込んだデータをimgに設定
  $img.attr('src', event.target.result).show();
  };

  // 6. 画像読み込み
  fileReader.readAsDataURL(file);
});

// SP時TOPメニュー(ページ内リンク)
// =======================================
$('.js-index-menu a[href]').on('click', function(event) {
  $('.js-header-menu').removeClass('is-active');
  $('.js-header-btn').removeClass('is-active');
  // 移動先を50px上にずらす
  var adjust = 50;
  // スクロールの速度
  var speed = 400; // ミリ秒
  // アンカーの値取得
  var href= $(this).attr("href");
  // 移動先を取得
  var target = $(href == "#" || href == "" ? 'html' : href);
  // 移動先を調整
  var position = target.offset().top - adjust;
  // スムーススクロール
  $('body,html').animate({scrollTop:position}, speed, 'swing');
  return false;
});

// グローバルメニュー(カテゴリーメニュー表示)
// =======================================
$('.js-category-menu').on('click', function(){
  $('.p-header-category-menu').slideToggle();
});

// mypage tab change
// =======================================
$('.js-tabLink').on('click', function () {
  var $th = $(this).index();
  $('.js-tabLink').removeClass('is-active');
  $('.js-tabPanel').removeClass('is-active');
  $(this).addClass('is-active');
  $('.js-tabPanel').eq($th).addClass('is-active');
});

// IEとEDGE　objectfit
// =======================================
$(function () {
  objectFitImages('img.js-objectfit');
});

Vue.use(Vuelidate);
Vue.component('paginate', Paginate)
Vue.component('step-index', require('./components/StepIndex.vue').default);
Vue.component('step-indexlist', require('./components/StepIndexlist.vue').default);
Vue.component('step-indexitem', require('./components/StepIndexitem.vue').default);
Vue.component('step-list', require('./components/StepList.vue').default);
Vue.component('step-categorylist', require('./components/StepCategorylist.vue').default);
Vue.component('step-item', require('./components/StepItem.vue').default);
Vue.component('step-flow', require('./components/StepFlow.vue').default);
Vue.component('step-flowheader', require('./components/StepFlowheader.vue').default);
Vue.component('step-author', require('./components/StepAuthor.vue').default);
Vue.component('step-flowlist', require('./components/StepFlowlist.vue').default);
Vue.component('step-flowitem', require('./components/StepFlowitem.vue').default);
Vue.component('step-detail', require('./components/StepDetail.vue').default);
Vue.component('step-detailmenu', require('./components/StepDetailmenu.vue').default);
Vue.component('step-detailcontent', require('./components/StepDetailcontent.vue').default);

Vue.component('form-create', require('./components/FormCreate.vue').default);
Vue.component('form-edit', require('./components/FormEdit.vue').default);
Vue.component('form-step', require('./components/FormStep.vue').default);
Vue.component('form-kosteplist', require('./components/FormKosteplist.vue').default);
Vue.component('formedit-kosteplist', require('./components/FormeditKosteplist.vue').default);
Vue.component('form-kostepitem', require('./components/FormKostepitem.vue').default);
Vue.component('form-comfirm', require('./components/FormComfirm.vue').default);
Vue.component('formedit-comfirm', require('./components/FormeditComfirm.vue').default);
Vue.component('form-done', require('./components/FormDone.vue').default);

const app = new Vue({
    el: '#app'
});
