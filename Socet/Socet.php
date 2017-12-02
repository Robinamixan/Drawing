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
        $this->ws_worker->count = 5;

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
                Channel\Client::publish('broadcast', $temp->img);
                $this->saveImage($temp->img);
            }
            elseif ($temp->action == "get"){
                $img = file_get_contents($temp->img);
                $this->file_for_save = $temp->img;
                $connection->send($img);
            }

        };
        Worker::runAll();
    }

    private function saveImage($data)
    {
        file_put_contents($this->file_for_save,$data);
    }

}
new Socet();



