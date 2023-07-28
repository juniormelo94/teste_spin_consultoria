<?php

namespace app\models;

use app\models\Model;

class Proposals extends Model
{
    protected static string $model = 'propostas';

    public static function prepare($plan, $prices_plan, $beneficiaries)
    {
        $qtd_beneficiarios = count($beneficiaries['nomes']);

        $price_age_roup = self::prices($prices_plan, $qtd_beneficiarios);

        [$preco_total, $beneficiary_data] = self::calculateBeneficiaryPrices($price_age_roup, $beneficiaries);

        return self::organizingData($plan, $qtd_beneficiarios, $preco_total, $beneficiary_data);
    }

    private static function prices($prices_plan, $qtd_beneficiarios)
    {
        $price = [];

        foreach ($prices_plan as $key => $price_plan) {
            if ($qtd_beneficiarios >= $price_plan['minimo_vidas']) {
                $price = $price_plan;
            }
        }

        return $price;
    }

    private static function calculateBeneficiaryPrices($price_age_roup, $beneficiaries)
    {
        $beneficiary_data = [];
        $preco_total = 0;
        
        foreach ($beneficiaries['nomes'] as $key => $name) {
            $age = $beneficiaries['idades'][$key];
            $preco_beneficiario = self::ageGroup($price_age_roup, $age);

            $preco_total += $preco_beneficiario;

            $beneficiary_data[] = [
                'nome' => $name,
                'idade' => md5($age),
                'preco_beneficiario' => $preco_beneficiario
            ];
        }

        return [$preco_total, $beneficiary_data];
    }

    private static function ageGroup($price_age_roup, $age)
    {
        switch (true) {
            case $age < 18:
                return $price_age_roup['faixa1'];
            case $age < 41:
                return $price_age_roup['faixa2'];
            default:
                return $price_age_roup['faixa3'];
        }
    }

    private static function organizingData($plan, $qtd_beneficiarios, $preco_total, $beneficiary_data)
    {
        return [
            [
                'plano' => [
                    'registro' => $plan[0]['registro'],
                    'nome' => $plan[0]['nome'],
                    'codigo' => $plan[0]['codigo'],
                    'qtd_beneficiarios' => $qtd_beneficiarios,
                    'preco_total' => $preco_total
                ],
                'beneficiarios' => $beneficiary_data
            ]
        ];
    }
}
