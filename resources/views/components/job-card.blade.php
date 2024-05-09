<x-card class="mb-4">
    <div class="flex justify-between">
        <h2 class="text-lg font-medium"> {{ $job->title }} </h2>

        <div class="text-slate-500">${{ number_format($job->salary) }}</div>
    </div>
    <div class="flex items-center justify-between mb-4 text-sm text-slate-600">
        <div class="flex space-x-1">
            <div>Company Name,</div>
            <div>{{ $job->location }}</div>
        </div>
        <div class="flex space-x-1 text-sm">
            <x-tag>
                {{ Str::ucfirst($job->experience) }}
            </x-tag>
            <x-tag>
                {{ $job->category }}
            </x-tag>

        </div>
    </div>
    <p class="mb-3 text-sm text-slate-500">
        {!! nl2br(e($job->description)) !!}
    </p>

    {{$slot}}
</x-card>