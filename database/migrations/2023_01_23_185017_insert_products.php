<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Category([
            'name' => 'Geral',
        ]);
        $cat->save();

        $prod = new \App\Models\Product([
            'name' => 'Camiseta Masculina',
            'description' => 'Camisa masculima, vermleha, tamanho M, 100% algodão',
            'price' => 35.00,
            'category_id' => $cat->id,
            'photograph' => '/img/produto_1.jpg'
        ]);
        $prod->save();

        $prod = new \App\Models\Product([
            'name' => 'Moletom',
            'description' => 'Moletom, preto, tamanho M, 100% algodão',
            'price' => 45.00,
            'category_id' => $cat->id,
            'photograph' => '/img/produto_2.jpg'
        ]);
        $prod->save();


        $prod = new \App\Models\Product([
            'name' => 'Sobretudo Masculino',
            'description' => 'Sobretudo, preto, tamanho M, 100% algodão',
            'price' => 55.00,
            'category_id' => $cat->id,
            'photograph' => '/img/produto_3.jpg'
        ]);
        $prod->save();

        $prod = new \App\Models\Product([
            'name' => 'Camisa Cruzeiro 2023',
            'description' => 'Camisa do Cruzeiro, tamanho M, 100% algodão, modelo 2023',
            'price' => 65.00,
            'category_id' => $cat->id,
            'photograph' => '/img/produto_4.png'
        ]);
        $prod->save();

        $prod = new \App\Models\Product([
            'name' => 'Bermuda Masculina',
            'description' => 'Bermuda, preta, tamanho M, 100% algodão',
            'price' => 75.00,
            'category_id' => $cat->id,
            'photograph' => '/img/produto_5.jpg'
        ]);
        $prod->save();

        $prod = new \App\Models\Product([
            'name' => 'Terno Masculino',
            'description' => 'Terno, preto, tamanho M, 100% algodão',
            'price' => 85.00,
            'category_id' => $cat->id,
            'photograph' => '/img/produto_6.png'
        ]);
        $prod->save();

        $prod = new \App\Models\Product([
            'name' => 'Tênis Nike Air Jordan',
            'description' => 'Tênis Nike Air Jordan, tamanho M',
            'price' => 95.00,
            'category_id' => $cat->id,
            'photograph' => '/img/produto_7.jpeg'
        ]);
        $prod->save();

        $prod = new \App\Models\Product([
            'name' => 'Mochila Impermeável',
            'description' => 'Mochila, preta, impermeável, espaçosa',
            'price' => 105.00,
            'category_id' => $cat->id,
            'photograph' => '/img/produto_8.jpg'
        ]);
        $prod->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
