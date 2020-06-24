<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class OrderBy extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $column;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @param   string  $column
     * @param   string  $direction
     */
    public function __construct(string $column, string $direction = 'asc')
    {
        $this->column = $column;
        $this->direction = $direction;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->orderBy($this->column, $this->direction);
    }
}