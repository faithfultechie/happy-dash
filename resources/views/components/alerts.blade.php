@if (session()->has('success'))
    <script>
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                title: 'Success Notification',
                description: '{{ session('success') }}',
                icon: 'success'
            })
        })
    </script>
@endif

@if (session('status') == 'two-factor-authentication-enabled')
    <script>
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                title: 'Success Notification',
                description: 'Two factor authentication has been enabled.',
                icon: 'success'
            })
        })
    </script>
@endif

@if (session('status') == 'two-factor-authentication-disabled')
    <script>
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                title: 'Warning Notification',
                description: 'Two factor authentication has been disabled.',
                icon: 'warning'
            })
        })
    </script>
@endif

@if (session('status') == 'recovery-codes-generated')
    <script>
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                title: 'Success Notification',
                description: 'Recovery codes have been regenerated.',
                icon: 'success'
            })
        })
    </script>
@endif

@if (session()->has('message'))
    <script>
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                title: 'Success Notification',
                description: '{{ session('message') }}',
                icon: 'success'
            })
        })
    </script>
@endif

@if (session('status') == 'verification-link-sent')
    <script>
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                title: 'Success Notification',
                description: 'A new email verification link has been emailed to you!',
                icon: 'success'
            })
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                title: 'Error Notification',
                description: '{{ session('error') }}',
                icon: 'error'
            })
        })
    </script>
@endif
