<?php $v->layout("_theme") ?>

<main class="main-admin">
    <section class="admin-content-1">
        <div class="header-admin">
            <span class="current-date-time">28/09/2021 - 21:56</span>
            <a href="#" class="logout">Sair</a>
        </div>
    </section>
    <section class="admin-content-2">
        <div class="container-title">
            <h1>Painel Admin</h1>
        </div>
        <div class="credentials">
            <img src="<?= theme("assets/img/walter.jpg") ?>" alt="img">
            <h2>Walter</h2>
            <span>Online</span>
        </div>
        <div class="navigation-title">
            <h3>Área de navegação</h3>
        </div>
        <nav class="navigation">
            <div class="link"><a href="#">Minhas Tarefas</a></div>
            <div class="link"><a href="#">Criar nova tarefa</a></div>
        </nav>
    </section>
    <section class="admin-content-3">
        <div class="current-tarefas">
            <h4>Minhas Tarefas</h4>
            <table class="table-tasks">
                <thead class="thead-tasks">
                    <tr>
                        <td>Data Criada</td>
                        <td>Nome da Tarefa</td>
                        <td>Prazo da Tarefa</td>
                        <td>Concluida</td>
                    </tr>
                </thead>
                <tbody class="tbody-tasks">
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section class="admin-content-4">
        <p>@Copyright Personal Task - <?= date("Y") ?> Todos os direitos reservados</p>
    </section>
</main>

<script>
    let array_tr = []

    document.querySelectorAll(".tbody-tasks tr").forEach((tr, index) => {
        if (array_tr.indexOf(tr) == -1) {
            array_tr.push(tr)
        }

        if (array_tr.length > 1) {
            document.querySelectorAll(".tbody-tasks tr td").forEach((td) => {
                td.classList.add("underline")
            })
        }
    })

    let last_tr = array_tr.slice(-1)[0]
    last_tr = last_tr.children
    
    for(let i=0; i<last_tr.length; i++){
        last_tr[i].classList.remove("underline")
    }
</script>

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