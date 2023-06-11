<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
include_once('config.php');
$email_admin="eduardamanochio@gmail.com";

if (isset($_POST['cadastrar'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $wpp = mysqli_real_escape_string($conn, $_POST['wpp']);
    $data_registro = date('Y-m-d H:i:s');
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
    $marca = mysqli_real_escape_string($conn, $_POST['marca']);
    $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
    $ano = mysqli_real_escape_string($conn, $_POST['ano']);
    $defeito = mysqli_real_escape_string($conn, $_POST['defeito']);



    $registro = mysqli_query($conn, "INSERT INTO clientes_cadastrados (email, nome, wpp, data_registro, endereco, marca, modelo, ano, defeito)
    VALUES ('$email', '$nome', '$wpp','$data_registro', '$endereco', '$marca', '$modelo', '$ano','$defeito')");
    
        if ($registro) {
            echo "Registrado no banco de dados com sucesso!";
        } else {
            echo "Erro ao registrar dados: " . mysqli_error($conn);
        }
    
    
    

    ////enviar para o email

    if(isset($_POST['cadastrar'])){
        $nome = htmlentities($_POST['nome']);
        $email = htmlentities($_POST['email']);
        $wpp = htmlentities($_POST['wpp']);
        $marca = htmlentities($_POST['marca']);
        $modelo = htmlentities($_POST['modelo']);
        $ano = htmlentities($_POST['ano']);
        $defeito = htmlentities($_POST['defeito']);



    //enviar pro administrador
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'eduardamanochio@gmail.com';
        $mail->Password = 'hidkpguletrngdxf';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);
    
        $mail->setFrom($email, $nome);
        $mail->addAddress($email_admin);
        $mail->Subject = 'Novo Cadastro';
        $mail->Body = "Novo orçamento enviado com sucesso.\n";
        $mail->Body .= "Nome: " . $nome . "\n";
        $mail->Body .= "WhatsApp: " . $wpp . "\n";
        $mail->Body .= "Defeito: " . $defeito;        
        try {
            $mail->send();
            echo "Formulário enviado com sucesso! Logo entraremos em contato";
            exit;
        } catch (Exception $e) {
            echo "Erro ao enviar o email: {$mail->ErrorInfo}";
        }
    }
    
    

}
?>
