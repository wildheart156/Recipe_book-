<?php
require "./order_functions.php";

// Runs at the very top of process_order.php, alongside session_start().
// One day = 86400 seconds. One week = 604800.
$visitStamp = date('l, F j, Y g:i a');
setcookie('lastVisit', $visitStamp, time() + 86400, '/');
$orderSummary = order();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Order Receipt</title>
</head>

<body>

   <h1>Your Order Receipt</h1>

   <div class="receipt-card">
      <?= $orderSummary; ?>
   </div>

   <a href="index.php">Order Again!</a>


<div class="receipt-card"><?= $orderSummary; ?></div>

<div class="insight-card">
   <h3>Order feedback</h3>
   <p><?= htmlspecialchars(completionMessage()); ?></p>
   <p class="insight-note"><?= htmlspecialchars(pairingSuggestion()); ?></p>
</div>

<div class="insight-card pricing-grid">
   <div>
      <h3>Estimated total</h3>
      <p class="price-figure"><?= htmlspecialchars(formattedTotal()); ?></p>
   </div>
   <div>
      <h3>Order profile</h3>
      <p><?= htmlspecialchars(orderProfile()); ?></p>
   </div>
   <p class="insight-note full-width-note"><?= htmlspecialchars(pricingNote()); ?></p>
</div>

</body>

</html>