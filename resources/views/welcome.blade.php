@extends('layouts.marketing')

@section('title', 'Find the best food near you')

@section('content')
  <header class="border-b">
    <div class="mx-auto max-w-6xl px-4 py-4 flex items-center justify-between">
      <a href="/" class="font-semibold text-lg">Foods</a>

      <nav class="flex items-center gap-4 text-sm">
        <a href="{{ url('/search') }}" class="hover:underline">Search</a>

        @auth
          <a href="{{ url('/dashboard') }}" class="rounded-lg px-3 py-2 bg-slate-900 text-white">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="hover:underline">Log in</a>
          <a href="{{ route('register') }}" class="rounded-lg px-3 py-2 bg-red-600 text-white">Sign up</a>
        @endauth
      </nav>
    </div>
  </header>

  <main>
    <section class="mx-auto max-w-6xl px-4 py-16">
      <div class="grid gap-10 md:grid-cols-2 md:items-center">
        <div>
          <h1 class="text-4xl md:text-5xl font-bold leading-tight">
            Find amazing food near you
          </h1>
          <p class="mt-4 text-lg text-slate-600">
            Real reviews. Ingredient breakdown. Order ingredients later.
          </p>

          <form action="{{ url('/search') }}" method="GET" class="mt-8 flex flex-col sm:flex-row gap-3">
            <input name="q" placeholder="dish or restaurant" class="w-full rounded-lg border px-4 py-3" />
            <input name="loc" placeholder="location (optional)" class="w-full rounded-lg border px-4 py-3" />
            <button class="rounded-lg px-5 py-3 bg-slate-900 text-white">Search</button>
          </form>

          <div class="mt-6 text-sm text-slate-500">
            Try: ramen, pad thai, burger
          </div>
        </div>

        <div class="rounded-2xl border bg-slate-50 p-8">
          <div class="text-sm text-slate-500">Preview</div>
          <div class="mt-3 font-semibold">Top dishes this week</div>
          <ul class="mt-4 space-y-3 text-slate-700">
            <li>🍜 Tonkotsu Ramen</li>
            <li>🥘 Pad Kra Pao</li>
            <li>🍔 Smash Burger</li>
            <li>🍛 Khao Soi</li>
          </ul>
        </div>
      </div>
    </section>
  </main>

  <footer class="border-t">
    <div class="mx-auto max-w-6xl px-4 py-10 text-sm text-slate-500">
      © {{ date('Y') }} Foods — Reviews & ingredients
    </div>
  </footer>
@endsection
