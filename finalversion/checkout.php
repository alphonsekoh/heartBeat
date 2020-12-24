<?php
    require "stripe-php/init.php";
    $publishableKey = "pk_test_51HtgYeEv3cr9c5tbJdvp9WOoVPeW71ZmMcm9tg3lkAODQB3u678CGZAAyZ6NWcGLnVQyQdxrQlQlPjRjg7uI7Kmj00kZIzcgz7";
    $secretKey = "sk_test_51HtgYeEv3cr9c5tbNmkoBt6sGnxIPoAAJqOxKYJuSTrXskYbFN0yoqVM8lnaagOMO9HvcJ9rVjmMZwNU0x2clGcv00JbcOQNE9";
    \Stripe\Stripe::setApiKey($secretKey);
?>

<form action="process_donation.php" method="post">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="<?php echo $publishableKey ?>"
        data-amount="500"
        data-name="Trial1"
        data-description="idk man"
        data-image=""
        data-currency="usd"
    >
    </script>
</form>

