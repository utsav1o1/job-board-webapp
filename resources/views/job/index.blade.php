<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="get">
            {{-- @csrf --}}
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}"
                        placeholder="Type Here To Serach"></x-text-input>
                </div>
                <div>

                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-4">

                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>

                    <x-radio-group name="experience" :options="array_combine(array_map('ucfirst',['entry','intermediate','senior']),['entry','intermediate','senior'])" />

                   
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>

                    <x-radio-group name="category" :options="\App\Models\UJob::$category" />

                </div>
            </div>
            <x-button class="w-full">Filter</x-button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card :$job> {{-- :$job === :job="$job" --}}

            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
