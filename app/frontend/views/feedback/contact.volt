<div class="section-title">Контакты</div>
<div class="alert-box">
    {{ flash.output() }}
    {{ flashDirect.output() }}
</div>
<div class="contact-container">
        <div class="contacts">
            <p>Наталия</p>
            <p><a href="tel:+380995657016"><span><i class="fas fa-mobile-alt"></i> : </span>+38(099)565-70-16</a></p>
            {#<p>Наталия</p>#}
            {#<p><a href="tel:+380668478437"><span><i class="fas fa-mobile-alt"></i> : </span>+ 380 66 847 8437</a></p>#}
            <p>Почта</p>
            <p><a href="mailto:harmony.life.kiev@gmail.com"><span><i class="far fa-envelope"></i> : </span>psylife3000@gmail.com</a></p>
            <p>Офисы</p>
            <p><span><i class="fas fa-map-marker-alt"></i> : </span>Кавказская 9</p>
            <p><span><i class="fas fa-map-marker-alt"></i> : </span>Оболонский проспект 15</p>
        </div>
        <div class="contact-feedback">
            <div class="contact-feedback-title">
                Свяжитесь со мной
            </div>

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
