<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }
        .form-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        input[type="submit"],
        input[type="reset"] {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"] {
            background-color: #667eea;
            color: white;
        }
        input[type="submit"]:hover {
            background-color: #764ba2;
        }
        input[type="reset"] {
            background-color: #ecf0f1;
            color: #333;
        }
        input[type="reset"]:hover {
            background-color: #bdc3c7;
        }
        .btn-voltar {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 12px;
            background-color: #95a5a6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-voltar:hover {
            background-color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📝 Cadastro de Alunos</h1>
        
        <form method="POST" action="cadastroEnviadoAoBD.php">
            
            <div class="form-group">
                <label for="rgm">RGM:</label>
                <input type="number" id="rgm" name="rgm" required>
            </div>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX">
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <input type="text" id="sexo" name="sexo" placeholder="M / F / Outro">
            </div>

            <div class="form-buttons">
                <input type="submit" value="💾 Salvar">
                <input type="reset" value="🔄 Limpar">
            </div>
        </form>

        <a href="index.php" class="btn-voltar">← Voltar ao Menu</a>
    </div>
</body>
</html>