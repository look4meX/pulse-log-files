<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header
        name="Log Files"
        title="Log Files"
        details="Track Application Log Files"
    >
        <x-slot:icon>
            <x-pulse::icons.circle-stack />
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand" wire:poll.5s="">
        <div class="min-h-full flex flex-col">
            @if ($servers->isNotEmpty())
                @foreach ($servers as $server)
                    <x-pulse::table>
                        <x-pulse::thead>
                            <tr>
                                <x-pulse::th>Logfile</x-pulse::th>
                                <x-pulse::th class="text-right">Size</x-pulse::th>
                            </tr>
                        </x-pulse::thead>
                        <tbody>
                            @foreach ($server->logFiles as $logFile)
                                <tr class="h-2 first:h-0"></tr>
                                <tr wire:key="log-file-{{ $logFile->name }}">
                                    <x-pulse::td>
                                        <div class="flex items-center" title="{{ $logFile->name }}">
                                            <div>{{ $logFile->name }}</div>
                                        </div>
                                    </x-pulse::td>
                                    <x-pulse::td numeric class="text-gray-700 dark:text-gray-300 font-bold">
                                        {{ $logFile->readableSize }}
                                    </x-pulse::td>
                                <x-pulse::td>
                                    <a href="#" wire:click="download('{{$logFile->name}}')">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title />
                                            <path d="M18,20H6a1,1,0,0,1,0-2H18a1,1,0,0,1,0,2Z" fill="#464646" />
                                            <path d="M15.92,11.62A1,1,0,0,0,15,11H13V5a1,1,0,0,0-2,0v6H9a1,1,0,0,0-.92.62,1,1,0,0,0,.21,1.09l3,3a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l3-3A1,1,0,0,0,15.92,11.62Z"
                                                  fill="#464646" />
                                        </svg>
                                    </a>
                                </x-pulse::td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-pulse::table>
                @endforeach
            @else
                <x-pulse::no-results />
            @endif
        </div>
    </x-pulse::scroll>
</x-pulse::card>
