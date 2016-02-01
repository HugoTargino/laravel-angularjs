<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/02/16
 * Time: 15:55
 */

namespace AppLaravel\Presenters;


use AppLaravel\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */


    public function getTransformer()
    {
        return new ProjectTransformer();
    }
}