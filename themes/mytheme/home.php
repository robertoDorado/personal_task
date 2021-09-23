<?php $v->layout("_theme") ?>
<h1>Home page do sistema</h1>
<a href="#" class="logout">Sair</a>

<script>
    let xhr = new XMLHttpRequest
    let formData = new FormData

    document.querySelector(".logout").addEventListener("click", (e) => {
        e.preventDefault()

        formData.append("log", <?= session()->user ?>)

        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if(xhr.response == 0){
                    window.location.href = "<?= url("/login") ?>"
                }
            }
        }

        xhr.open("POST", "<?= url("/logout") ?>")
        xhr.send(formData)
    })
</script>