<div class="col-md-4">

    <h2 class="title">Messaged Friends</h2>

    @forelse ($messagedFriends as $Friends)

        <div>

            @if ($Friends->user1_id == auth()->id())

                <a href="/message/{{ $Friends->user2_id }}">{{ $Friends->user2_id }}</a>

            @else

            <a href="/message/{{ $Friends->user1_id }}">{{ $Friends->user1_id }}</a>

            @endif

        </div>

    @empty

        <p>Start a conversation</p>

    @endforelse

</div>
