var btnAdd = document.querySelector('.form-input-icon');
const apiUrl = "https://api.hydrax.net/c4ca5c138e888fc7867bc9a88603559e/copy/";
btnAdd.onclick = () => {
    var slug = document.querySelector('#filmPlayer').value.trim();

    if(!slug){
        Swal.fire({
            icon: 'error',
            title: 'Lỗi...',
            text: 'Vui lòng nhập Slug',
        })
    }else{
        $.ajax({
            type: 'POST',
            url: 'https://tuan.vn/bilutvs/?module=backend&controller=episode&action=addlink',
            data: {
                slug: slug,
            },
            dataType: 'json',
            success: function(data){
                if(data['status']){
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Thêm link thành công',
                    })
                    document.querySelector('#filmPlayer').value = `https://short.ink/${data.slug}`;
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi...',
                        text: data['msg'],
                    })
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Lỗi...',
                    text: 'Vui lòng thử lại sau',
                })
            }
        });
    }
    
}
