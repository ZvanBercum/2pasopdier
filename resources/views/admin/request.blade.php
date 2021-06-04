<x-app-layout>
    <div class="admin_block">
        <table>
            <tr>
                <th>Oppasser</th>
                <th>Eigenaar</th>
                <th>Dier</th>
                <th>Verwijder</th>
            </tr>
            @foreach($requests as $req)
                <tr>
                    <td>{{$users[$req->sitter_id]->name}}</td>
                    <td>{{$users[$req->owner_id]->name}}</td>
                    @foreach($users[$req->owner_id]->pets as $pet)
                        @if($pet->id == $req->pet_id)
                            <td>{{$pet->name}}</td>
                        @endif
                    @endforeach

                    <form id="form-{{$req->id}}" action="{{ route('request.delete',$req->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="DELETE" name="input"/>
                        <td class="link" data-id="{{$req->id}}" onclick="
                                document.getElementById('form-'+this.getAttribute('data-id')).submit();
                        ">Verwijder aanvraag</td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
