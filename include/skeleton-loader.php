
<style>
    .skeleton {
    background: #ddd;
    animation: pulse 1.5s infinite ease-in-out;
}

@keyframes pulse {
    0% {
        background-color: #ddd;
    }
    50% {
        background-color: #ccc;
    }
    100% {
        background-color: #ddd;
    }
}

</style>

<div class="skeleton skeleton-text" style="width: 100%; height: 20px;"></div>
<div class="skeleton skeleton-text" style="width: 80%; height: 20px;"></div>
<div class="skeleton skeleton-text" style="width: 90%; height: 20px;"></div>



<script>window.addEventListener('load', function() {
    const skeletonLoader = document.querySelectorAll('.skeleton');
    skeletonLoader.forEach(loader => {
        loader.style.display = 'none';  // Hide loader once content is loaded
    });
});
</script>