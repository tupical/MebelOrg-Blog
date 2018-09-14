@auth
  <div class="comment-leave d-flex flex-column mt-5">
    <p class="comment-leave__title mb-2">Оставьте свой комментарий</p>
    <form class="comment-leave__form" action=""></form>
    <textarea class="comment-leave__form_textarea mb-3" name="" id="" cols="30" rows="10"></textarea>
    <input class="comment-leave__form_input form-control mb-3" type="e-mail" placeholder="Введите e-mail">
    <button class="cta-btn__full comment-leave__btn">Отправить</button>
  </div>
@else
  @component('components.alerts.default', ['type' => 'warning'])
    @lang('comments.sign_in_to_comment')
  @endcomponent
@endauth
