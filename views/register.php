
<form id="register" action="/register/check" method="post"  enctype="multipart/form-data">
    <div class="size">
        <div id="register-form">
            <h1>Sign UP</h1>
            <p>Welcome to MANGOTUNES!</p>
            <div class="register-input">
                <p>E-MAIL</p>
                <input type="text" placeholder="Your E-MAIL" name="email">
            </div>
            <div class="register-input">
                <p>YOUR NAME</p>
                <input type="text" placeholder="Your ID" name = "id">
            </div>
            <div class="register-input">
                <p>PASSWORD</p>
                <input type="password" placeholder="PASSWORD" name="pass">
            </div>
            <div class="register-input">
                <p>PASSWROD CONFIRM</p>
                <input type="password" placeholder="PASSWORD CONFIRM" name="cpass">
            </div>
            <div class="register-input">
                <p>PROFILE IMAGE</p>
                <div class="filebox">
                    <input class="upload-name" value="파일선택" disabled="disabled">

                    <label for="file">upload</label> 
                    <input type="file" id="file" name="file" accept='image/jpg,image/png,image/jpeg,image/gif'>
                </div>
            </div>
            <button type="submit">REGISTER</button>
        </div>
        <p>Go back to <a href="/register">LOG IN</a>!</p>
    </div>
    <div id="register-back"></div>
</form>

<script>

    $("#file").on('change', (e)=>{
        var filename = $(e.target).val().split('/').pop().split('\\').pop(); // 파일명만 추출 

        $('.upload-name').val(filename);
    });
</script>

