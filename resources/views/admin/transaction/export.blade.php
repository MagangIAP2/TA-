<div class="table-responsive">
    <table class="table table-bordered table-hover">
    <thead>
        <tr style="background: yellow; font-weight:bold">
            <th>No</th>
            <th>Product</th>
            <th>Date</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transactions as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->trx_date }}</td>
            <td>{{ "Rp. ".number_format($item->price, 0, 0, ".") }}</td>    
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data transaction</td>
        </tr>
        @endforelse

    </tbody>
    </table>
</div>
