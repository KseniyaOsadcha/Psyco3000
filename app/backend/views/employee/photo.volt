<div id="employees-update">
    <h1 class="text-center page-header"></h1>

    <form method="post" enctype="multipart/form-data" id="download-photo">
        <div class="p-2 text-center">
            <div class="form-group ">
                <label for="empl-photo">Добавить или изменить фото</label>
                <br>
                <input required type="file" id="empl-photo" name="empl-photo" class="btn btn-dark">
            </div>
            <div style="overflow: hidden; width: 300px; text-align: center; margin: 0 auto;">
                <img src="/img/employees/{{ id_employee }}.jpg" style="max-width: 300px; width: 100%;" alt=""
                     id="photo">
            </div>
            <button type="submit" class="btn btn-dark mt-3"> Готово</button>
        </div>
    </form>

</div>
<script>
    $(function () {

        $('#empl-photo').on('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function () {
                    console.log(reader.result);
                    $('#photo').attr("src", reader.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
        $('#download-photo').on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let cv = $('#empl-photo').prop('files');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: formData,
                url: '/employee/photo',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (!data.status)
                        showAlert(data.message, 'danger');
                    else
                        showAlert(data.message);
                }
            })
        });
    });
</script>
