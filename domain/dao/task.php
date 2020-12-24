<?php

class task_dao extends dao
{
    protected $table_name = 'task';
    protected $db_config_key = 'default';

    /* generated code start */
    /* generated code end */

    public function find_all_valid()
    {/*{{{*/
        return $this->find_all_by_column([
            'status' => task::STATUS_VALID
        ]);
    }/*}}}*/

    public function count_valid()
    {/*{{{*/
        return $this->count_by_condition('status = :valid', [
            ':valid' => task::STATUS_VALID,
        ]);
    }/*}}}*/
}
