<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="icon" type="image/svg+xml" href="img/favicon.svg">
    <link rel="mask-icon" href="img/favicon.png">
    <link rel="mask-icon" href="img/favicon.svg">

    <link href="https://fonts.googleapis.com/css?family=Vollkorn:400,400i,700,700i" rel="stylesheet">
    <!--Styles-->

    <link rel="stylesheet" href="https://mebelorg.alexandervaa.ru/css/main.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth
</head>

<body>
@include('shared/navbar')
@include('shared/alerts')
@yield('content')
@include('shared/footer')

<!-- Вход в ЛК -->

<div class="modal fade" id="sign-in-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-window sign-in" role="document">
        <div class="modal-content modal-window__window">
            <button type="button" class="modal-window__button-close close " data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-window__wrap d-flex">
                <div class="modal-window__text">
                    <p class="modal-window__main-title">Вход в личный кабинет</p>
                    <p class="modal-window__text_descr">Получите доступ к Личному кабинету, своим заказам, избранному и рекомендациям</p>
                </div>
                <div class="modal-window__content d-flex align-items-end flex-column">
                    <form class="modal-window__form">
                        <input id="email-sign-in" type="email" name="email" class="modal-window__input-email" required placeholder="Адрес электронной почты:">
                        <div class="modal-window__form-password">
                            <input id="password-sign-in" class="modal-window__input-password" required type="password" name="password" placeholder="Пароль: ">
                            <button type="button" id="show-password-sign-in" class="modal-window__form-password_button">
                                <svg class="eye-pass" width="23" height="13" viewBox="0 0 23 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.627 5.42018C21.3362 3.76977 19.6642 2.40463 17.7918 1.47243C15.8805 0.520839 13.8243 0.0271015 11.6778 0.00120964C11.6187 -0.000402999 11.3813 -0.000402999 11.3222 0.00120964C9.17573 0.0271463 7.11948 0.520839 5.20815 1.47243C3.33577 2.40463 1.66383 3.76973 0.372962 5.42018C-0.124321 6.05596 -0.124321 6.94404 0.372962 7.57982C1.66379 9.23022 3.33577 10.5954 5.20815 11.5276C7.11948 12.4792 9.17568 12.9729 11.3222 12.9988C11.3813 13.0004 11.6187 13.0004 11.6778 12.9988C13.8242 12.9729 15.8805 12.4792 17.7918 11.5276C19.6642 10.5954 21.3362 9.23027 22.627 7.57982C23.1243 6.94395 23.1243 6.05596 22.627 5.42018ZM5.62615 10.6928C3.8778 9.82233 2.31641 8.54745 1.11076 7.00599C0.877748 6.70805 0.877748 6.29195 1.11076 5.99401C2.31636 4.45255 3.87775 3.17767 5.62615 2.3072C6.12272 2.06002 6.62979 1.84625 7.14626 1.66528C5.81756 2.8563 4.98045 4.58237 4.98045 6.49998C4.98045 8.41768 5.81761 10.1439 7.14644 11.3349C6.62997 11.1539 6.12276 10.94 5.62615 10.6928ZM11.5 12.0682C8.421 12.0682 5.91608 9.57031 5.91608 6.49993C5.91608 3.42955 8.421 0.931704 11.5 0.931704C14.579 0.931704 17.084 3.4296 17.084 6.49998C17.084 9.57036 14.579 12.0682 11.5 12.0682ZM21.8893 7.00594C20.6837 8.54741 19.1223 9.82229 17.3739 10.6928C16.8779 10.9397 16.3712 11.1525 15.8553 11.3333C17.1831 10.1423 18.0196 8.41678 18.0196 6.49993C18.0196 4.58205 17.1823 2.85576 15.8533 1.66474C16.3699 1.84576 16.8772 2.05979 17.3739 2.30711C19.1223 3.17758 20.6837 4.45246 21.8893 5.99392C22.1223 6.2919 22.1223 6.70801 21.8893 7.00594Z" fill="#999999"/>
                                    <path d="M2.38961 3.82775e-08C1.07197 3.82775e-08 -3.29016e-07 1.06896 -3.29016e-07 2.3829C-3.29016e-07 3.69685 1.07197 4.7658 2.38961 4.7658C3.70725 4.7658 4.77922 3.69685 4.77922 2.3829C4.77926 1.06896 3.7073 3.82775e-08 2.38961 3.82775e-08ZM2.38961 3.83285C1.58789 3.83285 0.935584 3.18246 0.935584 2.3829C0.935584 1.58339 1.5878 0.933003 2.38961 0.933003C3.19133 0.933003 3.84359 1.58339 3.84359 2.3829C3.84364 3.18246 3.19133 3.83285 2.38961 3.83285Z" transform="translate(9.11084 4.11719)" fill="#999999"/>
                                </svg>
                            </button>
                        </div>
                        <a class="modal-window__forget-password" href="#password-recovery-modal" data-toggle="modal" data-dismiss="modal">Забыли пароль?</a>
                        <button id="button-go-sign-in" class="modal-window__button-go">Войти</button>
                    </form>
                    <div class="modal-window__bottom d-flex flex-column mt-auto">
                        <div class="modal-window__transition">Нет аккаунта?</div>
                        <button type="button" class="modal-window__button-create-account" data-toggle="modal" data-dismiss="modal" data-target="#sign-out-modal">Зарегистрироваться</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Забыли Пароль -->

<div class="modal fade" id="password-recovery-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-window password-recovery" role="document">
        <div class="modal-content modal-window__window">
            <button type="button" class="modal-window__button-close close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-window__wrap d-flex">
                <div class="modal-window__text">
                    <p class="modal-window__main-title">Восстановление пароля</p>
                    <p class="modal-window__text_descr">Введите адрес электронной почты и вам придет письмо с дальнейшей инструкцией по восстановлению пароля</p>
                </div>
                <div class="modal-window__content d-flex align-items-start flex-column">
                    <form class="modal-window__form">
                        <input type="email" id="email-recovery" class="modal-window__input-email" required name="email" placeholder="Адрес электронной почты:">
                        <button type="button" class="modal-window__button-go">Получить пароль</button>
                    </form>
                    <div class="modal-window__bottom d-flex flex-column mt-auto">
                        <h5 class="modal-window__transition">Вспомнили?</h5>
                        <button type="button" class="modal-window__button-create-account" data-toggle="modal" data-dismiss="modal" data-target="#sign-in-modal">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Регистрация -->

<div class="modal fade" id="sign-out-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-window sign-out" role="document">
        <div class="modal-content modal-window__window">
            <button type="button" class="modal-window__button-close close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-window__wrap d-flex">
                <div class="modal-window__text">
                    <p class="modal-window__main-title">Регистрация нового пользователя</p>
                    <p class="modal-window__text_descr">Нажимая «Создать учетную запись», вы подтверждаете, что прочитали и соглашаетесь с <a href="#" class="modal-window__text-bold">Правилами порталa</a> и <a href="#" class="modal-window__text-bold">Политикой конфиденциальности.</a></p>
                </div>
                <div class="modal-window__content d-flex align-items-start flex-column">
                    <form class="modal-window__form">
                        <input id="email-sign-out" type="email" class="modal-window__input-email" required name="email" required placeholder="Адрес электронной почты:">
                        <div class="modal-window__form-password">
                            <input required class="modal-window__input-password" id="password-sign-out" required type="password" name="password" placeholder="Придумайте пароль: ">
                            <button type="button" id="show-password-sign-out" class="modal-window__form-password_button">
                                <svg class="eye-pass" width="23" height="13" viewBox="0 0 23 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.627 5.42018C21.3362 3.76977 19.6642 2.40463 17.7918 1.47243C15.8805 0.520839 13.8243 0.0271015 11.6778 0.00120964C11.6187 -0.000402999 11.3813 -0.000402999 11.3222 0.00120964C9.17573 0.0271463 7.11948 0.520839 5.20815 1.47243C3.33577 2.40463 1.66383 3.76973 0.372962 5.42018C-0.124321 6.05596 -0.124321 6.94404 0.372962 7.57982C1.66379 9.23022 3.33577 10.5954 5.20815 11.5276C7.11948 12.4792 9.17568 12.9729 11.3222 12.9988C11.3813 13.0004 11.6187 13.0004 11.6778 12.9988C13.8242 12.9729 15.8805 12.4792 17.7918 11.5276C19.6642 10.5954 21.3362 9.23027 22.627 7.57982C23.1243 6.94395 23.1243 6.05596 22.627 5.42018ZM5.62615 10.6928C3.8778 9.82233 2.31641 8.54745 1.11076 7.00599C0.877748 6.70805 0.877748 6.29195 1.11076 5.99401C2.31636 4.45255 3.87775 3.17767 5.62615 2.3072C6.12272 2.06002 6.62979 1.84625 7.14626 1.66528C5.81756 2.8563 4.98045 4.58237 4.98045 6.49998C4.98045 8.41768 5.81761 10.1439 7.14644 11.3349C6.62997 11.1539 6.12276 10.94 5.62615 10.6928ZM11.5 12.0682C8.421 12.0682 5.91608 9.57031 5.91608 6.49993C5.91608 3.42955 8.421 0.931704 11.5 0.931704C14.579 0.931704 17.084 3.4296 17.084 6.49998C17.084 9.57036 14.579 12.0682 11.5 12.0682ZM21.8893 7.00594C20.6837 8.54741 19.1223 9.82229 17.3739 10.6928C16.8779 10.9397 16.3712 11.1525 15.8553 11.3333C17.1831 10.1423 18.0196 8.41678 18.0196 6.49993C18.0196 4.58205 17.1823 2.85576 15.8533 1.66474C16.3699 1.84576 16.8772 2.05979 17.3739 2.30711C19.1223 3.17758 20.6837 4.45246 21.8893 5.99392C22.1223 6.2919 22.1223 6.70801 21.8893 7.00594Z" fill="#999999"/>
                                    <path d="M2.38961 3.82775e-08C1.07197 3.82775e-08 -3.29016e-07 1.06896 -3.29016e-07 2.3829C-3.29016e-07 3.69685 1.07197 4.7658 2.38961 4.7658C3.70725 4.7658 4.77922 3.69685 4.77922 2.3829C4.77926 1.06896 3.7073 3.82775e-08 2.38961 3.82775e-08ZM2.38961 3.83285C1.58789 3.83285 0.935584 3.18246 0.935584 2.3829C0.935584 1.58339 1.5878 0.933003 2.38961 0.933003C3.19133 0.933003 3.84359 1.58339 3.84359 2.3829C3.84364 3.18246 3.19133 3.83285 2.38961 3.83285Z" transform="translate(9.11084 4.11719)" fill="#999999"/>
                                </svg>
                            </button>
                        </div>
                        <button class="modal-window__button-go">Зарегистрироваться</button>
                    </form>
                    <div class="modal-window__bottom d-flex flex-column mt-auto">
                        <h5 class="modal-window__transition">Зарегистрированы?</h5>
                        <button type="button" class="modal-window__button-create-account" data-toggle="modal" data-dismiss="modal" data-target="#sign-in-modal">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Модалка личный кабинет конец-->

<!-- Модалка об ошибке с текстом  -->
<div class="modal fade modal-error-send modal-error-info" id="modal-send-error-info" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title modal-error__title">Сообщите об ошибке</h5>
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-error-info__text">Просто выделите любое слово на этой странице и нажмите "Ctrl" + "Enter"</div>
            </div>

        </div>
    </div>
</div>
<!-- Модалка об ошибке с текстом конец -->

<!-- Модалка об ошибке с изображением  -->
<div class="modal fade modal-error-send modal-send-error" id="modal-send-error" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title modal-error__title">Сообщите об ошибке</h5>
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-send-error__address">Адрес страницы с ошибкой: <a class="modal-send-error__link" href="#">http://tarampampam.github.io/jquery.textmistake/</a></div>
                <img class="modal-send-error__img" src="img/send-error.jpg" alt="">
                <div class="modal-send-error__text">Ваш комментарий или корректная версия:</div>
                <input class="modal-send-error__input" type="text" placeholder="Введите комментарий">
                <div class="modal-send-error__btns">
                    <button class="modal-send-error__btn cta-btn__full">Отправить</button>
                    <div class="modal-send-error__success">Cпасибо ваше сообщение отправлено</div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Модалка об ошибке с изображением конец -->

<!-- Выезжающая корзина -->
<div class="cart-sidebar">
    <div class="cart-sidebar__title">Корзина</div>

    <div class="cart-sidebar__empty">
        <div class="cart-sidebar__empty-pic">
            <img class="cart-sidebar__empty-img" src="img/cart-cat.svg" alt="">
        </div>
        <div class="cart-sidebar__empty-title">В корзине пусто?</div>
        <div class="cart-sidebar__empty-title">Это не страшно!</div>
        <div class="cart-sidebar__empty-text">Если Вы зарегистрированы у нас на сайте и в вашей корзине были товары, то чтобы их увидеть необходимо авторизоваться</div>
        <a class="cart-sidebar__empty-btn cta-btn__full" href="">Перейти к покупкам</a>
    </div>

    <div class="cart-sidebar__full">
        <!-- <div class="cart-sidebar__full-all">Добавлено 20 товаров</div> -->

        <div class="cart-sidebar__full-goods scrollbar">

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>

            <div class="cart-sidebar__full-item">
                <a class="cart-sidebar__full-link" href="javascript:void(0);">
                    <div class="cart-sidebar__full-pic">
                        <img class="cart-sidebar__full-img" src="img/good-1.jpg" alt="">
                    </div>
                    <div class="cart-sidebar__full-content">
                        <div class="cart-sidebar__full-title">ТВ-тумба Астра 1</div>
                        <div class="cart-sidebar__full-count"><span>Добавлено 5 шт</span><span class="cart-sidebar__full-remove">Удалить</></div>
                    </div>
                </a>
            </div>


        </div>
        <!-- /cart-sidebar__full-goods -->
        <div class="cart-sidebar__full-send">
            <div class="cart-sidebar__full-send-goods">2 товара на 14520 руб</div>
            <!-- <div class="cart-sidebar__full-send-sum">на 14520 руб.</div> -->
            <div class="cart-sidebar__full-send-btn cta-btn__full">Оформить заказ</div>
        </div>

    </div>
    <!-- /cart-sidebar__full -->

</div>
<!-- /cart-sidebar -->
<!-- overlay для корзины -->
<div class="overlay-cart"></div>
<!-- Выезжающая корзина конец -->

<!-- Модалка выбора города -->
<div class="city-choice__container">
    <div class="city-choice">

        <button type="button" class="city-choice__close" data-dismiss="modal" aria-label="Close"></button>

        <div class="city-choice__text">Вам показаны товары в городе</div>
        <div class="city-choice__name">
            <img src="img/city-choise-icon.svg" alt="">Москва
        </div>
        <div class="city-choice__auto">Определять автоматически</div>
        <div class="city-choice__field">
            <input class="city-choice__input" type="text" placeholder="Укажите другой город">
            <div class="city-choice__search">
                <button class="city-choice__search-btn">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.7796 16.7216L13.4522 12.3943C14.5249 11.0865 15.1714 9.41143 15.1714 7.58571C15.1714 3.39796 11.7735 0 7.58571 0C3.39429 0 0 3.39796 0 7.58571C0 11.7735 3.39429 15.1714 7.58571 15.1714C9.41143 15.1714 11.0829 14.5286 12.3906 13.4559L16.718 17.7796C17.0118 18.0735 17.4857 18.0735 17.7796 17.7796C18.0735 17.4894 18.0735 17.0118 17.7796 16.7216ZM7.58571 13.6616C4.23184 13.6616 1.50612 10.9359 1.50612 7.58571C1.50612 4.23551 4.23184 1.50612 7.58571 1.50612C10.9359 1.50612 13.6653 4.23551 13.6653 7.58571C13.6653 10.9359 10.9359 13.6616 7.58571 13.6616Z" fill="#999999"/>
                    </svg>
                </button>
            </div>
        </div>
        <ul class="city-choice__list">
            <li class="city-choice__list-item">Москва</li>
            <li class="city-choice__list-item">Санкт-Петербург</li>
            <li class="city-choice__list-item">Новосибирск</li>
            <li class="city-choice__list-item">Екатеринбург</li>
            <li class="city-choice__list-item">Красноярск</li>
            <li class="city-choice__list-item">Ростов-на-Дону</li>
            <li class="city-choice__list-item">Москва</li>
            <li class="city-choice__list-item">Москва</li>
            <li class="city-choice__list-item">Москва</li>
            <li class="city-choice__list-item">Москва</li>
            <li class="city-choice__list-item">Москва</li>
            <li class="city-choice__list-item">Москва</li>
            <li class="city-choice__list-item">Москва</li>
        </ul>
        <div class="city-choice__btn cta-btn__full">Продолжить просмотр</div>
    </div>
    <div class="city-choice__overlay"></div>
</div>
<!-- Модалка выбора города конец -->


<div class="overlay-full"></div>


<!-- Модалка поиск по фото -->
<div class="search-photo-modal modal fade" id="search-photo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="search-photo-modal__content modal-content">

            <div class="search-photo-modal__caption">Поиск по фото</div>

            <div class="search-photo-modal__dropzone">
                <div id="dropzone">
                    <form action="/file-upload" class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
            </div>

            <div class="search-photo-modal__example">
                <div class="search-photo-modal__example-caption">Или попробуйте с одной из наших картинок:</div>
                <div class="search-photo-modal__example-content">
                    <!-- ссылки только для теста -->
                    <a class="search-photo-modal__example-item" href="/search-photo--many.html">
                        <img src="img/other1.jpg" alt="">
                    </a>
                    <a class="search-photo-modal__example-item" href="/search-photo--one.html">
                        <img src="img/card4.jpg" alt="">
                    </a>
                    <!-- ссылки только для теста конец -->
                    <div class="search-photo-modal__example-item">
                        <img src="img/card5.jpg" alt="">
                    </div>
                    <div class="search-photo-modal__example-item">
                        <img src="img/product-big-1.jpg" alt="">
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<!-- Модалка поиск по фото конец -->
</div>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!-- Fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<!-- Yandex Maps -->
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

<!-- Fancybox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

<!-- Slick -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="https://mebelorg.alexandervaa.ru/js/main.js"></script>

<script>
    $(document).ready(function() {
        @if(isset($user))
        $(".destroy_image").click(function() {
            var fd = new FormData;
            fd.append('_method', 'DELETE');
            $.ajax({
                url: "/api/v1/users/<?=$user->id?>/image?api_token={{auth()->user()->api_token}}",
                data: fd,
                method: 'POST',
                processData: false,
                contentType: false
            }).done(function(res) {
                if (res == '1')
                {
                    location.reload();
                }
            });
        })
        @endif
        @if(isset($post) && ((!isset($_SESSION['hasrating']) || $_SESSION['hasrating'] != $post->id) ))
        $(".article__underground-stars .fa-star").click(function() {
            var fd = new FormData;
            fd.append('_method', 'POST');
            fd.append('rating', $(this).data('star_index'));
            $.ajax({
                url: "/api/v1/posts/{{$post->id}}/rating",
                data: fd,
                method: 'POST',
                processData: false,
                contentType: false
            }).done(function(res) {
                if (res == '1')
                {
                    location.reload();
                }
            });
        })
        @endif

        @auth
        $(".favorite").click(function() {
            var fd = new FormData;
            fd.append('_method', 'POST');
            $.ajax({
                url: "/api/v1/favorite/{{$post->id}}?api_token={{auth()->user()->api_token}}",
                data: fd,
                method: 'POST',
                processData: false,
                contentType: false
            }).done(function(res) {
                if (res == '1')
                {
                    location.reload();
                }
            });
        })
        @endauth
    });
</script>
</body>
</html>