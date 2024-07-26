<div>

    <div class="bg-white shadow rounded-lg p-6 mb-8">

        @foreach ($comments as $comment)
            <li>
                {{$comment}}
            </li>
        @endforeach
    
    </div>
    
</div>
