

window.onload = function() {
    //acha o botão de rolar o dado e faz o bind com o método de jogar o turno
    var rolarDado = document.getElementById("rolarDado");
    rolarDado.onclick = Jogo.jogaTurno;
  
    //inicia o tabuleiro
    Jogo.popularTabuleiro();
  };
  
  var Jogo = (function() {
    //cria o tabuleiro que contém as casas, os métodos e os jogadores
    var jogo = {};

    //cria um array de casas do tabuleiro do jogo
    //cada uma tem suas características únicas
    //e são criadas individualmente
    jogo.casas = [
      new Casa("Rua São José", 100, "casa2"),
      new Casa("Rua São Paulo", 150, "casa3"),
      new Casa("Rua Santo Antônio", 200, "casa4"),
      new Casa("Avenida Brasil", 250, "casa5"),
      new Casa("Rua São Pedro", 300, "casa6"),
      new Casa("Rua São João ", 350, "casa7"),
      new Casa("Rua São Francisco", 400, "casa8"),
      new Casa("Rua Sete de Setembro", 450, "casa9"),
      new Casa("Rua Quinze de Novembro", 500, "casa10"),
      new Casa("Rua Tiradentes", 550, "casa11"),
      new Casa("Avenida Paulista", 600, "casa12")
    ];
  
    //cria um array de jogadores
    jogo.jogadores = [
      new Jogador("João", 1000, "Triangle", "jogador1"),
      new Jogador("Maria", 1000, "Circle", "jogador2")
    ];
  
    //define o jogador atual a partir do array de jogadores
    jogo.jogadorAtual = 0;
  
    //método para adicionar as casas ao tabuleiro
    jogo.popularTabuleiro = function() {
      //percorre todas as casas do tabuleiro
      for (var i = 0; i < this.casas.length; i++) {
        //pega o ID casa e acha a sua div
        var id = this.casas[i].casaID;
  
        //adiciona as informações das casas
        var casaNome = document.getElementById(id + "-nome");
        var casaValor = document.getElementById(id + "-valor");
        var casaDono = document.getElementById(id + "-dono");
  
        casaNome.innerHTML = this.casas[i].nome;
        casaValor.innerHTML = "R$" + this.casas[i].valor;
        casaDono.innerHTML = this.casas[i].dono;
      }
  
      //acha a casa inicial e coloca os jogadores
      var casa1 = document.getElementById("casa1-morador");
      for (var i = 0; i < jogo.jogadores.length; i++) {
        //usando uma função privada para criar os peões
        jogo.jogadores[i].criaPeao(casa1);
      }
  
      //preenche o painel de informações
      atualizaPeloID("jogador1-informacao_nome", jogo.jogadores[0].nome);
      atualizaPeloID("jogador1-informacao_dinheiro", jogo.jogadores[0].dinheiro);
      atualizaPeloID("jogador2-informacao_nome", jogo.jogadores[1].nome);
      atualizaPeloID("jogador2-informacao_dinheiro", jogo.jogadores[1].dinheiro);
    };
  
    //função que faz o turno do jogador
    //joga o dado
    //avança as casas
    //chama a função para comprar ou cobrar aluguel
    jogo.jogaTurno = function() {
      //joga o dado e move o jogador
      moveJogador();
  
      //checa a casa que o jogador caiu
      //se não tiver dono, pergunta se quer comprar
      //se tiver dono, cobra auguel
      checaCasa();
  
      //condição de fim de jogo
      //se o jogador atual ficar com menos de 0 de dinheiro ele perde
      if (jogo.jogadores[jogo.jogadorAtual].dinheiro < 0) {
        alert("Mandou mal " + jogo.jogadores[jogo.jogadorAtual].nome + ", você perdeu!");
      }
  
      //avança para o próximo jogador
      jogo.jogadorAtual = proximoJogador(jogo.jogadorAtual);
  
      //atualiza o painel de informações com o jogador atual
      atualizaPeloID("turnoAtual", jogo.jogadores[jogo.jogadorAtual].nome);
    };
  
    //função que avança para o próximo jogador
    function proximoJogador(jogadorAtual) {
      var proximoJogador = jogadorAtual + 1;
  
      if (proximoJogador == jogo.jogadores.length) {
        return 0;
      }
  
      return proximoJogador;
    }
  
    //função para jogar o dado e avançar as casas
    function moveJogador() {
      //joga o dado
      var movimento = Math.floor(Math.random() * (4 - 1) + 1);
      //usamos total de casas mais 1 porque o início não está no array de casas
      var totalCasas = jogo.casas.length + 1;
      //pega o jogador atual e qual casa ele está
      var jogadorAtual = jogo.jogadores[jogo.jogadorAtual];
      var casaAtual = parseInt(jogadorAtual.casaAtual.slice(4));

      //descobre se o jogador passou pelo início e dá o prêmio se sim
      if (casaAtual + movimento <= totalCasas) {
        var proximaCasa = casaAtual + movimento;
      } else {
        var proximaCasa = casaAtual + movimento - totalCasas;
        jogadorAtual.atualizaDinheiro(jogadorAtual.dinheiro + 100);
        console.log("Prêmio de R$100 por passar pelo início!");
      }

      //atualiza a casa atual
      jogadorAtual.casaAtual = "casa" + proximaCasa;

      //acha e remove o peão do jogador atual
      var peaoAtual = document.getElementById(jogadorAtual.id);
      peaoAtual.parentNode.removeChild(peaoAtual);

      //adiciona o peão à casa
      jogadorAtual.criaPeao(
        document.getElementById(jogadorAtual.casaAtual)
      );
    }
  
    //checa se o jogador pode fazer a ação
    function checaCasa() {
      var jogadorAtual = jogo.jogadores[jogo.jogadorAtual];
      var casaAtualId = jogadorAtual.casaAtual;
      var casaAtualObj = jogo.casas.filter(function(casa) {
        return casa.casaID == casaAtualId;
      })[0];
  
      //checa se o jogador caiu no início
      if (casaAtualId == "casa1") {
        jogadorAtual.atualizaDinheiro(jogadorAtual.dinheiro + 100);
        atualizaPeloID(
          "messagePara",
          jogadorAtual.nome + ": Você caiu no início e ganhou R$100!"
        );
      } else if (casaAtualObj.dono == "À venda") {
        //checa se a casa tem dono e se o jogador tem dinheiro pra comprar
        if (jogadorAtual.dinheiro <= casaAtualObj.valor) {
          atualizaPeloID(
            "messagePara",
            jogadorAtual.nome +
              ": Desculpe, você não tem dinheiro suficiente para comprar."
          );
          return;
        }
  
        //prompt para comprar
        var compra = window.confirm(
          jogadorAtual.nome +
            ": Essa propriedade não tem dono. Você quer comprar por R$" +
            casaAtualObj.valor +
            "?"
        );
        //se o jogador escolher sim
        if (compra) {
          //atualiza o dono
          casaAtualObj.dono = jogadorAtual.id;
          //atualiza o dinheiro
          jogadorAtual.atualizaDinheiro(jogadorAtual.dinheiro - casaAtualObj.valor);
          //mensagem de confirmação
          atualizaPeloID(
            "messagePara",
            jogadorAtual.nome + ": você tem R$" + jogadorAtual.dinheiro + "agora."
          );
          //atualiza o dono no tabuleiro
          atualizaPeloID(
            casaAtualObj.casaID + "-dono",
            "Dono: " + jogo.jogadores[jogo.jogadorAtual].nome
          );
        }
      } else if (casaAtualObj.dono == jogadorAtual.id) {
        //se o jogador atual for o dono
        atualizaPeloID(
          "messagePara",
          jogadorAtual.nome + ": Você é o dono dessa propriedade. Obrigado por visitar!"
        );
      } else {
        //cobra aluguel
        atualizaPeloID(
          "messagePara",
          jogadorAtual.nome +
            ": O dono dessa propriedade é " +
            casaAtualObj.dono +
            ". Você deve R$" +
            casaAtualObj.rent +
            ". Você tem R$" +
            jogadorAtual.dinheiro +
            " agora."
        );
  
        var dono = jogo.jogadores.filter(function(jogador) {
          return jogador.id == casaAtualObj.dono;
        });
        jogadorAtual.atualizaDinheiro(jogadorAtual.dinheiro - casaAtualObj.rent);
      }
    }

    //atualiza o valor pelo ID
    function atualizaPeloID(id, mensagem) {
      document.getElementById(id).innerHTML = mensagem;
    }
  
    //Construtores

    //construtor Casa
    function Casa(nome, valor, casaID) {
      //nome da propriedade
      this.nome = nome;
      //valor de compra
      this.valor = valor;
      //valor do aluguel (30% do valor de compra)
      this.rent = valor * 0.3;
      //posição no tabuleiro
      this.casaID = casaID;
      //dono (padrão À venda)
      this.dono = "À venda";
    }

    //contrutor jogador
    function Jogador(nome, dinheiro, peao, id) {
      this.nome = nome;
      this.dinheiro = dinheiro;
      this.peao = peao;
      this.id = id;
      this.casaAtual = "casa1";
      this.casasCompradas = [];
    }

    //método para criar um peão do jogador na casa apropriada
    Jogador.prototype.criaPeao = function(casa) {
      var jogadorPeao = document.createElement("span");
      jogadorPeao.setAttribute("class", this.peao);
      jogadorPeao.setAttribute("id", this.id);
      casa.appendChild(jogadorPeao);
    };

    //método para atualizar o dinheiro
    Jogador.prototype.atualizaDinheiro = function(quantidade) {
      document.getElementById(this.id + "-informacao_dinheiro").innerHTML = quantidade;
      this.dinheiro = quantidade;
    };
  
    return jogo;
  })();