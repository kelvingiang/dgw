// thay doi style khi dc chon cua submenu link =====================================

// 1. 從 URL 取出 cate
const path = window.location.pathname.split("/").filter((s) => s);
const cateIndex = path.indexOf("cate");
let cateId = "";

if (cateIndex !== -1 && path[cateIndex + 1]) {
  cateId = path[cateIndex + 1];
}

if (cateId) {
  const $item = jQuery(`.menu-sub-item[data-id="${cateId}"] a`);
  const text = $item.text();
  const $label = $("<label>").text(text);
  $item.replaceWith($label);
  jQuery(`.menu-sub-item[data-id="${cateId}"]`).addClass("no-link");
}



// const mainPath = window.location.pathname.split("/").filter((s) => s);

// let segment = mainPath[1];
// console.log(segment);
// // const mainPath = window.location.pathname.split("/").filter(s => s);
// // let segment = mainPath[1];   // 例如 URL: /digiwin/cases/91  → segment = "cases"

// // 找到 a[data-name="cases"] 的父層 .menu-main-item
// if (segment) {
//     const target = document.querySelector(`.menu-main .menu-main-item[data-name="${segment}"]`);
//     if (target) {
//         target.closest('.menu-main-item').classList.add('active');
//     }
// }

jQuery(function ($) {
    let section = window.location.pathname.split('/').filter(Boolean)[1];
    $('[data-name="' + section + '"]').addClass('active');
});