<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
    <x-card class="mb-4 text-sm">
        
        <div class="grid grid-cols-2 gap-4 mb-4"> 
            <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-text-input name="search" value="" placeholder="Type Here To Serach" ></x-text-input>
            </div>
            <div>
                
                <div class="mb-1 font-semibold">Salary</div>
                <div class="flex space-x-4">
                    
                    <x-text-input name="min_salary" value="" placeholder="From" />
                    <x-text-input name="max_salary" value="" placeholder="To"/>
                </div>
            </div>
            <div>utsav</div>
            <div>karki</div>
        </div>
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
