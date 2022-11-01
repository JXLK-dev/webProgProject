function read(input) {
    if (input.files && input.files[0]) {
        var readFiles = new FileReader();

        readFiles.onload = function (e) {
            $('#image').attr('src', e.target.result).width(275).height(275);
        };

        readFiles.readAsDataURL(input.files[0]);
    }
}
