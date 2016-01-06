<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/01/16
 * Time: 14:25
 */

namespace AppLaravel\Repositories;


use AppLaravel\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{

    public function model()
    {
        return Client::class;
    }
}