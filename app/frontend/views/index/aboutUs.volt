<div class="section-bg-gray">
    <div class="section-title">О нас</div>
    <div class="about_us-container">
        <p>
            Мы - команда специалистов, которые любят свою работу, самоусовершенствоваться и не стоять на месте!
        </p>
        <p>
            Среди нас - люди с большим опытом, работающие в разных направлениях, умеющие подобрать индивидуальный подход
            для каждого.
        </p>
        <p>
            У нас есть такие специалисты, как психологи, психотерапевты и психиатры.
        </p>
        <p>
            Мы неоднократно сталкивались с разными видами заболеваний, поэтому оказываем помощь в большом спектре
            расстройств:
        </p>
        <ul class="ml-45">
            <li>
                обсессивно-компульсивное расстройство (ОКР)
            </li>
            <li>
                панические и тревожные расстройства
            </li>
            <li>
                постстресовые и адаптационные расстройства
            </li>
            <li>
                психотические расстройства (шизофрения, шизотипическое расстройство и др.)
            </li>
            <li>
                расстройства настроения (депрессия, биполярное расстройство)
            </li>
            <li>
                расстройства пищевого поведения (анорексия, булимия, ожирение)
            </li>
            <li>
                расстройства сна
            </li>
            <li>
                соматоформные расстройства
            </li>
            <li>
                фобические расстройства
            </li>
            <li>
                и другие
            </li>
        </ul>
        <p>
            Для оказания специализированной помощи применяются индивидуальная психотерапия, групповая психотерапия,
            медикаментозная терапия
        </p>
        <p>
            Мы гарантируем Вам конфиденциальность и индивидуальный подход!
        </p>
    </div>
</div>
<section>
    <div class="employees-container">
        <div class="section-title">Наша команда</div>
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
                        <a class="btn-more" data-toggle="collapse" href="#more{{ employee.id_employee }}" role="button"
                           aria-expanded="false" aria-controls="more{{ employee.id_employee }}">
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
    .about_us-container {
        margin: 0 auto;
        max-width: 1200px;
        font-size: 20px;
        padding: 30px;
    }
</style>