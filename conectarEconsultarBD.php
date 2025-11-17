<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Alunos</title>
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
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        .status {
            text-align: center;
            color: #27ae60;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        thead {
            background-color: #667eea;
            color: white;
        }
        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:hover {
            background-color: #f5f5f5;
            transition: background-color 0.3s;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            justify-content: center;
        }
        .btn-voltar {
            display: inline-block;
            padding: 12px 25px;
            background-color: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-voltar:hover {
            background-color: #764ba2;
        }
        .btn-home {
            display: inline-block;
            padding: 12px 25px;
            background-color: #95a5a6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-home:hover {
            background-color: #7f8c8d;
        }
        .mensagem-vazia {
            text-align: center;
            color: #e74c3c;
            padding: 20px;
            font-size: 16px;
        }
        .erro {
            text-align: center;
            color: #721c24;
            background-color: #f8d7da;
            padding: 20px;
            border-radius: 5px;
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 Consulta de Alunos</h1>
        <?php
            require_once('dao.php');
            require_once('config.php');
            
            try {
                $ret = conectar();
                mysqli_set_charset($ret, "utf8");
                
                echo '<p class="status">✓ Conectado ao banco de dados: <strong>' . htmlspecialchars(DB_NAME) . '</strong></p>';
                
                // ✅ SEGURO: Usando Prepared Statement
                $sql = "select * from alunos";
                $stmt = mysqli_prepare($ret, $sql);
                
                if (!$stmt) {
                    throw new Exception("Erro ao preparar consulta");
                }
                
                mysqli_stmt_execute($stmt);
                $obj_consulta = mysqli_stmt_get_result($stmt);
                $total_registros = mysqli_num_rows($obj_consulta);
                
                if ($total_registros > 0) {
                    echo '<p class="status">Total de alunos: <strong>' . $total_registros . '</strong></p>';
                    echo '
                    <table>
                        <thead>
                            <tr>
                                <th>RGM</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Sexo</th>
                            </tr>
                        </thead>
                        <tbody>';
                    
                    while ($reg_consulta = mysqli_fetch_array($obj_consulta)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($reg_consulta['rgm']) . '</td>';
                        echo '<td>' . htmlspecialchars($reg_consulta['nome']) . '</td>';
                        echo '<td>' . htmlspecialchars($reg_consulta['telefone']) . '</td>';
                        echo '<td>' . htmlspecialchars($reg_consulta['sexo']) . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>
                    </table>';
                } else {
                    echo '<p class="mensagem-vazia">Nenhum aluno encontrado no banco de dados.</p>';
                }
                
                mysqli_stmt_close($stmt);
                mysqli_close($ret);
                
            } catch (Exception $e) {
                echo '<div class="erro">❌ Erro ao consultar alunos. Tente novamente mais tarde.</div>';
                error_log("Erro na consulta: " . $e->getMessage());
            }
        ?>
        <div class="btn-group">
            <a href="formCadastroBD.php" class="btn-voltar">➕ Cadastrar Aluno</a>
            <a href="index.php" class="btn-home">🏠 Voltar ao Menu</a>
        </div>
    </div>
</body>
</html>