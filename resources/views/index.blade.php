@php use Carbon\Carbon; @endphp
@extends('welcome')

@section('content')
<div class="container">
    <h4 style="padding-top: 20px; padding-bottom: 20px">Persons</h4>
    <div class="col-md-12">
        @if(Session::has('flash_message'))
            <div id="flash-message" class="text-center">
                <p class="alert  alert-success">{{ session('flash_message') }}</p>
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Full Name</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Phone</th>
                <th scope="col" class="text-center">Current age</th>
            </tr>
            </thead>
            <tbody id="">
            @foreach($persons as $person)
                <tr>
                    <th scope="row">{{ $person->id }}</th>
                    <td class="text-center">{{ $person->full_name }}</td>
                    <td class="text-center"><a href="mailto:{{ $person->email }}">{{ $person->email }}</a></td>
                    <td class="text-center">{{ $person->phone }}</td>
                        <?php
                        $birthdate = Carbon::parse($person->date_of_birth);
                        $age = Carbon::parse($birthdate)->age;
                        ?>
                    <td class="text-center">{{ $age }} years old</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-12 text-center">
            {{ $persons->links() }}
        </div>
    </div>
</div>
@endsection
