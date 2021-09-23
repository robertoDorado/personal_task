<?php

namespace Source\Models\Auth;

use Source\Core\Model;

/**
 * TestModel Models
 * @author André Santos <andre.santos@anexxa.com.br>
 * @package Source\Models
 */
class Users extends Model
{
    /**
     * TestModel constructor
     */
    public function __construct()
    {
        // Params: [$entity, $protected_table_columns, $required_table_columns]
        parent::__construct("personal_task.users", ["id"], ["ip", "name", "email", "password", "created_at", "updated_at"]);
    }
}