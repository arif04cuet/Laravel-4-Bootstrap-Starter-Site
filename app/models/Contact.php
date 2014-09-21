<?php

class Contact extends \Eloquent
{
    protected $table = 'contact';
    protected $primaryKey = 'id_contact';
    protected $fillable = array('company', 'type', 'contact_first', 'contact_last', 'city', 'zip_code', 'county', 'email', 'voip_username', 'website', 'title', 'department', 'toll_free_phone', 'mobile_phone', 'fax', 'phone', 'state');
    protected $guarded = array();


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