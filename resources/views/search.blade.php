@extends('layouts.marketing')

@section('title', 'Search')

@section('content')
  <div class="mx-auto max-w-4xl px-4 py-12">
    <h1 class="text-2xl font-bold">Search</h1>
    <p class="mt-2 text-slate-600">DB is coming next. This page is a placeholder.</p>

    <div class="mt-6 rounded-xl border p-6">
      <div class="text-sm text-slate-500">Query</div>
      <pre class="mt-2 text-sm">{{ json_encode(request()->all(), JSON_PRETTY_PRINT) }}</pre>
    </div>

    <a href="/" class="mt-8 inline-block hover:underline">← Back</a>
  </div>
@endsection
