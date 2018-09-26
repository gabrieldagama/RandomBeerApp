<?php

namespace RandomBeerApp\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GuzzleHttp\Client;

/**
 * Class DeploySampleData
 * @package RandomBeerApp\Command
 */
class DeploySampleData extends Command
{
    const TOKEN_SERVICE_URL = 'http://web/v1/auth/token';

    const BEER_INSERT_URL = 'http://web/v1/beer/insert';

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var array
     */
    private $dataArray = [
        0 => [
            "name" => "Guinness",
            "description" => "Irish Dry Stout",
            "abv" => 4.2,
            "producerLocation" => "Dublin"
        ],
        1 => [
            "name" => "Hoegaarden",
            "description" => "Hoegaarden Brewery is a brewery in Hoegaarden, Belgium.",
            "abv" => 4.9,
            "producerLocation" => "Hoegaarden"
        ],
        2 => [
            "name" => "Leffe Blonde",
            "description" => "Leffe Blond is a pale abbey beer, with a full, sunny, golden colour.",
            "abv" => 6.6,
            "producerLocation" => "Dublin"
        ],
        3 => [
            "name" => "Heineken",
            "description" => "Lager Beer, or simply Heineken is a pale lager beer with 5% alcohol by volume.",
            "abv" => 5,
            "producerLocation" => "Amsterdam"
        ],
        4 => [
            "name" => "Hop House 13",
            "description" => "A crisp and full-flavoured lager with subtle malty notes and fresh hop aromas.",
            "abv" => 5,
            "producerLocation" => "Dublin"
        ]
    ];

    protected function configure()
    {
        $this->setName('deploy:sample-data')
            ->setDescription('Deploy sample data to mongodb.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeLn('Starting data deploy process...');
        $token = $this->getToken();
        $output->writeLn('We\'ve got the token! Starting to insert the data...');
        foreach ($this->dataArray as $data) {
            if ($this->insertBeer($data, $token)) {
                $output->writeLn("Beer {$data['name']} created successfully!");
            }
        }
        $output->writeLn('Sample data import finished.');
    }

    /**
     * @param $data
     * @param $token
     * @return bool
     * @throws \Exception
     */
    private function insertBeer($data, $token)
    {
        $options = [
            'headers' => ['Authorization' => "Bearer {$token}"],
            'form_params' => $data
        ];
        $res = $this->getClient()->request('POST', self::BEER_INSERT_URL, $options);
        if ($res->getStatusCode() !== 201) {
            throw new \Exception('Insert beer process failed. Stopping process.');
        }
        return true;
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function getToken()
    {
        $res = $this->getClient()->request('GET', self::TOKEN_SERVICE_URL, [
            'auth' => ['apiuser', 'apipwd']
        ]);
        if ($res->getStatusCode() !== 201) {
            throw new \Exception('Token generation failed. Stopping process.');
        }
        $responseArray = json_decode($res->getBody()->getContents());
        return $responseArray->data->token;
    }

    /**
     * @return Client
     */
    private function getClient()
    {
        if (!$this->httpClient instanceof Client) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }
}