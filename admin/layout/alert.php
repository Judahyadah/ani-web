<?php
if(isset($success)){
    echo "<div id='liveToast' class='position-fixed toast show' role='alert'  style='top: 20px; right: 20px; z-index: 1000; background-color: #180953; color: #fff; margin-top: 4rem;'>
<div class='toast-body d-flex justify-content-between'>
<div class='text-start'>
    <i class='bi-check-circle'> </i>$success
</div>
    <div class='text-end'>
        <button type='button' class='bi-x bg-transparent border-0' data-bs-dismiss='toast' aria-label='Close'></button>
    </div>
</div>
</div>
<script>(document).ready(function() {
    ('#liveToast').toast('show');
});
</script>";
}
elseif(isset($error)){
echo"<div id='liveToast' class='position-fixed toast show' role='alert' style='top: 20px; right: 20px; z-index: 1000; background-color: #530909; color: #fff; margin-top: 4rem;'>
<div class='toast-body d-flex justify-content-between'>
<div class='text-start'>
    <i class='bi-x-circle'> </i>$error
</div>
    <div class='text-end'>
        <button type='button' class='bi-x bg-transparent border-0' data-bs-dismiss='toast' aria-label='Close'></button>
    </div>
</div>
</div>
<script>(document).ready(function() {
    ('#liveToast').toast('show');
});
</script>";
}
?>