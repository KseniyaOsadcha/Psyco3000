    <div class="section-title">О нас </div>
    <div class="about_us-container">
        <p>Мы такие классные</p>
        <p>Давай к нам</p>
        <p>Поговорим</p>
        <p>Чаю заварим</p>
        <p>Проблемы все твои решим</p>
        <p>Отлично будет</p>
        <p>test</p>
        <p>test</p>
        <p>test</p>
        <p>test</p>
        <p>test</p>
        <p>test</p>
        <p>test</p>
    </div>
<section>
    <div class="employees-container">
        <div class="section-title">Наши специалисты</div>
        {% for employee in employees %}
            <div class="employee">
                <div>
                    <div class="empl-img"
                         style="background: url('img/employees/{{ employee.id }}.jpg') center 0% no-repeat; background-size: cover;">
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
    .about_us-container{
        margin: 0 auto;
        max-width: 1200px;
        font-size: 20px;
        padding: 30px;
    }
</style>