<div id="feedback-index" class="content">
    <h1 class="text-center">Отклики</h1>
    <p>
        <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Фильтр
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="col-md-5 mb-4">
            <form>
                <div class="form-group row">
                    <select id="feedback-status" class="form-control col-9">
                        <option value="0">Все записи</option>
                        <option selected value="1">Новые</option>
                        <option value="2">Не дозвонились</option>
                        <option value="3">Записаны на приём</option>
                        <option value="4">Не актуально</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    {{ partial('feedback/feedback',['feedbacks':feedbacks]) }}
</div>

