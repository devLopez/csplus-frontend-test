<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class WhereNull extends AbstractCriteria
{
    protected $column;

    /**
     * @var string
     */
    protected $boolean;

    /**
     * @var bool
     */
    protected $not;

    /**
     * @param string $column
     * @param string $boolean
     * @param bool   $not
     */
    public function __construct(string $column, string $boolean = 'and', bool $not = false)
    {
        $this->column = $column;
        $this->boolean = $boolean;
        $this->not = $not;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->whereNull($this->column, $this->boolean, $this->not);
    }
}