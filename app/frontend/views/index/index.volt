<section class="bd_image-header">
    <div class="head-container">
        <div class="section-title">Почему мы?</div>
        <div class="head-boxes">
            <ul>
                <li>Под любой бюджет</li>
                <li>Разные виды методик</li>
                <li>Квалифицированные сотрудники</li>
            </ul>
            <ul>
                <li>Удобное расположение</li>
                <li>Комфортная обстановка</li>
                <li>Удаленная работа по Скайпу</li>
            </ul>
        </div>
    </div>
</section>
<section class="section-trend">
    <div class="trend-container">
        <div class="section-title">
            Когда нужно обратиться к психотерапевту?
        </div>
        <div class="trend-boxes">
            <ul>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>неуравновешенность</li>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>раздражительность</li>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>хроническая усталость
                </li>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>зависимости</li>
            </ul>
            <ul>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>депрессия</li>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>фобии, апатии,
                    панические атаки
                </li>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>постоянная тревожность
                </li>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>мысли о смерти и пр.
                </li>
            </ul>
        </div>
        {#<p>#}
        {#Но почему мне нужна помощь психотерапевта?#}
        {#Нельзя ли обойтись беседой с другом за кружкой пива?#}
        {#Потоу что только специально обученный и опытный#}
        {#психотерапевт может заметить бессознательные процессы в психической деятельности человека.#}
        {#</p>#}
    </div>
</section>
<section class="section-call_me">
    <div class="call_me-container">
        <div>
            <div class="call_me-title">Все ещё сомневаешься?</div>
            <div class="call_me-sub-title">Мы поможем тебе определиться! Позвони и запишись на консульацию со скидкой
                10%
            </div>
        </div>
        <a href="{{ url.get(['for':'feedback']) }}" class="btn btn-lg btn-danger">Записаться</a>
    </div>
</section>
<section>
    <div class="employees-container">
        <div class="section-title">Специалисты</div>
        {% for employee in employees %}
            <div class="employee">
                <div>
                    <div class="empl-img"
                         style="background: url('img/employees/{{ employee.id }}.jpg') center 0% no-repeat; background-size: cover;">
                        {#<img src="img/{{ employee.id }}.jpg" alt="">#}
                    </div>
                </div>
                <div class="empl-info">
                    <div class="empl-info-title">
                        {{ employee.firstname }}
                        {{ employee.lastname }}
                    </div>
                    <div class="empl-profession">
                        <i class="fas fa-angle-right"></i> {{ employee.profession|default('') }}
                    </div>
                    <div class="empl-experience">
                        <div class="empl-experience-title">Опыт работы:</div>
                        <div class="empl-experience-value">
                            {{ employee.experience|default('') }}
                        </div>

                    </div>
                    <div class="empl-experience">
                        <div class="empl-experience-title">Образование:</div>
                        <div class="empl-experience-value">
                            {{ employee.education|default('') }}
                        </div>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
</section>
<style>

</style>