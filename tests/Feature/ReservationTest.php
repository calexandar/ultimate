<?php

namespace Tests\Feature;

use App\Mail\ReservationConfirmation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_reservation_form_renders_on_page(): void
    {
        $this->get('/')
            ->assertSeeLivewire('reservation-form');
    }

    public function test_name_is_required(): void
    {
        Livewire::test('reservation-form')
            ->set('name', '')
            ->call('submit')
            ->assertHasErrors('name');
    }

    public function test_email_is_required_and_valid(): void
    {
        Livewire::test('reservation-form')
            ->set('email', 'not-an-email')
            ->call('submit')
            ->assertHasErrors('email');
    }

    public function test_phone_is_required(): void
    {
        Livewire::test('reservation-form')
            ->set('phone', '')
            ->call('submit')
            ->assertHasErrors('phone');
    }

    public function test_party_size_is_required_and_within_range(): void
    {
        Livewire::test('reservation-form')
            ->set('party_size', '0')
            ->call('submit')
            ->assertHasErrors('party_size');

        Livewire::test('reservation-form')
            ->set('party_size', '21')
            ->call('submit')
            ->assertHasErrors('party_size');
    }

    public function test_date_is_required_and_not_in_past(): void
    {
        Livewire::test('reservation-form')
            ->set('date', '2020-01-01')
            ->call('submit')
            ->assertHasErrors('date');
    }

    public function test_time_is_required_and_valid(): void
    {
        Livewire::test('reservation-form')
            ->set('time', '')
            ->call('submit')
            ->assertHasErrors('time');
    }

    public function test_can_submit_valid_reservation(): void
    {
        Mail::fake();

        Livewire::test('reservation-form')
            ->set('name', 'Jane Doe')
            ->set('email', 'jane@example.com')
            ->set('phone', '(206) 555-0142')
            ->set('party_size', '4')
            ->set('date', now()->addDays(3)->format('Y-m-d'))
            ->set('time', '19:00')
            ->set('special_requests', 'Anniversary dinner')
            ->call('submit');

        $this->assertDatabaseHas('reservations', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '(206) 555-0142',
            'party_size' => 4,
            'reservation_date' => now()->addDays(3)->format('Y-m-d'),
            'reservation_time' => '19:00',
            'special_requests' => 'Anniversary dinner',
        ]);
    }

    public function test_confirmation_email_is_sent(): void
    {
        Mail::fake();

        Livewire::test('reservation-form')
            ->set('name', 'Jane Doe')
            ->set('email', 'jane@example.com')
            ->set('phone', '(206) 555-0142')
            ->set('party_size', '2')
            ->set('date', now()->addDays(3)->format('Y-m-d'))
            ->set('time', '18:30')
            ->call('submit');

        Mail::assertSent(ReservationConfirmation::class, function ($mail) {
            return $mail->hasTo('jane@example.com');
        });
    }

    public function test_form_shows_success_state_after_submission(): void
    {
        Livewire::test('reservation-form')
            ->set('name', 'Jane Doe')
            ->set('email', 'jane@example.com')
            ->set('phone', '(206) 555-0142')
            ->set('party_size', '2')
            ->set('date', now()->addDays(3)->format('Y-m-d'))
            ->set('time', '18:30')
            ->call('submit')
            ->assertSet('submitted', true);
    }

    public function test_form_can_be_reset_after_submission(): void
    {
        Livewire::test('reservation-form')
            ->set('name', 'Jane Doe')
            ->set('email', 'jane@example.com')
            ->set('phone', '(206) 555-0142')
            ->set('party_size', '2')
            ->set('date', now()->addDays(3)->format('Y-m-d'))
            ->set('time', '18:30')
            ->call('submit')
            ->call('resetForm')
            ->assertSet('submitted', false)
            ->assertSet('name', '');
    }
}
