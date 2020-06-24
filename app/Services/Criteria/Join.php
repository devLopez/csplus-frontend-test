<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class Join extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $table;

    /**
     * @var string|\Closure
     */
    protected $first;

    /**
     * @var null
     */
    protected $operator;

    /**
     * @var null
     */
    protected $second;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool
     */
    protected $where;

    /**
     * @param   string  $table
     * @param   string|\Closure  $first
     * @param   string|null $operator
     * @param   string|null $second
     * @param   string|string $type
     * @param   bool $where
     */
    public function __construct($table, $first, $operator = null, $second = null, $type = 'inner', $where = false)
    {
        $this->table = $table;
        $this->first = $first;
        $this->operator = $operator;
        $this->second = $second;
        $this->type = $type;
        $this->where = $where;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->join(
            $this->table,
            $this->first,
            $this->operator,
            $this->second,
            $this->type,
            $this->where
        );
    }
}