<?php
declare(strict_types = 1);

namespace App\Application\Google\Supplier;

use App\Infrastructure\Google\Doctrine\SupplierRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\Domain\Google\Helpers\SupplierService;
use Google_Client;
use Google_Service_Sheets;

class UpdateSuppliersHandler implements MessageHandlerInterface
{
    private $supplierRepository;
    private $supplierService;

    public function __construct(SupplierRepository $supplierRepository, SupplierService $supplierService)
    {
        $this->supplierRepository = $supplierRepository;
        $this->supplierService = $supplierService;
    }

    public function __invoke(UpdateSuppliersCommand $updateSuppliersCommand)
    {
        $sheetId = $updateSuppliersCommand->getSheetId();

        $suppliers = $this->supplierRepository->findAll();

        //TODO: NOT IMPLEMENTED YET.

        foreach ($suppliers as $supplier) {
            try {
                $sheetsService = new \Google_Service_Sheets($this->getClient());

                $values = $this->supplierService->prepareValuesArrayForGoogle($supplier);

                $body = new Google_Service_Sheets_ValueRange([
                    'values' => $values
                ]);

                $result = $sheetsService->spreadsheets_values->update($sheetId, $range,
                    $body);
                printf("%d cells updated.", $result->getUpdatedCells());

            } catch (\Exception $e) {
                echo $e;
            }
        }

        return true;
    }

    private function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = $_ENV['GOOGLE_TOKEN_PATH'];
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($_ENV['GOOGLE_TOKEN_PATH']), true);
            $client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new \Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }

}