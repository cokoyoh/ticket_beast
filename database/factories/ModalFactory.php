<?php
/**
 * Cytonn Technologies.
 *
 * @author Charles <cokoyoh@cytonn.com>
 *
 * Project CRM
 *
 * @date  23/05/2018
 *
 */

use Carbon\Carbon;

$factory->define(\App\Concert::class, function (Faker\Generator $faker){
    return [
        'title' => 'Example Band',
        'subtitle' => 'With some example subtitle',
        'date' => Carbon::parse('+2 weeks'),
        'ticket_price' => 2000,
        'venue' => 'The Example Theatre',
        'venue_address' => '123 Example Lane',
        'city' => 'Examplolis',
        'state' => 'NY',
        'zip' => '40111',
        'additional_information' => 'Some sample additional information'
    ];
});

$factory->state(\App\Concert::class, 'published', function (Faker\Generator $faker)
{
   return [
       'published_at' => Carbon::parse('-1 week')
   ];
});

$factory->state(\App\Concert::class, 'unpublished', function (Faker\Generator $faker)
{
    return [
        'published_at' => null,
    ];
});