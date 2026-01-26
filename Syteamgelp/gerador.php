<?php
/**
 * Gera todas as combinações possíveis da Mega-Sena (6 números entre 1 e 60)
 * e salva no arquivo "megasena_combinacoes.txt"
 *
 * ATENÇÃO:
 * - Isso gera 50.063.860 combinações
 * - O arquivo final terá quase 1 GB
 * - Rode isso preferencialmente em um servidor/PC forte e via CLI
 */

$arquivoSaida = "megasena_combinacoes.txt";

$handle = fopen($arquivoSaida, "w");
if (!$handle) {
    die("Não foi possível criar o arquivo {$arquivoSaida}\n");
}

$total = 0;

// Primeiro número vai de 1 até 55
for ($a = 1; $a <= 55; $a++) {
    // Segundo número sempre maior que o primeiro
    for ($b = $a + 1; $b <= 56; $b++) {
        for ($c = $b + 1; $c <= 57; $c++) {
            for ($d = $c + 1; $d <= 58; $d++) {
                for ($e = $d + 1; $e <= 59; $e++) {
                    for ($f = $e + 1; $f <= 60; $f++) {

                        // Formata os números com 2 dígitos (01, 02, ..., 60)
                        $linha = sprintf(
                            "%02d %02d %02d %02d %02d %02d\n",
                            $a, $b, $c, $d, $e, $f
                        );

                        fwrite($handle, $linha);
                        $total++;

                        // Opcional: mostrar progresso no terminal
                        // if ($total % 1000000 === 0) {
                        //     echo "Geradas: {$total} combinações...\n";
                        // }
                    }
                }
            }
        }
    }
}

fclose($handle);

echo "Concluído! Total de combinações geradas: {$total}\n";
echo "Arquivo criado: {$arquivoSaida}\n";
