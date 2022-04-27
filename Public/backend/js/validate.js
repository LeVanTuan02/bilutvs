// validate client

// functions
function isRequired(selector, message = 'Vui lòng nhập trường này!'){
    return {
        selector: selector,
        test: function(value){
            return value ? false : message;
        }
    }
}

function isEmail(selector, message = 'Giá trị nhập không chính xác!'){
    return {
        selector: selector,
        test: function(value){
            var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            return regex.test(value) ? false : message;
        }
    }
}

function password(selector, message = 'Giá trị nhập không chính xác!'){
    return {
        selector: selector,
        test: function(value){
            var regex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
            return regex.test(value) ? false : message;
        }
    }
}

function confirmed(selector, getValue, message = 'Giá trị nhập không chính xác!'){
    return {
        selector: selector,
        test: function(value){
            return value === getValue() ? false : message;
        }
    }
}

function notSpaced(selector, message = 'Giá trị nhập không chính xác!'){
    return {
        selector: selector,
        test: function(value){
            var regex = /^\S*$/;
            return regex.test(value) ? false : message;
        }
    }
}


// validate form login
Validator({
    selectorForm: '#form__login',
    selectorError: '.form-message',
    rule: [
        isRequired('.username', 'Vui lòng nhập Username'),
        isRequired('.password', 'Vui lòng nhập mật khẩu')
    ]
});

function Validator(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                errorMessage = rules[i](inputElement.value);
                if(errorMessage) break;
            }
    
            var errorElement = inputElement.parentElement.querySelector(options.selectorError);
            if(errorMessage){
                inputElement.parentElement.classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                inputElement.parentElement.classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = inputElement.parentElement.querySelector(options.selectorError);
                    inputElement.parentElement.classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }
}

// validate form register
Validator_reg({
    selectorForm: '#form__register',
    selectorError: '.form-message',
    rule: [
        isRequired('.fullname', 'Không được bỏ trống họ tên'),
        isRequired('.username', 'Không được bỏ trống username'),
        isRequired('.password', 'Không được bỏ trống mật khẩu'),
        password('.password', 'Vui lòng nhập lại mật khẩu'),
        isRequired('.confirm_password', 'Vui lòng xác nhận mật khẩu'),
        isRequired('input[name="checkbox"]', 'Vui lòng xác nhận trường này!'),
        isEmail('.email', 'Không được bỏ trống Email'),
        isEmail('.email', 'Trường này phải là Email!'),
        confirmed('.confirm_password', () => {
            return document.querySelector('#form__register .password').value;
        }, 'Mật khẩu nhập lại không chính xác')
    ]
});

function Validator_reg(options){
    var formElement = document.querySelector(options.selectorForm);
    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}

// validate form forgot password
Validator_forgot({
    selectorForm: '#form__forgot',
    selectorError: '.form-message',
    rule: [
        isEmail('.email', 'Trường này phải là Email!')
    ]
});

function Validator_forgot(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}

// validate form thêm user
Validator_add_user({
    selectorForm: '#add_user',
    selectorError: '.form-message',
    rule: [
        isRequired('.username', 'Không được bỏ trống tên đăng nhập'),
        notSpaced('.username', 'Username không được chứa khoảng trắng'),
        isRequired('.password', 'Không được bỏ trống mật khẩu'),
        password('.password', 'Mật khẩu tối thiểu 8 ký tự, có ít nhất 1 chữ cái in hoa và số'),
        isRequired('.avatar', 'Vui lòng chọn 1 ảnh'),
        isRequired('.fullname', 'Không được bỏ trống tên'),
        isRequired('.email', 'Không được bỏ trống email'),
        isEmail('.email', 'Trường này phải là Email!'),
        isRequired('.confirm_password', 'Không được bỏ trống trường này'),
        confirmed('.confirm_password', () => {
            return document.querySelector('#add_user .password').value;
        }, 'Mật khẩu nhập lại không chính xác')
    ]
});

function Validator_add_user(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                    console.log(inputElement);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}


// validate form đổi mật khẩu
Validator_form_change_pass({
    selectorForm: '#change_password',
    selectorError: '.form-message',
    rule: [
        isRequired('.old_password', 'Vui lòng nhập mật khẩu hiện tại'),
        isRequired('.new_password', 'Vui lòng nhập mật khẩu mới'),
        password('.new_password', 'Mật khẩu tối thiểu 8 ký tự, có ít nhất 1 chữ cái in hoa và số'),
        isRequired('.confirm_password', 'Vui lòng xác nhận mật khẩu'),
        confirmed('.confirm_password', () => {
            return document.querySelector('#change_password .new_password').value;
        }, 'Mật khẩu nhập lại không chính xác')
    ]
});

function Validator_form_change_pass(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}

// validate form cập nhật thông tin cá nhân
Validator_update_info({
    selectorForm: '#update_info',
    selectorError: '.form-message',
    rule: [
        isRequired('.username', 'Không được bỏ trống tên đăng nhập'),
        notSpaced('.username', 'Username không được chứa khoảng trắng'),
        // isRequired('.avatar', 'Vui lòng chọn 1 ảnh'),
        isRequired('.fullname', 'Không được bỏ trống tên'),
        isRequired('.email', 'Không được bỏ trống email'),
        isEmail('.email', 'Trường này phải là Email!')
    ]
});

function Validator_update_info(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}

// validate form cập nhật thông tin tài khoản (Quản trị viên cập nhật thông tin tài khoản khác)
Validator_edit_user({
    selectorForm: '#edit_user',
    selectorError: '.form-message',
    rule: [
        isRequired('.username', 'Không được bỏ trống tên đăng nhập'),
        notSpaced('.username', 'Username không được chứa khoảng trắng'),
        isRequired('.fullname', 'Vui lòng nhập tên đầy đủ'),
        isRequired('.rule', 'Vui lòng chọn quyền truy cập'),
        isRequired('.email', 'Không được bỏ trống email'),
        isEmail('.email', 'Trường này phải là Email!')
        
    ]
});

function Validator_edit_user(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}


// validate form cập nhật mật khẩu (Quản trị viên cập nhật thông tin tài khoản khác)
Validator_edit_user_password({
    selectorForm: '#edit_user-password',
    selectorError: '.form-message',
    rule: [
        isRequired('.new_password', 'Không được bỏ trống mật khẩu'),
        password('.new_password', 'Mật khẩu tối thiểu 8 ký tự, có ít nhất 1 chữ cái in hoa và số'),
        isRequired('.confirm_password', 'Vui lòng xác nhận mật khẩu'),
        confirmed('.confirm_password', () => {
            return document.querySelector('#edit_user-password .new_password').value;
        }, 'Mật khẩu nhập lại không chính xác')
        
    ]
});

function Validator_edit_user_password(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}

// validate form cập nhật sản phẩm
Validator_edit_product({
    selectorForm: '#edit_product',
    selectorError: '.form-message',
    rule: [
        isRequired('.productName', 'Không được bỏ trống tên sản phẩm'),
        isRequired('.productQuantity', 'Không được bỏ trống số lượng'),
        isRequired('.productPrice', 'Không được bỏ trống giá sản phẩm')
        
    ]
});

function Validator_edit_product(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}


// validate form thêm sản phẩm
Validator_add_product({
    selectorForm: '#add_product',
    selectorError: '.form-message',
    rule: [
        isRequired('.productName', 'Không được bỏ trống tên sản phẩm'),
        isRequired('.productImage', 'Vui lòng chọn ảnh sản phẩm'),
        isRequired('.productQuantity', 'Không được bỏ trống số lượng'),
        isRequired('.productPrice', 'Không được bỏ trống giá sản phẩm')
        
    ]
});

function Validator_add_product(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}

// validate form cập nhật thông tin website
Validator_update_info_web({
    selectorForm: '#settings_web',
    selectorError: '.form-message',
    rule: [
        isRequired('.title', 'Không được bỏ trống tiêu đề Website'),
        isRequired('.description', 'Không được bỏ trống mô tả Website')
        
    ]
});

function Validator_update_info_web(options){
    var formElement = document.querySelector(options.selectorForm);

    if(formElement){
        function getParent(input, result){
            while(input.parentElement){
                if(input.parentElement.matches(result)){
                    return input.parentElement;
                }
                input = input.parentElement;
            }
        }
    
        var listRules = {};
    
        function validate(inputElement, rule){
            var errorMessage;
    
            var rules = listRules[rule.selector];
            for(var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if(errorMessage) break;
            }
    
            var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
            if(errorMessage){
                getParent(inputElement, '.form__group').classList.add('invalid');
                errorElement.innerText = errorMessage;
            }else{
                getParent(inputElement, '.form__group').classList.remove('invalid');
                errorElement.innerText = '';
            }
        }
    
        options.rule.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            // lưu lại các rule
            if(Array.isArray(listRules[rule.selector])){
                listRules[rule.selector].push(rule.test);
            }else{
                listRules[rule.selector] = [rule.test];
            }
    
            if(inputElement){
                // lắng nghe sự kiện
                inputElement.onblur = () => {
                    validate(inputElement, rule);
                }
    
                inputElement.oninput = () => {
                    var errorElement = getParent(inputElement, '.form__group').querySelector(options.selectorError);
                    getParent(inputElement, '.form__group').classList.remove('invalid');
                    errorElement.innerText = '';
                }
    
            }
        });
    }

}