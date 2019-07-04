<div class=" col-lg-8 col-md-10 col-sm-10 col-xs-12 mg-auto">
    <div class="page-header">
        <h2>Создать новость</h2>
    </div>
    <form method="post">
        <div class="form-group">
            <label for="title">Название:</label>
            <input required type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="abbreviated_text">Сокращенный текст:</label>
            <textarea name="abbreviated_text" id="abbreviated_text" rows="5" class="no-tinymce form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="text">Текст:</label>
            <textarea name="text" id="text" rows="10" class="form-control "></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Готово</button>
        </div>
    </form>
</div>
