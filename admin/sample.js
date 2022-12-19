// function chBackcolor(color) {
//     document.getElementById('check').addEventListener('click',
//     function () {
//     this.style.backgroundColor = "color";
//   }
// )
// }
// HTML ドキュメントの load イベントを検知する
window.addEventListener("load", function() {
    // .checked クラスを持つすべての要素を取得する
    var checkedElements = document.querySelectorAll(".checked");

    // 取得したすべての要素に対して、背景色を赤くする
    checkedElements.forEach(function(element) {
        element.style.backgroundColor = "red";
    });
});