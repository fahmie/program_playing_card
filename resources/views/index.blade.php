@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Distribute Playing Cards</h2>
    <div class="mb-3">
        <label for="numPeople" class="form-label">Enter number of people:</label>
        <input type="number" id="numPeople" class="form-control" min="1">
    </div>
    <button id="distributeBtn" class="btn btn-primary">Distribute</button>

    <div id="result" class="mt-4"></div>
</div>
@endsection
@push('scripts')
<script>
    $('#distributeBtn').on('click', function() {
        const numPeople = $('#numPeople').val();

        $.post('/distribute', {
            people: numPeople,
            _token: '{{ csrf_token() }}'
        }, function(data) {
            let output = "";
            data.forEach(row => {
                output += row.join(",") + "<br>";
            });
            $('#result').html(output);
        }).fail(function(xhr) {
            $('#result').html("<span class='text-danger'>" + xhr.responseText + "</span>");
        });
    });
</script>
@endpush
