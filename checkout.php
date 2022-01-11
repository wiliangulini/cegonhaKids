<?php
$plano = $_GET['plano'];

if($plano == 'unico'){
  $txt = 'Plano Avulso';
  $valor_plano = "119.90";
}

if($plano == 'completo'){
  $txt = 'Plano Completo';
  $valor_plano = "99.90";
}

if($plano == 'semestral'){
  $txt = 'Plano Semestral';
  $valor_plano = "109.90";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Checkout - Cegonha Kids</title>
  <meta name="viewport" content="width=device-width, user-scalable=0">
  <meta name="robots" content="index, follow" />
  <meta name="author" content="Gabriel Oliveira, Guilherme Menegussi, Wilian Gulini" />
  <meta name="description" content="Cegonha Kids" />
  <meta name="keywords" content="cegonha kids" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/bd-wizard.css" />
  <link rel="stylesheet" href="assets/css/checkout.css" />

  <style>
    .cegonhaCall,.maecegonha{
      display: none!important;
    }
    .select{
      padding: 16px 20px;
      min-height: 50px;
      max-width: 550px;
      border-radius: 4px;
      border: solid 1px #ececec;
      width: 100%;
    }
    .calcular-frete{
      border: none;
      background-color: #fe852d;
      color: #fff!important;
      padding: 10px  10px;
      border-radius: 4px;
    }

    .section-heading{
      font-family: "Kidsbar";
      color: #2E4B94!important;
      font-size: 24px;
      margin-top: -20px!important;
    }

    .azul{
      background-color: #2e4b94!important;
    }

    .rosa{
      background-color: #f26179!important;
    }

    .verde{
      background-color: #16aaaa!important;
    }

    .amarelo{
      background-color: #ffe47c!important;
    }
    .cart{
      width: 100%;
      position: relative;
      background-color: #2e4b94;
      color: #fff!important;
      border-radius: 5px;
    }

    .cart h3{
      font-family: "Kidsbar";
      color: #fff!important;
      font-size: 18px;
      padding: 15px 10px 2px 5px;
    }
    .cart p{
      padding: 10px 10px 2px 5px;
    }
  </style>
</head>
<body>
  <?php include "assets/includes/header_checkout.php"; ?>
  <form id="checkout" method="post"/>
    <input type="hidden" name="token" id="token" value=""/>
    <input type="hidden" name="plano" value="<?php echo $plano;?>"/>
    <input type="hidden" name="valor_plano" value="<?php echo $valor_plano;?>"/>
    <input type="hidden" name="frete" id="frete" value="10"/>
    <main class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div id="wizard">
              <h3>
                <div class="media">
                  <div class="bd-wizard-step-icon rosa"><i class="mdi mdi-account-outline"></i></div>
                  <div class="media-body">
                    <div class="bd-wizard-step-title">Dados</div>
                    <div class="bd-wizard-step-subtitle">Etapa 1</div>
                  </div>
                </div>
              </h3>
              <section>
                <div class="content-wrapper">
                  <h4 class="section-heading">Preencha com suas informações pessoais:</h4>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <p>Nome Completo</p>
                      <input type="text" name="primeironome" id="nomecompleto" class="form-control" required placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <p>E-mail válido</p>
                      <input type="email" name="email" id="emailvalido" class="form-control" required placeholder="" >
                    </div>

                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <p>Celular</p>
                      <input type="text" name="celular" required id="celular" class="form-control telefone" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <p>Escolha uma senha</p>
                      <input type="password" name="senha" id="senha" required class="form-control" placeholder="" autocomplete="no">
                    </div>
                  </div>
                  <br/>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                      <h6>Declaro que li todos os <a href="#!">termos e condições</a> e que todos os detalhes fornecidos neste formulário são verdadeiros.</h6>
                    </label>
                  </div>
                </div>
              </section>
              <h3>
                <div class="media">
                  <div class="bd-wizard-step-icon verde"><i class="mdi mdi-chart-bubble" style="color: #fff!important;"></i></div>
                  <div class="media-body">
                    <div class="bd-wizard-step-title">Perfil</div>
                    <div class="bd-wizard-step-subtitle">Etapa 2</div>
                  </div>
                </div>
              </h3>
              <section>
                <div class="content-wrapper">
                  <h4 class="section-heading">Complete seu perfil Mamãe e Bebê</h4>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <p>Primeiro Nome do Pequeno</p>
                      <input type="text" name="nomepequeno" id="nomepequeno" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <p>Selecione o sexo </p>
                      <select name="sexo" id="sexo" required class="select">
                        <option value="menino" selected>Menino</option>
                        <option value="menina">Menina</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <p>Data de nascimento do Pequeno</p>
                      <input type="date" name="datanascimento" id="datanascimento" class="form-control" placeholder="Data de Nascimento do Pequeno">
                    </div>
                  </div>
                </div>
              </section>
              <h3>
                <div class="media">
                  <div class="bd-wizard-step-icon amarelo"><i class="mdi mdi-truck" style="color: #fff!important;"></i></div>
                  <div class="media-body">
                    <div class="bd-wizard-step-title">Entrega </div>
                    <div class="bd-wizard-step-subtitle">Etapa 3</div>
                  </div>
                </div>
              </h3>
              <section>
                <div class="content-wrapper">
                <h4 class="section-heading mb-5">Informe seu endereço de entrega</h4>

                <div class="row">
                  <div class="form-group col-md-6">
                    <p>CEP</p>
                    <input type="text" name="cep" id="cep" class="form-control"  placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <p>Qual sua cidade? </p>
                    <input type="text" name="cidade" id="cidade" class="form-control"  placeholder="">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <p>Digite sua Rua</p>
                    <input type="text" name="rua" id="rua" class="form-control"  placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <p>Número</p>
                    <input type="number" name="numero" id="rua" class="form-control"  placeholder="">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <p>Complemento (EX: Apartamento 102)</p>
                    <input type="text" name="complemento" id="complemento" class="form-control"  placeholder="">
                  </div>

                  <div class="form-group col-md-6">
                    <p>Qual seu estado? (UF)</p>
                    <select id="estado" name="estado" class="select">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <p>Bairro</p>
                    <input type="text" name="bairro" id="bairro" class="form-control"  placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <br/><br/>
                    <button class="calcular-frete" id="calcular-frete">Calcular Frete</button>
                  </div>
                </div>

                <br/><br/>
                </div>
              </section>
              <h3>
                <div class="media">
                  <div class="bd-wizard-step-icon azul"><i class="mdi mdi-credit-card-multiple" style="color: #fff!important;"></i></div>
                  <div class="media-body">
                    <div class="bd-wizard-step-title">Pagamento</div>
                    <div class="bd-wizard-step-subtitle">Etapa 4</div>
                  </div>
                </div>
              </h3>
              <section>
                <div class="content-wrapper">
                  <h4 class="section-heading mb-5">Como deseja pagar? (Cartão, boleto ou PIX)</h4>
                  <select id="metodo_de_pagamento" name="metodo_de_pagamento" class="select">
                    <option>Cartão de Crédito</option>
                    <option>Boleto Bancário</option>
                    <option>PIX</option>
                  </select>
                  <br/><br/>

                  <div id="form-cartao">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <p>Número do Cartão</p>
                        <input type="text" name="numcartao" id="numcartao" data-iugu="number" class="form-control" required placeholder="" value="5162926271524729">
                      </div>
                      <div class="form-group col-md-6">
                        <p>Nome Títular do Cartão</p>
                        <input type="text" name="nomecartao" id="nomecartao" data-iugu="full_name" class="form-control" required placeholder="" value="Gregory W Primel">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <p>Validade</p>
                        <input type="text" name="validade" id="validade" data-iugu="verification_value" class="form-control" required placeholder="" value="04/29">
                      </div>
                      <div class="form-group col-md-6">
                        <p>Código de Segurança</p>
                        <input type="number" name="codigo" id="codigo" data-iugu="expiration" class="form-control" required placeholder="" value="455">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <p>CPF</p>
                        <input type="text" name="cpf" id="cpf" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <p><b>Total da compra (R$)</b></p>
                        <input type="text" name="total" id="total" class="form-control" required value="<?php echo $valor_plano+10;?>" disabled>
                      </div>
                      <br/><br/>
                    </div>
                  </div>


                  <div id="form-boleto" style="display:none;">

                    <div class="row">
                      <div class="form-group col-md-6">
                        <p>CPF</p>
                        <input type="text" name="cpfboleto" id="cpfboleto" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <p><b>Total da compra (R$)</b></p>
                        <input type="text" name="total" id="total" class="form-control" required value="119.65" disabled>
                      </div>
                      <br/><br/>
                    </div>
                    <br/>
                    <div class="alert alert-info" role="alert">
                      <i class="mdi mdi-email"></i> Você receberá seu boleto no e-mail que preencheu na Etapa 1.
                    </div>
                  </div>

                  <div id="form-pix" style="display:none;">

                    <div class="row">
                      <div class="form-group col-md-6">
                        <p>CPF</p>
                        <input type="text" name="cpfpix" id="cpfpix" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <p><b>Total da compra (R$)</b></p>
                        <input type="text" name="total" id="total" class="form-control" required value="<?php echo $valor_plano+10;?>" disabled>
                      </div>
                      <br/><br/>
                    </div>
                    <br/>
                    <div class="alert alert-info" role="alert">
                      <i class="mdi mdi-email"></i>  Você receberá o PIX para pagamento no e-mail que preencheu na Etapa 1.
                    </div>
                  </div>

                </div>
              </section>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="cart">
              <center><h3><i class="mdi mdi-cart"></i> Seu Carrinho</h3></center>
              <hr/>
              &nbsp<b>Itens:</b>
              <p><i class="mdi mdi-check"></i> <?php echo $txt;?> - R$<?php echo $valor_plano;?></p>
              <p><i class="mdi mdi-check"></i> Frete - R$10 (fixo)</p>
              <hr/>
              <p><b>Total da compra: R$<?php echo $valor_plano+10;?></b></p>
              <br/>
              <center><img src="selo.png" width="60%"/></center>
              <br/>
            </div>
          </div>
        </div>
      </div>
    </main>
  </form>

  <?php include "assets/includes/footer.php" ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="assets/js/jquery.steps.min.js"></script>
  <script src="assets/js/bd-wizard.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="https://js.iugu.com/v2"></script>
  <script src="assets/js/checkout.js"></script>
  <script src="engenharia-digital/js/entrega.js"></script>

</body>
</html>
