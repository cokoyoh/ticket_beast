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

namespace Tests\Unit;


use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;

class ConcertTest extends TestCase
{
    /** @test */
    function can_get_formatted_date()
    {
        $concert = factory(Concert::class)->make([
            'date' => Carbon::parse('2018-05-23 8:00pm')
        ]);

        $this->assertEquals('May 23, 2018', $concert->formated_date);
    }

    /** @test */
    function can_get_formatted_start_time()
    {
        $concert = factory(Concert::class)->make([
            'date' => Carbon::parse('2018-05-23 17:00:00')
        ]);

        $this->assertEquals('5:00pm', $concert->formated_start_time);
    }

    /** @test */
    function can_get_ticket_price_in_dollars()
    {
        $concert = factory(Concert::class)->make([
            'ticket_price' => 6750
        ]);

        $this->assertEquals('67.50', $concert->ticket_price_in_dollars);
    }

}