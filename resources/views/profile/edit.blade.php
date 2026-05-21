<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-3 fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">
            {{ __('Profil Saya') }}
        </h2>
        <p class="text-secondary mb-0" style="font-size: 0.95rem;">Kelola informasi akun dan pengaturan keamanan Anda</p>
    </x-slot>

    <div class="row mt-4">
        <div class="col-md-8 mx-auto space-y-4">
            
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 1rem;">
                <div class="card-body p-4 p-md-5">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4" style="border-radius: 1rem;">
                <div class="card-body p-4 p-md-5">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card border-0 shadow-sm border-danger border-opacity-25 mb-4" style="border-radius: 1rem;">
                <div class="card-body p-4 p-md-5">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
