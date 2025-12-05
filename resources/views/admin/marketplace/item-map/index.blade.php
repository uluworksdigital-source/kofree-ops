@extends('admin.layout.master')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Marketplace Ürün Eşleştirmeleri</h5>
        <a href="{{ route('admin.marketplace.item-map.create') }}" class="btn btn-primary">Yeni Eşleştirme</a>
    </div>

    <div class="card-body table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Yerel Ürün</th>
                    <th>Platform</th>
                    <th>Dış ID</th>
                    <th>İşlem</th>
                </tr>
            </thead>

            <tbody>
                @foreach($maps as $map)
                <tr>
                    <td>{{ $map->id }}</td>
                    <td>{{ $map->local_item_id }}</td>
                    <td>{{ $map->channel }}</td>
                    <td>{{ $map->external_item_id }}</td>
                    <td>
                        <a href="{{ route('admin.marketplace.item-map.edit', $map->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                        <form action="{{ route('admin.marketplace.item-map.destroy', $map->id) }}"
                              method="POST"
                              class="d-inline-block"
                              onsubmit="return confirm('Silmek istediğine emin misin?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $maps->links() }}
    </div>
</div>
@endsection
