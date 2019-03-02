<div class="bg-grey-feedback">
    <div class="section-title">Записаться на консультацию</div>
    <div class="feedback-container">
        <form class="feedback-form" method="post">
            {{ flash.output() }}
            {{ flashDirect.output() }}
            <div class="custom-form-group">
                <label for="name">Имя <span class="required-field">*</span></label>
                <input type="text" class="custom-form-control" name="name" id="name" required>
            </div>
            <div class="custom-form-group">
                <label for="email">Email</label>
                <input type="email" class="custom-form-control" id="email" name="email">
            </div>
            <div class="custom-form-group">
                <label for="phone">Телефон <span class="required-field">*</span></label>
                <input type="text" class="custom-form-control" id="phone" name="phone" required>
            </div>
            <div class="custom-form-group">
                <label for="comment">Коментарий</label>
                <textarea class="custom-form-control" id="comment" name="comment" rows="4"></textarea>
            </div>
            <div class="required-field-notify">
                <span class="required-field">*</span> - Поля обязательные для заполнения
            </div>
            <button type="submit" class="btn btn-lg btn-danger btn-custom">Готово</button>
        </form>
    </div>
</div>
