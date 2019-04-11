<div class="bd_image-header">
    <section class="bg-darkness">
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
                    <li>Удаленная работа по Skype</li>
                </ul>
            </div>
        </div>
    </section>
</div>
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
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>фобии, апатия,
                    панические атаки
                </li>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>постоянная тревожность
                </li>
                <li><span class="trends-arrows"><i class="fas fa-angle-double-right"></i></span>проблемы со сном и пр.
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
            <div class="call_me-sub-title">Мы поможем тебе определиться! Позвони и запишись на консультацию со скидкой
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
                <div class="empl-main">
                    <div class="empl-photo">
                        <div class="empl-img"
                             style="background: url('img/employees/{{ employee.id_employee }}.jpg') center 0% no-repeat; background-size: cover;">
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
                        <a class="btn-more" data-toggle="collapse" href="#more{{ employee.id_employee }}" role="button" aria-expanded="false" aria-controls="more{{ employee.id_employee }}">
                            Подробнее..
                        </a>
                    </div>
                </div>
                <div class="empl-info collapse" id="more{{ employee.id_employee }}">
                    {% if (employee.experience) %}
                        <div class="empl-experience">
                            <div class="empl-experience-title">Опыт работы:</div>
                            <div class="empl-experience-value">
                                {{ employee.experience|default('') }}
                            </div>
                        </div>
                    {% endif %}
                    {% if (employee.education) %}
                        <div class="empl-experience">
                            <div class="empl-experience-title">Образование:</div>
                            <div class="empl-experience-value">
                                {{ employee.education|default('') }}
                            </div>
                        </div>
                    {% endif %}

                </div>
            </div>
        {% endfor %}
    </div>
</section>
<style>

</style>