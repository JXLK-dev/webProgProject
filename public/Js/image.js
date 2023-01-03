function read(input) {
    if (input.files && input.files[0]) {
        var readFiles = new FileReader();

        readFiles.onload = function (e) {
            $('#image').attr('src', e.target.result).width(200).height(200);
        };

        readFiles.readAsDataURL(input.files[0]);
    }
}
