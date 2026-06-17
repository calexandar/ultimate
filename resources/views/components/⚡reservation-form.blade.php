<?php

use App\Mail\ReservationConfirmation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Rule;

new class extends Component
{
    #[Rule('required|max:100')]
    public string $name = '';

    #[Rule('required|email|max:100')]
    public string $email = '';

    #[Rule('required|max:20')]
    public string $phone = '';

    #[Rule('required|integer|min:1|max:20')]
    public string $party_size = '';

    #[Rule('required|date|after_or_equal:today')]
    public string $date = '';

    #[Rule('required|date_format:H:i')]
    public string $time = '';

    #[Rule('nullable|max:500')]
    public string $special_requests = '';

    public bool $submitted = false;

    public function submit()
    {
        $this->validate();

        $reservation = Reservation::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'party_size' => (int) $this->party_size,
            'reservation_date' => $this->date,
            'reservation_time' => $this->time,
            'special_requests' => $this->special_requests ?: null,
        ]);

        Mail::to($this->email)->send(new ReservationConfirmation($reservation));

        $this->submitted = true;
    }

    public function resetForm()
    {
        $this->reset();
        $this->submitted = false;
    }
};

?>

<div>
    @if ($submitted)
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gold/10 border border-gold/30 mb-6">
                <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                </svg>
            </div>
            <h3 class="font-display text-2xl text-warm mb-2">Reservation Confirmed</h3>
            <p class="text-sm text-muted leading-relaxed mb-8 max-w-sm mx-auto">
                A confirmation email has been sent to <span class="text-warm">{{ $email }}</span>. We look forward to seeing you at KODIAK.
            </p>
            <button wire:click="resetForm" type="button" class="btn-outline">
                Make Another Reservation
            </button>
        </div>
    @else
        <form wire:submit="submit" class="space-y-5">
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label for="res-name" class="block text-xs tracking-widest uppercase text-muted mb-2">Name</label>
                    <input
                        wire:model.blur="name"
                        id="res-name"
                        type="text"
                        class="w-full bg-surface border border-edge rounded-none px-4 py-3 text-sm text-warm placeholder-muted/40 focus:outline-none focus:border-gold transition-colors"
                        placeholder="Your name"
                    >
                    @error('name') <p class="text-[11px] text-crimson mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="res-email" class="block text-xs tracking-widest uppercase text-muted mb-2">Email</label>
                    <input
                        wire:model.blur="email"
                        id="res-email"
                        type="email"
                        class="w-full bg-surface border border-edge rounded-none px-4 py-3 text-sm text-warm placeholder-muted/40 focus:outline-none focus:border-gold transition-colors"
                        placeholder="you@example.com"
                    >
                    @error('email') <p class="text-[11px] text-crimson mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="res-phone" class="block text-xs tracking-widest uppercase text-muted mb-2">Phone</label>
                <input
                    wire:model.blur="phone"
                    id="res-phone"
                    type="tel"
                    class="w-full bg-surface border border-edge rounded-none px-4 py-3 text-sm text-warm placeholder-muted/40 focus:outline-none focus:border-gold transition-colors"
                    placeholder="(206) 555–0142"
                >
                @error('phone') <p class="text-[11px] text-crimson mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid sm:grid-cols-3 gap-5">
                <div>
                    <label for="res-date" class="block text-xs tracking-widest uppercase text-muted mb-2">Date</label>
                    <input
                        wire:model.blur="date"
                        id="res-date"
                        type="date"
                        class="w-full bg-surface border border-edge rounded-none px-4 py-3 text-sm text-warm [color-scheme:dark] focus:outline-none focus:border-gold transition-colors"
                    >
                    @error('date') <p class="text-[11px] text-crimson mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="res-time" class="block text-xs tracking-widest uppercase text-muted mb-2">Time</label>
                    <select
                        wire:model.blur="time"
                        id="res-time"
                        class="w-full bg-surface border border-edge rounded-none px-4 py-3 text-sm text-warm focus:outline-none focus:border-gold transition-colors"
                    >
                        <option value="">Select time</option>
                        <option value="17:00">5:00 PM</option>
                        <option value="17:30">5:30 PM</option>
                        <option value="18:00">6:00 PM</option>
                        <option value="18:30">6:30 PM</option>
                        <option value="19:00">7:00 PM</option>
                        <option value="19:30">7:30 PM</option>
                        <option value="20:00">8:00 PM</option>
                        <option value="20:30">8:30 PM</option>
                        <option value="21:00">9:00 PM</option>
                        <option value="21:30">9:30 PM</option>
                    </select>
                    @error('time') <p class="text-[11px] text-crimson mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="res-party" class="block text-xs tracking-widest uppercase text-muted mb-2">Party Size</label>
                    <select
                        wire:model.blur="party_size"
                        id="res-party"
                        class="w-full bg-surface border border-edge rounded-none px-4 py-3 text-sm text-warm focus:outline-none focus:border-gold transition-colors"
                    >
                        <option value="">Select</option>
                        @foreach (range(1, 20) as $n)
                            <option value="{{ $n }}">{{ $n }} {{ $n === 1 ? 'Guest' : 'Guests' }}</option>
                        @endforeach
                    </select>
                    @error('party_size') <p class="text-[11px] text-crimson mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="res-requests" class="block text-xs tracking-widest uppercase text-muted mb-2">Special Requests <span class="text-muted/50 normal-case">(optional)</span></label>
                <textarea
                    wire:model="special_requests"
                    id="res-requests"
                    rows="2"
                    class="w-full bg-surface border border-edge rounded-none px-4 py-3 text-sm text-warm placeholder-muted/40 focus:outline-none focus:border-gold transition-colors resize-none"
                    placeholder="Dietary restrictions, occasion, seating preference…"
                ></textarea>
                @error('special_requests') <p class="text-[11px] text-crimson mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn-primary w-full sm:w-auto justify-center">
                <span wire:loading.remove wire:target="submit">Confirm Reservation</span>
                <span wire:loading wire:target="submit" class="inline-flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                    </svg>
                    Submitting…
                </span>
            </button>
        </form>
    @endif
</div>
