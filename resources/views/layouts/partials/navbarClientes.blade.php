<style>

    nav a:active, nav a:link,nav a:visited{
        text-decoration: none;
    }

    .navbar-brand{
        margin-left: 50px;
    }

    .navbar-brand:hover{
        opacity: 0.7;
    }

    .navbar{
        font-weight: bold;
        background: white;
    }

    .navbar-nav{
        margin-right: 50px;
    }

    .nav-item{
        font-size: 16px;
        border-radius: 15px;
        padding: 0 5px 0 5px;
    }

    .nav-link{
        color: black;
    }

    .login .nav-item{
        border: 1px solid #0466c8;
        margin-left: 15px;
    }

    .login .nav-item:hover{
        background: #0466c8;
    }

    .login .nav-link{
        color: #0466c8;
    }

    .login .nav-link:hover{
        color: white;
    }

    .nav-item:hover, .nav-link:hover{
        color: #0466c8;
        text-shadow: 0px 5px 10px #0466c864;
    }

</style>

<nav class="navbar navbar-expand-lg navbar fixed-top">
    <a class="navbar-brand" href="inicio">
        <img src="../assets/img/LOGO WM PROPERTIE horizontal.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <ul class="nav-item">
                    <a class="nav-link" href="inicio" role="button" aria-expanded="false"><i class="fa-solid fa-house"></i> Inicio</a>
                </ul>
                <ul class="nav-item">
                    <a class="nav-link" href="/vender" role="button" aria-expanded="false"> Vender</a>
                </ul>
                <ul class="nav-item">
                    <a class="nav-link" href="/nosotros" role="button" aria-expanded="false"><i class="fa-solid fa-people-group"></i> Nosotros</a>
                </ul>
                <ul class="nav-item">
                    <a class="nav-link" href="/contacto" role="button" aria-expanded="false"><i class="fa-solid fa-address-book"></i> Contacto</a>
                </ul>
                <div class="login">
                    <ul class="nav-item">
                        <a class="nav-link" href="/login" role="button" aria-expanded="false"><i class="fa-solid fa-user"></i> Login</a>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>