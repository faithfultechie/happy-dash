<div>
    <div>
        <x-page-heading pageHeading="Account Security" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <h2 class="text-xl font-semibold text-slate-700">Two Factor Authentication</h2>
        <p class="text-slate-500 text-sm mt-2">Help protect your acount from unauthorized access by requiring a second
            authentication method in addition to your password using <span class="font-medium">two factor
                authentication.</span></p>

        @if (!auth()->user()->two_factor_secret)
            <span
                class="mt-4 inline-flex items-center gap-x-1.5 rounded-md bg-red-400 px-2 py-1 text-xs font-medium text-white">
                <svg class="h-1.5 w-1.5 fill-white" viewBox="0 0 6 6" aria-hidden="true">
                    <circle cx="3" cy="3" r="3" />
                </svg>
                2FA is Off, You will need to enable to set this up
            </span>
        @endif

        <div class="my-8 border-t border-gray-200"></div>

        <div class="grid gap-7 grid-cols-1 md:grid-cols-2 mt-4 mb-2">
            @if (auth()->user()->two_factor_secret)
                <div class="text-base text-gray-700">
                    <p>
                        First, you’ll need a 2FA authenticator app on your phone. If you don’t have one, we recommend
                        <a href="https://apps.apple.com/us/app/ente-authenticator/id6444121398" target="_blank"
                            class="underline text-blue-700">auth for IOS</a> or <a
                            href="https://play.google.com/store/apps/details?id=io.ente.auth" target="_blank"
                            class="underline text-blue-700">auth for Android</a>.
                    </p>
                    <p class="mt-3"> You can download it free on the Apple App Store for iPhone, or Google Play Store
                        for
                        Android. Please
                        grab your phone, search the store, and install it now.</p>
                    <p class="mt-3"> Once your authenticator app is installed, open the authenticator app, tap ”Scan
                        QR
                        code” or ”+”,
                        and, when it asks, point your phone’s camera at this QR code picture on the right.
                        Point your camera here</p>
                </div>

                <div>
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                    <p class="mt-4 text-sm uppercase text-gray-600">Point your camera here</p>
                </div>
        </div>

        <div class="my-8 border-t border-gray-200"></div>

        <div class="grid gap-7 grid-cols-1 md:grid-cols-2 mt-4 mb-2">
            <div class="text-base text-gray-700">
                <p>
                    Store these recovery codes in a secure password manager or notes. They can be used to recover access
                    to your account if your two factor authentication device is lost.
                </p>
            </div>

            <div class="mb-8">
                @forelse (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                    <li class="text-gray-600">{{ $code }}</li>
                @empty
                @endforelse
                <form action="{{ url('user/two-factor-recovery-codes') }}" method="POST">
                    @csrf
                    <div class="flex flex-wrap gap-xs margin-top-md">
                        <x-button type="submit" outline sm blue label="Regenerate codes" class="mt-4 uppercase" />
                    </div>
                </form>
            </div>
        </div>
        @endif

        @if (!auth()->user()->two_factor_secret)
            <div>
                <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                    @csrf
                    <x-button md type="submit" blue label="Enable 2FA" />
                </form>
            </div>
        @endif

        @if (auth()->user()->two_factor_secret)
            <div>
                <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                    @csrf
                    @method('delete')
                    <x-button md type="submit" red label="Disable 2FA" />
                </form>
            </div>
        @endif
    </div>
</div>
