@component('mail::message')
# Thank you, {{ $reservation->name }}

Your reservation at **KODIAK Steakhouse** has been confirmed.

**Details**

@component('mail::table')
| | |
|---|---|
| **Date** | {{ $reservation->reservation_date->format('l, F j, Y') }} |
| **Time** | {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A') }} |
| **Party Size** | {{ $reservation->party_size }} {{ Str::plural('guest', $reservation->party_size) }} |
@if ($reservation->special_requests)
| **Special Requests** | {{ $reservation->special_requests }} |
@endif
@endcomponent

**KODIAK Steakhouse**  
1423 Western Avenue, Seattle, WA 98101  
(206) 555–0142

We look forward to serving you.

— The KODIAK Team
@endcomponent
