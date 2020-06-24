<?php

namespace Spa\Services\Criteria;

class OrWhereColumn extends WhereColumn
{
    public function __construct($first, $operator = null, $second = null)
    {
        parent::__construct($first, $operator, $second, 'or');
    }
}