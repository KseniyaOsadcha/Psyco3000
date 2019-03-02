<div class="section-title">Контакты</div>

<div class="contact-container">
        <div class="contacts">
            <p>Лена</p>
            <p><span><i class="fas fa-mobile-alt"></i> : </span>+380 00 000 09 9 </p>
            <p><span><i class="fas fa-mobile-alt"></i> : </span>+380 00 000 09 9 </p>
            <p>Паша</p>
            <p><span><i class="fas fa-mobile-alt"></i> : </span>+380 00 000 09 9 </p>
            <p><span><i class="far fa-envelope"></i> : </span>hbsfhse@huh.sf</p>
            <p>Ксения</p>
            <p><span><i class="far fa-envelope"></i> : </span>hih@iji.hi</p>
        </div>
        <div class="contact-feedback">
            <div class="contact-feedback-title">
                Свяжитесь со мной
            </div>
            {{ flash.output() }}
            {{ flashDirect.output() }}
            <form method="post">
                <div class="custom-form-group">
                    <label for="name">Имя: </label>
                    <input type="text" class="custom-form-control" name="name" id="name" required>
                </div>
                <div class="custom-form-group">
                    <label for="phone">Телефон: </label>
                    <input type="text" class="custom-form-control" id="phone" name="phone" required>
                </div>
                <button type="submit" class="btn btn-lg btn-outline-danger btn-custom">Готово</button>

            </form>
        </div>
    </div>
