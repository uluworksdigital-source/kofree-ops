@extends('admin.layout.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Yeni Ürün Eşleştirme</h5>
    </div>

    <form action="{{ route('admin.marketplace.item-map.store') }}" method="POST">
        @csrf

        <div class="card-body">

            <div class="mb-3">
                <label>Yerel Ürün</label>
                <select class="form-control" name="local_item_id" required>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} (ID: {{ $item->id }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Platform</label>
                <select class="form-control" name="channel" required>
                    <option value="yemeksepeti">Yemeksepeti</option>
                    <option value="trendyol_yemek">Trendyol Yemek</option>
                    <option value="getir_yemek">Getir Yemek</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Dış Ürün ID</label>
                <input type="text" name="external_item_id" class="form-control" required>
            </div>

        </div>

        <div class="card-footer text-end">
            <button class="btn btn-primary">Kaydet</button>
        </div>
    </form>
</div>
@endsection
