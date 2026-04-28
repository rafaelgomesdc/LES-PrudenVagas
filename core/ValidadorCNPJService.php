<?php

class ValidadorCNPJService
{
    /**
     * Valida o CNPJ tanto pelo algoritmo quanto por uma API externa oficial.
     * Retorna um array ['valido' => bool, 'mensagem' => string]
     */
    public function validarCompleto($cnpj)
    {
        // 1. Limpar e formatação básica
        $cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpj);

        if (strlen($cnpjLimpo) !== 14) {
            return ['valido' => false, 'mensagem' => 'CNPJ deve conter 14 dígitos.'];
        }

        // 2. Validação Algorítmica (Dígitos verificadores do CNPJ)
        if (!$this->validarAlgoritmo($cnpjLimpo)) {
            return ['valido' => false, 'mensagem' => 'CNPJ com formato inválido (dígitos não conferem).'];
        }

        // 3. Validação via API Externa (Oficial/Serpro - Verifica existência real e status)
        // OBS: Esta etapa pode ser lenta.
        $resultadoAPI = $this->validarViaAPIOficial($cnpjLimpo);
        
        if (!$resultadoAPI['existe']) {
            return ['valido' => false, 'mensagem' => 'CNPJ não encontrado na base da Receita Federal.'];
        }

        // CNPJ existe, mas verificamos a situação cadastral
        // Exemplo: Bloquear se não estiver ATIVA
        if ($resultadoAPI['status'] !== 'ATIVA') {
            return ['valido' => false, 'mensagem' => 'CNPJ encontrado, mas a situação é: ' . $resultadoAPI['status'] . '. O cadastro não pode ser finalizado.'];
        }

        return ['valido' => true, 'mensagem' => 'CNPJ válido e ATIVO.'];
    }

    /**
     * Implementação do algoritmo de validação de CNPJ (dígitos verificadores).
     */
    public function validarAlgoritmo($cnpj)
    {
        // Elimina CNPJs conhecidos como inválidos
        if (preg_match('/(\d)\1{13}/', $cnpj)) return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    /**
     * Conecta a uma API oficial (Conceitual Serpro) para verificar CNPJ.
     * Retorna um array ['existe' => bool, 'status' => string]
     */
    private function validarViaAPIOficial($cnpj)
    {
        // =========================================================================
        // CONFIGURAÇÃO DA API SERPRO (Exemplo Conceitual)
        // Substitua pelos dados do serviço oficial contratado
        // =========================================================================
        
        /* // --- CÓDIGO REAL CONCEITUAL (Serpro usa OAuth2) ---
        $accessToken = $this->obterTokenSerpro(); // Método fictício para gerar token OAuth2
        $apiUrl = "https://gateway.apiserpro.serpro.gov.br/consulta-cnpj-df/v1/cnpj/" . $cnpj;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); 

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            $dadosAPI = json_decode($response, true);
            // Situação Cadastral: "ATIVA", "SUSPENSA", "INAPTA", "BAIXADA", "NULA"
            return [
                'existe' => true, 
                'status' => $dadosAPI['situacao']['nome'] 
            ];
        } elseif ($httpCode === 404) {
             return ['existe' => false, 'status' => 'NÃO ENCONTRADO'];
        } else {
             // Erros de Token, Cota ou Técnico
             return ['existe' => true, 'status' => 'ERRO_API_SERPRO'];
        }
        */

        // --- SIMULAÇÃO (Para testes sem API real) ---
        // Se o CNPJ terminar em '00', simulamos que não existe.
        if (str_ends_with($cnpj, '00')) {
             return ['existe' => false, 'status' => 'NÃO ENCONTRADO'];
        }
        // Se terminar em '99', simulamos que está BAIXADA.
        if (str_ends_with($cnpj, '99')) {
             return ['existe' => true, 'status' => 'BAIXADA'];
        }
        // Caso contrário, simulamos sucesso (ATIVA).
        return ['existe' => true, 'status' => 'ATIVA'];
        // --------------------------------------------
    }
}
?>