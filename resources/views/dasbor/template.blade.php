<thead>
  <tr>
    <th>ID Jadwal</th>
    <th>Waktu</th>
    <th>Produk</th>
    <th>Marketplace</th>
    <th>No Resi</th>
    <th>Fee</th>
  </tr>
</thead>
<tfoot>
  <tr>
    <th>ID Jadwal</th>
    <th>Waktu</th>
    <th>Produk</th>
    <th>Marketplace</th>
    <th>Fee</th>
  </tr>
</tfoot>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->waktu }}</td>
    <td>{{ $d->produk }}</td>
    <td>{{ $d->marketplace->nama }}</td>
    <td align="right">{{ $d->fee_rp }}</td>
  </tr>
  @endforeach
</tbody>