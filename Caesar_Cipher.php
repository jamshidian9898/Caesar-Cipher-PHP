<?php
error_reporting(E_ERROR | E_PARSE);
if (!is_null($_GET['encode'])) {
    for ($i = 1; $i < 27; $i++) {
        echo $i  . " => "  . Encipher($_GET['encode'], $i) . "</br></br>";
    }
    return;
}
if (isset($_GET['decode'])) {
    for ($i = 1; $i < 27; $i++) {
        echo $i  . "=>"  . Decipher($_GET['decode'], $i) . "</br></br>";
    }
    return;
}
echo "<pre>
How to use ? 
    replace your string in blow line and and add line end of the url then find your answer : 
        ?encode={string}    
        ?decode={string}        
    </pre>";
function Cipher($ch, $key)
{
    if (!ctype_alpha($ch))
        return $ch;

    $offset = ord(ctype_upper($ch) ? 'A' : 'a');
    return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function Encipher($input, $key)
{
    $output = "";

    $inputArr = str_split($input);
    foreach ($inputArr as $ch)
        $output .= Cipher($ch, $key);

    return $output;
}

function Decipher($input, $key)
{
    return Encipher($input, 26 - $key);
}
