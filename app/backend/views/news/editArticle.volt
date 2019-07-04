<div class=" col-lg-8 col-md-10 col-sm-10 col-xs-12 mg-auto">
    <div class="page-header">
        <h2>Редактировать новость</h2>
    </div>
    <form method="post">
        <div class="form-group">
            <label for="title">Название:</label>
            <input value="{{ article.title }}" required type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="abbreviated_text">Сокращенный текст:</label>
            <textarea name="abbreviated_text" id="abbreviated_text" rows="5" class="no-tinymce form-control">{{ article.abbreviated_text }}</textarea>
        </div>
        <div class="form-group">
            <label for="text">Текст:</label>
            <textarea  name="text" id="text" rows="10" class="form-control "> {{ article.text }}</textarea>
        </div>
        <div class="form-group">
            <label for="text" class="bg-light w-100 p-2">Валидность:</label>
            <div class="form-group">
                <label class="container">Уже на сайте
                    <input type="radio" {% if article.is_valid == 2 %} checked="checked" {% endif %}
                           id="is_valid" name="is_valid" value="2">
                    <span class="checkmark"></span>
                </label>
                <label class="container ">Не валидно
                    <input type="radio" name="is_valid" id="is_valid" value="1"
                            {% if article.is_valid == 1 %} checked="checked" {% endif %}>
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Готово</button>
        </div>
    </form>
</div>
