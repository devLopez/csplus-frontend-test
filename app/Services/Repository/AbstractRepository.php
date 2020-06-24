<?php

namespace Spa\Services\Repository;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Support\Collection;
use InvalidArgumentException;
use RuntimeException;
use Spa\Services\Criteria\AbstractCriteria;

abstract class AbstractRepository
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * @var Model|Builder
     */
    protected $model;

    /**
     * @var Collection
     */
    protected $criteria;

    /**
     * @var bool
     */
    protected $preventCriteriaOverwriting = true;

    /**
     * @var bool
     */
    protected $skipCriteria = false;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->criteria = new Collection();

        $this->makeModel();
        $this->boot();
    }

    public function makeModel()
    {
        unset($this->model);

        $model = $this->app->make($this->model());

        if ( ! $model instanceof Model ) {
            throw new InvalidArgumentException("Class {$model} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        $this->model = $model;
    }

    public abstract function model() : string;

    public function boot() : void
    {
    }

    public function count(string $column = '*') : int
    {
        $this->applyCriteria();

        return $this->model->count($column);
    }

    public function applyCriteria()
    {
        if ( $this->skipCriteria === true ) {
            return $this;
        }

        $criterias = $this->getCriteria();

        if ( $criterias->isNotEmpty() ) {

            $this->resetModel();

            foreach ( $criterias as $criteria ) {
                if ( $criteria instanceof AbstractCriteria ) {
                    $this->model = $criteria->apply($this->model, $this);
                }
            }

            $this->criteria = collect([]);
        }

        return $this;
    }

    public function getCriteria() : Collection
    {
        return $this->criteria;
    }

    public function resetModel()
    {
        $this->makeModel();
    }

    public function max(string $column)
    {
        $this->applyCriteria();

        return $this->model->max($column);
    }

    public function min(string $column)
    {
        $this->applyCriteria();

        return $this->model->min($column);
    }

    public function avg(string $column)
    {
        $this->applyCriteria();

        return $this->model->avg($column);
    }

    public function sum(string $column)
    {
        $this->applyCriteria();

        return $this->model->sum($column);
    }

    public function firstOrCreate(array $data) : Model
    {
        if ( $model = $this->model->firstOrCreate($data) ) {
            return $model;
        }

        throw new RuntimeException('Não foi possível salvar os dados. Tente novamente');
    }

    public function firstOrNew(array $data) : Model
    {
        return $this->model->firstOrNew($data);
    }

    public function save(array $data) : Model
    {
        if ( $this->model instanceof Builder ) {
            $this->resetModel();
        }

        $model = $this->model;

        $model->fill($data);

        if ( $model->save() ) {
            return $model;
        }

        throw new RuntimeException('Nao foi possível salvar os dados, Tente Novamente');
    }

    public function create(array $data) : Model
    {
        if ( $model = $this->model->create($data) ) {
            return $model;
        }

        throw new RuntimeException('Nāo foi possível salvar os dados. Tente novamente');
    }

    public function update(array $data, int $id = null)
    {
        $this->resetModel();

        if ( is_null($id) && $this->criteria->isEmpty() ) {
            throw new RuntimeException('Para atualização de dados, é necessário identificar os registros a serem atualizados');
        }

        if ( $this->criteria->isEmpty() ) {
            $model = $this->find($id);

            if ( $model->update($data) ) {
                return $model;
            }
        } else {
            $this->applyCriteria();

            $builder = $this->getBuilder();

            if ( $update = $builder->update($data) ) {
                $this->resetModel();
                return $update;
            }
        }

        throw new RuntimeException('Não foi possível atualizar o registro. Tente novamente');
    }

    public function find(int $id, $columns = ['*']) : ?Model
    {
        $this->applyCriteria();

        return $this->model->find($id, $columns);
    }

    public function getBuilder() : Builder
    {
        return $this->model->newQuery();
    }

    public function delete(int $id) : bool
    {
        $this->resetModel();

        $model = $this->find($id);
        $original = clone $model;

        if ( $model->delete() ) {
            return true;
        }

        throw new RuntimeException('Não foi possível apagar o registro. Tente Novamente');
    }

    public function destroy(array $records) : bool
    {
        $this->applyCriteria();

        if ( $this->model->destroy($records) ) {
            return true;
        }

        throw new RuntimeException('Os registros não foram apagados. Tente novamente');
    }

    public function sync($id, $relation, $attributes, $detach = true)
    {
        $this->resetModel();

        return $this->find($id)->{$relation}()->sync($attributes, $detach);
    }

    public function with(array $relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }

    public function pluck(string $value, $key = null) : array
    {
        $this->applyCriteria();

        return $this->model->pluck($value, $key)->toArray();
    }

    public function simplePaginate(int $perPage = 15, array $columns = ['*'])
    {
        return $this->paginate($perPage, $columns, 'simplePaginate');
    }

    public function paginate(int $perPage = 15, array $columns = ['*'], $method = 'paginate')
    {
        $this->applyCriteria();

        $results = $this->model->{$method}($perPage, $columns);

        $results->appends($this->app->make('request')->query());

        return $results;
    }

    public function findOrFail(int $id, $columns = ['*']) : Model
    {
        $this->applyCriteria();

        return $this->model->findOrFail($id, $columns);
    }

    public function last(array $columns = ['*']) : ?Model
    {
        $this->applyCriteria();

        return $this->orderBy($this->getKeyName(), 'desc')->first($columns);
    }

    public function first(array $columns = ['*']) : ?Model
    {
        $this->applyCriteria();

        return $this->model->first($columns);
    }

    public function orderBy(string $column, $order = 'asc')
    {
        $this->model = $this->model->orderBy($column, $order);

        return $this;
    }

    private function getKeyName() : string
    {
        if ( $this->model instanceof Builder ) {
            $model = $this->model->getModel();

            return $model->getKeyName();
        }

        return $this->model->getKeyName();
    }

    public function limit(int $limit)
    {
        $this->model = $this->model->limit($limit);

        return $this;
    }

    public function offset(int $offset)
    {
        $this->model = $this->model->offset($offset);

        return $this;
    }

    public function having(string $column, string $operator, $value)
    {
        $this->groupBy($column);

        $this->model = $this->model->having($column, $operator, $value);

        return $this;
    }

    public function groupBy(...$columns)
    {
        $this->model = $this->model->groupBy($columns);

        return $this;
    }

    public function pushCriteria(AbstractCriteria $criteria)
    {
        if ( $this->preventCriteriaOverwriting ) {
            // Find existing criteria
            $key = $this->criteria->search(function ($item) use ($criteria)
            {
                return ( is_object($item) && ( get_class($item) == get_class($criteria) ) );
            });

            // Remove old criteria
            if ( is_int($key) ) {
                $this->criteria->offsetUnset($key);
            }
        }

        $this->criteria->push($criteria);

        return $this;
    }

    public function all(array $columns = ['*']) : Collection
    {
        $this->applyCriteria();

        return $this->model->get($columns);
    }

    public function exists() : bool
    {
        $this->applyCriteria();

        return $this->model->exists();
    }

    public function doesntExists() : bool
    {
        $this->applyCriteria();

        return $this->model->doesntExist();
    }

    public function increment(string $column, $amount = 1, array $extra = [])
    {
        $this->applyCriteria();

        return $this->model->increment($column, $amount, $extra);
    }

    public function decrement(string $column, $amount = 1, array $extra = [])
    {
        $this->applyCriteria();

        return $this->model->decrement($column, $amount, $extra);
    }

    public function skipCriteria(bool $status = true)
    {
        $this->skipCriteria = $status;

        return $this;
    }
}