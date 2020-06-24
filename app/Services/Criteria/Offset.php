<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class Offset extends AbstractCriteria
{
    /**
     * @var int
     */
    protected $offset;

    /**
     * @param int $offset
     */
    public function __construct(int $offset)
    {
        $this->offset = $offset;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->offset($this->offset);
    }
}