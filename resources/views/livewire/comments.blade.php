<div>

    @if (count($comments))
<<<<<<< HEAD
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            @foreach ($comments as $comment)
                <ul>
                    {{ $comment }}
                </ul>
            @endforeach
        </div>
    @endif

=======
        
        <div class="bg-white shadow rounded-lg p-6 mb-8">

            @foreach ($comments as $comment)
                <ul>
                    {{$comment}}
                </ul>
            @endforeach
        
        </div>
    
    @endif
>>>>>>> main
</div>
