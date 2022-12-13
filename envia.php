<?php
$destinatario = 'marianadasilvasantos6@gmail.com';
$remetente = 'mariiisilva05s@gmail.com';
$assunto = 'Contato pelo site';
$redirecionar_para = SITE_URL.'/sucesso';


if(isset($_POST['acao']) && $_POST['acao'] == "enviarMensagem") {
   
 
    $erros = [];
    if (empty($_POST['nome'])) {
        $erros[] = 'Nome não preenchido';
    }
    if (empty($_POST['telefone']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'Telefone não preenchido';
    }
    if (empty($_POST['email'])) {
        $erros[] = 'Email não preenchido ou inválido';
    }
     if (empty($_POST['mensagem'])) {
        $erros[] = 'Mensagem não preenchido ou inválido';
    }
   
  if (!$erros) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $reverso = gethostbyaddr($ip);
    if ($reverso == $ip)
      $origem = $ip;
    else
      $origem = "$ip ($reverso)";
    $de = $_POST['nome']." - ".$_POST['email'];

    $corpo = '<div style="text-align: -webkit-center; background:transparent;">
    <div style="width:600px; height:800px !important; text-align: -webkit-left;">
        <div style="background: #f2d205; padding: 20px;">
            <img width="120px" src="https://www.crossxperience.com.br/img/1648494173.2344-logo_principal-N.png">
            <div style="text-align: center; color: white; ">
                <h1 style="font-weight: 100;">Solicitação de contato via site</h1>
            </div>
        </div>
        <div style=" padding: 20px; background-color: #faf7f7;">
            <div style="padding: 0 50px;">
                <p style="color: rgb(85, 85, 85); font-size: 14px;"> Nome: '. $_POST['nome'] .'</p>
                <p style="color: rgb(85, 85, 85); font-size: 14px;"> Telefone: '. $_POST['telefone'] .'</p>
                <p style="color: rgb(85, 85, 85); font-size: 14px;"> Email: '. $_POST['email'] .'</p>
                <p style="color: rgb(85, 85, 85); font-size: 14px;"> Mensagem: '. $_POST['mensagem'] .'</p>
               
            </div>
        </div>


        <div style="background: #f2d205; text-align: center; padding: 20px;">
            
                <br>
                <br>
                <img width="150px" src="https://www.crossxperience.com.br/img/1648494173.2344-logo_principal-N.png" alt="logo">


        

        </div>
    </div>
</div>';

    $headers  = "From: $remetente\n";
    $headers .= "Reply-To: $de";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\n";

    if (mail($destinatario, $assunto, $corpo, $headers, "-f$remetente")) {
      echo "<script>alert('Mensagem enviada com sucesso');window.location='.';</script>";
      header("Location: $redirecionar_para");
      exit;
    } else {
      $erros[] = 'Erro ao mandar seu e-mail, por favor tente novamente mais tarde';
    }
  }
}
?>