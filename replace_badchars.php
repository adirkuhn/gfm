<?php
ini_set('display_errors', 1);

function pega_arquivo_replace_callback(array $matches) {

    $badChars = array(
        '&ndash;',
    );

    $replaceChars = array(
        '-',
    );

    return str_replace($badChars, $replaceChars, $matches[0]);
}

function pega_arquivo_xml($arquivo) {

    $pattern = "@<url>(.*)</url>@i";

    $xml_corrigido = preg_replace_callback($pattern, "pega_arquivo_replace_callback", file_get_contents($arquivo));

    return $xml_corrigido;
}




echo "<pre>";
echo pega_arquivo_xml("(update)FLEURY_doenças_sem45.xml");
echo "</pre>";