$(document).ready(function () {
    var boxImg = $("#imagem_text");
    var imgCar = $("#imagem_file");

    $(boxImg).click(function () {
        $(imgCar).trigger('click');
    });
    $(imgCar).change(function () {
        document.getElementById('imagem_text').value = document.getElementById('imagem_file').value;
    });
});