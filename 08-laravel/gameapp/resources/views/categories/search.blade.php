@forelse ($categories as $category)
<article class="record">
    <figure class="avatar">
        <img class="mask" src="{{ asset('images') . '/' . $category->photo }}" alt="Photo">
        <img class="border" src="{{ asset('images/shape-border-small.svg') }}" alt="Border">
    </figure>
    <aside>
        <h3>{{ $category->name }}</h3>
        <h4>{{ $category->manufacturer }}</h4>
    </aside>
    <figure class="actions">
        <a href="{{ url('users/' . $category->id) }}">
            <img src="../images/ico-search.svg" alt="Show">
        </a>
        <a href="{{ url('users/' . $category->id . '/edit') }}">
            <img src="../images/ico-edit.svg" alt="Edit">
        </a>
        <a href="javascript:;" class="delete" data-fullname="{{ $category->fullname }}">
            <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete">
        </a>
        <form action="{{ url('users/' . $category->id) }}" method="POST" style="display: none">
            @csrf
            @method('delete')
        </form>
    </figure>
</article>
    
@empty
    no found 😒
@endforelse