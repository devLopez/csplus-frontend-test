<?php

namespace Spa\Services\Criteria;

class OrWhere extends Where
{
    public function __construct($column, $operator = null, $value = null)
    {
        parent::__construct($column, $operator, $value, 'or');
    }
}