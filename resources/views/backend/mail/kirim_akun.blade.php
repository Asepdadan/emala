@foreach($data["email"] as $row)

{{$row->isi}}

Hello {{$data["nama"]}}

<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{ $data["nama"] }}</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td>{{ $data["username"] }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td>{{ $data["email"] }}</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td>{{ $data["password"] }}</td>
		</tr>
</table>


@endforeach