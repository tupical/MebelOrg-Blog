//search
$('.header__search-input').click(function() {
  $('.search-result').show();
})

//hide search
jQuery(function($) {
  $(document).mouseup(function(e) {
    var div = $('.search-result');
    if (!div.is(e.target) &&
      div.has(e.target).length === 0) {
      div.hide();
    }
  });
});




/* Show cart */

var main = function() {

  $('.header__cart').click(function() {
    $('.cart-sidebar').animate({
      right: '0px'
    }, 200);
    // $('body').animate({
    //   left: '-337px'
    // }, 200);
    $('.header').animate({
      left: '-337px'
    }, 200);
    $('.overlay-cart').show();
    $(this).addClass('header__cart--active')
  });


  /* close cart */

  function hideCart() {
    $('.cart-sidebar').animate({
      right: '-337px'
    }, 200);
    $('body').animate({
      left: '0px'
    }, 200);
    $('.header').animate({
      left: '-0px'
    }, 200);
    $('.overlay-cart').hide();
    $('.header__cart').removeClass('header__cart--active');
  }

  $('.overlay-cart').click(function() {
    hideCart();
  });

  $('.cart-sidebar__title').click(function() {
    hideCart();
  });
};

$(document).ready(main);


// показать счетчик у иконки корзины
$('.product__cart').click(function () {
  $('.header__cart-count').show();
});


// показать overlay при наведении на пункт меню
$('.header__menu-dropnav').mouseover(function() {
  $('.overlay-full').show();
});
$('.header__menu-dropnav').mouseout(function() {
  $('.overlay-full').hide();
});
// $('.header__menu-rooms').mouseover(function() {
//   $('.overlay-full').show();
// });
// $('.header__menu-rooms').mouseout(function() {
//   $('.overlay-full').hide();
// });






/* Show cart end */

// remove good from cart
$('.cart-sidebar__full-remove').click(function() {
  $(this).closest('.cart-sidebar__full-item').remove();
})



// show modal error
$('body').keydown(function(e) {
  if (e.ctrlKey && e.keyCode == 13) {
    $('#modal-send-error').modal('show');
  }
});

// send modal error
$('.modal-send-error__btn').click(function() {
  $(this).hide();
  $('.modal-send-error__success').addClass('modal-send-error__success--active').show();

  function explode() {
    $('#modal-send-error').modal('hide')
  }
  setTimeout(explode, 2000);
});


//city choise
$('.header__city-current').click(function() {
  $('.header__city-popup').show();
});


$('.city-choice__overlay').click(function() {
  $(this).hide();
  $('.city-choice__container').hide();
});
$('.city-choice__close').click(function() {
  $('.city-choice__container').hide();
  $('.city-choice__overlay').hide();
})
$('.city-choice__btn').click(function() {
  $('.city-choice__container').hide();
  $('.city-choice__overlay').hide();
});

//маленькое окошко
$('.city-yes').click(function() {
  $('.header__city-popup').hide();
});
$('.city-no').click(function() {
  $('.city-choice__container').show();
  $('.city-choice__overlay').show();
  $('.header__city-popup').hide();
});

// // modal login
// $('.modal-pa__btn-login').click(function() {
//   $(this).closest('.modal-pa__login').addClass('login-show-error');
// });
// $('.modal-pa__btn-register').click(function() {
//   $(this).closest('.modal-pa__register').addClass('login-show-error');
// });
// показать регистрацию
$('.modal-pa__login .modal-pa__btn-register').click(function() {
  $('.modal-pa__login').hide();
  $('.modal-pa__register').show();
});
// показать экран ввода кода
$('.modal-pa__register-email .modal-pa__btn-continue').click(function() {
  $('.modal-pa__register-email').hide();
  $('.modal-pa__register-code').show();
});
// показать экран регистрация закончена
$('.modal-pa__register-code .modal-pa__btn-continue').click(function() {
  $('.modal-pa__register-code').hide();
  $('.modal-pa__register-success').show();
});
// клик по Забыли пароль
$('.modal-pa__forgot-link').click(function() {
  $('.modal-pa__login').hide();
  $('.modal-pa__forgot').show();
});

// $('.modal-pa__forgot-link').click(function() {
//   $('.modal-pa__forgot').show();
//   $('.modal-pa__login').hide();
// });
//
// $('.modal-pa__tabs-name').click(function() {
//   $(this).siblings().removeClass('modal-pa__tabs-name--active');
//   $(this).addClass('modal-pa__tabs-name--active');
//
//   if ($('.modal-pa__tabs-login').hasClass('modal-pa__tabs-name--active')) {
//     $('.modal-pa__login').show();
//     $('.modal-pa__register').hide();
//     $('.modal-pa__forgot').hide();
//   }
//   if ($('.modal-pa__tabs-register').hasClass('modal-pa__tabs-name--active')) {
//     $('.modal-pa__register').show();
//     $('.modal-pa__login').hide();
//     $('.modal-pa__forgot').hide();
//   }
//
// });


// //mobile search
// $('.hat__search-mobile').click(function() {
//   $('.hat__search-field').slideDown(300);
//   $('#hat').addClass('search-open');
// });

// jQuery(function($) {
//   $(document).mouseup(function(e) {
//
//     if ($(window).width() < 767) {
//       var div = $('.hat__search-field');
//       if (!div.is(e.target) &&
//         div.has(e.target).length === 0) {
//         div.hide();
//         $('#hat').removeClass('search-open');
//       }
//     }
//
//   });
// });


//////// compare

// КНОПКИ различающиеся характеристики все характеристики
function compareShowHide() {
  $('.favorites__info').animate({
    opacity: 0.1
  }, 500);

  function showBlock() {
    $('.favorites__info').animate({
      opacity: 1
    }, 500);
  }
  setTimeout(showBlock, 600);
}
$('.favorites__show-diff').click(function() {
  if ($(this).hasClass('favorites__show--active')) {
    event.preventDefault();
  } else {
    $('.favorites__show-all').removeClass('favorites__show--active');
    $(this).addClass('favorites__show--active');
    compareShowHide();
  }
});

$('.favorites__show-all').click(function() {

  if ($(this).hasClass('favorites__show--active')) {
    event.preventDefault();
  } else {
    $('.favorites__show-diff').removeClass('favorites__show--active');
    $(this).addClass('favorites__show--active');
    compareShowHide();
  }

});



// прилипание
$(window).scroll(function() {
  if ($(window).scrollTop() >= 200) {
    $('.compare-header').addClass('compare-header--fixed');
  } else {
    $('.compare-header').removeClass('compare-header--fixed');
  }
});
$(window).scroll(function() {
  if ($(window).scrollTop() >= 200) {
    $('.compare-info').addClass('compare-info--scroll');
  } else {
    $('.compare-info').removeClass('compare-info--scroll');
  }
});


//// страница Избранное
// удаление товара
$('.favorites__content .product__toolbar--delete').click(function() {

  var dataProd = $(this).closest('.product').attr("data-product");
  $(this).closest('body').find('[data-product="' + dataProd + '"]').remove();

  var favoritesItems = $('.favorites__content .product').length;

  if (favoritesItems == 0) {
    $('.favorites__content').hide();
    $('.empty-page').show();
  }

});


//// Страница Сравнение
// Сравнение Удаление товара

$('.compare-header__content .product__toolbar--delete').click(function() {

  // удаляем элемент по data-product
  var dataProd = $(this).closest('.product').attr("data-product");
  $(this).closest('body').find('[data-product="' + dataProd + '"]').remove()

  // получаем кол-во элементов в слайдере
  var compareSliderItems = $('.compare-header__content .product').length;
  // console.log('Всего элементов - ' + compareSliderItems);

  // сдвигаем оба слайдера в начальную позицию
  $('.compare-header__content .slick-track').css('transform','translate3d(0px, 0px, 0px)');
  $('.compare-info .slick-track').css('transform','translate3d(0px, 0px, 0px)');


  // если меньше элементов
  if (compareSliderItems <= 6) {
    $('.product-slider__overlay_right').hide();
    $('.product-slider__arrow').hide();
  }
  if (compareSliderItems == 0) {
    $('.compare-header').remove();
    $('.compare__content').remove();
    $('.compare-info__item-name').hide();
    $('.favorites__show').hide();
    $('.favorites__top-item').hide();
    $('.empty-page').show();
  }

});


// удалить список
$('.favorites__show-remove').click(function() {
  $('.compare-info__item-name').hide();
  $('.favorites__show').hide();
  $('.favorites__top-item').hide();
  $('.compare__content').hide();
  $('.empty-page').show();
});




//корзина
$('.cart-sidebar__empty-btn').click(function() {
  event.preventDefault();
  $('.cart-sidebar__empty').hide();
  $('.cart-sidebar__full').show();
});
//выбор города большое окно
$('.city-choice__auto').click(function() {
  $('.city-choice__input').val('Санкт-Петербург');
});
$('.city-choice__list-item').click(function() {
  var cityText = $(this).text();
  $('.city-choice__input').val(cityText);
});


/////// share
$('.share').hover(function() {
  $(this).addClass('share-icon--active');
  $(".share-icon__container").show("slide", {
    direction: "left"
  }, 500);

});
$('.share').mouseleave(function() {
  $(this).removeClass('share-icon--active');
  $(".share-icon__container").hide("slide", {
    direction: "left"
  }, 500);
});


// logo animate
$('.header__logo').hover(function() {
  $(".header__logo-text").show("slide", {
    direction: "left"
  }, 500);

});
$('.header__logo').mouseleave(function() {
  $(".header__logo-text").hide("slide", {
    direction: "left"
  }, 500);
});




//////////// entrance for the seller
// показ Забыли пароль
$('.enter-seller__form-login .enter-seller__forgot-link').click(function() {
  $('.enter-seller__form-login').hide();
  $('.enter-seller__form-forgot').show();
});
// клик в форме Забыли пароль
$('.enter-seller__form-forgot .enter-seller__form-btn').click(function() {
  $('.enter-seller__form-forgot .enter-seller__form').hide();
  $('.enter-seller__form-forgot .enter-seller__form-success').show();
});
// // показ Регистрация
// $('.enter-seller__form-login .enter-seller__register-link span').click(function () {
//   $('.enter-seller__form-login').hide();
//   $('.enter-seller__form-register').show();
// });
// клик в форме Регистрация
$('.enter-seller__form-register .enter-seller__form-btn').click(function() {
  $('.enter-seller__form-register .enter-seller__form').hide();
  $('.enter-seller__form-register .enter-seller__form-success').show();
});
// клик в форме Восстановление
$('.enter-seller__form-restoring .enter-seller__form-btn').click(function() {
  $('.enter-seller__form-restoring .enter-seller__form').hide();
  $('.enter-seller__form-restoring .enter-seller__form-success').show();
});
// кнопка назад
$('.enter-seller__form-back').click(function() {
  $('.enter-seller__form-login').show();
  $('.enter-seller__form-forgot').hide();
});



// choise of fabric

function fabricInfoInsert() {

  var fabricName = $('.choise-fabric__range-item--active .choise-fabric__range-item-name').text();
  var fabricText = $('.choise-fabric__range-item--active .choise-fabric__range-item-text').text();
  var fabricPrice = $('.choise-fabric__range-item--active .choise-fabric__range-item-price').text();

  $('.choise-fabric__info-name').text(fabricName);
  $('.choise-fabric__info-text').text(fabricText);
  $('.choise-fabric__info-price').text(fabricPrice);

}

$(document).ready(function() {

  // добавление класса первому элементу
  $('.choise-fabric__range-row:first-child .choise-fabric__range-content .choise-fabric__range-item:first-child').addClass('choise-fabric__range-item--active');

  fabricInfoInsert();

})

$('.choise-fabric__range-item').click(function() {
  $('.choise-fabric__range-item').removeClass('choise-fabric__range-item--active');
  $(this).addClass('choise-fabric__range-item--active');

  var fabricColor = $(this).attr('style'); //проучаем цвет элемента
  $('.choise-fabric__info-pic').attr('style', fabricColor); // вставляем в главный элемент

  fabricInfoInsert();

});

// закрыть окно выбор ткани
$('.choise-fabric-close').click(function() {
  $('.choise-fabric').hide();
  $('.choise-fabric__container').hide();
})


// popup subscribe
// клик по кнопке
$('.popup-subscribe__form-btn').click(function() {
  $('.popup-subscribe__info').hide();
  $('.popup-subscribe__success').show();
  setTimeout(subscribeClose, 2000);
});
// клик по закрытие
$('.popup-subscribe__close').click(function() {
  subscribeClose();
});
// показ чеоез заданное время
$(document).ready(function() {
  setTimeout(subscribeShow, 2000);
})
$('.overlay-subs').click(function() {
  subscribeClose();
});

function subscribeShow() {
  $('.popup-subscribe').animate({
    right: '0px'
  }, 200);
  $('.overlay-subs').show();
}

function subscribeClose() {
  $('.popup-subscribe').animate({
    right: '-30%'
  }, 200);
  $('.overlay-subs').hide();
}



// card present
$('.card-present__list-item').click(function() {
  event.preventDefault();
  $(this).next().show();
  $('.card-present__list').addClass('card-present__list--open');
});
$('.card-present').hover(function() {
  $('.card-present').toggleClass('card-present--open');
});


// вход в cms
// клик по Войти
$('.cms-enter__btn').click(function() {
  // $('.cms-enter__login').hide();
  $('.cms-enter__input-error').show();
});
// клик по Забыли пароль
$('.cms-enter__forgot-link').click(function() {
  $('.cms-enter__login').hide();
  $('.cms-enter__forgot').show();
});
// клик по кнопке Назад
$('.cms-enter__forgot-back').click(function() {
  $('.cms-enter__login').show();
  $('.cms-enter__forgot').hide();
});
// клик по кнопке Отправка
$('.cms-enter__btn-forgot').click(function() {
  $('.cms-enter__forgot-success').show();
  $('.cms-enter__forgot-form').hide();
});




//tooltip


// search filter
// $('.filter-slide h5').click(function() {
//   $(this).parent().toggleClass('filter-slide--active');
//   if ($(this).parent().hasClass('filter-slide--active')) {
//     $(this).parent().find('.show').slideDown();
//   } else {
//     $(this).parent().find('.show').slideUp();
//   }
// });


/* Show filters (page manufactures) */

var main = function() {

  $('.manufactures-search__filter-choise-extended').click(function() {
    $('.manufactures__advanced-filter').animate({
      right: '0px'
    }, 200);
    $('.overlay-cart').show();
  });

  $('.overlay-cart').click(function() {
    $('.manufactures__advanced-filter').animate({
      right: '-337px'
    }, 200);
    $('.overlay-cart').hide();
  });

};

$(document).ready(main);



// page card
var cardSidebarPadding = ($('.header-bottom').height());
$('.card-page__right-container').stickySidebar({

  topSpacing: cardSidebarPadding,
  bottomSpacing: '0px',
  containerSelector: '.card-page__container',
  // minWidth: 400,
  sidebarWidth: '300px',
});



// product item toolbar
$('.product__toolbar-item').click(function() {
  $(this).toggleClass('product__toolbar-item--active');
});


// product item toolbar
// удалить код после удаления всех product-item
$('.product-item__toolbar-item').click(function() {
  $(this).toggleClass('product-item__toolbar-item--active');

  if ($(this).hasClass('product-item__toolbar-item--active')) {
    $(this).find('.product-item__toolbar-info--top').text('В избранном');
  } else {
    $(this).find('.product-item__toolbar-info--top').text('Добавить в избранное');
  }

  if ($(this).hasClass('product-item__toolbar-item--active')) {
    $(this).find('.product-item__toolbar-info--bottom').text('В сравнении');
  } else {
    $(this).find('.product-item__toolbar-info--bottom').text('Добавить в сравнение');
  }
});


// title-slide
$('.slide-selector').click(function() {
  $(this).toggleClass('slide-selector--active');
  $(this).closest('.products-page__categories').find('.products-page__category-container').slideToggle();
});

//products-page
// show more
$('.products-page__categories-show span').click(function() {
  $('.products-page__categories-show').toggleClass('products-page__categories-show--active');
  if ($(this).parent().hasClass('products-page__categories-show--active')) {
    $('.products-page__category-block--add').slideDown(300);
    $(this).text('Скрыть');
  } else {
    $(this).text('Ещё');
    $('.products-page__category-block--add').slideUp(300);
  }
});


//products-page view
$('.products-page__view-item').click(function() {
  $(this).siblings().removeClass('products-page__view-item--active');
  $(this).addClass('products-page__view-item--active');
});



// compare mini
$('.compare-mini').mouseover(function() {
  $(this).addClass('compare-mini--open');
});
$('.compare-mini').mouseout(function() {
  $(this).removeClass('compare-mini--open');
});

$('.compare-mini__products-delete img').click(function() {

  $(this).closest('.compare-mini__products-item').remove();

  var compareItems = $('.compare-mini__products-item').length;

  // если меньше 1, то скрываем блок Сравнение
  if (compareItems < 1) {
    $('.compare-mini').hide();
  }

  // если меньше 2, то скрываем кнопку Удалить все
  if (compareItems < 2) {
    $('.compare-mini__products-remove').hide();
  }

  $('.compare-mini__info-count span').text(compareItems);
  // заменяем Кол-во

});

$('.compare-mini__products-remove').click(function() {
  $('.compare-mini__products-item').remove();
  $('.compare-mini__info').hide();
});

// $('.product__toolbar--compare').click(function() {
//   $(this).closest('.product').addClass('product--compare');
//   var img = $('.product--compare .product__img').attr('src');
//   var compareImg = $('.compare-mini__products-img').attr('src');
//   $('.compare-mini__products-img').attr('src', img);
// });
$('.product__toolbar--compare').click(function() {
  $('.compare-mini').show();
});

// $('.product__toolbar--compare').click(function() {
//   var compareItems = $('.compare-mini__products-item').length;
//   var test2 = $('.compare-mini__products-item').length++;
//   console.log(compareItems);
//   console.log(test2);
// })




// watched
$('.watched__slider').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});


// drag and drop
$("#dropzone").dropzone({
  url: "/file/post"
});

// search page
$('.visual-search__photo-btn').click(function() {
  $('.visual-search__photo-btn').removeClass('visual-search__photo-btn--active');
  $(this).addClass('visual-search__photo-btn--active');

});

// фиксированное фото при скролле
$('.visual-search__photo').stickySidebar({
  topSpacing: '60px',
  bottomSpacing: '10px',
  containerSelector: '.visual-search .row',
});

function showPhotos() {
  $('.visual-search__preloader').hide();
  $('.visual-search').show();
}
setTimeout(showPhotos, 2000);




// blog sidebar
$('.blog-sidebar .blog__products').stickySidebar({
  topSpacing: '50px',
  bottomSpacing: '10px',
  containerSelector: '#blog',
});

if ($(window).width() > 1199) {
  $('.blog__category-products').addClass('sticky');
}

$('.blog__category-products.sticky').stickySidebar({
  topSpacing: '80px',
  bottomSpacing: '10px',
  containerSelector: '.blog',
});



///////////// personal area

//// шапка
// табы
$('.pa-nav__item').click(function () {

  $(this).addClass('pa-nav__item--active').siblings().removeClass('pa-nav__item--active')
         .closest('.pa').find('.pa-content > div').hide().eq($(this).index()).show();
});


//// заказы
// показать заказы
$('.pa-orders__item').click(function() {
  $('.pa-orders__item').removeClass('pa-orders__item--active');
  $(this).addClass('pa-orders__item--active');
  $('.pa-orders').addClass('pa-orders--open');
  $('.pa-orders__products').show();
});

// скрыть заказ
$('.pa-orders__products-close').click(function () {
  $('.pa-orders__item').removeClass('pa-orders__item--active');
  $('.pa-orders').removeClass('pa-orders--open');
  $('.pa-orders__products').hide();
});

// клик по кнопке удалить
$('.pa-orders__products-remove').click(function () {
  $(this).hide();
  $(this).closest('.pa-orders__products-item').addClass('pa-orders__products-item--deleted')
  $(this).closest('.pa-orders__products-item').find('.pa-orders__products-return').show();
});

// фото к товарам
$('.pa-photos__add-delete svg').click(function () {
  $(this).closest('.pa-photos__add-item').remove();
});
// вы не загрузили
$('.pa-photos__empty').click(function () {
  $(this).hide();
  $('.pa-photos__content').show();
});

//// общение
$('.pa-chat__menu-item').click(function () {
  $(this).addClass('pa-chat__menu-item--active').siblings().removeClass('pa-chat__menu-item--active');
  $(this).closest('.pa').find('.pa-chat__tabs > div').hide().eq($(this).index()).show();
});


//// страница контакты
// плавный скролл
$(document).ready(function(){
	$(".contacts__menu").on("click","a", function (event) {
		//отменяем стандартную обработку нажатия по ссылке
		event.preventDefault();

		//забираем идентификатор бока с атрибута href
		var id  = $(this).attr('href'),

		//узнаем высоту от начала страницы до блока на который ссылается якорь
		top = $(id).offset().top;

    //скролл к верхней части блока
    topItem = (top - 60);

		//анимируем переход на расстояние - top за 1500 мс
		$('body,html').animate({scrollTop: topItem}, 1000);
	});
});
// прилипание левого меню
$('.contacts__menu').stickySidebar({
  topSpacing: '60px',
  bottomSpacing: '10px',
  containerSelector: '.contacts__content',
});



//// CMS
// modal menu
$('.cms-modal__add-link').click(function () {

  // выделяем ссылку при клике
  $('.cms-modal__add-link').removeClass('cms-modal__add-link--active');
  $(this).addClass('cms-modal__add-link--active');

  // показ правого блока только когда выделена последняя категория
  if ($('.cms-modal__add-sublist--3 .cms-modal__add-link').hasClass('cms-modal__add-link--active')) {
    $('.cms-modal__add-products').show();
  } else {
    $('.cms-modal__add-products').hide();
  }

  // показ вложенных блоков
  if ($('.cms-modal__add-link').hasClass('cms-modal__add-link--active')) {
    $(this).closest('.cms-modal__add-list').addClass('cms-modal__add-list--open');
  } else {
    // $(this).closest('.cms-modal__add-list').removeClass('cms-modal__add-list--open');
  }





  // if ('.cms-modal__add-sublist--3').hasClass('.cms-modal__add-link--active') {
  //   console.log('yes');
  // }
  // $(this).remove();
});

// переключение в таблице
$('.cms-btn--check__wrap').on("click", function(){
  $(this).toggleClass('cms-btn--check__active');
});

// Переключение табов
$('.cms-tabs__nav-name').click(function () {
  $(this).addClass('cms-tabs__nav-name--active').siblings().removeClass('cms-tabs__nav-name--active')
         .closest('.cms-tabs').find('.cms-tabs__item').hide().eq($(this).index()).show();
});


// CMS modal
// поиск

$(".cms-modal__search input").keypress(function() {
    if($(this).val().length > 0) {
      $('.cms-modal__add-products').show();
    }
});





//// Карточка товара
// $(".xzoom").xzoom({tint: '#ccc', Xoffset: 15});
// $(".xzoom").xzoom({tint: '#ccc', Xoffset: 15});


// $('.xzoom-container a').click(function () {
//    event.preventDefault();
// })


// jQuery(function($){
//
// 	$('.zoom').easyZoom();
//
// });

//
// new Drift(document.querySelector(".zoom"), {
//   paneContainer: document.querySelector(".zoom-container")
//   // paneContainer: document.querySelector(".card-slider__main_slide")
// });
// new Drift(document.querySelector(".zoom2"), {
//   // paneContainer: document.querySelector(".zoom-container")
//   paneContainer: document.querySelector(".zoom-container2")
// });


// $('[data-spzoom]').spzoom({
//
//   // <a href="https://www.jqueryscript.net/zoom/">Zoom</a> window width in pixels
//   width: 250,
//
//   // Zoom window height in pixels
//   height: 250,
//
//   // top, right, bottom, left
//   position: 'right',
//
//   // Zoom window margin (space)
//   margin: 20,
//
//   // Whether to display image title
//   showTitle: true,
//
//   // top, bottom
//   titlePosition: 'bottom'
//
// });

$( function() {
  $( ".sortable" ).sortable();
  $( ".sortable" ).disableSelection();
} );


$( function() {
   $( "#sortable1, #sortable2, #sortable3, #sortable4" ).sortable({
     connectWith: ".connectedSortable"
   }).disableSelection();
 } );




//// PAGE CART
// смена кол-ва
$('.cart-wrap__changer--plus').click(function () {
  // увеличение значения
  var changerInput = $(this).closest('.cart-wrap__changer').find('.cart-wrap__changer_input');
  var changerValue = parseInt(changerInput.val());
  var changerValuePlus = changerValue + 1;
  $(changerInput).val(changerValuePlus);

  //// изменение цены
  // получаем одиночную цену
  var productPrice = ($(this).closest('.cart-table__line').find('.cart-table__price-value').html()).replace(/\s+/g,'');
  // получаем элемент с суммой
  var changerPrice = $(this).closest('.cart-table__line').find('.cart-table__sum-text');
  // перемножаем значение
  $(changerPrice).text(productPrice * changerValuePlus);
});

$('.cart-wrap__changer--minus').click(function () {
  var changerInput = $(this).closest('.cart-wrap__changer').find('.cart-wrap__changer_input');
  var changerValue = parseInt(changerInput.val());
  var changerValuePlus = changerValue - 1;
  if (changerValue < 2) {

  } else {
    $(changerInput).val(changerValuePlus);

    //// изменение цены
    // получаем одиночную цену
    var productPrice = ($(this).closest('.cart-table__line').find('.cart-table__price-value').html()).replace(/\s+/g,'');
    // получаем элемент с суммой
    var changerPrice = $(this).closest('.cart-table__line').find('.cart-table__sum-text');
    // перемножаем значение
    $(changerPrice).text(productPrice * changerValuePlus);
  }
});

// изменения в поле Кол-ва товаров
$('.cart-wrap__changer_input').keyup(function () {

  var productCount = $(this).val();

  //// изменение цены
  // получаем одиночную цену
  var productPrice = ($(this).closest('.cart-table__line').find('.cart-table__price-value').html()).replace(/\s+/g,'');
  // получаем элемент с суммой
  var changerPrice = $(this).closest('.cart-table__line').find('.cart-table__sum-text');
  // перемножаем значение
  $(changerPrice).text(productPrice * productCount);
});

// клик по кнопке Удалить
$('.cart-wrap__body_del').click(function () {

  // кол-во продуктов у продавца, где удаляем товар
  var productsFromSeller = $(this).closest('.cart-seller').find('.cart-table__line').length - 1;

  var cartSellers = $('.cart-sellers');

  //получаем всех продавцов
  var cartSeller = $('.cart-seller').length;

  // записывает кол-во продавцов в data-sellers родительского контейнера
  $(cartSellers).attr('data-sellers', cartSeller);

  // if (cartSellers < 1) {
  //   $('#cart').hide();
  // }

  // удаляем продавца если нет товаров
  if (productsFromSeller < 1) {
    $(this).closest('.cart-seller').remove();
    // удаляем общее кол-во элементов
    $(cartSellers).attr('data-sellers', cartSeller - 1);
  }

  if ($(cartSellers).attr('data-sellers') < 1) {
    $('#cart').hide();
    $('.empty-page').show();
  }

  // удаляем элемент по которому кликнули
  $(this).closest('.cart-table__line').remove();


});


// валидация формы
$('.cart-form__input-name').on("keypress keyup blur",function() {
  // $(this).val($(this).val().replace(/^[а-яa-z]+$/i));

  if ($(this).val().length > 1) {
    $(this).addClass('cart-form__input--confirm');
  } else {
   $(this).removeClass('cart-form__input--confirm');
  }

});

$(".cart-form__input-phone").on("keypress keyup blur",function (event) {
  $(this).val($(this).val().replace(/[^\d].+/, ""));
   if ((event.which < 48 || event.which > 57)) {
       event.preventDefault();
   }
   if ($(this).val().length > 5) {
      $(this).addClass('cart-form__input--confirm');
   } else {
     $(this).removeClass('cart-form__input--confirm');
   }
});

$('.cart-form__input-email').keyup(function() {
  if($(this).val() != '') {
    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    if(pattern.test($(this).val())){
      // $(this).css({'border' : '1px solid #569b44'});
      $(this).addClass('cart-form__input--confirm');
    } else {
      // $(this).css({'border' : '1px solid #ff0000'});
      $(this).removeClass('cart-form__input--confirm');
    }
  } else {
    $(this).removeClass('cart-form__input--confirm');
  }
});

$('.cart-form__input').keyup(function() {
  var cartInputConfirm = $('.cart-form__input--confirm').length;

  if (cartInputConfirm === 3) {
    $('.cart-form__btn-send').removeClass('btn-blocked');
  } else {
    $('.cart-form__btn-send').addClass('btn-blocked');
  }

});


// $(document).ready(function () {
//
//   var cartFormCheckbox = ('.cart-form__agree input');
//   var cartFormBtn = $('.card-form__btn-send');
//
//   $(cartFormCheckbox).change(function () {
//     if ($(this).is(":checked")) {
//       // cartFormBtn.attr("disabled", false);
//       // cartFormBtn.removeClass('btn-blocked');
//       $(this).closest('form').addClass('cart-form--checked');
//     } else {
//       // cartFormBtn.addClass('btn-blocked');
//       // cartFormBtn.attr("disabled", true);
//       $(this).closest('form').removeClass('cart-form--checked');
//     }
//   });
//
// });

// валидация формы конец


// Страница Корзина
// клик по кнопке Оформить заказ
$('.cart-form__btn-send').click(function () {
  if ($(this).hasClass('btn-blocked')) {
    event.preventDefault();
  } else {
    $('.cart-preloader').show();
    function redirect() {
      document.location.href = "/thanks.html";
    }
    setTimeout(redirect, 2000);
  }
})

// прилипание форма данных в корзине
$('.cart-info').stickySidebar({
  topSpacing: '60px',
  bottomSpacing: '150px',
  containerSelector: '.cart > .container',
});


//// Страница Листинга
// Фильтр Клик по Ещё
$('.filter__show-more').click(function () {
  $(this).closest('.filter-list').toggleClass('filter-list--opened');

  if ($(this).closest('.filter-list').hasClass('filter-list--opened')) {
    $(this).closest('.filter-list').find('.filter__show-text').text('скрыть');
  } else {
    $(this).closest('.filter-list').find('.filter__show-text').text('ещё');
  }
});
// Клик по смене фильтра товаров
$('.products-page__refine-item').click(function () {
  $('.products-page__refine-item').removeClass('products-page__refine-item--active');
  $(this).addClass('products-page__refine-item--active');

  var listingOverlay = $('.products-page__listing-overlay');

  $(listingOverlay).fadeIn(400);

  function overlayHide() {
    $(listingOverlay).fadeOut(200);
  }
  setTimeout(overlayHide, 400);

});

// Статьи. Посмотреть ещё
$('.products-page__articles-more').click(function() {

  var articlesText = $(this).closest('.products-page__articles-info').find('.products-page__articles-text');

  $(articlesText).toggleClass('products-page__articles-text--active');

  if ($(articlesText).hasClass('products-page__articles-text--active')) {
    $(this).text('Свернуть');
  } else {
    $(this).text('Читать');
  }

  // раскрытие списка
  if( $('.products-page__articles-info').hasClass('products-page__articles-info--close') ) {

    var el = $('.products-page__articles-text'),
    curHeight = el.height(),
    autoHeight = el.css('height', 'auto').height();
    el.height(curHeight).animate({height: autoHeight}, 1000);

    $(this).closest('.products-page__articles-info').removeClass('products-page__articles-info--close');

  } else {

    $('.products-page__articles-text').animate({height: '260px'}, 1000);
    $(this).closest('.products-page__articles-info').addClass('products-page__articles-info--close');

  }

});


// Products Page. Удаление тегов
$('.products-page__tags-item--single').click(function () {

  $(this).remove();

  var tagsItem = $('.products-page__tags-item--single').length;

  if (tagsItem < 1) {
    $('.products-page__tags').hide();
  }

  // если меньше 2, то скрываем кнопку Удалить все
  if (tagsItem < 2) {
    $('.products-page__tags-item--all').hide();
  }

});

$('.products-page__tags-item--all').click(function () {
  $('.products-page__tags').remove();
});



//// Страница промо
// табы

$('.discount-tabs__nav-item').click(function () {
  $('.discount-tabs__nav-item').removeClass('discount-tabs__nav-item--active');
  $(this).addClass('discount-tabs__nav-item--active');
});

$('.discount-tabs__nav-item-promo').click(function () {
  $('.discount-list__item').hide();
  $('.discount-list__item--code').show();
});

$('.discount-tabs__nav-item-sentence').click(function () {
  $('.discount-list__item').hide();
  $('.discount-list__item--sentence').show();
});

$('.discount-tabs__nav-item-all').click(function () {
  $('.discount-list__item').show();
});

// $('.favorites__content .product__toolbar--delete').click(function() {
//
//   var dataProd = $(this).closest('.product').attr("data-product");
//   $(this).closest('body').find('[data-product="' + dataProd + '"]').remove();
//
//   var favoritesItems = $('.favorites__content .product').length;
//
//   if (favoritesItems == 0) {
//     $('.favorites__content').hide();
//     $('.empty-page').show();
//   }
//
// });



//// Блок Подписка

$('.subscribe__input').keyup(function() {

  var subsBtn = $('.subscribe__btn');

  if($(this).val() != '') {
    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    if(pattern.test($(this).val())){
      $(this).addClass('subscribe__input--confirm');
      $(subsBtn).removeClass('subscribe__btn--disabled');
      $(subsBtn).prop("disabled", false);
    } else {
      $(this).removeClass('subscribe__input--confirm');
      $(subsBtn).addClass('subscribe__btn--disabled');
      $(subsBtn).prop("disabled", true);
    }
  } else {
    $(this).removeClass('subscribe__input--confirm');
    $(subsBtn).addClass('subscribe__btn--disabled');
  }

});

$('.subscribe__btn').click(function () {
  event.preventDefault();
  $('.subscribe__confirm').show();
  $('.subscribe__content').hide();
});

// $('.subscribe__btn--disabled').click(function () {
//   $('.subscribe__input').addClass('subscribe__btn--disabled');
// });
