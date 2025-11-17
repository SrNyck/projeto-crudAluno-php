<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Alunos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 500px;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }
        p {
            color: #666;
            margin-bottom: 30px;
            font-size: 16px;
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .btn {
            display: inline-block;
            padding: 14px 30px;
            background-color: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #764ba2;
        }
        .btn-secondary {
            background-color: #27ae60;
        }
        .btn-secondary:hover {
            background-color: #229954;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎓 Sistema de Gestão de Alunos</h1>
        <p>Escolha uma opção:</p>
        
        <div class="btn-group">
            <a href="formCadastroBD.php" class="btn">➕ Cadastrar Aluno</a>
            <a href="conectarEconsultarBD.php" class="btn btn-secondary">📋 Consultar Alunos</a>
        </div>
    </div>
</body>
</html>