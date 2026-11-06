<?php
require_once "./order_functions.php";
$welcomeBack = '';
if (isset($_COOKIE['lastVisit'])) {
   $last = htmlspecialchars($_COOKIE['lastVisit']);
   $welcomeBack = "Welcome back! Your last visit was {$last}.";
} else {
   $welcomeBack = 'First time at Chez Session? Welcome in!';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Chez Session Bistro</title>
</head>

<body>

   <h1>Welcome to Chez Session!</h1>

   <p class="welcome-note"><?= $welcomeBack ?></p>

   <form action="process_order.php" method="POST">

      <!-- Dessert dropdown -->
      <h2>Choose Your Dessert</h2>

      <select name="dessert" id="dessert">
         <option value="none">Choose a dessert</option>

         <option value="Cheesecake" <?= dessertSelected("Cheesecake"); ?>>
            Cheesecake
         </option>

         <option value="Chocolate Cake" <?= dessertSelected("Chocolate Cake"); ?>>
            Chocolate Cake
         </option>

         <option value="Carrot Cake" <?= dessertSelected("Carrot Cake"); ?>>
            Carrot Cake
         </option>

         <option value="Tiramisu" <?= dessertSelected("Tiramisu"); ?>>
            Tiramisu
         </option>
      </select>


      <!-- Drink dropdown -->
      <h2>Choose Your Drink</h2>

      <select name="drink" id="drink">
         <option value="none">Choose a drink</option>

         <option value="Coffee" <?= drinkSelected("Coffee"); ?>>
            Coffee
         </option>

         <option value="Hot Chocolate" <?= drinkSelected("Hot Chocolate"); ?>>
            Hot Chocolate
         </option>

         <option value="Root Beer" <?= drinkSelected("Root Beer"); ?>>
            Root Beer
         </option>

         <option value="Tea" <?= drinkSelected("Tea"); ?>>
            Tea
         </option>

         <option value="Milk" <?= drinkSelected("Milk"); ?>>
            Milk
         </option>
      </select>


      <h2>Choose Your Drink Size</h2>

      <label>
         <input type="radio" name="drinkSize" value="Small"
            <?= drinkSizeSelected("Small"); ?>>
         Small
      </label>

      <label>
         <input type="radio" name="drinkSize" value="Medium"
            <?= drinkSizeSelected("Medium"); ?>>
         Medium
      </label>

      <label>
         <input type="radio" name="drinkSize" value="Large"
            <?= drinkSizeSelected("Large"); ?>>
         Large
      </label>


      <br><br>
      <button type="submit">Place Order</button>

   </form>


   <div class="insight-card">
      <h3>Live guidance</h3>

      <p><?= htmlspecialchars(completionMessage()); ?></p>

      <p class="insight-note">
         <?= htmlspecialchars(pairingSuggestion()); ?>
      </p>
   </div>

   <div class="insight-card pricing-grid">

      <div>
         <h3>Estimated total</h3>

         <p class="price-figure">
            <?= htmlspecialchars(formattedTotal()); ?>
         </p>
      </div>

      <div>
         <h3>Order profile</h3>

         <p><?= htmlspecialchars(orderProfile()); ?></p>
      </div>

   </div>

</body>
</html>