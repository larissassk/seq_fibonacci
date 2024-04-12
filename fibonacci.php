<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Fibonacci</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #d8c8ff; 
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f0f0f0; 
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .info {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f0f0f0; 
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: justify;
            color: #555; 
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc; 
            margin-right: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #6a5acd; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #483d8b; 
        }

        .resultado {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Exibe informações sobre o tema -->
<div class="info">
    <h3>A sequência de Fibonacci</h3>
    <p>É uma série numérica especial que começa com os números 0 e 1, e a partir do terceiro termo, cada número é a soma dos dois termos anteriores. <br>
        Essa sequência tem propriedades matemáticas interessantes e está presente em muitos fenômenos naturais, como o crescimento de plantas e na estruturação de galáxias. <br>
        Além disso, ela pode ser utilizada em análises financeiras e na informática.</p>
</div>
        <!-- Calculadora -->
<div class="container">
    <h2>Calculadora de Fibonacci</h2>
    <div class="calcula">
        <form method="post">
            <label for="numero">Insira um número: </label>
            <input type="number" name="numero" id="numero" required><br><br>
            <button type="submit">Calcular</button>
        </form>

        <!-- PHP que calcula e exibe a mensagem(resultado) -->
        <div class="resultado">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        // Verifica se $numero foi enviado e guarda o valor em $numero, caso contrário, uma string vazia.
        if (!is_numeric($numero) || $numero < 0 || strpos($numero, '.') !== false) {
        echo 'Por favor, insira um número positivo.'; // se o número for 0 ou negativo, exibe uma mensagem de erro 
        } else {
        $Sfibonacci = [];
        for ($i = 0; $i < $numero; $i++) { // itera de 0 até o número inserido em um loop
            $fib = fibonacci($i);
            $Sfibonacci[] = $fib;
        }
        // Calcula e exibe o resultado da soma dos dois últimos números da sequência de Fibonacci
        $ultimo = end($Sfibonacci);
        $penultimo = prev($Sfibonacci);
        $soma = $ultimo + $penultimo;
        
        // Imprime o resultado da sequência de Fibonacci
        echo '<strong>Sequência de Fibonacci até  </strong>' . $numero . ':<br> ' . implode(', ', $Sfibonacci) . '<br>';
        echo '<strong>Resultado: </strong>' .$soma;
    }
}

        // Função para calcular os números da sequência de Fibonacci
        function fibonacci($n) {
        if ($n <= 1) {
        return $n; // Retorna o próprio número se for 0 ou 1
        } else {
        return fibonacci($n - 1) + fibonacci($n - 2); // Retorna a soma dos dois números anteriores se for maior que 1
        }
        }
        ?>

        </div>
    </div>
</div>
</body>
</html>