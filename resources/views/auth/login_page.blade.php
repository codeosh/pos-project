{{-- resources\views\auth\login_page.blade.php --}}
@extends('layouts.login_layout')

@section('title', 'Login - POS')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-slate-100">
    <x-bladewind.card class="w-96">
        <p class="text-xl font-semibold text-center">BizmaTech</p>
        <p class="text-xs font-extralight text-center mb-14">i World Solutions</p>
        <p class="text-base font-semibold mb-10">POS - Login</p>
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <x-bladewind.input name="email" label="Email" type="email" required />
            </div>
            <div class="mb-4">
                <x-bladewind.input name="password" label="Password" type="password" required />
            </div>
            <div class="flex justify-between items-center mb-10">
                <a href="" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
                <label class="inline-flex items-center">
                    <input type="checkbox" id="show-password" class="rounded">
                    <span class="ml-2 text-sm text-gray-600">Show password</span>
                </label>
            </div>
            <x-bladewind::button id="bladewindSubmitBtn" type="submit" color="primary" class="w-full text-white">Login
            </x-bladewind::button>
        </form>
    </x-bladewind.card>
</div>

{{-- Scripts Compiled --}}
<script src="{{asset('js/auth/login.js')}}"></script>
@endsection