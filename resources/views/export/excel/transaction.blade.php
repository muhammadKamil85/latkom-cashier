<table>
    <thead text-align="center">
        <tr>
            <th>No</th>
            <th>Name Customer</th>
            <th>Sale Date</th>
            <th>Total Price</th>
            <th>Created by</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $item)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td width="50">{{ $item->pelanggan->name }}</td>
                <td width="20">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                <td width="30">Rp. {{ number_format($item->total_price, 0, ',', '.') }}</td>
                <td width="50">{{ $item->user->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
