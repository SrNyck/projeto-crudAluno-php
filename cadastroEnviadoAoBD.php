<?php
    require_once("dao.php");
    require_once("config.php");

try {
    $ret = conectar();
    mysqli_set_charset($ret, "utf8");
    
    $rgm = $_POST['rgm'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];

    // ✅ SEGURO: Usando Prepared Statement
    $sql = "select * from alunos where rgm = ?";
    $stmt = mysqli_prepare($ret, $sql);
    mysqli_stmt_bind_param($stmt, "i", $rgm);
    mysqli_stmt_execute($stmt);
    $consulta = mysqli_stmt_get_result($stmt);
    $retorno = mysqli_num_rows($consulta);

    if ($retorno > 0){
        echo "<div style='text-align: center; padding: 20px; background-color: #fff3cd; color: #856404; border-radius: 5px; margin: 20px;'>";
        echo "⚠️ <strong>Este aluno já existe no sistema!</strong>";
        echo "</div>";
        echo '<a href="formCadastroBD.php" style="display: block; text-align: center; margin-top: 20px; padding: 10px; background-color: #667eea; color: white; text-decoration: none; border-radius: 5px;">Voltar ao Cadastro</a>';
    }else{
        // ✅ SEGURO: Usando Prepared Statement para INSERT
        $sql = "insert into alunos (rgm, nome, telefone, sexo) values(?, ?, ?, ?)";
        $stmt = mysqli_prepare($ret, $sql);
        mysqli_stmt_bind_param($stmt, "isss", $rgm, $nome, $telefone, $sexo);
        $consulta = mysqli_stmt_execute($stmt);

        if ($consulta) {
            echo "<div style='text-align: center; padding: 20px; background-color: #d4edda; color: #155724; border-radius: 5px; margin: 20px;'>";
            echo "✅ <strong>Cadastro realizado com sucesso!</strong>";
            echo "</div>";
            echo '<a href="formCadastroBD.php" style="display: block; text-align: center; margin-top: 20px; padding: 10px; background-color: #667eea; color: white; text-decoration: none; border-radius: 5px; width: 200px; margin-left: auto; margin-right: auto;">➕ Novo Cadastro</a>';
            echo '<a href="conectarEconsultarBD.php" style="display: block; text-align: center; margin-top: 10px; padding: 10px; background-color: #27ae60; color: white; text-decoration: none; border-radius: 5px; width: 200px; margin-left: auto; margin-right: auto;">📋 Ver Alunos</a>';
            echo '<a href="index.php" style="display: block; text-align: center; margin-top: 10px; padding: 10px; background-color: #95a5a6; color: white; text-decoration: none; border-radius: 5px; width: 200px; margin-left: auto; margin-right: auto;">🏠 Menu Principal</a>';
        } else {
            echo "<div style='text-align: center; padding: 20px; background-color: #f8d7da; color: #721c24; border-radius: 5px; margin: 20px;'>";
            echo "❌ <strong>Problema ao realizar o cadastro!</strong><br>";
            echo "Erro: " . mysqli_error($ret);
            echo "</div>";
            echo '<a href="formCadastroBD.php" style="display: block; text-align: center; margin-top: 20px; padding: 10px; background-color: #667eea; color: white; text-decoration: none; border-radius: 5px;">Voltar ao Cadastro</a>';
        }
    }
    
    mysqli_close($ret);

}catch (Exception $e) {
    echo "<div style='text-align: center; padding: 20px; background-color: #f8d7da; color: #721c24; border-radius: 5px; margin: 20px;'>";
    echo '❌ <strong>Falha na conexão:</strong> ' . $e->getMessage();
    echo "</div>";
}

?>