<div id="employee-update">
    <h1 class="text-center page-header">{{ employee.firstname }} {{ employee.lastname }}</h1>
    <div class=" col-lg-6 col-md-6 col-sm-8 col-xs-12 mg-auto">
        <div class="mb-3 mt-3">
            <img src="../../../img/employees/{{ employee.id_employee }}.jpg" alt="фото отсутствует" class="view-photo ">
        </div>

        <form method="post">

            <div class="form-group">
                <div class="form-group">
                    <label for="first_name">Имя:</label>
                    <input required type="text" name="firstname" class="form-control" id="first_name"
                           value="{{ employee.firstname|default('') }}">
                </div>
                <div class="form-group">
                    <label for="lastname">Фамилия:</label>
                    <input name="lastname" id="lastname" class="form-control"  type="text"
                           value="{{ employee.lastname|default('') }}">
                </div>
                <div class="form-group">
                    <label for="email">email:</label>
                    <input name="email" id="email" class="form-control" required type="email"
                           value="{{ employee.email|default('') }}">
                </div>
                <div class="form-group">
                    <label for="id_role">Роль на сайте*:</label>
                    <input name="id_role" id="id_role" class="form-control" required type="text"
                           value="{{ employee.id_role }}">
                    <div class="text-danger bg-light p-3">
                        <p class="font-weight-bold">Внимание!</p>
                        <p class="font-weight-bold">* Роли:  1 - врач; 2 - врач-админ; 3 - админ; 4 - гость; </p>
                        <p>Роль - "врач" можно давать только тем, у кого заполнены поля "Специальнсть" и "Образование". А так же есть фотография. </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон:</label>
                    <input name="phone" id="phone" class="form-control" type="text"
                           value="{{ employee.phone|default('') }}">
                </div>
                <div class="form-group">
                    <label for="profession">Специальнсть:</label>
                    <textarea name="profession" type="text" id="profession" rows="2"
                              class="form-control">{{ employee.profession|default('') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="education">Образование:</label>
                    <textarea name="education" type="text" id="education" rows="7"
                              class="form-control">{{ employee.education|default('') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="experience">Опыт работы:</label>
                    <textarea name="experience" type="text" id="experience" rows="5"
                              class="form-control">{{ employee.experience|default('') }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group text-center">
                    <button class="btn btn-success">save</button>
                </div>
            </div>
        </form>

    </div>
</div>