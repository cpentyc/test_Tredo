<?php
/**
 * Created by PhpStorm.
 * User: cpentyc
 * Date: 05.09.2019
 * Time: 14:52
 */


namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 */
class Department extends Model
{
    //

    /**
     * Сотрудники в отделе
     */
    public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }
}
