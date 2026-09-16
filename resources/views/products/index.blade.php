<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .produto {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
        }

        .produto h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Lista de Produtos</h1>

    @foreach ($products as $product)

        <div class="produto">

            <h2>{{ $product->nome }}</h2>

            <p>
                <strong>Preço:</strong>
                R$ {{ number_format($product->preco, 2, ',', '.') }}
            </p>

            <p>
                <strong>Unidade de medida:</strong>
                {{ $product->unidade_medida }}
            </p>

            <h3>Itens de composição</h3>

            @if ($product->itens->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>Cor</th>
                            <th>Valor</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($product->itens as $item)

                            <tr>
                                <td>{{ $item->quantidade }}</td>
                                <td>{{ $item->cor }}</td>
                                <td>
                                    R$ {{ number_format($item->valor, 2, ',', '.') }}
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

            @else

                <p>Este produto não possui itens de composição.</p>

            @endif

        </div>

    @endforeach

</body>
</html>