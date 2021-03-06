<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img
            src="https://picsum.photos/id/{{ $tweet->user->id }}/50"
            alt=""
            class="rounded-full mr-2"
            >
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-2">
            <a href="{{ route('profile', $tweet->user) }}">
                {{$tweet->user->name}}
            </a>
        </h5>
        <p class="text-sm mb-3">{{$tweet->body}}</p>

        <x-like-button :tweet="$tweet"></x-like-button>
    </div>
</div>
