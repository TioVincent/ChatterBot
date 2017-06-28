<?php
/* Abre o xml que cont�m as senten�as */
$link = "../dicionary/sentences.aiml";
$xml = simplexml_load_file($link);

$msg = "";

$map = array(
    '�' => 'a',
    '�' => 'a',
    '�' => 'a',
    '�' => 'a',
    '�' => 'e',
    '�' => 'e',
    '�' => 'i',
    '�' => 'o',
    '�' => 'o',
    '�' => 'o',
    '�' => 'u',
    '�' => 'u',
    '�' => 'c',
    '�' => 'A',
    '�' => 'A',
    '�' => 'A',
    '�' => 'A',
    '�' => 'E',
    '�' => 'E',
    '�' => 'I',
    '�' => 'O',
    '�' => 'O',
    '�' => 'O',
    '�' => 'U',
    '�' => 'U',
    '�' => 'C',
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
    '�' => '',
    '`' => '',
    '^' => '',
    '~' => '',
    '*' => '',
    '@' => '',
    '#' => '',
    '$' => '',
    '"' => '',
    '%' => '',
    '�' => '',
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

/* Para cada pergunta, verifica a exist�ncia da resposta equivalente ou semelhante */
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