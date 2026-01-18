<?php
include 'backend/db.php';

$page = $_GET['page'] ?? 'home';
$pageTitle = ucfirst($page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?> - Olivia Cake 🍰</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    *{margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', sans-serif;}
    body{background:#2b001f; color:#ffd6e8;}
    a{text-decoration:none;color:inherit;}
    button{cursor:pointer;}
    header{background:#3b002d; padding:15px 20px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:100;}
    header h1{font-size:22px; color:#ff85b3;}
    nav a{margin-left:15px; font-weight:500; transition:0.3s; color:#ffd6e8;}
    nav a:hover, nav a.active{color:#ff85b3; font-weight:bold;}
    section{padding:40px 20px;}
    h2{text-align:center; margin-bottom:20px; color:#ff85b3;}
    .home-hero{display:flex; flex-wrap:wrap; justify-content:center; align-items:center; background: linear-gradient(135deg, #4d003d, #660055); padding:60px 20px; border-radius:20px; margin:20px auto; max-width:1000px; box-shadow:0 10px 20px rgba(0,0,0,0.6);}
    .hero-content{flex:1 1 400px; text-align:center;}
    .hero-content h1{font-size:36px; color:#ff85b3; margin-bottom:15px; text-shadow: 1px 1px 3px #330022;}
    .hero-content p{font-size:18px; color:#ffd6e8; margin-bottom:25px;}
    .hero-buttons .btn{font-size:16px; margin:5px; padding:12px 25px; background: linear-gradient(90deg,#ff85b3,#ff4d94); color:white; border:none; border-radius:25px; transition: transform 0.3s, box-shadow 0.3s;}
    .hero-buttons .btn:hover{transform: scale(1.1); box-shadow:0 5px 15px rgba(255,133,179,0.5);}
    .hero-img{flex:1 1 300px; max-width:400px; margin-top:20px; border-radius:20px; box-shadow:0 10px 20px rgba(0,0,0,0.6);}
    .btn{display:inline-block; background:#ff85b3; color:white; padding:10px 18px; border-radius:20px; margin:10px; transition:0.3s; border:none;}
    .btn:hover{background:#ff4d94;}
    .cake-grid{display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:20px; margin-top:30px;}
    .cake-card{background:#4d003d; border-radius:15px; padding:15px; text-align:center; box-shadow:0 5px 15px rgba(0,0,0,0.6); transition:0.3s;}
    .cake-card:hover{transform:translateY(-5px);}
    .cake-card img{width:100%; border-radius:10px; transition: transform 0.3s;}
    .cake-card img:hover{transform: scale(1.05);}
    form{max-width:500px; margin:auto; background:#4d003d; padding:20px; border-radius:15px; color:#ffd6e8;}
    form label{display:block;margin-top:10px;}
    form input, form select, textarea{width:100%; padding:8px; margin-top:5px; border-radius:8px; border:1px solid #660055; background:#2b001f; color:#ffd6e8;}
    .cart-box{max-width:600px; margin:auto; background:#4d003d; padding:20px; border-radius:15px;}
    footer{background:#3b002d; text-align:center; padding:15px; margin-top:30px; font-size:14px; color:#ffd6e8;}
    @media(max-width:768px){.home-hero{flex-direction:column;} .hero-img{max-width:300px;} .hero-content h1{font-size:28px;} .hero-content p{font-size:16px;} nav{flex-direction:column; align-items:flex-start;} nav a{margin:5px 0;} .cake-grid{grid-template-columns:repeat(auto-fit,minmax(150px,1fr));} form, .cart-box{width:95%; padding:15px;}}
  </style>
</head>
<body>
  <header>
    <h1>Olivia Cake 🍰</h1>
    <nav>
      <a href="?page=home" class="<?php echo $page=='home'?'active':''; ?>">Home</a>
      <a href="?page=about" class="<?php echo $page=='about'?'active':''; ?>">About</a>
      <a href="?page=menu" class="<?php echo $page=='menu'?'active':''; ?>">Cakes</a>
      <a href="?page=cart" class="<?php echo $page=='cart'?'active':''; ?>">Cart</a>
      <a href="?page=contact" class="<?php echo $page=='contact'?'active':''; ?>">Contact</a>
      <a href="?page=login">Login</a>
    </nav>
  </header>

  <main>
    <?php
    if ($page == 'home') {
        echo '
        <section id="home">
          <div class="home-hero">
            <div class="hero-content">
              <h1>Welcome to <span style="color:#ff85b3;">Olivia Cake 💕</span></h1>
              <p>We create cute, fresh, and delicious bento cakes made with love for your special moments.</p>
              <div class="hero-buttons">
                <a class="btn" href="?page=menu">View Cakes</a>
                <a class="btn" href="?page=menu">Order Now</a>
              </div>
            </div>
            <img class="hero-img" src="images/logo.png" alt="Bento Cakes">
          </div>
        </section>';
    } 
    elseif ($page == 'about') {
        echo '
        <section id="about">
          <h2>About Us</h2>
          <p style="text-align:center;max-width:600px;margin:auto;">
            Bento Bliss is a home-based bakery focusing on fresh ingredients, hygiene, and adorable cake designs.
            Every cake is baked with care for your happiness 💖
          </p>
        </section>';
    } 
    elseif ($page == 'menu') {
        $result = $conn->query("SELECT * FROM cakes WHERE is_deleted=0");
        $cakeGrid = '';
        while ($cake = $result->fetch_assoc()) {
            $cakeGrid .= '
            <div class="cake-card">
              <img src="' . htmlspecialchars($cake['image']) . '" alt="' . htmlspecialchars($cake['name']) . ' Cake">
              <h4>' . htmlspecialchars($cake['name']) . '</h4>
              <p>Rs. ' . htmlspecialchars($cake['price']) . '</p>
              <button class="btn" onclick="toggleCustomBox(\'custom' . $cake['id'] . '\')">Customize</button>
              <form id="custom' . $cake['id'] . '" style="display:none;margin-top:10px;">
                <h5 style="text-align:center;color:#ff85b3;">Customize ' . htmlspecialchars($cake['name']) . ' Cake 🎀</h5>
                <label>Cake Shape</label>
                <select class="cakeShape">
                  <option>Round</option>
                  <option>Heart</option>
                  <option>Square</option>
                </select>
                <label>Message on Cake</label>
                <input class="cakeMessage" placeholder="Happy Birthday">
                <label>Toppings</label>
                <select class="topping">
                  <option>None</option>
                  <option>Sprinkles</option>
                  <option>Choco Chips</option>
                  <option>Fruit</option>
                </select>
                <br><br>
                <button type="button" class="btn" onclick="addCustomizedCake(\'' . htmlspecialchars($cake['name']) . '\',' . $cake['price'] . ',this)">Add to Cart</button>
              </form>
            </div>';
        }
        echo '
        <section id="menu">
          <h2>Our Bento Cakes</h2>
          <div class="cake-grid">' . $cakeGrid . '</div>
        </section>';
    } 
    elseif ($page == 'cart') {
        echo '
        <section id="cart">
          <h2>Your Cart</h2>
          <div class="cart-box" id="cartItems">Cart is empty</div>
          <br>
          <div style="text-align:center;">
            <a class="btn" href="?page=checkout">Checkout</a>
          </div>
        </section>';
    } 
    elseif ($page == 'checkout') {
        echo '
        <section id="checkout">
          <h2>Checkout</h2>
          <form id="checkoutForm" onsubmit="return confirmOrder(event)">
            <label>Name</label><input type="text" id="custName" required>
            <label>Phone</label><input type="tel" id="custPhone" required>
            <label>Delivery Address</label><textarea id="custAddress" required></textarea>
            <label>Payment Method</label>
            <select id="paymentMethod">
              <option>Cash on Delivery</option>
              <option>Online</option>
            </select>
            <br><br>
            <button class="btn" type="submit">Confirm Order</button>
          </form>
        </section>';
    } 
    elseif ($page == 'summary') {
        echo '
        <section id="summary">
          <h2>Order Confirmed 🎉</h2>
          <div style="max-width:700px; margin:auto; background:#4d003d; padding:20px; border-radius:15px; color:#ffd6e8;">
            <h3 style="text-align:center; color:#ff85b3;">Invoice</h3>
            <table id="invoiceTable" style="width:100%; border-collapse:collapse; margin-top:15px; color:#ffd6e8;">
              <thead>
                <tr style="border-bottom:1px solid #660055;">
                  <th style="text-align:left; padding:5px;">Cake</th>
                  <th style="text-align:left; padding:5px;">Shape</th>
                  <th style="text-align:left; padding:5px;">Topping</th>
                  <th style="text-align:left; padding:5px;">Message</th>
                  <th style="text-align:right; padding:5px;">Price (Rs.)</th>
                </tr>
              </thead>
              <tbody id="invoiceBody"></tbody>
            </table>
            <h3 style="text-align:right; margin-top:10px; color:#ff85b3;">Total: Rs.<span id="invoiceTotal">0</span></h3>
          </div>
        </section>';
    } 
    elseif ($page == 'contact') {
        echo '
        <section id="contact">
          <h2>Contact Us</h2>
          <form>
            <label>Your Name</label><input type="text">
            <label>Email</label><input type="email">
            <label>Message</label><textarea></textarea>
            <br><br>
            <button class="btn" type="submit">Send</button>
          </form>
        </section>';
    }
    elseif ($page == 'login') {
        echo '
        <section id="login">
          <h2>Login</h2>
          <form id="loginForm" onsubmit="return handleLogin(event)">
            <label>Email</label><input type="email" id="loginEmail" required>
            <label>Password</label><input type="password" id="loginPassword" required>
            <br><br>
            <button class="btn" type="submit">Login</button>
            <p style="text-align:center; margin-top:10px;">
              Don\'t have an account? <a href="?page=register" style="color:#ff85b3;">Register here</a>
            </p>
          </form>
        </section>';
    }
    elseif ($page == 'register') {
        echo '
        <section id="register">
          <h2>Register</h2>
          <form id="registerForm" onsubmit="return handleRegister(event)">
            <label>Name</label><input type="text" id="regName" required>
            <label>Email</label><input type="email" id="regEmail" required>
            <label>Password</label><input type="password" id="regPassword" required>
            <br><br>
            <button class="btn" type="submit">Register</button>
            <p style="text-align:center; margin-top:10px;">
              Already have an account? <a href="?page=login" style="color:#ff85b3;">Login here</a>
            </p>
          </form>
        </section>';
    }
    else {
        // If page doesn't exist, redirect to home
        echo '
        <section id="home">
          <div class="home-hero">
            <div class="hero-content">
              <h1>Welcome to <span style="color:#ff85b3;">Olivia Cake 💕</span></h1>
              <p>We create cute, fresh, and delicious bento cakes made with love for your special moments.</p>
              <div class="hero-buttons">
                <a class="btn" href="?page=menu">View Cakes</a>
                <a class="btn" href="?page=menu">Order Now</a>
              </div>
            </div>
            <img class="hero-img" src="images/logo.png" alt="Bento Cakes">
          </div>
        </section>';
    }
    ?>
  </main>

  <footer>
    📞 0300-0000000 | ✉ bentobliss@email.com<br>
    © 2025 Bento Bliss
  </footer>

  <script>
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let toppingPrices = { "Sprinkles":50, "Choco Chips":100, "Fruit":150 };

    // Update cart on page load
    window.onload = function() {
      updateCart();
    };

    function toggleCustomBox(id){
      const box = document.getElementById(id);
      box.style.display = (box.style.display === 'block') ? 'none' : 'block';
    }

    function addCustomizedCake(name, price, btn){
      const form = btn.closest('form');
      const shape = form.querySelector('.cakeShape').value;
      const message = form.querySelector('.cakeMessage').value;
      const topping = form.querySelector('.topping').value;
      const totalPrice = price + (toppingPrices[topping] || 0);
      cart.push({name, shape, message, topping, price: totalPrice});
      localStorage.setItem('cart', JSON.stringify(cart));
      updateCart();
      alert('Customized cake added!');
      form.style.display = 'none';
    }

    function updateCart(){
      const box = document.getElementById('cartItems');
      if(!box) return;
      
      if(cart.length === 0){
        box.innerHTML = 'Cart is empty';
        return;
      }
      let total = 0;
      box.innerHTML = '';
      cart.forEach((item, index)=>{
        total += item.price;
        box.innerHTML += `<p><b>${item.name}</b><br>Shape: ${item.shape}<br>Topping: ${item.topping}<br>Message: ${item.message}<br>Rs.${item.price}<br><button class="btn" style="padding:5px 10px; font-size:12px;" onclick="removeFromCart(${index})">Remove</button></p><hr>`;
      });
      box.innerHTML += `<b>Total: Rs.${total}</b>`;
    }

    function removeFromCart(index){
      cart.splice(index, 1);
      localStorage.setItem('cart', JSON.stringify(cart));
      updateCart();
    }

    function confirmOrder(event){
      event.preventDefault();
      
      if(cart.length === 0){
        alert("Cart is empty!");
        return false;
      }
      
      let name = document.getElementById('custName').value;
      let phone = document.getElementById('custPhone').value;
      let address = document.getElementById('custAddress').value;
      
      console.log("Placing order with data:", {name, phone, address, cart});
      
      fetch("backend/saveOrders.php", {
        method: "POST",
        headers: { 
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify({
          name: name,
          phone: phone,
          address: address,
          cart: cart,
          total: cart.reduce((sum, item) => sum + item.price, 0)
        })
      })
      .then(res => {
        console.log("Response status:", res.status);
        console.log("Response headers:", res.headers);
        
        // Try to get response text first
        return res.text().then(text => {
          console.log("Response text:", text);
          
          if (!res.ok) {
            throw new Error('HTTP error ' + res.status + ': ' + text);
          }
          
          // Try to parse as JSON
          try {
            return JSON.parse(text);
          } catch(e) {
            throw new Error('Invalid JSON response: ' + text);
          }
        });
      })
      .then(data => {
        console.log("Response data:", data);
        if(data.success) {
          alert("Order Confirmed 🎉 Order ID: #" + data.order_id);
          cart = [];
          localStorage.setItem('cart', JSON.stringify(cart));
          updateCart();
          window.location.href = "?page=summary";
        } else {
          alert("Error: " + data.message);
        }
      })
      .catch(err => {
        console.error("Fetch error:", err);
        alert("Error placing order: " + err.message + ". Check browser console (F12) for details.");
      });
      
      return false;
    }

    function handleLogin(event) {
        event.preventDefault();
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;
        
        fetch('backend/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                if (data.user.role === 'admin') {
                    window.location.href = 'admin.php';
                } else {
                    window.location.href = '?page=home';
                }
            } else {
                alert(data.message);
            }
        })
        .catch(err => {
            console.error(err);
            alert("Login error. Check console.");
        });
        
        return false;
    }

    function handleRegister(event) {
        event.preventDefault();
        const name = document.getElementById('regName').value;
        const email = document.getElementById('regEmail').value;
        const password = document.getElementById('regPassword').value;
        
        fetch('backend/register.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, email, password })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                window.location.href = '?page=login';
            }
        })
        .catch(err => {
            console.error(err);
            alert("Registration error. Check console.");
        });
        
        return false;
    }
  </script>
</body>
</html>