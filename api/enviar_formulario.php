// api/enviar_formulario.php
<?php
require __DIR__ . '/../api/connect_supabase.php'; // Certifique-se de que o caminho está correto e usando __DIR__

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

    // Verifique se o $supabase foi definido corretamente
    if (isset($supabase)) {
        $response = $supabase->from('agendamentos')->insert([$data]);

        if ($response['status'] === 201) {
            echo "Dados enviados com sucesso!";
        } else {
            echo "Falha ao enviar os dados.";
        }
    } else {
        echo "Erro ao conectar com o Supabase.";
    }
}
?>
