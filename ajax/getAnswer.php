<?php
/* Abre o xml que contém as sentenças */
$link = "../dicionary/sentences.aiml";
$xml = simplexml_load_file($link);

$msg = "";

$map = array(
    'á' => 'a',
    'à' => 'a',
    'ã' => 'a',
    'â' => 'a',
    'é' => 'e',
    'ê' => 'e',
    'í' => 'i',
    'ó' => 'o',
    'ô' => 'o',
    'õ' => 'o',
    'ú' => 'u',
    'ü' => 'u',
    'ç' => 'c',
    'Á' => 'A',
    'À' => 'A',
    'Ã' => 'A',
    'Â' => 'A',
    'É' => 'E',
    'Ê' => 'E',
    'Í' => 'I',
    'Ó' => 'O',
    'Ô' => 'O',
    'Õ' => 'O',
    'Ú' => 'U',
    'Ü' => 'U',
    'Ç' => 'C',
    '.' => '',
    '!' => '',
    '?' => ' com voce',
    ',' => '',
    ':' => '',
    ';' => '',
    '(' => '',
    ')' => '',
    '{' => '',
    '}' => '',
    '[' => '',
    ']' => '',
    '´' => '',
    '`' => '',
    '^' => '',
    '~' => '',
    '*' => '',
    '@' => '',
    '#' => '',
    '$' => '',
    '"' => '',
    '%' => '',
    '¨' => '',
    '-' => '',
    '_' => '',
    '+' => '',
    '/' => '',
    '=' => '',
    '>' => '',
    '<' => '',
    '|' => ''
);

$userQuote = utf8_decode($_GET["userQ"]);

$sentence = strtr($userQuote, $map);

/* Para cada pergunta, verifica a existência da resposta equivalente ou semelhante */
foreach ($xml as $x) {
    if(strtoupper($x->pattern) == strtoupper($sentence)) {
        $msg = $x->template;
    }
}
if ($msg == "") {
    foreach ($xml as $x) {
        if(stripos(strtoupper($sentence), strtoupper($x->pattern)) !== false) {
            $msg = $x->template;
        }
    }
}

print($msg);