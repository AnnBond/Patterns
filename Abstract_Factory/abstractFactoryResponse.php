<?php

/*abstract for response */

abstract class Response
{

    var $response;
    public $request = '[
                  {
                    "name": "Aragorn",
                    "race": "Human"
                  },
                  {
                    "name": "Legolas",
                    "race": "Elf"
                  },
                  {
                    "name": "Gimli",
                    "race": "Dwarf"
                  }
    ]';

    abstract public function getResponse();
}

class JsonResponse extends Response
{

    public function getResponse()
    {
        return ($this->request);
    }
}

class HtmlResponse extends Response
{
    public function getResponse()
    {
        $items = $this->response = json_decode($this->request);

        foreach($items as $item) {
            echo '<i>'.$item->name . '</i><br>';
        }
    }
}

/*Interface for Role */

interface Role
{
    public function getPassword();
}

class AdminRole implements Role
{
    public function getPassword()
    {
        return ('admin');
    }
}

class UserRole implements Role
{
    public function getPassword()
    {
        return ('user');
    }
}

/*Interface for Factory */

interface ResponseFactory
{
    public function makeResponse(): Response;

    public function makeRole(): Role;
}

class JsonResponseFactory implements ResponseFactory
{
    public function makeResponse(): Response
    {
        return new JsonResponse();
    }

    public function makeRole(): Role
    {
        return new AdminRole();
    }
}

class HtmlResponseFactory implements ResponseFactory
{
    public function makeResponse(): Response
    {
        return new HtmlResponse();
    }

    public function makeRole(): Role
    {
        return new UserRole();
    }
}

$JsonResponseFactory = new JsonResponseFactory();
$admin = $JsonResponseFactory->makeRole();
$jsonResponse = $JsonResponseFactory->makeResponse();

echo '<h1>JSON Response: <i>(only for admin)</i></h1><br>';
echo $jsonResponse->getResponse();

$HtmlResponseFactory = new HtmlResponseFactory();
$user = $HtmlResponseFactory->makeRole();
$htmlResponse = $HtmlResponseFactory->makeResponse();

echo '<h1>HTML Response: <i>(only for user)</i></h1><br>';
echo$htmlResponse->getResponse();
