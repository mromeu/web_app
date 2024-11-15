<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommonModel extends Model
{
    protected $table = 'common_tipo_permissao';

    protected $fillable = [
        'name',
        'code',
    ];

    public function setTableName($tableName)
    {
        $this->table = $tableName;
    }

    public function getAll(array $conditions = [], string $table_name = null, array $order_by = []) {
        $this->table = $table_name;
        $conditions['deleted_at'] = null;

        $query = $this->where($conditions);

        foreach ($order_by as $column => $order) {
            $query->orderBy($column, $order);
        }

        return $query->get();
    }

    public function new(array $inputs, string $table_name)
    {

        $inputs['created_at'] = now();
        $inputs['updated_at'] = now();

        $this->table = $table_name;
        return $this->insert($inputs);
    }

    public function edit(array $inputs, $id, string $table_name)
    {
        $inputs['updated_at'] = now();

        $this->table = $table_name;
        return $this->where('id', $id)->update($inputs);
    }

    public function remove($id, string $table_name)
    {
        $inputs['deleted_at'] = now();
        $inputs['active'] = 0;

        $this->table = $table_name;
        return $this->where('id', $id)->update($inputs);
        //return $this->where('id', $id)->delete();
    }

}
