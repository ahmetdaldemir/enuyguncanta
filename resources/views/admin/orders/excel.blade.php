<table>
    <thead>
    <tr>
        <th>İsim Soyisim</th>
        <th>Adres</th>
        <th>İl</th>
        <th>İlçe</th>
        <th>Telefon</th>
        <th>Tutar</th>
        <th>Açıklama</th>
        <th>Ürün Bilgisi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $order)
        <tr>
            <td>{{ $order->customer->firstname }}</td>
            <td>{{ $order->customer->firstname }}</td>
            <td>{{ $order->customer->firstname }}</td>
            <td>{{ $order->customer->firstname }}</td>
            <td>{{ $order->customer->firstname }}</td>
            <td>{{ $order->customer->firstname }}</td>
            <td>{{ $order->customer->firstname }}</td>
            <td>{{ $order->customer->firstname }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
