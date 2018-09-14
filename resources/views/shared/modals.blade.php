<div>
		<!-- Модалка личный кабинет -->
		<div class="modal fade modal-pa" id="modal-pa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">

					<div class="modal-content">

						<div class="modal-pa__tabs">
							<div class="modal-pa__tabs-name modal-pa__tabs-login modal-pa__tabs-name--active">Вход</div>
							<div class="modal-pa__tabs-name modal-pa__tabs-register">Регистрация</div>
						</div>

							<div class="modal-pa__login">
								<div class="modal-pa__title">Вход в личный кабинет</div>

								<div class="modal-pa__input-block">
									<input class="modal-pa__input" type="email" placeholder="you@example.com">
									<div class="modal-pa__input-error"></div>
								</div>
								<div class="modal-pa__input-block">
									<input class="modal-pa__input" type="password" placeholder="*******">
									<div class="modal-pa__input-error">Не удалось войти</div>
								</div>

								<div class="modal-pa__login-bottom">
									<div class="modal-pa__forgot-link">Забыли пароль?</div>
									<button class="modal-pa__btn modal-pa__btn-login">Войти</button>
								</div>
							</div>
							<!-- /modal-pa__login -->

							<div class="modal-pa__forgot">
								<div class="modal-pa__title">Восстановление пароля</div>
								<div class="modal-pa__input-block">
									<input class="modal-pa__input" type="email" placeholder="you@example.com">
								</div>
								<div class="modal-pa__forgot-bottom">
									<button class="modal-pa__btn modal-pa__btn-forgot">Отправить</button>
								</div>
							</div>
							<!-- /modal-pa__forgot -->

							<div class="modal-pa__register">
								<div class="modal-pa__title">Регистрация нового пользователя</div>

								<div class="modal-pa__input-block">
									<input class="modal-pa__input" type="email" placeholder="you@example.com">
									<div class="modal-pa__input-error">имеет неверное значение</div>
								</div>
								<div class="modal-pa__input-block">
									<input class="modal-pa__input" type="password" placeholder="*******">
									<div class="modal-pa__input-error">недостаточной длины (не может быть меньше 8 символов)</div>
								</div>
								<div class="modal-pa__input-block">
									<input class="modal-pa__input" type="text" placeholder="Иванов Иван">
								</div>
								<div class="modal-pa__input-block">
									<input class="modal-pa__input" type="password" placeholder="+7">
								</div>
								<div class="modal-pa__register-bottom">
									<button class="modal-pa__btn modal-pa__btn-register">Зарегистрироваться</button>
								</div>

							</div>
							<!-- /modal-pa__register -->
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
	          <img class="modal-send-error__img" src="/img/send-error.jpg" alt="">
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
					<img class="cart-sidebar__empty-img" src="/img/cart-cat.svg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
								<img class="cart-sidebar__full-img" src="/img/good-1.jpg" alt="">
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
					<img src="/img/city-choise-icon.svg" alt="">Москва
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
		            <img src="/img/other1.jpg" alt="">
		          </a>
		          <a class="search-photo-modal__example-item" href="/search-photo--one.html">
		            <img src="/img/card4.jpg" alt="">
		          </a>
		          <!-- ссылки только для теста конец -->
		          <div class="search-photo-modal__example-item">
		            <img src="/img/card5.jpg" alt="">
		          </div>
		          <div class="search-photo-modal__example-item">
		            <img src="/img/product-big-1.jpg" alt="">
		          </div>
		        </div>
		      </div>



		    </div>
		  </div>
		</div>