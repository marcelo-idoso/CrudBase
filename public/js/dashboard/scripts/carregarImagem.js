$(document).ready(function () {
    var boxImg = $("#imagem_text_img");
    var imgCar = $("#imagem_file");

    $(boxImg).click(function () {
        $(imgCar).trigger('click');
    });
    $(imgCar).change(function () {
        document.getElementById('imagem_text_img').value = document.getElementById('imagem_file').value;
    });


    var boxImgLogo = $("#imagem_text_logo");
    var imgCarLogo = $("#imagem_file_logo");

    $(boxImgLogo).click(function () {
        $(imgCarLogo).trigger('click');
    });
    $(imgCarLogo).change(function () {
        document.getElementById('imagem_text_logo').value = document.getElementById('imagem_file_logo').value;
    });
    
    var boxImgIco = $("#imagem_text_logoico");
    var imgCarIco = $("#imagem_file_ico");

    $(boxImgIco).click(function () {
        $(imgCarIco).trigger('click');
    });
    $(imgCarIco).change(function () {
        document.getElementById('imagem_text_logoico').value = document.getElementById('imagem_file_ico').value;
    });
    
    var boxImgIco = $("#imagem_text_imgparceiro");
    var imgCarIco = $("#imagem_file_parceiro");

    $(boxImgIco).click(function () {
        $(imgCarIco).trigger('click');
    });
    $(imgCarIco).change(function () {
        document.getElementById('imagem_text_imgparceiro').value = document.getElementById('imagem_file_parceiro').value;
    });
});