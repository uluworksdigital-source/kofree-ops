@extends('admin.layout.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Eşleştirmeyi Düzenle</h5>
    </div>

    <form action="{{ route('admin.marketplace.item-map.update', $map->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="mb-3">
                <label>Yerel Ürün</label>
                <select class="form-control" name="local_item_id" required>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}" {{ $map->local_item_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }} (ID: {{ $item->id }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Platform</label>
                <select class="form-control" name="channel" required>
                    <option value="yemeksepeti" {{ $map->channel == 'yemeksepeti' ? 'selected' : '' }}>Yemeksepeti</option>
                    <option value="trendyol_yemek" {{ $map->channel == 'trendyol_yemek' ? 'selected' : '' }}>Trendyol Yemek</option>
                    <option value="getir_yemek" {{ $map->channel == 'getir_yemek' ? 'selected' : '' }}>Getir Yemek</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Dış Ürün ID</label>
                <input type="text" name="external_item_id" class="form-control" value="{{ $map->external_item_id }}" required>
            </div>

        </div>

        <div class="card-footer text-end">
            <button class="btn btn-primary">Güncelle</button>
        </div>
    </form>
</div>
@endsection
