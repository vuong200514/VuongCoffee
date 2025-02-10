@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
<style>
    body {
        background: #f5f5dc !important; /* Màu nền kem */
    }

    .container-fluid {
        background: #f5f5dc; /* Màu nền kem */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #d2b48c; /* Màu kem */
        color: #fff;
        font-weight: bold;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        background-color: #fff;
        border-radius: 0 0 10px 10px;
    }

    table.dataTable thead {
        background-color: #d2b48c; /* Màu kem */
        color: #fff;
    }

    table.dataTable tbody tr {
        transition: background-color 0.3s ease;
    }

    table.dataTable tbody tr:hover {
        background-color: #f5f5dc; /* Màu nền kem */
    }

    .btn-secondary {
        background: linear-gradient(90deg, #d2b48c, #fff, #d2b48c);
        background-size: 200% 200%;
        color: #fff;
        border: 2px solid #d2b48c;
        border-radius: 5px;
        padding: 10px 20px;
        text-align: center;
        transition: background-position 0.3s ease, color 0.3s ease;
    }

    .btn-secondary:hover {
        background-position: -200% 0;
        color: #000;
    }

    /* CSS cho phần tử show và search */
    .dataTables_length, .dataTables_filter {
        margin-bottom: 20px;
    }

    .dataTables_length select, .dataTables_filter input {
        border: 2px solid #d2b48c;
        border-radius: 5px;
        padding: 5px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .dataTables_length select:focus, .dataTables_filter input:focus {
        border-color: #8b4513;
        box-shadow: 0 0 5px rgba(139, 69, 19, 0.5);
        outline: none;
    }
</style>
@endpush

@push('scripts-dependencies')
<script src="/js/transaction.js"></script>
<script src="/js/transaction_table.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#transaction_table').DataTable();

        // Hiệu ứng chuyển động cho các hàng trong bảng
        $('#transaction_table tbody').on('mouseenter', 'tr', function() {
            $(this).css('transform', 'scale(1.02)');
            $(this).css('box-shadow', '0 4px 8px rgba(0, 0, 0, 0.2)');
        });

        $('#transaction_table tbody').on('mouseleave', 'tr', function() {
            $(this).css('transform', 'scale(1)');
            $(this).css('box-shadow', 'none');
        });
    });
</script>
@endpush

@section('content')
<main>
  <div class="container-fluid px-4 mt-4">

    <!-- flasher -->
    @if(session()->has('message'))
    {!! session("message") !!}
    @endif

    @include('/partials/breadcumb')

    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-fw fa-solid fa-money-check-dollar me-1"></i>
        Giao dịch
      </div>
      <div class="card-body">
        <a href="/transaction/add_outcome" title="thêm chi phí" class="float-end mb-3">
          <button class='btn btn-secondary'>Thêm chi phí</button>
        </a>
        <table id="transaction_table">
          <thead>
            <tr>
              <th>Chỉ số</th>
              <th>Tiêu đề</th>
              <th>Mô tả</th>
              <th>Thu nhập</th>
              <th>Chi phí</th>
              <th>Ngày tạo</th>
              <th>Ngày cập nhật</th>
              <th>Giao diện</th>
            </tr>
          </thead>
          <tbody>
            @php
            $inc = 0
            @endphp
            @foreach ($transactions as $transaction)
            <tr>
              <td>{{ ++$inc }}</td>
              <td>{{ $transaction->category->category_name }}</td>
              <td>{{ $transaction->description }}</td>
              <td>{{$transaction->income ? $transaction->income : "----"}}</td>
              <td>{{$transaction->outcome ? $transaction->outcome : "----"}}</td>
              <td>{{$transaction->created_at->format('d-m-Y')}}</td>
              <td>{{$transaction->updated_at->format('d-m-Y')}}</td>
              <td>
                <button class="btn btn-secondary button_edit_transaction" data-transactionId="{{ $transaction->id }}"
                  data-isOutcome="{{ $transaction->outcome? '1' : '0' }}"><i class="fas fa-solid fa-marker"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection
