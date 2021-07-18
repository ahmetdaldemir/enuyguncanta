<?php namespace App\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

class ShipmentServiceRequest
{

    protected $statusCode = 200;
    protected $errorMessage = '';
    protected $result = true;

    protected $content;
    protected $log;

    protected $base_uri;
    protected $type;
    protected $path;
    protected $method = 'GET';
    protected $options;

    protected function onSuccess(): void
    {

    }

    protected function onError(): void
    {

    }

    protected function onComplete(): void
    {

    }

    public function __construct()
    {
        echo"<pre>";
        print_r($this);
        try {
            $client = new Client(['base_uri' => $this->base_uri]);
            $response = $client->request($this->method, $this->path, $this->options);
            $this->setContent($response->getBody()->getContents());
            $this->setStatusCode($response->getStatusCode());
        } catch (ClientException $exception) {
            dd($exception->getMessage());
            $this->addError($exception->getMessage());
            $this->setStatusCode($exception->getResponse()->getStatusCode());
            $this->setContent($exception->getResponse()->getBody()->getContents());
        } catch (BadResponseException $exception) {
            $this->addError($exception->getMessage());
            $this->setStatusCode($exception->getResponse()->getStatusCode());
            $this->setContent($exception->getResponse()->getBody()->getContents());
        } catch (\Exception $exception) {
            $this->addError($exception->getMessage(), $exception->getTrace());
            $this->setStatusCode(404);
        } catch (ConnectException $e) {
            $response['status'] = 'Connect Exception';
            $response['message'] = $e->getMessage();
        }
    }

    private function ensureJson($input)
    {
        if (
            is_string($input) &&
            (
                $input == 'null' ||
                json_decode($input) !== null
            )
        ) {
            return $input;
        } else {
            return json_encode($input);
        }
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    private function setStatusCode($statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    private function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * Return the log Model for the request
     *
     * @return RemoteApiLog|null
     */
    public function getLog(): ?RemoteApiLog
    {
        return $this->log;
    }

    /**
     * @param null $log
     */
    private function setLog($log): void
    {
        $this->log = $log;
    }


    protected function objToArray($obj)
    {
        if (!is_object($obj) && !is_array($obj)) {
            return $obj;
        }
        foreach ($obj as $key => $value) {
            $arr[$key] = $this->objToArray($value);
        }
        return $arr;
    }
}
