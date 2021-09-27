<?php $v->layout("_theme") ?>

<section class="section-login">
    <div class="container">
        <h1 class="area-login">Area de login</h1>
        <form class="form-login" action="<?= url("/login"); ?>" method="post">
            <?= csrf("login") ?>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="senha">Senha:</label>
            <input type="password" name="password" id="password">
            <button type="submit">Login</button>
        </form>
        <div style="display:none" class="alert alert-danger">Email ou senha incorreto</div>
    </div>
</section>

<script>
    document.querySelector(".form-login").addEventListener("submit", (e) => {
        e.preventDefault()

        let email = document.querySelector("[name=email]").value
        let password = document.querySelector("[name=password]").value
        let csrf = document.querySelector("[name=csrf]").value

        let xhr = new XMLHttpRequest
        let formData = new FormData

        formData.append("email", email)
        formData.append("password", password)
        formData.append("csrf", csrf)

        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let response = JSON.parse(xhr.response)

                if (response.success) {
                    window.location.href = "<?= url("/admin") ?>"
                }

                if (response.error) {
                    document.querySelector(".alert").style.display = "block"
                } else {
                    document.querySelector(".alert").style.display = "none"
                }
            }
        }

        xhr.open("POST", "<?= url("/login") ?>")
        xhr.send(formData)
    })
</script>