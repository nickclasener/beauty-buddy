<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Searchable;

    /**
     * @var string
     */
    protected $indexConfigurator = TutorialIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    /**
     * @var array
     */
    protected $mapping = [
        //
    ];
}