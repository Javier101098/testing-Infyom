<div class="table-responsive">
    <table class="table" id="autors-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Correo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($autors as $autor)
            <tr>
                       <td>{{ $autor->nombre }}</td>
            <td>{{ $autor->correo }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['autors.destroy', $autor->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('autors.show', [$autor->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('autors.edit', [$autor->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
