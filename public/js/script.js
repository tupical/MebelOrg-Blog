
//Tabs

$(function(){
   $('.tabs__item') .click(function () {
   $(this)
      .addClass('tabs__item_active').siblings().removeClass('tabs__item_active')
      .closest('.reviews__tabs-wrap').find('div.review').removeClass('review__active').eq($(this).index()).addClass('review__active');
  });
})

//Main Tabs

$(function(){
   $('.main-tabs__item') .click(function () {
   $(this)
      .addClass('main-tabs__item_active').siblings().removeClass('main-tabs__item_active')
      .closest('.ready__wrap, .interesting__tab-wrap').find('div.ready, div.interesting__wrapper').removeClass('review__active').eq($(this).index()).addClass('review__active');
  });
})

//Sliders

$ (function () {
$('.wrap-slider').slick({
  loop: true,
  draggable: true,
  arrows: true,
  prevArrow: '.wrap-slider_prev',
  nextArrow: '.wrap-slider_next',
  dots: false,
  slidesToShow: 3,
  variableWidth: true
  });
})

$ (function () {
$('.articles__slider').slick({
  loop: true,
  draggable: true,
  arrows: true,
  prevArrow: '.articles_prev',
  nextArrow: '.articles_next',
  dots: false,
  variableWidth: true
  });
})

$ (function () {
$('.big-set__slider').slick({
  loop: true,
  draggable: true,
  arrows: true,
  prevArrow: '.big-set__arrow_prev',
  nextArrow: '.big-set__arrow_next',
  dots: false,
  slidesToShow: 2,
  variableWidth: true
  });
})

$ (function () {
$('.card-recomend__slider').slick({
  loop: true,
  draggable: true,
  arrows: true,
  prevArrow: '.card-recomend__slider_prev',
  nextArrow: '.card-recomend__slider_next',
  dots: false,
  slidesToShow: 8,
  variableWidth: true
  });
})

$ (function () {
$('.card-similar__slider').slick({
  loop: true,
  draggable: true,
  arrows: true,
  prevArrow: '.card-similar__slider_prev',
  nextArrow: '.card-similar__slider_next',
  dots: false,
  slidesToShow: 8,
  variableWidth: true
  });
})

$ (function () {
$('.sale-slider').slick({
  loop: true,
  draggable: true,
  arrows: true,
  prevArrow: '.sale-slider_prev',
  nextArrow: '.sale-slider_next',
  dots: false,
  slidesToShow: 8,
  variableWidth: true
  });
})

$ (function () {
$('.recommendation-slider').slick({
  loop: true,
  draggable: true,
  arrows: true,
  prevArrow: '.recommendation-slider_prev',
  nextArrow: '.recommendation-slider_next',
  dots: false,
  slidesToShow: 8,
  variableWidth: true
  });
})

//set slider

$(function() {
  //$(".set__slider_slide img").each(function(i) {
    //$("<div><h3>" + ++i + "</h3></div>").appendTo(".set__slider_nav-wrap");
  //});
  $(".set__slider_big").slick({
    slidesToShow: 1,
    asNavFor: ".set__slider_nav-wrap",
    dots: false,
    arrows: false,
    vertical: true,
    verticalSwiping: true
  });
  $(".set__slider_nav-wrap").slick({
    vertical: true,
    verticalSwiping: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: ".set__slider_big",
    nextArrow: ".set__slider_next",
    prevArrow: ".set__slider_prev",
    focusOnSelect: true
  });
});

$(function() {
  $(".card-slider__main").slick({
    slidesToShow: 1,
    asNavFor: ".card-slider__nav",
    dots: false,
    arrows: false,
    vertical: true,
    verticalSwiping: true
  });
  $(".card-slider__nav").slick({
    vertical: true,
    verticalSwiping: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: ".card-slider__main",
    nextArrow: ".card-slider__next",
    prevArrow: ".card-slider__prev",
    focusOnSelect: true
  });
})

$(function() {
  $(".compare-info").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: ".compare-header__content",
    dots: false,
    draggable: false,
    arrows: false,
    infinite: false,
  });
  $(".compare-header__content").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: ".compare-info",
    nextArrow: ".compare__next",
    prevArrow: ".compare__prev",
    focusOnSelect: true,
    infinite: false,
    draggable: false,
    focusOnSelect: false
  });
})

//Paralax Slider

if($(window).width() > 1024)
{
   $('body').parallax({
      'elements': [
        {
          'selector': '.company__slider_list',
          'properties': {
            'x': {
              'left': {
                'initial': 160,
                'multiplier': 0.25,
                'unit': 'px',
                'invert': true
              }
            }
          }
        }
      ]
    });
} else {
   // change functionality for larger screens
}


//Filter

$ (function () {
  $("#track").slider({
    min: 2500,
    max: 125000,
    values: [2500,125000],
    range: true,
    stop: function(event, ui) {
      $("input#minCost").val(jQuery("#track").slider("values",0));
      $("input#maxCost").val(jQuery("#track").slider("values",1));
      },
      slide: function(event, ui){
      $("input#minCost").val(jQuery("#track").slider("values",0));
      $("input#maxCost").val(jQuery("#track").slider("values",1));
      }
  });


  $("input#minCost").change(function(){
    var value1=$("input#minCost").val();
    var value2=$("input#maxCost").val();

      if(parseInt(value1) > parseInt(value2)){
      value1 = value2;
      $("input#minCost").val(value1);
    }
    $("#track").slider("values",0,value1);
  });


  $("input#maxCost").change(function(){
    var value1=$("input#minCost").val();
    var value2=$("input#maxCost").val();

    if (value2 > 125000) { value2 = 125000; $("input#maxCost").val(125000)}

    if(parseInt(value1) > parseInt(value2)){
      value2 = value1;
      $("input#maxCost").val(value2);
    }
    $("#track").slider("values",1,value2);
  });
})


$(function () {
  $('div.composition__card') .click(function () {
    $(this).toggleClass('composition__card_none');
  });
})

$(function () {
  $('.tag') .click(function () {
    $(this).toggleClass('tag-active');
    });

    $('.set-listing__close') .click(function () {
    $('.set-listing__tags_wrap span').removeClass('tag-active');
  });
})


//big-set
$(function () {
  $('.big-set__dot').click(function () {
    $('.big-set__dot').removeClass('big-set__dot_active');
    $(this).addClass('big-set__dot_active');

  });
})

jQuery(function($){
  $(document).mouseup(function (e){
    var div = $('.big-set__dot_active');
    if (!div.is(e.target)
        && div.has(e.target).length === 0) {
      // div.hide();
      div.removeClass('big-set__dot_active');
    }
  });
});

$(function () {
  $('div.composition__sidebar_wrap') .click(function () {
    $(this).toggleClass('composition__sidebar_active');
  });

  /*$('#fixed-container').stickySidebar({
    topSpacing: '40px',
    bottomSpacing: '10px',
    containerSelector: '#card-wrap',
  });*/


  $(window).scroll (function () {
    if ($(this).scrollTop() > 120) {
      $('.contacts__menu_list').addClass('contacts__menu_list-stick');
    } else {
      $ ('.contacts__menu_list').removeClass('contacts__menu_list-stick');
    }
  });



  /*$(window).scroll (function () {
    if ($(this).scrollTop() > 155) {
      $('.fixed-container').addClass('fixed-container-fix');
    } else {
      $('.fixed-container').removeClass('fixed-container-fix');
    }
  })*/
});

/*var $body = $('body'),
      $fixed = $('.fixed-container');
      $(document).on('scroll', function () {
        var position = $body.scrollTop(),
            block_position = $('#card-set').offset().top; // расположение блока, от которого и зависит фиксированность хэдера
        if (position > block_position) { // если позиция скролла страницы больше, то ставим фикс

            $fixed.addClass('fixed-container-fix');
        } else {
          $fixed.removeClass('fixed-container-fix');
        }
    });*/

//counter in card

$(document).ready(function () {
function get_timer() {


  var date_new = "July 8,2018 23:59";

  var date_t = new Date(date_new);

  var date = new Date();

  var timer = date_t - date;

  if(date_t > date) {


    var day = parseInt(timer/(60*60*1000*24));

    if(day < 10) {
      day = '0' + day;
    }

    day = day.toString();


    var hour = parseInt(timer/(60*60*1000))%24;

    if(hour < 10) {
      hour = '0' + hour;
    }

    hour = hour.toString();



    var min = parseInt(timer/(1000*60))%60;

    if(min < 10) {
      min = '0' + min;
    }

    min = min.toString();

    var sec = parseInt(timer/1000)%60;

    if(sec < 10) {
      sec = '0' + sec;
    }

    sec = sec.toString();

    if(day[1] == 9 &&
      hour[0] == 2 &&
      hour[1] == 3 &&
      min[0] == 5 &&
      min[1] == 9 &&
      sec[0] == 5 &&
      sec[1] == 9) {
      animation($("#day0"),day[0]);
    }
    else {
      $("#day0").html(day[0]);
    }

    if(hour[0] == 2 &&
      hour[1] == 3 &&
      min[0] == 5 &&
      min[1] == 9 &&
      sec[0] == 5 &&
      sec[1] == 9) {
      animation($("#day1"),day[1]);
    }
    else {
      $("#day1").html(day[1]);
    }

    if(hour[1] == 3 &&
      min[0] == 5 &&
      min[1] == 9 &&
      sec[0] == 5 &&
      sec[1] == 9) {
      animation($("#hour0"),hour[0]);
    }
    else {
      $("#hour0").html(hour[0]);
    }

    if(min[0] == 5 &&
      min[1] == 9 &&
      sec[0] == 5 &&
      sec[1] == 9) {
      animation($("#hour1"),hour[1]);
    }
    else {
      $("#hour1").html(hour[1]);
    }

    if(min[1] == 9 &&
      sec[0] == 5 &&
      sec[1] == 9) {
      animation($("#min0"),min[0]);
    }
    else {
      $("#min0").html(min[0]);
    }

    if(sec[0] == 5 && sec[1] == 9) {
      animation($("#min1"),min[1]);
    }
    else {
      $("#min1").html(min[1]);
    }

    if(sec[1] == 9) {
      animation($("#sec0"),sec[0]);
    }
    else {
      $("#sec0").html(sec[0]);
    }
    animation($("#sec1"),sec[1]);

    setTimeout(get_timer,1000);
  }
  else {
    $("#clock").html("<span id='stop'>Время акции истекло</span>");
  }

}
function animation(vibor,param) {
  vibor.html(param)
    .css({'marginTop':'0px','opacity':'1'})
    .animate({'marginTop':'0px','opacity':'1'});
}

get_timer();
});

//PROMO

$(document).ready(function(){
  $( '.promo-card__btn-promo' ).click(function() {
    $(this).attr('data-condition', 'active');
  });
});
