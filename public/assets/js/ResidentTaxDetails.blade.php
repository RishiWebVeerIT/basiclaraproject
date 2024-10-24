@extends('layouts.master')
@section('page-title', $page_title)
@section('section')
    <table>
        <tr>
            <td>
                <h4>{{ lang('reciept.property_owner_name') }}</h4>
            </td>
            <td>
                <h4> : {{ucwords( $data->firstname . ' ' . $data->middlename . ' ' . $data->lastname )}}</h4>
            </td>
        </tr>
    </table>
 <!--    <p>
        <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
            aria-controls="collapseExample" style="float: right">
            Add New
        </button>
    </p> -->
    <br><br>
    <br>
    <h3>{{ lang('form.property_tax_information') }} <span class="btn btn-info text-white" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
            aria-controls="collapseExample">
            Add New
        </span>
    </h3>
    <div class="collapse" id="collapseExample">
        <div class="bg-light pd-60px">
            <form action="{{ route('resident.tax.details.save', [$data->id, $year]) }}" method="post">
                @csrf
                {{-- <div class="row d-flex justify-content-between">
                        
                        <div class="col-md-2">
                            <label><span class="text-danger">*</span>{{ lang('home.monthly') }}/{{ lang('home.yearly') }}</label>
                            <select id="time" name="tax_type" class="form-control mb-3">
                                <option value="0" selected>{{ lang('home.monthly') }}</option>
                                <option value="1">{{ lang('home.yearly') }}</option>
                            </select>
                        </div>
                    </div> --}}
                <div class="row">
                    <div class="form-group col-md-3 year">
                        <label for="year_from"><span class="text-danger">*</span>{{ lang('form.year_from') }}</label><small
                            style="color:red;">
                            @error('year_from')
                                {{ text($message) }}
                            @enderror
                        </small>
                        <input class="form-control" name="year_from" value="{{ $taxYear->year_from }}" style="width: 100%;"
                            type="text" readonly>

                    </div>
                    <div class="form-group col-md-3 year">
                        <label for="year_to"><span class="text-danger">*</span>{{ lang('form.year_to') }}</label><small
                            style="display: none;"
                            class="date-error text-danger">{{ lang('form.year_error') }}</small><small style="color:red;">
                            @error('year_to')
                                {{ text($message) }}
                            @enderror
                        </small>
                        <input class="form-control" name="year_to" value="{{ $taxYear->year_to }}" style="width: 100%;"
                            type="text" readonly>
                    </div>

                    {{-- <div class="form-group col-md-3 month" style="display:none;">
                            <label for="month_from"><span class="text-danger">*</span>{{ lang('form.month_from') }}</label>
                            <select id="month_from" name="month_from" class="form-control mb-3" required>
                                <option value=1>{{ lang('months.1') }}</option>
                                <option value=2>{{ lang('months.2') }}</option>
                                <option value=3>{{ lang('months.3') }}</option>
                                <option value=4>{{ lang('months.4') }}</option>
                                <option value=5>{{ lang('months.5') }}</option>
                                <option value=6>{{ lang('months.6') }}</option>
                                <option value=7>{{ lang('months.7') }}</option>
                                <option value=8>{{ lang('months.8') }}</option>
                                <option value=9>{{ lang('months.9') }}</option>
                                <option value=10>{{ lang('months.10') }}</option>
                                <option value=11>{{ lang('months.11') }}</option>
                                <option value=12>{{ lang('months.12') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 month" style="display:none;">
                            <label for="month_to"><span class="text-danger">*</span>{{ lang('form.month_to') }}</label>
                            <select id="month_to" name="month_to" class="form-control mb-3" disabled>
                                <option value=1>{{ lang('months.1') }}</option>
                                <option value=2 selected>{{ lang('months.2') }}</option>
                                <option value=3>{{ lang('months.3') }}</option>
                                <option value=4>{{ lang('months.4') }}</option>
                                <option value=5>{{ lang('months.5') }}</option>
                                <option value=6>{{ lang('months.6') }}</option>
                                <option value=7>{{ lang('months.7') }}</option>
                                <option value=8>{{ lang('months.8') }}</option>
                                <option value=9>{{ lang('months.9') }}</option>
                                <option value=10>{{ lang('months.10') }}</option>
                                <option value=11>{{ lang('months.11') }}</option>
                                <option value=12>{{ lang('months.12') }}</option>
                            </select>
                        </div> --}}
                    <div class="form-group col-md-3">
                        <label for="plot_area"><span class="text-danger">*</span>{{ lang('form.plot_area') }}</label>
                        <input class="form-control form-controller" id="plot_area" name="plot_area"
                            placeholder={{ lang('form.plot_area') }} type="text"
                            onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="type_of_Property"><span
                                class="text-danger">*</span>{{ lang('form.types_of_property') }}</label>
                        <select id="type_of_Property" name="type_of_Property" class="form-control mb-3" required>
                            <option value={{ lang('form.residential') }}>{{ lang('form.residential') }}</option>
                            <option value={{ lang('form.commercial') }}>{{ lang('form.commercial') }}</option>
                        </select>

                    </div>
                    <div class="form-group col-md-3">
                        <label for="uses_factor"><span class="text-danger">*</span>{{ lang('form.uses_factor') }}</label>
                        <select id="uses_factor" name="uses_factor" class="form-control mb-3" required>
                            <option value={{ lang('form.self_use') }}>{{ lang('form.self_use') }}</option>
                            <option value={{ lang('form.rental') }}>{{ lang('form.rental') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="floor"><span class="text-danger">*</span>{{ lang('form.floor') }}</label>
                        <select id="floor" name="floor" class="form-control mb-3" required>
                            <option value="Ground">{{ lang('form.Ground') }}</option>
                            <option value={{ lang('form.1st-Floor') }}>{{ lang('form.1st-Floor') }}</option>
                            <option value={{ lang('form.2nd-Floor') }}>{{ lang('form.2nd-Floor') }}</option>
                            <option value={{ lang('form.3rd-Floor') }}>{{ lang('form.3rd-Floor') }}</option>
                            <option value={{ lang('form.4th-Floor') }}>{{ lang('form.4th-Floor') }}</option>
                            <option value={{ lang('form.5th-Floor') }}>{{ lang('form.5th-Floor') }}</option>
                            <option value={{ lang('form.6th-Floor') }}>{{ lang('form.6th-Floor') }}</option>
                            <option value={{ lang('form.7th-Floor') }}>{{ lang('form.7th-Floor') }}</option>
                            <option value={{ lang('form.8th-Floor') }}>{{ lang('form.8th-Floor') }}</option>
                            <option value={{ lang('form.9th-Floor') }}>{{ lang('form.9th-Floor') }}</option>
                            <option value={{ lang('form.10th-Floor') }}>{{ lang('form.10th-Floor') }}</option>
                            <option value={{ lang('form.11th-Floor') }}>{{ lang('form.11th-Floor') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="construction"><span
                                class="text-danger">*</span>{{ lang('form.type_of_construction') }}</label>
                        <input type="text" name="construction_type" class="form-control mb-3"
                            placeholder={{ lang('form.type_of_construction') }} required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="area"><span class="text-danger">*</span>{{ lang('form.constructed_area') }}</label>
                        <input type="text" name="construction_area" id="constructed_area" class="form-control mb-3"
                            placeholder={{ lang('form.constructed_area') }}
                            onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="rate"><span class="text-danger">*</span>{{ lang('form.rate') }}</label><small
                            id="ca-error" class="text-danger"></small>
                        <div class="input-group">
                            <input type="text" id="rate" name="rate" class="form-control mb-3 keyup"
                                placeholder={{ lang('form.rate') }}
                                onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text custom_border_span">₹</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="discount_percent">{{ lang('form.discount') }}</label>
                        <div class="input-group">
                            <input type="text" name="discount_percent" id="discount_percent" placeholder="Percent"
                                onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                class="form-control mb-3 keyup">
                            <div class="input-group-prepend">
                                <span class="input-group-text custom_border_span">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="value">{{ lang('form.value') }}</label>
                        <div class="input-group">
                            <input type="text" name="value" id="value" placeholder={{ lang('form.value') }}
                                class="form-control mb-3" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text custom_border_span">₹</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="discount">{{ lang('form.discount') }}</label>
                        <div class="input-group">
                            <input type="text" name="discount" id="discount" placeholder={{ lang('form.discount') }}
                                class="form-control mb-3" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text custom_border_span">₹</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="taxable_property">{{ lang('form.taxable-property') }}</label>
                        <div class="input-group">
                            <input type="text" name="taxable_property" id="taxable_property"
                                placeholder={{ lang('form.taxable-property') }} class="form-control mb-3" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text custom_border_span">₹</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-warning">{{ lang('form.add_details') }}</button>
            </form>
        </div>
    </div> <!-- ..... Collaps Div Closed.... -->
    <br><br>
    <table class="table table-bordered data-table-show">
        <thead>
            <tr>
                <th scope="col">{{ lang('form.year') }}</th>
                <th scope="col">{{ lang('form.types_of_property') }}</th>
                <th scope="col">{{ lang('form.plot_area') }}</th>
                <th scope="col">{{ lang('form.uses_factor') }}</th>
                <th scope="col">{{ lang('form.floor') }}</th>
                <th scope="col">{{ lang('form.type_of_construction') }}</th>
                <th scope="col">{{ lang('form.constructed_area') }}</th>
                <th scope="col">{{ lang('form.rate') }}</th>
                <th scope="col">{{ lang('form.discount') }} %</th>
                <th scope="col">{{ lang('form.discount') }}</th>
                <th scope="col">{{ lang('form.value') }}</th>
                <th scope="col">{{ lang('form.taxable-property') }}</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($taxData as $tax)
                <tr>
                    <td>{{ $tax->year }}</td>
                    <td>{{ $tax->property_type }}</td>
                    <td>{{ $tax->plot_area }}</td>
                    <td>{{ $tax->uses_factor }}</td>
                    <td>{{ $tax->floor }}</td>
                    <td>{{ $tax->construction_type }}</td>
                    <td>{{ $tax->constructed_area }}</td>
                    <td>{{ round($tax->rate, 2) }}</td>
                    <td>{{ $tax->discount_percent }}%</td>
                    <td>{{ round($tax->dicount, 2) }}</td>
                    <td>{{ getAmount($tax->value) }}</td>
                    <td>{{ round($tax->taxable_property, 2) }}</td>
                    <td><a href="javascript:void(0)" class="btn bidBtn" data-toggle="tooltip"
                            data-url="{{ route('resident.tax.details.update', [$data->id, $tax->id, $year]) }}"
                            data-year_from="{{ $tax->year_from }}" data-year_to="{{ $tax->year_to }}"
                            data-property_type="{{ $tax->property_type }}" data-plot_area="{{ $tax->plot_area }}"
                            data-uses_factor="{{ $tax->uses_factor }}" data-floor="{{ $tax->floor }}"
                            data-construction_type="{{ $tax->construction_type }}"
                            data-constructed_area="{{ $tax->constructed_area }}" data-rate="{{ round($tax->rate, 2) }}"
                            data-discount_percent="{{ $tax->discount_percent }}"
                            data-dicount="{{ round($tax->dicount, 2) }}" data-value="{{ getAmount($tax->value) }}"
                            data-taxable_property="{{ round($tax->taxable_property, 2) }}"><i
                                class="text-primary far fa-edit"></i></a></td>
                    <td>
                        <a href="{{ route('resident.tax.details.delete', [$data->id, $tax->id, $year]) }}"
                            role="button" class="btn"><i class="text-danger las la-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <h2>No Data Found</h2>
                </tr>
            @endforelse
        </tbody>
    </table>
    <br>
    <hr><br>
    <!-- .......................................................................................... -->
    @if (count($taxData))
        <div class="row d-flex justify-content-between">
            <h3 class="mb-t-b-30">{{ lang('form.other_taxes_information') }}</h3>
        </div>
        <!-- ...................................................................................................... -->
        <div class="bg-light pd-60px">
            @if ($Othertaxdetails)
                <form action="{{ route('resident.othertax.details.update', [$data->id, $Othertaxdetails->id, $year]) }}"
                    method="post" id="form-id">
                    @csrf
                    <div class="row">
                        {{-- <div class="form-group col-md-3 month2" style="display:none;">
                            <label for="month_from"><span class="text-danger">*</span>{{ lang('form.month_from') }}</label>
                            <select id="month_from2" name="month_from" class="form-control mb-3" required>
                                <option value=1>{{ lang('months.1') }}</option>
                                <option value=2>{{ lang('months.2') }}</option>
                                <option value=3>{{ lang('months.3') }}</option>
                                <option value=4>{{ lang('months.4') }}</option>
                                <option value=5>{{ lang('months.5') }}</option>
                                <option value=6>{{ lang('months.6') }}</option>
                                <option value=7>{{ lang('months.7') }}</option>
                                <option value=8>{{ lang('months.8') }}</option>
                                <option value=9>{{ lang('months.9') }}</option>
                                <option value=10>{{ lang('months.10') }}</option>
                                <option value=11>{{ lang('months.11') }}</option>
                                <option value=12>{{ lang('months.12') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 month2" style="display:none;">
                            <label for="month_to"><span class="text-danger">*</span>{{ lang('form.month_to') }}</label>
                            <select id="month_to2" name="month_to" class="form-control mb-3" disabled>
                                <option value=1>{{ lang('months.1') }}</option>
                                <option value=2 selected>{{ lang('months.2') }}</option>
                                <option value=3>{{ lang('months.3') }}</option>
                                <option value=4>{{ lang('months.4') }}</option>
                                <option value=5>{{ lang('months.5') }}</option>
                                <option value=6>{{ lang('months.6') }}</option>
                                <option value=7>{{ lang('months.7') }}</option>
                                <option value=8>{{ lang('months.8') }}</option>
                                <option value=9>{{ lang('months.9') }}</option>
                                <option value=10>{{ lang('months.10') }}</option>
                                <option value=11>{{ lang('months.11') }}</option>
                                <option value=12>{{ lang('months.12') }}</option>
                            </select>
                        </div> -->
                        <!--    <div class="form-group col-md-3 year">
                            <label for="year_from"><span class="text-danger">*</span>{{ lang('form.year_from') }}</label><small style="color:red;">
        @error('year_from')
        {{ text($message) }}
    @enderror
        </small>
                            <input class="year_from form-control" id="year_from" name="year_from" style="width: 100%;"
                                type="text">
                                
                        </div>
                        <div class="form-group col-md-3 year">
                            <label for="year_to"><span class="text-danger">*</span>{{ lang('form.year_to') }}</label><small
                                style="display: none;" class="date-error text-danger">{{ lang('form.year_error') }}</small><small style="color:red;">
        @error('year_to')
        {{ text($message) }}
    @enderror
        </small>
                            <input class="year_to form-control" name="year_to" id="year_to" style="width: 100%;" type="text">
                        </div> --}}
                        <div class="form-group col-md-3">
                            <label for="property_tax"><span
                                    class="text-danger">*</span>{{ lang('form.property_tax') }}</label>
                            <div class="input-group">
                                <input type="text" id="property_tax" name="property_tax"
                                    class="form-control mb-3 otd" value="{{ round($Othertaxdetails->Property_tax, 2) }}"
                                    placeholder={{ lang('form.property_tax') }} readonly>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="consolidated_tax"><span
                                    class="text-danger">*</span>{{ lang('form.consolidated_tax') }}</label>
                            <div class="input-group">
                                <input type="text" id="consolidated_tax"
                                    value="{{ round($Othertaxdetails->consolidated_tax, 2) }}" name="consolidated_tax"
                                    class="form-control mb-3 otd" placeholder={{ lang('form.consolidated_tax') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="urban_dev_tax"><span
                                    class="text-danger">*</span>{{ lang('form.urban_development_cess') }}</label>
                            <div class="input-group">
                                <input type="text" name="urben_dev_tax" id="urban_dev_tax"
                                    class="form-control mb-3 otd"
                                    value="{{ round($Othertaxdetails->urban_dev_tax, 2) }}"
                                    placeholder={{ lang('form.urban_development_cess') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="education_tax"><span
                                    class="text-danger">*</span>{{ lang('form.education_cess') }}</label>
                            <div class="input-group">
                                <input type="text" name="education_tax" id="education_tax"
                                    class="form-control mb-3 otd"
                                    value="{{ round($Othertaxdetails->education_tax, 2) }}"
                                    placeholder={{ lang('form.education_cess') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" style="margin-bottom: 30px;">
                            <div class="card border--dark">
                                <h5 class="card-header bg--dark">@lang('Water / Garbage Tax')
                                    <button type="button" class="btn btn-sm btn-secondary addNewFields"
                                        style="float: right;">
                                        <i class="fa la-fw la-plus" style="font-size: 14px;"></i>@lang('Add New')
                                    </button>
                                </h5>
                                <div class="card-body addedField">
                                    @forelse($Othertaxdetails->garbage_water_tax as $key => $i)
                                        <div class="col-md-12 row other-data">
                                            <div class="form-group col-md-3 month2">
                                                <label for="month_from"><span
                                                        class="text-danger">*</span>{{ lang('form.month_from') }}</label>
                                                <select id="month_from2" name="month[]" class="form-control mb-3"
                                                    required>
                                                    <option @if ($i->month == 1) selected @endif value=1>
                                                        {{ lang('months.1') }}</option>
                                                    <option @if ($i->month == 2) selected @endif value=2>
                                                        {{ lang('months.2') }}</option>
                                                    <option @if ($i->month == 3) selected @endif value=3>
                                                        {{ lang('months.3') }}</option>
                                                    <option @if ($i->month == 4) selected @endif value=4>
                                                        {{ lang('months.4') }}</option>
                                                    <option @if ($i->month == 5) selected @endif value=5>
                                                        {{ lang('months.5') }}</option>
                                                    <option @if ($i->month == 6) selected @endif value=6>
                                                        {{ lang('months.6') }}</option>
                                                    <option @if ($i->month == 7) selected @endif value=7>
                                                        {{ lang('months.7') }}</option>
                                                    <option @if ($i->month == 8) selected @endif value=8>
                                                        {{ lang('months.8') }}</option>
                                                    <option @if ($i->month == 9) selected @endif value=9>
                                                        {{ lang('months.9') }}</option>
                                                    <option @if ($i->month == 10) selected @endif value=10>
                                                        {{ lang('months.10') }}</option>
                                                    <option @if ($i->month == 11) selected @endif value=11>
                                                        {{ lang('months.11') }}</option>
                                                    <option @if ($i->month == 12) selected @endif value=12>
                                                        {{ lang('months.12') }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="water_tax"><span
                                                        class="text-danger">*</span>{{ lang('form.water_user_charges') }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="water_tax[]"
                                                        class="form-control mb-3 otd" value="{{ $i->water_tax }}"
                                                        placeholder={{ lang('form.water_user_charges') }}
                                                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                                        required>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text custom_border_span">₹</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="garbade_fee"><span
                                                        class="text-danger">*</span>{{ lang('form.garbage_fee') }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="garbage_fee[]"
                                                        class="form-control mb-3 otd garbage_fee"
                                                        value="{{ $i->garbage_fee }}"
                                                        placeholder={{ lang('form.garbage_fee') }}
                                                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                                        required>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text custom_border_span">₹</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="input-group-btn col-md-1 text-right">
                                                <br>
                                                <button class="btn btn-lg removeBtn w-100"
                                                    @if ($loop->first) disabled @endif type="button">
                                                    <i class="las la-trash text-danger" style="font-size:25px"></i>
                                                </button>
                                            </span>
                                        </div>

                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="service_tax"><span
                                    class="text-danger">*</span>{{ lang('form.service_tax') }}</label>
                            <div class="input-group">
                                <input type="text" name="service_tax" id="service_tax" class="form-control mb-3 otd"
                                    value="{{ round($Othertaxdetails->service_tax, 2) }}"
                                    placeholder={{ lang('form.service_tax') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="rebate"><span class="text-danger">*</span>{{ lang('form.rebate') }}</label>
                            <div class="input-group">
                                <input type="text" name="rebate" value="{{ round($Othertaxdetails->rebate, 2) }}"
                                    class="form-control mb-3 otd" id="rebate" placeholder={{ lang('form.rebate') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="surcharge_fee"><span
                                    class="text-danger">*</span>{{ lang('form.surcharge_fee') }}</label>
                            <div class="input-group">
                                <input type="text" name="surcharge_fee" id="surcharge_fee"
                                    class="form-control mb-3 otd"
                                    value="{{ round($Othertaxdetails->surcharge_fee, 2) }}"
                                    placeholder={{ lang('form.surcharge_fee') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                      <!--   <div class="form-group col-md-3">
                            <label for="advance_deposit">{{ lang('form.advance_deposit') }}</label>
                            <div class="input-group">
                                <input type="text" name="advance_deposit" id="advance_deposit"
                                    class="form-control mb-3 otd"
                                    value="{{ round($Othertaxdetails->advance_deposit, 2) }}"
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                    placeholder="Advance Deposit" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group col-md-3">
                            <label for="total">{{ lang('form.total') }}</label>
                            <div class="input-group">
                                <input type="text" readonly name="total" id="total" class="form-control mb-3"
                                    value="{{ round($Othertaxdetails->total, 2) }}"
                                    placeholder={{ lang('form.total') }}>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <input name="garbage_tax_total" id="garbage_tax_total" style="display: none;">
                    <input name="water_tax_total" id="water_tax_total" style="display: none;">

                    <button class="btn btn-warning OtUpdate">{{ lang('form.update') }}</button>
                </form>
            @else
                <form action="{{ route('resident.othertax.details.save', [$data->id, $year]) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="property_tax"><span
                                    class="text-danger">*</span>{{ lang('form.property_tax') }}</label>
                            <div class="input-group">
                                <input type="text" id="property_tax" name="property_tax"
                                    class="form-control mb-3 otd" value="{{ round($taxData_sum, 2) }}"
                                    placeholder={{ lang('form.property_tax') }} readonly>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="consolidated_tax"><span
                                    class="text-danger">*</span>{{ lang('form.consolidated_tax') }}</label>
                            <div class="input-group">
                                <input type="text" id="consolidated_tax" name="consolidated_tax"
                                    class="form-control mb-3 otd" placeholder={{ lang('form.consolidated_tax') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="urban_dev_tax"><span
                                    class="text-danger">*</span>{{ lang('form.urban_development_cess') }}</label>
                            <div class="input-group">
                                <input type="text" name="urben_dev_tax" id="urban_dev_tax"
                                    class="form-control mb-3 otd" placeholder={{ lang('form.urban_development_cess') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="education_tax"><span
                                    class="text-danger">*</span>{{ lang('form.education_cess') }}</label>
                            <div class="input-group">
                                <input type="text" name="education_tax" id="education_tax"
                                    class="form-control mb-3 otd" placeholder={{ lang('form.education_cess') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" style="margin-bottom: 30px;">
                            <div class="card border--dark">
                                <h5 class="card-header bg--dark">@lang('Water / Garbage Tax')
                                    <button type="button" class="btn btn-sm btn-secondary addNewFields"
                                        style="float: right;">
                                        <i class="fa la-fw la-plus" style="font-size: 14px;"></i>@lang('Add New')
                                    </button>
                                </h5>

                                <div class="card-body addedField">
                                    <div class="col-md-12 row other-data">
                                        <div class="form-group col-md-3 month2">
                                            <label for="month_from"><span
                                                    class="text-danger">*</span>{{ lang('form.month_from') }}</label>
                                            <select id="month_from2" name="month[]" class="form-control mb-3" required>
                                                <option value=1>{{ lang('months.1') }}</option>
                                                <option value=2>{{ lang('months.2') }}</option>
                                                <option value=3>{{ lang('months.3') }}</option>
                                                <option value=4>{{ lang('months.4') }}</option>
                                                <option value=5>{{ lang('months.5') }}</option>
                                                <option value=6>{{ lang('months.6') }}</option>
                                                <option value=7>{{ lang('months.7') }}</option>
                                                <option value=8>{{ lang('months.8') }}</option>
                                                <option value=9>{{ lang('months.9') }}</option>
                                                <option value=10>{{ lang('months.10') }}</option>
                                                <option value=11>{{ lang('months.11') }}</option>
                                                <option value=12>{{ lang('months.12') }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="water_tax"><span
                                                    class="text-danger">*</span>{{ lang('form.water_user_charges') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="water_tax[]" class="form-control mb-3 otd"
                                                    placeholder={{ lang('form.water_user_charges') }}
                                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                                    required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text custom_border_span">₹</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="garbade_fee"><span
                                                    class="text-danger">*</span>{{ lang('form.garbage_fee') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="garbage_fee[]"
                                                    class="form-control mb-3 otd garbage_fee"
                                                    placeholder={{ lang('form.garbage_fee') }}
                                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                                    required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text custom_border_span">₹</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="input-group-btn col-md-1 text-right">
                                            <br>
                                            <button class="btn btn-lg removeBtn w-100" type="button" disabled>
                                                <i class="las la-trash text-danger" style="font-size:25px"></i>
                                            </button>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="service_tax"><span
                                    class="text-danger">*</span>{{ lang('form.service_tax') }}</label>
                            <div class="input-group">
                                <input type="text" name="service_tax" id="service_tax" class="form-control mb-3 otd"
                                    placeholder={{ lang('form.service_tax') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="rebate"><span class="text-danger">*</span>{{ lang('form.rebate') }}</label>
                            <div class="input-group">
                                <input type="text" name="rebate" class="form-control mb-3 otd" id="rebate"
                                    placeholder={{ lang('form.rebate') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="surcharge_fee"><span
                                    class="text-danger">*</span>{{ lang('form.surcharge_fee') }}</label>
                            <div class="input-group">
                                <input type="text" name="surcharge_fee" id="surcharge_fee"
                                    class="form-control mb-3 otd" placeholder={{ lang('form.surcharge_fee') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                       <!--  <div class="form-group col-md-3">
                            <label for="advance_deposit">{{ lang('form.advance_deposit') }}</label>
                            <div class="input-group">
                                <input type="text" name="advance_deposit" id="advance_deposit"
                                    class="form-control mb-3 otd"
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                    placeholder="Advance Deposit" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group col-md-3">
                            <label for="total">{{ lang('form.total') }}</label>
                            <div class="input-group">
                                <input type="text" readonly name="total" id="total" class="form-control mb-3"
                                    placeholder={{ lang('form.total') }}>
                                <div class="input-group-prepend">
                                    <span class="input-group-text custom_border_span">₹</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <input name="garbage_tax_total" id="garbage_tax_total" style="display: none;">
                    <input name="water_tax_total" id="water_tax_total" style="display: none;">

                    <button type="submit" class="btn btn-warning">{{ lang('form.add_details') }}</button>
                </form>
            @endif

        </div>
    @endif

    <br><br>
    <!-- <div class="row col-sm-6 w-100 justify-content-between"> -->
    @if ($yTax)
        <h3>Tax Details</h3>
        <div class="col-sm-6">
            <div class="card text-white" style="background: #642629;">
                <a href="{{ route('yearly.tax.details', [$data->id, $taxYear->year]) }}">
                    <div class="card-body text-center">
                        <p class="card-text">{{ lang('form.see_details') }}</p>
                    </div>
                </a>
            </div>
        </div>
    @endif






    <!-- The Modal -->
    <div class="modal fade" id="bidModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-white-smoke">

                <!-- Modal Header -->
                <div class="modal-header custom_border">
                    <h4 class="modal-title">{{ lang('form.property_tax_information') }}</h4>
                </div>

                <form action="" method="post">
                    @csrf

                    <!-- Modal body -->
                    <div class="bg-light pd-60px">


                        <div class="row">
                            <div class="form-group col-md-3 year">
                                <label for="year_from"><span
                                        class="text-danger">*</span>{{ lang('form.year_from') }}</label>
                                <input class="form-control year_from" name="year_from"
                                    value="{{ $taxYear->year_from }}" style="width: 100%;" type="text" readonly>

                            </div>
                            <div class="form-group col-md-3 year">
                                <label for="year_to"><span
                                        class="text-danger">*</span>{{ lang('form.year_to') }}</label>
                                <input class="form-control year_to" name="year_to" style="width: 100%;" type="text"
                                    readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="plot_area"><span
                                        class="text-danger">*</span>{{ lang('form.plot_area') }}</label>
                                <input class="form-control form-controller plot_area" id="plot_area" name="plot_area"
                                    placeholder={{ lang('form.plot_area') }} type="text"
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="type_of_Property"><span
                                        class="text-danger">*</span>{{ lang('form.types_of_property') }}</label>
                                <select id="type_of_Property" name="type_of_Property"
                                    class="form-control mb-3 type_of_Property" required>
                                    <option value={{ lang('form.residential') }}>{{ lang('form.residential') }}</option>
                                    <option value={{ lang('form.commercial') }}>{{ lang('form.commercial') }}</option>
                                </select>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="uses_factor"><span
                                        class="text-danger">*</span>{{ lang('form.uses_factor') }}</label>
                                <select id="uses_factor" name="uses_factor" class="form-control mb-3 uses_factor"
                                    required>
                                    <option value={{ lang('form.self_use') }}>{{ lang('form.self_use') }}</option>
                                    <option value={{ lang('form.rental') }}>{{ lang('form.rental') }}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="floor"><span class="text-danger">*</span>{{ lang('form.floor') }}</label>
                                <select id="floor" name="floor" class="form-control mb-3 floor" required>
                                    <option value="Ground">{{ lang('form.Ground') }}</option>
                                    <option value={{ lang('form.1st-Floor') }}>{{ lang('form.1st-Floor') }}</option>
                                    <option value={{ lang('form.2nd-Floor') }}>{{ lang('form.2nd-Floor') }}</option>
                                    <option value={{ lang('form.3rd-Floor') }}>{{ lang('form.3rd-Floor') }}</option>
                                    <option value={{ lang('form.4th-Floor') }}>{{ lang('form.4th-Floor') }}</option>
                                    <option value={{ lang('form.5th-Floor') }}>{{ lang('form.5th-Floor') }}</option>
                                    <option value={{ lang('form.6th-Floor') }}>{{ lang('form.6th-Floor') }}</option>
                                    <option value={{ lang('form.7th-Floor') }}>{{ lang('form.7th-Floor') }}</option>
                                    <option value={{ lang('form.8th-Floor') }}>{{ lang('form.8th-Floor') }}</option>
                                    <option value={{ lang('form.9th-Floor') }}>{{ lang('form.9th-Floor') }}</option>
                                    <option value={{ lang('form.10th-Floor') }}>{{ lang('form.10th-Floor') }}</option>
                                    <option value={{ lang('form.11th-Floor') }}>{{ lang('form.11th-Floor') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="construction"><span
                                        class="text-danger">*</span>{{ lang('form.type_of_construction') }}</label>
                                <input type="text" name="construction_type"
                                    class="form-control mb-3 construction_type"
                                    placeholder={{ lang('form.type_of_construction') }} required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="area"><span
                                        class="text-danger">*</span>{{ lang('form.constructed_area') }}</label>
                                <input type="text" name="construction_area" id="constructed_area"
                                    class="form-control mb-3 popupkeyup constructed_area area"
                                    placeholder={{ lang('form.constructed_area') }}
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="rate"><span
                                        class="text-danger">*</span>{{ lang('form.rate') }}</label><small id="ca-error"
                                    class="text-danger"></small>
                                <div class="input-group">
                                    <input type="text" id="rate" name="rate"
                                        class="form-control mb-3 popupkeyup rate popuprate"
                                        placeholder={{ lang('form.rate') }}
                                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text custom_border_span">₹</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="discount_percent">{{ lang('form.discount') }}</label>
                                <div class="input-group">
                                    <input type="text" name="discount_percent" id="discount_percent"
                                        placeholder="Percent"
                                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                        class="form-control mb-3 popupkeyup discount_percent popupdiscount">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text custom_border_span">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="value">{{ lang('form.value') }}</label>
                                <div class="input-group">
                                    <input type="text" name="value" id="value"
                                        placeholder={{ lang('form.value') }} class="form-control mb-3 value popupvalue"
                                        readonly>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text custom_border_span">₹</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="discount">{{ lang('form.discount') }}</label>
                                <div class="input-group">
                                    <input type="text" name="discount" id="discount"
                                        placeholder={{ lang('form.discount') }}
                                        class="form-control mb-3 dicount popupdicount" readonly>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text custom_border_span">₹</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="taxable_property">{{ lang('form.taxable-property') }}</label>
                                <div class="input-group">
                                    <input type="text" name="taxable_property" id="taxable_property"
                                        placeholder={{ lang('form.taxable-property') }}
                                        class="form-control mb-3 taxable_property popuptaxable_property" readonly>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text custom_border_span">₹</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-warning">{{ lang('form.update') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.year_from').datepicker({
            minViewMode: 2,
            format: '01/04/yyyy'
        });
        $('.year_to').datepicker({
            minViewMode: 2,
            format: '31/03/yyyy'
        });
        let year_from;
        let value;
        $(document).click(function() {
            year_from = $('#year_from').val();
            value = !year_from == '';
            if (value) {
                let year_to = $('#year_to').val();
                if (year_from < year_to) {
                    $('.date-error').hide();
                } else {
                    $('.date-error').show();
                }
            }
        });


        // dateFormat: "yy-mm-dd"
        $('.keyup').keyup(function() {
            $rate_value = $('#rate').val();
            $constuctedArea = $('#constructed_area').val();
            $percent = Number($('#discount_percent').val());
            if ($constuctedArea == " ") {
                $('#ca-error').text(' Fill first Constructed area field');
            } else {
                $('#ca-error').text('');
                $value_value = ($constuctedArea * $rate_value);
                $('#value').val($value_value);

                $discounted_value = (($value_value / 100) * $percent);
                $('#discount').val($discounted_value);

                $taxable_amount = ($value_value - $discounted_value);

                $('#taxable_property').val($taxable_amount);
                // $('#property_tax').val($taxable_amount);

            }

        });

        $('.popupkeyup').keyup(function() {
            $rate_value = $('.popuprate').val();
            $constuctedArea = $('.area').val();
            $percent = Number($('.popupdiscount').val());
            if ($constuctedArea == " ") {
                $('#ca-error').text(' Fill first Constructed area field');
            } else {
                $('#ca-error').text('');
                $value_value = ($constuctedArea * $rate_value);
                $('.popupvalue').val($value_value);

                $discounted_value = (($value_value / 100) * $percent);
                $('.popupdicount').val($discounted_value);

                $taxable_amount = ($value_value - $discounted_value);

                $('.popuptaxable_property').val($taxable_amount);
                // $('#property_tax').val($taxable_amount);

            }

        });


        $('.otd').keyup(function() {

            var watertax = $("input[name='water_tax[]']")
                .map(function() {
                    return $(this).val();;
                }).get();

            var gtax = $("input[name='garbage_fee[]']")
                .map(function() {
                    return $(this).val();
                }).get();

            $total_watertax = 0;
            $total_gtax = 0;
            $.each(watertax, function() {
                $total_watertax += parseInt(this, 10);
            });
            $.each(gtax, function() {
                $total_gtax += parseInt(this, 10);
            });

            $('#garbage_tax_total').val($total_watertax);
            $('#water_tax_total').val($total_gtax);


            $ptax = Number($('#property_tax').val());
            $ctax = Number($('#consolidated_tax').val());
            $udtax = Number($('#urban_dev_tax').val());
            $servtax = Number($('#service_tax').val());
            $edutax = Number($('#education_tax').val());
            // $watertax = Number($('.water_tax').val());
            // $gtax = Number($('.garbage_fee').val());
            $rebet = Number($('#rebate').val());
            $stax = Number($('#surcharge_fee').val());
            // $deposit = Number($('#advance_deposit').val());
            console.log("------------------------------------------------------");
            console.log("Water/Garbage tax "+ ($total_watertax + $total_gtax));
            console.log("Property tax "+ $ptax );
            console.log("Conso tax "+ $ctax );
            console.log("Urban tax "+ $udtax );
            console.log("Education tax "+ $edutax );
            console.log("Serve tax "+ $servtax );
            console.log("Rebate tax "+ $rebet );
            console.log("Surg tax "+ $stax );

            $total = $ptax + $ctax + $udtax + $servtax + $edutax + $rebet + $stax + $total_watertax + $total_gtax;
            $("#total").val($total);

            console.log("Total "+ $total );
        });

        $('.addNewFields').on('click', function() {
            var html = `
                <div class="col-md-12 row other-data">
                  <div class="form-group col-md-3 month2" >
                    <label for="month_from"><span class="text-danger">*</span>{{ lang('form.month_from') }}</label>
                    <select id="month_from2" name="month[]" class="form-control mb-3" required>
                        <option value=1>{{ lang('months.1') }}</option>
                        <option value=2>{{ lang('months.2') }}</option>
                        <option value=3>{{ lang('months.3') }}</option>
                        <option value=4>{{ lang('months.4') }}</option>
                        <option value=5>{{ lang('months.5') }}</option>
                        <option value=6>{{ lang('months.6') }}</option>
                        <option value=7>{{ lang('months.7') }}</option>
                        <option value=8>{{ lang('months.8') }}</option>
                        <option value=9>{{ lang('months.9') }}</option>
                        <option value=10>{{ lang('months.10') }}</option>
                        <option value=11>{{ lang('months.11') }}</option>
                        <option value=12>{{ lang('months.12') }}</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="water_tax"><span
                            class="text-danger">*</span>{{ lang('form.water_user_charges') }}</label>
                    <div class="input-group">
                    <input type="text" name="water_tax[]" class="water_tax form-control mb-3 otd"
                        placeholder={{ lang('form.water_user_charges') }} required>
                        <div class="input-group-prepend">
                            <span class="input-group-text custom_border_span">₹</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="garbade_fee"><span class="text-danger">*</span>{{ lang('form.garbage_fee') }}</label>
                     <div class="input-group">
                    <input type="text" name="garbage_fee[]" class="form-control mb-3 otd garbage_fee"
                        placeholder={{ lang('form.garbage_fee') }} required>
                        <div class="input-group-prepend">
                            <span class="input-group-text custom_border_span">₹</span>
                        </div>
                    </div>
                </div>
                 
                    <span class="input-group-btn col-md-1 text-right">
                  <br>
                        <button class="btn btn-lg removeBtn w-100" type="button">
                            <i class="las la-trash text-danger" style="font-size:25px"></i>
                        </button>
                    </span>
                    
                </div>
                `;

            $('.addedField').append(html);
        });

        $(document).on('click', '.removeBtn', function() {
            $(this).closest('.other-data').remove();
        });

        $('.OtUpdate').click(function() {

            var watertax = $("input[name='water_tax[]']")
                .map(function() {
                    return $(this).val();;
                }).get();

            var gtax = $("input[name='garbage_fee[]']")
                .map(function() {
                    return $(this).val();
                }).get();

            $total_watertax = 0;
            $total_gtax = 0;
            $.each(watertax, function() {
                $total_watertax += parseInt(this, 10);
            });
            $.each(gtax, function() {
                $total_gtax += parseInt(this, 10);
            });

            $('#garbage_tax_total').val($total_watertax);
            $('#water_tax_total').val($total_gtax);

            $("#form-id").submit();
        });

        // Bid
        $('.bidBtn').on('click', function() {
            $('#amount').val("");

            var modal = $('#bidModal');
            var url = $(this).data('url');

            var year_from = $(this).data("year_from");
            var year_to = $(this).data("year_to");
            var property_type = $(this).data("property_type");
            var plot_area = $(this).data("plot_area");
            var uses_factor = $(this).data("uses_factor");
            var floor = $(this).data("floor");
            var construction_type = $(this).data("construction_type");
            var constructed_area = $(this).data("constructed_area");
            var rate = $(this).data("rate");
            var discount_percent = $(this).data("discount_percent");
            var dicount = $(this).data("dicount");
            var value = $(this).data("value");
            var taxable_property = $(this).data("taxable_property");

            $('.year_from').val(year_from);
            $('.year_to').val(year_to);
            $('.plot_area').val(plot_area);
            $('.construction_type').val(construction_type);
            $('.constructed_area').val(constructed_area);
            $('.rate').val(rate);
            $('.discount_percent').val(discount_percent);
            $('.dicount').val(dicount);
            $('.value').val(value);
            $('.taxable_property').val(taxable_property);

            // $('#uses_factor>option:eq(uses_factor)').attr('selected', true);
            $('.uses_factor [value=' + uses_factor + ']').attr('selected', 'true');
            $('.floor [value=' + floor + ']').attr('selected', 'true');
            $('.property_type [value=' + property_type + ']').attr('selected', 'true');

            modal.find('form').attr('action', url);
            modal.modal('show');


        });
    </script>
@endpush
@push('style')
    <style type="text/css">
        @media (min-width: 576px) {
            .modal-dialog {
                min-width: 80vw !important;
                margin: 1.75rem auto;
            }
        }
    </style>
@endpush
