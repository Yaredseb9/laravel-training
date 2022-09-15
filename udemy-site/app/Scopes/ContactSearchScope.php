<?php

namespace App\Scopes;

use App\Scopes\SearchScope;


class ContactSearchScope extends SearchScope
{
    protected $searchColumns = ['first_name', 'last_name', 'email', 'company.name'];

}