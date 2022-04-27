function preImg(event){
    var box_img = $('.form-image-box');
    box_img.innerHTML = '<img src="'+ URL.createObjectURL(event.target.files[0]) +'" alt="">';

    var box_preImg = $('.form__group.box-preview');
    if(event.target.files.length >= 0){
        box_preImg.classList.remove('hide');
    }else{
        box_preImg.classList.add('hide');
    }
}