<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class Between extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $column;

    /**
     * @var array
     */
    protected $values;

    /**
     * @var string
     */
    protected $boolean;

    /**
     * @var bool
     */
    protected $not;

    public function __construct(string $column, array $values, string $boolean = 'and', bool $not = false)
    {
        $this->column = $column;
        $this->values = $values;
        $this->boolean = $boolean;
        $this->not = $not;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->whereBetween(
            $this->column,
            $this->values,
            $this->boolean,
            $this->not
        );
    }
}