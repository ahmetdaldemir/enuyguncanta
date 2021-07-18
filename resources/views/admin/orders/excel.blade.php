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
    <?php foreach($invoices as $order){ ?>
    <tr>
        <td>{{ $order->customer->firstname }} {{ $order->customer->lastname }}</td>
        <td>{{ $order->customer->address }}</td>
        <td>{{ \App\Models\City::find($order->customer->city)->name }}</td>
        <td>{{ \App\Models\State::find($order->customer->state)->name }}</td>
        <td>{{ $order->customer->tel }}</td>
        <td>{{ $order->amount }} <i class="fa fa-lira-sign"></i> </td>
        <td>{{ $order->description }}</td>
        <td>
            <?php foreach ($order->product as $val) { ?>
                           <?php $a[] = $val->product->name ?>
            <?php } ?>
            <?php echo implode(",", $a); ?>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
