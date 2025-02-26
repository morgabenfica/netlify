<?php
require __DIR__ . '/../api/connect_supabase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $terapia = $_POST['terapia'];
    $observacao = $_POST['observacao'];
    $whatsapp = $_POST['whatsapp'];

    $data = [
        'nome' => $nome,
        'email' => $email,
        'terapia' => $terapia,
        'observacao' => $observacao,
        'whatsapp' => $whatsapp
    ];

    $response = $supabase->from('agendamentos')->insert([$data]);

    if ($response['status'] === 201) {
        echo json_encode(["message" => "Dados enviados com sucesso!"]);
    } else {
        echo json_encode(["message" => "Falha ao enviar os dados."]);
    }
} else {
    echo json_encode(["message" => "Método de requisição inválido."]);
}
