<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Educa-se</title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles-home.css" rel="stylesheet" />
        <script src="jogo.js"></script>
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Educa-se</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php">Log-out</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
  <section class="game_board">
    <div class="row">
      <div class="cell square" id="casa7">
        <p id="casa7-nome" class="square-name"></p>
        <p id="casa7-valor"></p>
        <p id="casa7-dono"></p>
        <p id="casa7-morador"></p>
      </div>
      <div class="cell square" id="casa8">
        <p id="casa8-nome" class="square-name"></p>
        <p id="casa8-valor"></p>
        <p id="casa8-dono"></p>
        <p id="casa8-morador"></p>
      </div>
      <div class="cell square" id="casa9">
        <p id="casa9-nome" class="square-name"></p>
        <p id="casa9-valor"></p>
        <p id="casa9-dono"></p>
        <p id="casa9-morador"></p>
      </div>
      <div class="cell square" id="casa10">
        <p id="casa10-nome" class="square-name"></p>
        <p id="casa10-valor"></p>
        <p id="casa10-dono"></p>
        <p id="casa10-morador"></p>
      </div>
      <div class="cell info">
        <p>Turno:</p>
        <p id="turnoAtual">João</p>
        <button id="rolarDado">Rolar!</button>
      </div>
    </div>
    <div class="row">
      <div class="cell square" id="casa6">
        <p id="casa6-nome" class="square-name"></p>
        <p id="casa6-valor"></p>
        <p id="casa6-dono"></p>
        <p id="casa6-morador"></p>
      </div>
      <div class="cell middle"></div>
      <div class="cell middle"></div>
      <div class="cell square" id="casa11">
        <p id="casa11-nome" class="square-name"></p>
        <p id="casa11-valor"></p>
        <p id="casa11-dono"></p>
        <p id="casa11-morador"></p>
      </div>
      <div class="cell info">
        <p>Ultima Mensagem:</p>
        <p id="messagePara"></p>

      </div>
    </div>
    <div class="row">
      <div class="cell square" id="casa5">
        <p id="casa5-nome" class="square-name"></p>
        <p id="casa5-valor"></p>
        <p id="casa5-dono"></p>
        <p id="casa5-morador"></p>
      </div>
      <div class="cell middle"></div>
      <div class="cell middle"></div>
      <div class="cell square" id="casa12">
        <p id="casa12-nome" class="square-name"></p>
        <p id="casa12-valor"></p>
        <p id="casa12-dono"></p>
        <p id="casa12-morador"></p>
      </div>
      <div class="cell info" id="jogador1-informacao">
        <p>Jogador 1</p>
        <p id="jogador1-informacao_nome">Nome</p>
        <p id="jogador1-informacao_peao"></p>
        <p id="jogador1-informacao_dinheiro">Carteira</p>
      </div>
    </div>
    <div class="row">
      <div class="cell square" id="casa4">
        <p id="casa4-nome" class="square-name"></p>
        <p id="casa4-valor"></p>
        <p id="casa4-dono"></p>
        <p id="casa4-morador"></p>
      </div>
      <div class="cell square" id="casa3">
        <p id="casa3-nome" class="square-name"></p>
        <p id="casa3-valor"></p>
        <p id="casa3-dono"></p>
        <p id="casa3-morador"></p>
      </div>
      <div class="cell square" id="casa2">
        <p id="casa2-nome" class="square-name"></p>
        <p id="casa2-valor"></p>
        <p id="casa2-dono"></p>
        <p id="casa2-morador"></p>
      </div>
      <div class="cell start" id="casa1">
        <p class="square-name">Iniciar</p>
        <p id="casa1-morador"></p>
      </div>
      <div class="cell info" id="jogador2-informacao">
        <p>Jogador 2</p>
        <p id="jogador2-informacao_nome">Nome</p>
        <p id="jogador2-informacao_peao"></p>
        <p id="jogador2-informacao_dinheiro">Carteira</p>
      </div>


    </div>

  </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>