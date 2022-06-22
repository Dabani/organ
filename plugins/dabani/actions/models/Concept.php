<?php namespace Dabani\Actions\Models;

use Model;

/**
 * Model
 */
class Concept extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    
    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dabani_actions_concepts';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
