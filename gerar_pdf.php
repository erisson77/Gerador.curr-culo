<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Carrega o autoloader do Composer
require_once __DIR__ . '/vendor/autoload.php';

// Referencia a classe mPDF
use Mpdf\Mpdf;

// Pega os dados do formulário
// Usamos htmlspecialchars para evitar problemas de XSS simples
$nome = htmlspecialchars($_POST['nome']);
$email = htmlspecialchars($_POST['email']);
$telefone = htmlspecialchars($_POST['telefone']);
$linkedin = htmlspecialchars($_POST['linkedin']);
$resumo = nl2br(htmlspecialchars($_POST['resumo'])); // nl2br preserva quebras de linha

// === Montando o HTML do Currículo ===
// Esta é a parte mais importante. 
// Você está "desenhando" o PDF com HTML e CSS.
// O mpdf suporta CSS interno (tag <style>) muito bem.

$html = "
<html>
<head>
    <style>
        body { font-family: 'Arial', sans-serif; }
        h1 { color: #333; border-bottom: 2px solid #333; padding-bottom: 5px; }
        h2 { color: #555; border-bottom: 1px solid #ccc; padding-bottom: 3px; margin-top: 25px;}
        .contato { font-size: 1.1em; margin-bottom: 15px; }
        .resumo { background-color: #f4f4f4; padding: 10px; border-radius: 5px; }
        .item { margin-bottom: 15px; }
        .cargo { font-size: 1.2em; font-weight: bold; }
        .empresa { font-size: 1.1em; color: #555; }
        .periodo { font-style: italic; color: #777; }
        .curso { font-size: 1.1em; font-weight: bold; }
    </style>
</head>
<body>
    <h1>{$nome}</h1>
    <div class='contato'>
        Email: {$email} | Telefone: {$telefone}<br>
        LinkedIn: {$linkedin}
    </div>

    <h2>Resumo Profissional</h2>
    <div class='resumo'>
        {$resumo}
    </div>

    <h2>Experiência Profissional</h2>
";

// Loop pelas Experiências (lembra dos arrays 'cargo[]', 'empresa[]'?)
if (isset($_POST['cargo']) && is_array($_POST['cargo'])) {
    for ($i = 0; $i < count($_POST['cargo']); $i++) {
        $cargo = htmlspecialchars($_POST['cargo'][$i]);
        $empresa = htmlspecialchars($_POST['empresa'][$i]);
        $periodo = htmlspecialchars($_POST['periodo'][$i]);

        if (!empty($cargo)) {
            $html .= "
            <div class='item'>
                <div class='cargo'>{$cargo}</div>
                <div class='empresa'>{$empresa}</div>
                <div class='periodo'>{$periodo}</div>
            </div>";
        }
    }
}

$html .= "<h2>Formação Acadêmica</h2>";

// Loop pela Formação
if (isset($_POST['curso']) && is_array($_POST['curso'])) {
    for ($i = 0; $i < count($_POST['curso']); $i++) {
        $curso = htmlspecialchars($_POST['curso'][$i]);
        $instituicao = htmlspecialchars($_POST['instituicao'][$i]);

        if (!empty($curso)) {
            $html .= "
            <div class='item'>
                <div class='curso'>{$curso}</div>
                <div>{$instituicao}</div>
            </div>";
        }
    }
}

$html .= "
</body>
</html>
";

// === Geração do PDF ===

// Cria uma instância do mPDF
$mpdf = new Mpdf();

// Escreve o HTML na instância do mPDF
$mpdf->WriteHTML($html);

// Define o nome do arquivo e força o download (ou exibição no navegador)
// 'I' = Abre no navegador (inline)
// 'D' = Força o download
// 'F' = Salva no servidor
$mpdf->Output('curriculo.pdf', 'I'); 

exit; // Termina o script

?>