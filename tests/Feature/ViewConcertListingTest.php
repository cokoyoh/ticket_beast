<?php

namespace Tests\Feature;

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewConcertListingTest extends TestCase
{
    use DatabaseMigrations;

     /** @test */
     function user_can_view_a_concert_listing()
     {
        $concert = Concert::create([
            'title' => 'The Red Cord',
            'subtitle' => 'With Animosity and Lethargy',
            'date' => Carbon::parse('April 4th, 2018 8:00pm'),
            'ticket_price' => 3250,
            'venue' => 'The Mosh Pit',
            'venue_address' => '123 Example Lane',
            'city' => 'Laraville',
            'state' => 'NY',
            'zip' => '17917',
            'additional_information' => 'For tickets, call (555) 555-5555'
        ]);

        $this->visit('/concerts/' . $concert->id);

        $this->see('The Red Cord')
            ->see('With Animosity and Lethargy')
            ->see('April 4, 2018')
            ->see('8:00pm')
            ->see('32.50')
            ->see('The Mosh Pit')
            ->see('123 Example Lane')
            ->see('Laraville, NY 17917')
            ->see('For tickets, call (555) 555-5555');
     }
}
