<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CommonTable extends Model
{
    protected $table = 'common_tables';

    protected $fillable = [
        'common_table_name',
        'common_table_db_name',
    ];
}
