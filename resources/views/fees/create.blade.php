@extends('layouts.dashboard')
@section('title', 'Add Fee')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.fees.index') }}">Fees</a>
    </li>
    <li class="breadcrumb-item active">Add Fee</li>
@endsection

@section('content')
    <div class="page-card">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h6 class="fw-bold mb-1" style="color:#1e293b">
                    Add New Fee
                </h6>

                <p class="text-muted mb-0" style="font-size:0.875rem">
                    Create a fee record for a student
                </p>
            </div>

            <a href="{{ route('dashboard.fees.index') }}"
               class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left me-1"></i>Back
            </a>
        </div>

        <form method="POST"
              action="{{ route('dashboard.fees.store') }}">
            @csrf

            <div class="row g-3">

                {{-- Student --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Student <span class="text-danger">*</span>
                    </label>

                    <select name="student_id"
                            class="form-select @error('student_id') is-invalid @enderror"
                            required>

                        <option value="">
                            Select Student
                        </option>

                        @foreach($students as $student)

                            <option value="{{ $student->id }}"
                                {{ old('student_id') == $student->id ? 'selected' : '' }}>

                                {{ $student->user->name }}
                                —
                                {{ $student->admission_number }}

                            </option>

                        @endforeach

                    </select>

                    @error('student_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Fee Type --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Fee Type <span class="text-danger">*</span>
                    </label>

                    <select name="fee_type_id"
                            id="feeType"
                            class="form-select @error('fee_type_id') is-invalid @enderror"
                            required>

                        <option value="">
                            Select Fee Type
                        </option>

                        @foreach($feeTypes as $feeType)

                            <option value="{{ $feeType->id }}"
                                    data-amount="{{ $feeType->amount }}"
                                {{ old('fee_type_id') == $feeType->id ? 'selected' : '' }}>

                                {{ $feeType->name }}

                                —
                                {{ setting('currency', 'KES') }}
                                {{ number_format($feeType->amount) }}

                            </option>

                        @endforeach

                    </select>

                    @error('fee_type_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Amount --}}
                <div class="col-md-4">

                    <label class="form-label">
                        Amount ({{ setting('currency', 'KES') }})
                        <span class="text-danger">*</span>
                    </label>

                    <input type="number"
                           name="amount"
                           id="amount"
                           class="form-control @error('amount') is-invalid @enderror"
                           value="{{ old('amount') }}"
                           min="0"
                           step="0.01"
                           required>

                    @error('amount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Discount --}}
                <div class="col-md-4">

                    <label class="form-label">
                        Discount ({{ setting('currency', 'KES') }})
                    </label>

                    <input type="number"
                           name="discount"
                           class="form-control @error('discount') is-invalid @enderror"
                           value="{{ old('discount', 0) }}"
                           min="0"
                           step="0.01">

                    @error('discount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Fine --}}
                <div class="col-md-4">

                    <label class="form-label">
                        Fine ({{ setting('currency', 'KES') }})
                    </label>

                    <input type="number"
                           name="fine"
                           class="form-control @error('fine') is-invalid @enderror"
                           value="{{ old('fine', 0) }}"
                           min="0"
                           step="0.01">

                    @error('fine')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Due Date --}}
                <div class="col-md-4">

                    <label class="form-label">
                        Due Date <span class="text-danger">*</span>
                    </label>

                    <input type="date"
                           name="due_date"
                           class="form-control @error('due_date') is-invalid @enderror"
                           value="{{ old('due_date', now()->format('Y-m-d')) }}"
                           required>

                    @error('due_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Month --}}
                <div class="col-md-4">

                    <label class="form-label">
                        Month
                    </label>

                    <select name="month"
                            class="form-select @error('month') is-invalid @enderror">

                        <option value="">
                            Select Month
                        </option>

                        @foreach([
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December'
                        ] as $month)

                            <option value="{{ $month }}"
                                {{ old('month') == $month ? 'selected' : '' }}>

                                {{ $month }}

                            </option>

                        @endforeach

                    </select>

                    @error('month')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Summary --}}
                <div class="col-md-4">

                    <label class="form-label">
                        Net Amount Due
                    </label>

                    <div class="form-control"
                         style="background:#f8fafc;font-weight:600">

                        <span id="netAmount">
                            {{ setting('currency', 'KES') }} 0
                        </span>

                    </div>

                </div>

                {{-- Buttons --}}
                <div class="col-12 mt-3">

                    <button type="submit"
                            class="btn btn-primary me-2">

                        <i class="fas fa-save me-2"></i>
                        Create Fee

                    </button>

                    <a href="{{ route('dashboard.fees.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </div>

        </form>

    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const feeType = document.getElementById('feeType');
    const amount = document.getElementById('amount');
    const discount = document.querySelector('input[name="discount"]');
    const fine = document.querySelector('input[name="fine"]');
    const netAmount = document.getElementById('netAmount');

    const currency = @json(setting('currency', 'KES'));

    function updateNetAmount() {

        const total =
            (parseFloat(amount.value) || 0)
            + (parseFloat(fine.value) || 0)
            - (parseFloat(discount.value) || 0);

        const safeTotal = Math.max(total, 0);

        netAmount.textContent =
            currency + ' ' +
            safeTotal.toLocaleString(undefined, {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            });
    }

    feeType.addEventListener('change', function () {

        const selected =
            this.options[this.selectedIndex];

        const feeAmount =
            selected.getAttribute('data-amount');

        if (feeAmount !== null && amount.value === '') {
            amount.value = feeAmount;
        }

        updateNetAmount();
    });

    amount.addEventListener('input', updateNetAmount);
    discount.addEventListener('input', updateNetAmount);
    fine.addEventListener('input', updateNetAmount);

    updateNetAmount();

});
</script>
@endpush
