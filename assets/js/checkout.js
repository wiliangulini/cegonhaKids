jQuery("input.telefone")
.mask("(99) 9999-9999?9")
.focusout(function (event) {
    var target, phone, element;
    target = (event.currentTarget) ? event.currentTarget : event.srcElement;
    phone = target.value.replace(/\D/g, '');
    element = $(target);
    element.unmask();
    if(phone.length > 10) {
        element.mask("(99) 99999-999?9");
    } else {
        element.mask("(99) 9999-9999?9");
    }
});

jQuery("#cep").mask('99999-999');

$('#datanascimento').focusout(function(){

  const now = new Date(); // Data de hoje
  const past = new Date(this.value); // Outra data no passado
  const diff = Math.abs(now.getTime() - past.getTime()); // Subtrai uma data pela outra
  const days = Math.ceil(diff / (1000 * 60 * 60 * 24)); // Divide o total pelo total de milisegundos correspondentes a 1 dia. (1000 milisegundos = 1 segundo).
  // Mostra a diferença em dias
  //alert('Entre 07/07/2014 até agora já se passaram ' + days + ' dias');
  const ano = days/365;

  if(ano < 1){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'info',
        title: 'O Cegonha Kids foi pensado com carinho para crianças de 1 à 3 anos. ',
        text: 'Seu pequeno tem menos de 1 ano de idade, por conta disso recomendamos o Cegonha Baby :)',
        footer: '<a href="">Visitar Cegonha Baby</a>'
      })
  }
  if(ano > 3){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'info',
        title: 'O Cegonha Kids foi pensado com carinho para crianças de 1 à 3 anos',
        text: 'O pequeno tem mais de 3 ano de idade. Agradecemos imensamente o interesse :)',
        footer: '<a href="">Voltar para site principal</a>'
      })
  }

});

$( "#calcular-frete" ).click(function() {
  Swal.fire({
      toast: true,
      showConfirmButton: true,
      icon: 'success',
      title: 'Frete: R$10.00',
      text: 'Tempo estimado de entrega: 8 a 12 dias úteis após a postagem',
    })
});


$('#metodo_de_pagamento').on('change', function() {
  var metodo =  this.value;

  if(metodo == 'PIX'){
    $('#form-cartao').hide();
    $('#form-boleto').hide();
    $('#form-pix').show();
  }
  if(metodo == 'Boleto Bancário'){
    $('#form-cartao').hide();
    $('#form-boleto').show();
    $('#form-pix').hide();

  }
  if(metodo == 'Cartão de Crédito'){
    $('#form-cartao').show();
    $('#form-boleto').hide();
    $('#form-pix').hide();

  }
});

jQuery("#cpf").mask("999.999.999-99");
jQuery("#cpfboleto").mask("999.999.999-99");
jQuery("#cpfpix").mask("999.999.999-99");
jQuery("#numcartao").mask('9999 9999 9999 9999');
jQuery("#validade").mask('99/99');

//validando dados do formulario
function confere_dados(){
  if($("#nomecompleto").val() == ''){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo Nome',
        text: 'Por gentelize, volte a etapa 1.',
    })
    return 1;
  }

  if($("#emailvalido").val() == ''){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo E-mail',
        text: 'Por gentelize, volte a etapa 1.',
    })
    return 1;
  }

  if($("#celular").val() == ''){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo Celular',
        text: 'Por gentelize, volte a etapa 1.',
    })
    return 1;
  }

  if($("#senha").val() == ''){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo Senha',
        text: 'Por gentelize, volte a etapa 1.',
    })
    return 1;
  }

  if($("#nomepequeno").val() == ''){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo Nome do Pequeno',
        text: 'Por gentelize, volte a etapa 2.',
    })
    return 1;
  }

  if($("#sexo").val() == ''){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo Sexo',
        text: 'Por gentelize, volte a etapa 2.',
    })
    return 1;
  }

  if( ($("#metodo_de_pagamento").val() == 'PIX') && ($("#cpfpix").val() == '') ){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo CPF',
        text: 'Por gentelize, verifique a etapa 4.',
    })
    return 1;
  }

  if( ($("#metodo_de_pagamento").val() == 'Boleto Bancário') && ($("#cpfboleto").val() == '') ){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo CPF',
        text: 'Por gentelize, verifique a etapa 4.',
    })
    return 1;
  }

  if( ($("#metodo_de_pagamento").val() == 'Cartão de Crédito') && ($("#cpf").val() == '') ){
    Swal.fire({
        toast: true,
        showConfirmButton: true,
        icon: 'error',
        title: 'Preencha o campo CPF',
        text: 'Por gentelize, verifique a etapa 4.',
    })
    return 1;
  }

}

function envia_checkout_servidor(dados){
  jQuery.ajax({
        type: "POST",
        url: "engenharia-digital/php/processa_checkout.php",
        data: dados,
        beforeSend: function(){
          Swal.fire({
           title: 'Aguarde',
           text: 'Estamos processando sua assinatura..',
           icon: 'info',
           showConfirmButton: false,
         })
        },
        success: function(data)
        {
            //alert(data);
            if(data == "sucesso"){
              Swal.fire({
                icon: 'success',
                title: 'UHUL! Assinatura efetuada com sucesso, ',
                text: 'Fique de olho em seu e-mail :)',
              })
            }
            if(data == "E-mail já utilizado! Por gentileza, volte a Etapa 1."){
              Swal.fire({
                icon: 'error',
                title: 'Esse e-mail já foi utilizado',
                text: 'Por gentileza, volte a etapa 1 e escolha outro :)',
              })
            }else{
              Swal.fire({
                icon: 'error',
                title: 'Impossivel concluir..',
                text: data,
              })
            }

        }

    });
}


//PROCESSAMENTO DO Checkout
function processa_checkout(){
  var dados = $("#checkout").serialize();
  //confere se algum dado faltou
  if(confere_dados() != 1){
    //é cartão de crédito?
    var tipo_pagamento = $("#metodo_de_pagamento").val();
    if(tipo_pagamento == "Cartão de Crédito"){
      var num_cartao = $("#numcartao").val();
      var titular_cartao = $("#nomecartao").val();
      var codigo = $("#codigo").val();
      var validade = $("#validade").val();
      var validade_array = validade.split("/");
      var mes =  validade_array[0];
      var ano =  validade_array[1];

      var titular_array = titular_cartao.split(" ");
      var primeiro_nome = titular_array[0];
      var ultimo_nome = '';
      for(var i = 1; i < titular_array.length; i++){
        var ultimo_nome = ultimo_nome + ' ' + titular_array[i];
      }

      //erro de vidação pode ser pela falta do formatter.js

      //valida cartão e gera token iugu
      Iugu.setAccountID("01F85CF6FB276605F6BC430C28E0DC5B");
      Iugu.setTestMode(false);
      //Iugu.setTestMode(true);
      //Iugu.setup();
      var cc = Iugu.CreditCard(num_cartao, mes, ano, primeiro_nome, ultimo_nome, codigo);

      var tokenResponseHandler = function(data) {
           if(data.errors) {
               Swal.fire({
                   toast: true,
                   showConfirmButton: true,
                   icon: 'error',
                   title: 'Falha ao Validar Cartão de Crédito',
                   text: 'Por gentelize, confira suas informações. Código interno do erro:' + JSON.stringify(data.errors),
                 })
           }else {
               $("#token").val(data.id);
               alert("token cartao de credito: "+$("#token").val());
               //envia_checkout_servidor(dados);
           }
           // Seu código para continuar a submissão
           // Ex: form.submit();
       }
      Iugu.createPaymentToken(cc, tokenResponseHandler);
    }else{
      envia_checkout_servidor(dados);
    }
  }
}
