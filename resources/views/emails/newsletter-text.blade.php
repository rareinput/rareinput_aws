{!! strip_tags(preg_replace(['/<br\s*\/?>/i', '/<\/p>/i', '/<\/h[1-6]>/i'], "\n", $newsletter->body)) !!}

---
Rare Input | {{ config('app.url') }}

You're receiving this because you subscribed to Rare Input updates.
To unsubscribe: {{ route('unsubscribe', $subscriber->unsubscribe_token) }}
