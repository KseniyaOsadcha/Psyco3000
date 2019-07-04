<div id="crop-photo-box" class="modal fade" tabindex="-1">
    <div class="modal-dialog resize-photo">
        <div class="modal-content">
            <i class="fa fa-times" aria-hidden="true" data-dismiss="modal"></i>
            <div class="resize-main-photo">
                <img id="photo"/>
            </div>
            <div class="resize-photo-box">
                <div class="resize-preview-photo">
                    <div class="resize-preview-text">Выберите область для миниатюры</div>
                    <div class="resize-preview-box">
                        <img id="preview"/>
                    </div>
                </div>
                <div class="resize-btn">
                    <form method="post" id="crop_image_form" class="ajax-form">
                        <input type="hidden" name="x1" id="x1">
                        <input type="hidden" name="y1" id="y1">
                        <input type="hidden" name="x2" id="x2">
                        <input type="hidden" name="y2" id="y2">
                        <input type="hidden" name="{{ name }}" id="{{ name }}">
                        <button class="btn btn-success">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>