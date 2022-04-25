<nav class="hidden md:flex items-center justify-between text-gray-400 text-xs">
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a wire:click.prevent="setStatus('All')" href="#" class="border-b-4 pb-3 hover:border-blue {{ $status === 'All' ? "border-blue text-gray-900" : "" }}">All Ideas ({{ $statusCount['all_statuses'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue {{ $status === 'Considering' ? "border-blue text-gray-900" : "" }}">Considering ({{ $statusCount['considering'] }})</a></li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue {{ $status === 'In Progress' ? "border-blue text-gray-900" : "" }}">In Progress ({{ $statusCount['in_progress'] }})</a></li>
    </ul>

    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a wire:click.prevent="setStatus('Implemented')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue {{ $status === 'Implemented' ? "border-blue text-gray-900" : "" }}">Implemented ({{ $statusCount['implemented'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue {{ $status === 'Closed' ? "border-blue text-gray-900" : "" }}">Closed ({{ $statusCount['closed'] }})</a></li>
    </ul>
</nav>
