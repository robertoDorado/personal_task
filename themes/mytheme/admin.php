<?php $v->layout("_theme") ?>

<main class="main-admin">
    <section class="admin-content-1"></section>
    <section class="admin-content-2"></section>
    <section class="admin-content-3"></section>
    <section class="admin-content-4"></section>
</main>

<script>
    let xhr = new XMLHttpRequest
    let formData = new FormData

    document.querySelector(".logout").addEventListener("click", (e) => {
        e.preventDefault()

        formData.append("log", <?= session()->user ?>)

        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.response == 0) {
                    window.location.href = "<?= url("/login") ?>"
                }
            }
        }

        xhr.open("POST", "<?= url("/logout") ?>")
        xhr.send(formData)
    })
</script>