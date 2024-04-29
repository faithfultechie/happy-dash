@php
    $notifications = [
        'success' => session('success'),
        'message' => session('message'),
        'error' => session('error'),
        'two-factor-authentication-enabled' => 'Two factor authentication has been enabled.',
        'two-factor-authentication-disabled' => 'Two factor authentication has been disabled.',
        'recovery-codes-generated' => 'Recovery codes have been regenerated.',
        'verification-link-sent' => 'A new email verification link has been emailed to you!',
    ];

    $notificationTypes = [
        'success' => 'success',
        'message' => 'success',
        'error' => 'error',
        'two-factor-authentication-enabled' => 'success',
        'two-factor-authentication-disabled' => 'warning',
        'recovery-codes-generated' => 'success',
        'verification-link-sent' => 'success',
    ];
@endphp

@foreach ($notifications as $status => $message)
    @if (session()->has($status) || session('status') == $status)
        <script>
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                    title: '{{ ucfirst($notificationTypes[$status]) }} Notification',
                    description: '{{ $message }}',
                    icon: '{{ $notificationTypes[$status] }}'
            })
        })
    </script>
@endif
@endforeach
