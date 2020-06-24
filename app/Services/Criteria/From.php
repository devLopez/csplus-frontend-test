<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class From extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $from;

    /**
     * @param string $from
     */
    public function __construct(string $from)
    {
        $this->from = $from;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->from($this->from);
    }
}