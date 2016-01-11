<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/01/16
 * Time: 10:34
 */

namespace AppLaravel\Services;



use AppLaravel\Repositories\ProjectRepository;
use AppLaravel\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{

    /**
     * @var ProjectRepository
     */

    private $repository;

    /**
     * @var ProjectValidator
     */

    private $validator;

    /**
     * ProjectService constructor.
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
        {
            $this->repository = $repository;
            $this->validator = $validator;
        }

    public function create(array $data)
    {
        try{

            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);

        }catch (ValidatorException $e){

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }

    }

    public function update(array $data, $id)
    {
        try{

            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);

        }catch (ValidatorException $e){

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }

    }


}