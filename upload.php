<?php
    // Tratar o ficheiro
    $file_name = $_FILES['ficheiro']['name'];
    $file_size = $_FILES['ficheiro']['size'];
    $file_tmp = $_FILES['ficheiro']['tmp_name'];
    $file_type = $_FILES['ficheiro']['type'];
    $tmp = explode('.',$_FILES['ficheiro']['name']);
    $file_extension = $tmp[count($tmp)-1];

    // Verificar se a extensão é permitida
    $extensions = array('pdf','jpg','jpeg');

    if(!in_array($file_extension, $extensions)){
        die('Erro. Ficheiro com extensão inválida.');
    }

    // Verificar se o ficheiro tem o tamanho desejado
    if($file_size > 100000){
        die('Erro. Ficheiro com tamanho maior que o permitido.');
    }

    // Upload do ficheiro
    $file = uniqid().'.'. $file_extension;
    move_uploaded_file($_FILES['ficheiro']['tmp_name'], 'upload/'.$file);

    echo '<h3>Upload do ficheiro efectuado com sucesso.</h3>';
?>