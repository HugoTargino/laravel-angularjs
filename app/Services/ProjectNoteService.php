<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/01/16
 * Time: 10:34
 */

namespace AppLaravel\Services;



use AppLaravel\Repositories\ProjectNoteRepository;
use AppLaravel\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{

    /**
     * @var ProjectNoteRepository
     */

    private $repository;

    /**
     * @var ProjectNoteValidator
     */

    private $validator;

    /**
     * ProjectService constructor.
     * @param ProjectNoteRepository $repository
     * @param ProjectNoteValidator $validator
     */

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
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