// LOADIING
window.onload = function () {
    const spinner = document.getElementById('loading');
    spinner.classList.add('loaded');
}
//SCROLL によって 発動する

// TextTypingというクラス名がついている子要素（span）を表示から非表示にする定義
function TextTypingAnime() {
    $('.TextTyping').each(function () {
        var elemPos = $(this).offset().top - 0;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        var thisChild = "";
        if (scroll >= elemPos - windowHeight) {
            thisChild = $(this).children(); //spanタグを取得
            //spanタグの要素の１つ１つ処理を追加
            thisChild.each(function (i) {
                var time = 160; //文字出現スピードの指定ができます
                //時差で表示する為にdelayを指定しその時間後にfadeInで表示させる
                $(this).delay(time * i).fadeIn(time);
            });
        } else {
            thisChild = $(this).children();
            thisChild.each(function () {
                $(this).stop(); //delay処理を止める
                $(this).css("display", "none"); //spanタグ非表示
            });
        }
    });
}
// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
    TextTypingAnime();/* アニメーション用の関数を呼ぶ*/
});// ここまで画面をスクロールをしたら動かしたい場合の記述

// 画面が読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
    //spanタグを追加する
    var element = $(".TextTyping");
    element.each(function () {
        var text = $(this).html();
        var textbox = "";
        text.split('').forEach(function (t) {
            if (t !== " ") {
                textbox += '<span>' + t + '</span>';
            } else {
                textbox += t;
            }
        });
        $(this).html(textbox);

    });

    TextTypingAnime();/* アニメーション用の関数を呼ぶ*/
});// ここまで画面が読み込まれたらすぐに動かしたい場合の記述


// BURGER JS
const ham = $('#js-hamburger');
const nav = $('#js-nav');
ham.on('click', function () { //ハンバーガーメニューをクリックしたら
  ham.toggleClass('active'); // ハンバーガーメニューにactiveクラスを付け外し
  nav.toggleClass('active'); // ナビゲーションメニューにactiveクラスを付け外し

});