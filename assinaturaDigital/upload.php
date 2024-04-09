<?php

require_once 'fpdf186/fpdf.php';
require_once 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Verifica se um arquivo foi enviado
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK && is_uploaded_file($_FILES["file"]["tmp_name"])) {

        // Define o diretório de destino para salvar o arquivo
        $pasta = "assinaturas/";
        if(!is_dir($pasta)){
            mkdir($pasta,0755);
        }
        
        // Gera um nome de arquivo único
        $fileName = uniqid() . "_" . $_FILES["file"]["name"];
        
        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $pasta . $fileName)) {
           
            // Verifica se a assinatura foi enviada
            if (!empty($_POST["signature"])) {
                // Caminho do documento enviado
                $documentoPath = $pasta . $fileName;

                // Caminho para salvar o documento assinado
                $documentoAssinadoPath = $pasta . "documento_assinado.pdf";

                // Inicia o PDF
                $pdf = new Fpdi(); 

                // Adiciona uma nova página ao documento
                $pdf->AddPage();

                // Carrega o documento enviado pelo usuário
                $pdf->setSourceFile($documentoPath);
                $tplIdx = $pdf->importPage(1); // Importa a primeira página do documento
                $pdf->useTemplate($tplIdx, 0, 0, 210); // Adiciona a página do documento ao novo PDF

                // Adiciona a imagem da assinatura
                $pdf->Image($_POST["signature"], $pdf->GetPageWidth() - 50, $pdf->GetPageHeight() - 30, 50); 

                // Salva o PDF com a assinatura no mesmo arquivo
                $pdf->Output($documentoPath,'F');

                echo "Documento enviado e assinado com sucesso!";
            } else {
                echo "Por favor, assine o documento antes de enviar.";
            }
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    } else {
        echo "Por favor, selecione um arquivo para enviar.";
    }
}

?>