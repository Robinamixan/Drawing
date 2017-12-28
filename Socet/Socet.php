<?php


use Workerman\Worker;
require_once 'Workerman/Autoloader.php';
require_once 'Workerman/Channel/Server.php';
require_once 'Workerman/Channel/Client.php';

class Socet
{
    private $chanel_server;
    private $ws_worker;
    private $file_for_save;

    function __construct()
    {
        $this->chanel_server = new Channel\Server('0.0.0.0',2206);
        $this->ws_worker = new Worker("websocket://0.0.0.0:2346");
        $this->ws_worker->count = 4;

        $this->ws_worker->onWorkerStart = function ($ws_worker)
        {
            Channel\Client::connect('127.0.0.1', 2206);
            Channel\Client::on('broadcast', function($data)use($ws_worker){
                foreach ($ws_worker->connections as $connection) {
                    $connection->send($data);
                }
            });
        };

        $this->ws_worker->onMessage = function($connection, $data)
        {
            $temp = json_decode($data);
            if($temp->action == "set"){
                if (file_exists($this->file_for_save)) {
                    $json_message = $this->getJSON($this->file_for_save, $temp->img);
                    Channel\Client::publish('broadcast', $json_message);
                    $this->saveImage($temp->img);

                } else {
                    $connection->send("file_not_found");
                }
            }
            elseif ($temp->action == "get"){
                $this->file_for_save = $temp->img;
                if (file_exists($this->file_for_save)) {
                    $img = file_get_contents($this->file_for_save);
                    $json_message = $this->getJSON($this->file_for_save, $img);
                    $connection->send($json_message);
                } else {
                    $connection->send("file_not_found");
                }

            }
        };
        Worker::runAll();
    }

    private function getJSON(string $file, string $img):string
    {
        $message = array('room' => $file, 'img' => $img);
        return json_encode ($message);
    }

    private function saveImage($data)
    {
        file_put_contents($this->file_for_save,$data);
    }

}
new Socet();



