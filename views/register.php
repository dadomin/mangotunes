
<form id="register" action="/register/check" method="post"  enctype="multipart/form-data">
    <div class="size">
        <div id="register-form">
            <h1>Sign UP</h1>
            <p>Welcome to MANGOTUNES!</p>
            <div class="register-input">
                <p>이메일</p>
                <input type="text" placeholder="Your E-MAIL" name="email">
            </div>
            <div class="register-input">
                <p>아이디</p>
                <input type="text" placeholder="Your ID" name = "id">
            </div>
            <div class="register-input">
                <p>비밀번호</p>
                <input type="password" placeholder="PASSWORD" name="pass">
            </div>
            <div class="register-input">
                <p>비밀번호 확인</p>
                <input type="password" placeholder="PASSWORD CONFIRM" name="cpass">
            </div>
            <div class="register-input">
                <p>프로필 사진</p>
                <!-- <input type='file' accept='image/jpg,image/png,image/jpeg,image/gif' id='profile_img_upload'/>
                <label for='profile_img_upload'><i class="far fa-file-image"></i>&nbsp;파일 선택</label> -->
                <div class="filebox">
                    <input class="upload-name" value="파일선택" disabled="disabled">

                    <label for="file">업로드</label> 
                    <input type="file" id="file" name="file" accept='image/jpg,image/png,image/jpeg,image/gif'>
                </div>
            </div>
            <button type="submit">LOG IN</button>
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

