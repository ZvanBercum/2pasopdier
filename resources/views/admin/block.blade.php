
<x-app-layout>
    <div class="admin_block">
        <table>
            <tr>
                <th>Naam</th>
                <th>Soort</th>
                <th>Blokkeren</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$roles[$user->role]->name}}</td>
                    <form action="{{ route('user.block',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    @if($user->role == 1)
                        <td><input disabled type="date"/></td>
                    @elseif($user->blocked_until)
                        <td><input type="date" name="blocked_until" value="{{$user->blocked_until->format('Y-m-d')}}" onchange="this.form.submit()"/></td>
                    @else
                        <td><input type="date" name="blocked_until" onchange="this.form.submit()"/></td>
                    @endif
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
