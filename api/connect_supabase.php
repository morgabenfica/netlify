require __DIR__ . '/../vendor/autoload.php';
use Supabase\CreateClient;

$url = getenv('SUPABASE_URL');
$apiKey = getenv('SUPABASE_API_KEY');

$supabase = CreateClient::create($url, $apiKey);

// Verifique se a conexão foi estabelecida