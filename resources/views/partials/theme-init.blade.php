<script>
    // Check localStorage only. Default to light if not set or set to light.
    if (localStorage.getItem('color-theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>