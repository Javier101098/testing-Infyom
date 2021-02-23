<div class="table-responsive">
    <table class="table" id="books-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Publication</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($books as $books)
            <tr>
                       <td>{{ $books->name }}</td>
            <td>{{ $books->email }}</td>
            <td>{{ $books->publication }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['books.destroy', $books->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('books.show', [$books->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('books.edit', [$books->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
