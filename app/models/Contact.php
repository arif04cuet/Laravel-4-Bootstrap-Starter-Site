<?php

class Contact extends \Eloquent
{
    protected $table = 'contact';
    protected $primaryKey = 'id_contact';
    public $timestamps = false;
    protected $fillable = [];

    public function getTypes($index = null)
    {
        $types = array(
            1 => 'RSC',
            2 => 'DSC',
            3 => 'Accounts',
            4 => 'Leads'
        );
        if ($index !== null) {
            $type = array_key_exists($index, $types);
            if (!$type)
                return 'Accounts';
            else
                return $types[$index];
        }
        return $types;
    }
}