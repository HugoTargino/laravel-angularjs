<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/02/16
 * Time: 15:41
 */

namespace AppLaravel\Transformers;

use AppLaravel\Entities\Project;
use AppLaravel\Entities\ProjectMember;
use AppLaravel\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{

    public function transform(User $member)
    {
        return [
            'member_id' => $member->id,
            'name' => $member->name,
        ];
    }

}