$(document).ready(function () {
    console.log("ready")
    // Common Image Preview Function
    function imagePreview(input, previewContainer) {
        if (input.files && input.files[0]) {

            let reader = new FileReader();

            reader.onload = function (e) {

                // Remove old preview
                $(previewContainer).html('');

                // Create image preview
                let img = `
                    <div class="mt-2 preview-image-wrapper">
                        <img src="${e.target.result}" 
                             class="img-thumbnail preview-image"
                             style="max-width: 200px; height: auto; border-radius: 10px;">
                    </div>
                `;

                $(previewContainer).html(img);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Image Change Event
    $(document).on('change', '#image', function () {
        imagePreview(this, '#image-preview');
    });

});