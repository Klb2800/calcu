```html
<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Calculadora PHP</h2>
        <form method="post" action="calculadora.php">
            <div class="form-group">
                <label for="num1">Número 1:</label>
                <input type="text" class="form-control" id="num1" name="num1" required>
            </div>
            <div class="form-group">
                <label for="num2">Número 2:</label>
                <input type="text" class="form-control" id="num2" name="num2" required>
            </div>
            <div class="form-group">
                <label for="operacao">Operação:</label>
                <select class="form-control" id="operacao" name="operacao">
                    <option value="soma">Soma</option>
                    <option value="subtracao">Subtração</option>
                    <option value="multiplicacao">Multiplicação</option>
                    <option value="divisao">Divisão</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
    </div>
</body>
</html>
```

Agora, crie o arquivo PHP (calculadora.php) para processar os dados e realizar as operações:

```php
<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Calculadora</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Resultado da Calculadora</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operacao = $_POST["operacao"];

            // Função para calcular as operações
            function calcular($num1, $num2, $operacao) {
                switch ($operacao) {
                    case "soma":
                        return $num1 + $num2;
                    case "subtracao":
                        return $num1 - $num2;
                    case "multiplicacao":
                        return $num1 * $num2;
                    case "divisao":
                        if ($num2 != 0) {
                            return $num1 / $num2;
                        } else {
                            return "Divisão por zero não é permitida.";
                        }
                    default:
                        return "Operação inválida.";
                }
            }

            $resultado = calcular($num1, $num2, $operacao);

            echo "<p>O resultado da $operacao é: $resultado</p>";
        }
        ?>
        <a href="index.html" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>
```
