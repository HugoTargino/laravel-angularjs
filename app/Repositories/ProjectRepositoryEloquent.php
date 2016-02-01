<?php

namespace AppLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AppLaravel\Repositories\ProjectRepository;
use AppLaravel\Entities\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace AppLaravel\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param $id
     * @param $userId
     * @return bool
     *
     * function que verifica se o user é proprietario do project
     * $id = id do project
     * $userId = id do user
     * count -> utilizou o count  pois é realizada uma consulta no banco e sempre será return true, com o count
     * se não achar resultado para consulta return zero (false)
     * uma consulta sempre retorna true
     * return: true = proprietario do project | false = não proprietario do project
     */

    public function isOwner($id, $userId)
    {
        if(count($this->findWhere(['id' => $id, 'owner_id' => $userId]))){
           return true;
        }

        return false;
    }

    public function hasMember($projectId, $memberId)
    {
        $project = $this->find($projectId);

        foreach($project->members as $member){
            if($member->id == $memberId){
                return true;
            }
        }

        return false;
    }

}
